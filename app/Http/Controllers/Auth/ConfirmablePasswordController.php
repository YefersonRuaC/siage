<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        if($request->user()->rol == 1) {

            return redirect()->intended(RouteServiceProvider::APRENDIZ);

        } elseif($request->user()->rol == 2) {

            return redirect()->intended(RouteServiceProvider::INSTRUCTOR);

        } elseif($request->user()->rol == 3) {

            return redirect()->intended(RouteServiceProvider::HOME);

        } elseif($request->user()->rol == 4) {

            return redirect()->intended(RouteServiceProvider::APOYO);

        } elseif($request->user()->rol == 5) {

            return redirect()->intended(RouteServiceProvider::PRACTICA);

        } elseif($request->user()->rol == 6) {

            return redirect()->intended(RouteServiceProvider::INHABILITADO);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
