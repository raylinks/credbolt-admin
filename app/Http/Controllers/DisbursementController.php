<?php

namespace App\Http\Clients;

use App\Http\Clients\Monnify;
use App\Http\Controllers\Controller;
use App\Http\Requests\DisbursementRequest;

class Disbursement extends Controller
{
    public function initiate(DisbursementRequest $request)
    {
        $requestData = $request->only(['amount', 'narration',
         'destination_bank_code' ,'destination_account_number', 'currency', 'source_account_number']);

         $response = (new Monnify())->initiateDisburse($requestData);
    }
}