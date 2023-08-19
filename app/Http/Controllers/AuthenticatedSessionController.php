<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    /**
     * Обработка попыток аутентификации.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */

    public function store(LoginRequest $request) {
        try {
            $request->authenticate();
        } catch (ValidationException $e) {
            return back()->withErrors([
                'username' => 'Неверный логин или пароль'
            ]);
        }

        auth()->user()->update([
            'login_date' => now(),
        ]);

        $request->session()->regenerate();

        return redirect()->intended('home');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
