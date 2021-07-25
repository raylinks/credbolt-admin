<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Actions\ProcessLoanAction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->get();
     
        return view('admin.transactions.index', compact('transactions'));
    }

    public function show($user)
    {
        $transactions = Transaction::findOrFail($user);
      
        return view('admin.transactions.show', compact('transactions'));
    }

   
}