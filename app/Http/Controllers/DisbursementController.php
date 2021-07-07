<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Clients\Monnify;
use App\Http\Controllers\Controller;
use App\Http\Actions\DisbursementAction;
use App\Http\Clients\MonnifyAuthRequest;
use App\Http\Requests\DisbursementRequest;

class DisbursementController extends Controller
{
    public function initiate(Request $request)
    {
        $requestData = $request->only(['amount', 'narration',
         'destination_bank_code' ,'destination_account_number', 'currency', 'source_account_number']);
      //  dd($requestData);
        //$result = (new Monnify())->initiateDisburse($customerData);
        $response = (new DisbursementAction())->execute($requestData);
    }

    public function auth()
    {
        $response = (new MonnifyAuthRequest())->token();
        dd($response);
    }

}