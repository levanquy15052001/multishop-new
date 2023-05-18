<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('user.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        $user = User::create($request->validated());
        if( !empty($user))
        {
            Mail::send('user.email.register', compact('user'), function($email) use($user){
                $email->subject("Register User Multi Shop");
                $email->to($user->email, $user->name);
            });
        }
        
        return redirect('/login')->with('success', "Account successfully registered.");
    }
}