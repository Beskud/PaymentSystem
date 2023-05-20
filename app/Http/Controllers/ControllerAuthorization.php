<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerAuthorization extends Controller
{
    public function index()
    {
        return view('authorization');
    }

    public function authorization(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();
        
        if ($user && Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('main');
        } else {
            session()->flash('error', 'Wrong email or password');
            return redirect('authorization');
        }
    }
}

