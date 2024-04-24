<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => ['required', 'unique:'.User::class],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'apellidos' => ['required', 'string', 'max:255']
        ]);

        $user = User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apellidos' => $request->apellidos,
        ]);

        event(new Registered($user));

        Auth::login($user);

        if($request->user()->rol == 1) {

            return redirect(RouteServiceProvider::APRENDIZ);

        } elseif($request->user()->rol == 2) {

            return redirect(RouteServiceProvider::INSTRUCTOR);

        } elseif($request->user()->rol == 3) {

            return redirect(RouteServiceProvider::HOME);

        } elseif($request->user()->rol == 4) {

            return redirect(RouteServiceProvider::APOYO);

        } elseif($request->user()->rol == 1) {

            return redirect(RouteServiceProvider::PRACTICA);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
