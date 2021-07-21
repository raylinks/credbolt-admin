<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index(string $token)
    {
        $reset = $this->verifyToken($token);

        if ($reset) {
            return view('auth.passwords.reset', compact('reset'));
        }

        return redirect(route('auth.password.forgot'))->with('error', 'Token is invalid or has expired');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|min:8|confirmed',
        ]);

        $token = PasswordReset::firstWhere(['token' => $request->token, 'email' => $request->email]);

        if (! $token) {
            return redirect(route('auth.login'))->with('error', 'Invalid email or token');
        }

        User::firstWhere(['email' => $request->email])->update(['password' => Hash::make($request->password)]);
        PasswordReset::where(['email' => $request->email])->delete();

        return redirect(route('auth.login'))->with('success', 'Password reset successfully');
    }

    private function verifyToken(string $token)
    {
        $reset = PasswordReset::firstWhere(['token' => $token]);

        return ($reset && ! $reset->created_at->addHours(PasswordReset::TOKEN_EXPIRES_IN_HOURS)->isPast()) ? $reset : null;
    }
}
