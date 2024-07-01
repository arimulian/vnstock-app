<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(): View
    {
        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => 'required|email:user',
            'password' => 'required'
        ]);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect',
            'password' => 'Email or password is incorrect'
        ]);

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }


}
