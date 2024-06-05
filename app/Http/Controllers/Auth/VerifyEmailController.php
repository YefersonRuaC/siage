<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if($request->user()->rol == 1) {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::APRENDIZ.'?verified=1');
            }

        } elseif($request->user()->rol == 2) {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::INSTRUCTOR.'?verified=1');
            }

        } elseif($request->user()->rol == 3) {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
            }

        } elseif($request->user()->rol == 4) {

            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::APOYO.'?verified=1');
            }
        } elseif($request->user()->rol == 5) {

            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::PRACTICA.'?verified=1');
            }
        } elseif($request->user()->rol == 6) {

            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::INHABILITADO.'?verified=1');
            }
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if($request->user()->rol == 1) {

            return redirect()->intended(RouteServiceProvider::APRENDIZ.'?verified=1');            

        } elseif($request->user()->rol == 2) {

            return redirect()->intended(RouteServiceProvider::INSTRUCTOR.'?verified=1');            

        } elseif($request->user()->rol == 3) {

            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1'); 

        } elseif($request->user()->rol == 4) {

            return redirect()->intended(RouteServiceProvider::APOYO.'?verified=1');            

        } elseif($request->user()->rol == 5) {

            return redirect()->intended(RouteServiceProvider::PRACTICA.'?verified=1');   

        } elseif($request->user()->rol == 6) {

            return redirect()->intended(RouteServiceProvider::INHABILITADO.'?verified=1');            
        }

        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
