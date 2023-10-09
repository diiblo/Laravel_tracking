<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            $this->Destroy();
            return redirect()->intended(RouteServiceProvider::LOGIN.'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
        $this->Destroy();
        return redirect()->intended(RouteServiceProvider::LOGIN.'?verified=1');
    }

    public function Destroy(){
        Auth::guard('web')->logout();

        session()->invalidate();

        session()->regenerateToken();
    }
}
