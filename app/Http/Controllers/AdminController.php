<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get();
  
        return view('admin.manage-admin-roles.index', compact('users'));
    }

    public function show($user)
    {
        $user = User::findOrFail($user);
        $roles = Role::all();
        return view('admin.manage-admin-roles.show', compact('user', 'roles'));
    }

    public function update(Request $request,User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:191',
            'email' => 'required|string|min:3|max:191',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        return redirect(route('admin.users.show', $user->id))->with([
            'type' => 'success',
            'message' => 'User Updated successfully.',
        ]);
    }
}