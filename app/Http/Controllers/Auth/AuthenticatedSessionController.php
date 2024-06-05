<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        //Obtenemos el usuario autenticado en el sistema
        $user = Auth::user();

        //Redireccionamos segun su rol
        if ($user->rol == 1) {
            return redirect()->route('aprendiz.index');
        }

        if ($user->rol == 2) {
            return redirect()->route('instructor.index');
        }

        if ($user->rol == 3) {
            return redirect()->route('admin.index');
        }

        if ($user->rol == 4) {
            return redirect()->route('apoyo.index');
        }

        if ($user->rol == 5) {
            return redirect()->route('practica.index');
        }

        if ($user->rol == 6) {
            return redirect()->route('inhabilitado.index');
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
