<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{

    public function index()
    {
        $roles = Role::all();
         return view('auth.register', compact('roles'));
    }

    public function register(Request $request)
    {
        DB::beginTransaction();
        try {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' =>  Hash::make($request->password),
        ]);

        $user->profile()->create([
            'role_id' =>    $request->role
        ]);
      DB::commit();

        return redirect(route('register'))->with([
            'type' => 'success',
            'message' => 'Admin user saved successfully.',
        ]);

    } catch (Exception $exception) {
        DB::rollBack();

        return redirect()->route('register')->with('error', 'cant register at the moment, try again later');
    }
        
    }
}