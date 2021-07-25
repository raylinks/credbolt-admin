<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\LoanRequest;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Actions\ProcessLoanAction;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
     
        return view('admin.user-management.index', compact('users'));
    }

    public function show($user)
    {
        $user = User::with('details')->findOrFail($user);
      
        return view('admin.user-management.show', compact('user'));
    }

   
}