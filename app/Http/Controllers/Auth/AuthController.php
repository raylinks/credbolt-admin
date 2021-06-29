<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('logout');
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (! $user = $this->attemptLogin($this->credentials($request))) {
            return redirect(route('auth.login'))->withInput()->with('error', 'Credentials are incorrect!');
        }

        Auth::login($user);

        return redirect()->intended(route('home'));
    }

    private function validateLogin(Request $request): void
    {
        $request->validate([
            'user_identifier' => 'required|string|min:3',
            'password' => 'required|string|min:8',
        ]);
    }

    private function credentials(Request $request): array
    {
        $login_type = filter_var($request->user_identifier, FILTER_VALIDATE_EMAIL)
            ? 'email' : 'username';

        $request->merge([$login_type => $request->user_identifier]);

        return $request->only([$login_type, 'password']);
    }

    private function attemptLogin(array $credentials): ?User
    {
        $password = Arr::pull($credentials, 'password');

        if (! $user = User::where($credentials)->first()) {
            return null;
        }

        return Hash::check($password, $user->password) ? $user : null;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect(route('auth.login'));
    }
}
