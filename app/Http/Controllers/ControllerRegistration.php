<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ControllerRegistration extends Controller
{
    public function index()
    {
        return view('registration');
    }
    public function registration(Request $request)
    {      
        if ($request->email && $request->username &&
			$request->password && $request->confirmation_password) {
    
                $username = $request->username;
                $email = $request->email;
                $password = $request->password;
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $user = User::create([
                    'name' => $username,
                    'email' => $email,
                    'password' => $password_hash
                ]); 
                Auth::login($user);     
        }
    }
}
