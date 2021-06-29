<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetMail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.passwords.forgot');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        if (! $user = User::firstWhere(['email' => $request->email])) {
            return redirect()->back()->with('error', 'Email address is invalid.');
        }

        $reset = $this->createToken($user);
        Mail::to($request->email)->send(new PasswordResetMail($user, $reset));

        return redirect()->back()->with('success', 'Reset password link has been sent to your email.');
    }

    private function createToken(User $user): PasswordReset
    {
        return PasswordReset::create([
            'token' => Str::random(40),
            'email' => $user->email,
        ]);
    }
}
