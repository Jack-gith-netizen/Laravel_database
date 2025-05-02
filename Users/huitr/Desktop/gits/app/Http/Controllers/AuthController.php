<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('main');
        }

        return view('auth.login', [
            'infoMessage' => Session::get('infoMessage'),
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('last_activity', time());
            $request->session()->put('login_time', time());
            $request->session()->put('timeout', 3600);

            return redirect()->route('main');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        $sessionDuration = time() - $request->session()->get('login_time', time());
        $timeoutMessage = $request->query('reason') === 'timeout' ? 'You were logged out due to inactivity.' : '';

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('auth.logout', compact('sessionDuration', 'timeoutMessage'));
    }
}

