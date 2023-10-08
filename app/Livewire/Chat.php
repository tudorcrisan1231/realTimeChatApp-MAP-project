<?php

namespace App\Livewire;

use App\Models\Chat as ModelsChat;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\User;
use Livewire\Component;

class Chat extends Component
{
    public $group_chats = [], $individual_chats = [];

    //create new chat variables
    public $newGroupType, $addNewGroup = 0, $users = [], $group_new, $selected_users = [];

    public $activeChatID = null, $activeChatType = null;

    public function openAddNewGroup($type){
        $this->addNewGroup = 1;
        $this->newGroupType = $type;

        $this->reset(['group_new', 'selected_users']);
    }

    public function closeAddNewGroup(){
        $this->addNewGroup = 0;
        $this->newGroupType = null;

        $this->reset(['group_new', 'selected_users']);
    }

    public function createGroup(){
        // dd($this->newGroupType, $this->group_new, $this->selected_users);
        if($this->newGroupType == 'group'){
            $this->validate([
                'group_new' => 'required',
                'selected_users' => 'required'
            ], [
                'group_new.required' => 'Group name is required',
                'selected_users.required' => 'Please select atleast one user'
            ]);

            $group = new Group();
            $group->name = $this->group_new;
            $group->save();

            foreach($this->selected_users as $user){
                $group_member = new GroupMember();
                $group_member->group_id = $group->id;
                $group_member->user_id = $user;
                $group_member->save();
            }

            $group_member = new GroupMember();
            $group_member->group_id = $group->id;
            $group_member->user_id = auth()->user()->id;
            $group_member->is_admin = 1;
            $group_member->save();

        } else {
            $this->validate([
                'selected_users' => 'required'
            ], [
                'selected_users.required' => 'Please select atleast one user'
            ]);

            //if chat already exists
            if(IndividualChatGroup::where('user1_id', auth()->user()->id)->where('user2_id', $this->selected_users)->orWhere('user1_id', $this->selected_users)->where('user2_id', auth()->user()->id)->exists()){
                return redirect()->route('chats')->with('error', 'Chat already exists');
            }

            $group = new IndividualChatGroup();

            $group->user1_id = auth()->user()->id;
            $group->user2_id = $this->selected_users;

            $group->save();
        }   

        return redirect()->route('chats')->with('success', 'Chat created successfully');
    }

    public function openChat($type, $group_id){
        $this->activeChatID = $group_id;
        $this->activeChatType = $type;
    }

    public function mount(){
        $user = auth()->user();
        $this->individual_chats = IndividualChatGroup::where('user1_id', $user->id)->orWhere('user2_id', $user->id)->get();
        $this->group_chats = GroupMember::where('user_id', $user->id)->get();


        $this->users = User::where('id', '!=', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
