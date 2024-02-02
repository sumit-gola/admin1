<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\session;

use App\Models\User;
use Illuminate\Http\Request;

class AuthManager extends Controller
{
    public function loginView(){ 
        return view('auth.signin');
    }
    public function registrationView(){
        return view('auth.signup');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required', 'email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
       
    }
    function registrationPost(Request $request){
        $request->validate([
            'name' =>'required',
            'email' =>'required | email |unique:users,email',
            'password' => 'required'

        ]);
        $data['name'] = $request->name;        
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);


        if(!$user){
            return redirect(route('registration'))->with('error','Registration Failed');
        }
        return redirect(route('auth.sign-in'))->with('success',' registration Success login to access registration');
    }

    function logout(){
        session::flush();
        Auth::logout();
        return redirect(route('auth.sign-in'));
    }
}
