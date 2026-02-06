<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
     public function signing(){
        return view('signing');
    }
    function user_validate(Request $request){
    
    $credentials  = $request->validate([
        'email' =>'required|email',
        'password'=>'required'
    ]);
  
   if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Login successful');
    }

    return back()->withErrors([
        'email' => 'Invalid email or password.',
    ])->withInput();

    }


    public function logout(Request $request){
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/signing')->with('success', 'Logged out successfully');
    }
}
