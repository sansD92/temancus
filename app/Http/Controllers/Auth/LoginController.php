<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function show()
    {
        return view('pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            return redirect()->route('discussions.index');
        }
        

        return redirect()->back()->withErrors(['credentials' => 'The Email or Password is incorrect'])->withInput();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
