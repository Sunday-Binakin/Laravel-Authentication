<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //displays this if you try login in with wrong credentials
        if (!auth()->attempt($request->only('email', 'password'),$request->remember)) {
            return back()->with('status', 'Invalid Credentials');
        }
        return redirect()->intended('/');
    }
}
