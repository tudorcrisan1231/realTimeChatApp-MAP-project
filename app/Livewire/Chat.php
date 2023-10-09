<?php

namespace App\Livewire;

use App\Models\Chat as ModelsChat;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Report;
use App\Models\User;
use Livewire\Component;


class Chat extends Component
{
    public $groups = [], $chats = [];

    //create new chat variables
    public $newGroupType, $addNewGroup = 0, $users = [], $group_name, $selected_users = [];

    public $activeChat = null, $chat_message;

    public function openAddNewGroup($type){
        $this->addNewGroup = 1;
        $this->newGroupType = $type;

        $this->reset(['group_name', 'selected_users']);
    }

    public function closeAddNewGroup(){
        $this->addNewGroup = 0;
        $this->newGroupType = null;

        $this->reset(['group_name', 'selected_users']);
    }

    public function createGroup(){
  
        $this->validate([
            'selected_users' => 'required'
        ], [
            'selected_users.required' => 'Please select atleast one user'
        ]);

        if($this->newGroupType == 'group'){
            $this->validate([
                'group_name' => 'required'
            ], [
                'group_name.required' => 'Please enter group name'
            ]);
        }

        $group = new Group();
        $group->name = $this->group_name;
        $group->type = $this->newGroupType;
        $group->save();

        if($this->newGroupType == 'group'){
            //add group members
            foreach($this->selected_users as $user){
                $group_member = new GroupMember();
                $group_member->group_id = $group->id;
                $group_member->user_id = $user;
                $group_member->save();
            }
            //add the user who created the group
            $group_member = new GroupMember();
            $group_member->group_id = $group->id;
            $group_member->user_id = auth()->user()->id;
            $group_member->save();
        } else {
            //add the user who created the group
            $group_member = new GroupMember();
            $group_member->group_id = $group->id;
            $group_member->user_id = auth()->user()->id;
            $group_member->save();

            //add the user who is selected
            $group_member = new GroupMember();
            $group_member->group_id = $group->id;
            $group_member->user_id = $this->selected_users;
            $group_member->save();
        }


        return redirect()->route('chats')->with('success', 'Chat created successfully');
    }

    public function openChat($group_id){
        $this->chat_message = null;

        $this->activeChat = Group::find($group_id);

        $this->chats = ModelsChat::where('group_id', $group_id)->orderBy('created_at', 'asc')->get();
    }

    public function sendMessage(){
        $this->validate([
            'chat_message' => 'required'
        ]);
        
        $chat = new ModelsChat();
        $chat->group_id = $this->activeChat->id;
        $chat->sender_id = auth()->user()->id;
        $chat->message = $this->chat_message;
        $chat->save();

        $this->chat_message=null;
        $this->chats = ModelsChat::where('group_id', $this->activeChat->id)->orderBy('created_at', 'asc')->get();
    }

    public function sendReport($user_id, $chat_id){
        $report = new Report();
        $report->user_id = $user_id;
        $report->message_id = $chat_id;
        $report->group_id = $this->activeChat->id;
        $report->save();

        return redirect()->route('chats')->with('success', 'Report sent successfully. We will review it and take necessary action.');
    }

    public function mount(){
        $user = auth()->user();
        
        $this->groups = GroupMember::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        $this->users = User::where('id', '!=', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
