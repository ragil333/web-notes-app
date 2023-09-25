<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $response = $this->PostRequest($this->uri . 'auth/login', $request->only(['email', 'password']));
        if ($response->status() == 422) {
            return back()->withErrors($response['errors'])->withInput();
        }
        if ($response->status() == 401) {
            return back()->withErrors(['user' => 'email or password is wrong'])->withInput();
        }
        $user = $response['user'];
        $role = $user['role'];
        $token = $response['access_token'];
        $credentials = [
            'user' => $user,
            'token' => $token
        ];
        $request->session()->put($credentials);
        return redirect()->route('home')->with('toast_success', 'user successfully logged in');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {
        $response = $this->PostRequest($this->uri . 'auth/register', $request->all());
        if ($response->status() == 422) {
            return back()->withErrors($response['errors'])->withInput();
        }
        return redirect()->route('login')->with('success', 'user successfully registered');
    }

    public function logout(Request $request)
    {
        $response = $this->PostRequest($this->uri . 'auth/logout');
        session()->flush();
        return redirect()->route('login')->with('success', 'user successfully logout');
    }
}
