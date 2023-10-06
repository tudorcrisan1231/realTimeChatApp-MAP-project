<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
  
            return redirect()->route('chats')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withError('Login details are not valid');
    }

    public function register()
    {
        return view('auth.register');
    }
      
    public function customRegister(Request $request)
    {  
        $request->validate([
            'username' => 'required|max:20',
            'email' => 'required|email|unique:users|max:30',
            'password' => 'required|min:6|max:20',
            'password_confirmation' => 'required|same:password',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        Auth::login($check);
        return redirect()->route('chats')->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return redirect()->route('login');
    }
}
