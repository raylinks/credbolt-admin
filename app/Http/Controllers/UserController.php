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
     
        return view('admin.customers.index', compact('users'));
    }

   
}