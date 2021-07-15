<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoanRequest;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Actions\ProcessLoanAction;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
  
        return view('admin.manage-admin-roles.index', compact('users'));
    }

    public function show($user)
    {
        $user = User::findOrFail($user);
      
        return view('admin.manage-admin-roles.show', compact('user'));
    }

   
}