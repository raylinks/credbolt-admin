<?php

namespace App\Http\Actions;

use App\Http\Clients\Monnify;
use Exception;
use App\Models\User;
use App\Models\UserWallet;
use App\Models\LoanRequest;
use App\Models\Transaction;
use App\Models\WalletHistory;
use Illuminate\Support\Facades\DB;

class DisbursementAction
{
    public function execute(array $customerData)
    {
       $result = (new Monnify())->initiateDisburse($customerData);

    }
}