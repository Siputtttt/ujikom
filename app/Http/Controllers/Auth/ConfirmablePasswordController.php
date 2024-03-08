<?php

// namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

// class ConfirmablePasswordController extends Controller
// {
//     /**
//      * Show the confirm password view.
//      */
//     public function show(): View
//     {
//         return view('auth.confirm-password');
//     }

//     /**
//      * Confirm the user's password.
//      */
//     public function store(Request $request): RedirectResponse
//     {
//         if (! Auth::guard('web')->validate([
//             'email' => $request->user()->email,
//             'password' => $request->password,
//         ])) {
//             throw ValidationException::withMessages([
//                 'password' => __('auth.password'),
//             ]);
//         }

//         $request->session()->put('auth.password_confirmed_at', time());

//         return redirect()->intended(RouteServiceProvider::HOME);
//     }
// }


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        throw ValidationException::withMessages([
            'username' => __('auth.failed'),
        ]);
    }
}

class ConfirmablePasswordController extends Controller
{
    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = [
            'username' => $request->user()->username,
            'password' => $request->password,
        ];

        if (! Auth::guard('web')->attempt($credentials)) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
