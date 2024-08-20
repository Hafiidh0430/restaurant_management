<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::check()) {
            return back();
        }
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('main');
        }
        return to_route('login');
    }

    public function logout()
    {
        Auth::logout();
        FacadesSession::flush();
        return to_route('login');
    }
}
