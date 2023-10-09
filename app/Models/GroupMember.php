<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;

    public function getGroup(){
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
