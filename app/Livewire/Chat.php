<?php

namespace App\Livewire;

use App\Models\Chat as ModelsChat;
use App\Models\GroupMember;
use App\Models\IndividualChat;
use App\Models\User;
use Livewire\Component;

class Chat extends Component
{
    public $group_chats = [], $individual_chats = [];

    public function mount(){
        $user = auth()->user();
        $this->individual_chats = IndividualChat::where('sender_id', $user->id)->orWhere('receiver_id', $user->id)->get();
        $group_members = GroupMember::where('user_id', $user->id)->get();
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
