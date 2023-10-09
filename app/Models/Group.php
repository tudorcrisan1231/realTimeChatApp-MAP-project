<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function getMembers(){
        //get all members of this group except the logged in user
        return $this->hasMany(GroupMember::class, 'group_id')->where('user_id', '!=', auth()->user()->id);
    }

    public function getLastChat(){
        return $this->hasOne(Chat::class, 'group_id')->latest();
    }
}
