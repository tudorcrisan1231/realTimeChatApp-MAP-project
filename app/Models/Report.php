<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function getSender(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getMessage(){
        return $this->belongsTo(Chat::class, 'message_id');
    }
}
