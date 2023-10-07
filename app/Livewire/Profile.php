<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $username, $email, $avatar, $new_avatar, $new_password, $current_password, $new_password_confirmation;

    public function updateProfile(){
        $this->validate([
            'username' => 'required|max:20',
            'email' => 'required|email|max:30',
        ]);

        if($this->new_avatar){
            $this->validate([
                'new_avatar' => 'image|max:1024', // 1MB Max
            ]);
            $this->user->avatar = $this->new_avatar->store('avatars', 'public');
        } else {
            $this->user->avatar = $this->avatar;
        }

        if($this->current_password){
            $this->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:6|max:20',
                'new_password_confirmation' => 'required|same:new_password',
            ], [
                'current_password.required' => 'Current password is required',
                'new_password.required' => 'New password is required',
                'new_password.min' => 'New password must be at least 6 characters',
                'new_password.max' => 'New password must be at most 20 characters',
                'new_password_confirmation.required' => 'New password confirmation is required',
                'new_password_confirmation.same' => 'New password confirmation must be same as new password',
            ]);
            if(!Hash::check($this->current_password, $this->user->password)){
                return redirect()->route('profile')->with('error', 'Error! Current password is incorrect');
            }
            $this->user->password = bcrypt($this->new_password);
        }

        $this->user->username = $this->username;
        $this->user->email = $this->email;
        $this->user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function removeAvatar(){
        $this->avatar = null;
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->avatar = $this->user->avatar;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
