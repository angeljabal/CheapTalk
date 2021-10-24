<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Category;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function registrationForm(){
        if(auth()->check()){
            return redirect('home');
        }
        return view('pages.auth.register');
    }

    public function loginForm(){
        $categories = Category::get()->sortBy('category');
        if(auth()->check()){
            return redirect('home');
        }
        return view('pages.auth.login', compact('categories'));
    }

    public function register(Request $request){
        $request->validate([
            'name'      =>  'required|string|max:255',
            'gender'    =>  'required|string',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|string|confirmed|min:6',
        ]);

        $token = Str::random(24);
        $user = User::create([
            'name'              =>  $request->name,
            'gender'            =>  $request->gender,
            'email'             =>  $request->email,
            'password'          =>  bcrypt($request->password),
            'remember_token'    =>  $token,
        ]);
        Mail::send('layouts.verification-email', ['user'=>$user], function($mail) use ($user){
            $mail->to($user->email);
            $mail->subject('Account Verification');
            $mail->from('klaredesteenm4@gmail.com', 'CheapTalk');
        });

        return redirect('/login')->with('status', 'Your account has been created. Please check your email for verification');
    }

    public function login(LoginRequest $request){
        $request->validate([
            'email'     =>  'email|required',
            'password'  =>  'string|required',
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect('/login')->with('Error', 'Account does not exist.');
        }
        if($user->email_verified_at==null){
            return redirect('/login')->with('Error', 'This account has not completed the registration process yet.
            Could you verify your email address by clicking on the link we just emailed to you?');
        }
        
        $login = auth()->attempt([
            'email'     =>  $request->email,
            'password'  =>  $request->password
        ]);

        if(!$login){
            return back()->with('Error', 'Invalid Credentials');
        }

        return redirect('/home');
    }

    public function verification(User $user, $token){
        if($user->remember_token !== $token){
            return redirect('login')->with('Error', 'Invalid token. The attached token is invalid or has already been consumed.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->with('status', 'Your account has been verified. You can login now.');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->flush();
        return redirect('/login')->with('status', 'Logged out successfully');
    }
}
