<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    /**
     * Show the password reset form
     */
    public function showResetForm(Request $request, $token = null)
    {
        $settings = \App\Models\SiteSetting::pluck('value', 'key');
        return view('auth.passwords.reset', compact('settings'))->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    /**
     * Reset the given user's password
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __('messages.auth.password_reset_success'))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
