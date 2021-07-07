<?php

namespace App\Http\Clients;

use Exception;
use Throwable;
use App\Models\Reference;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;

class Monnify
{
    protected PendingRequest $client;

    public function __construct()
    {
        //dd(new MonnifyAuthRequest())->token();
        $this->client = Http::withHeaders(['Authorization' =>   'Bearer'  .  $this->token()])
            ->baseUrl(config('monnify.base_url'));
    }

    public function initiateDisburse(array $customerData)
    {
        //$ref = $this->generateRef();
        $reference = md5(Str::random(20));
        try {
            $data = [
                'reference' => $reference,
                'amount' => $customerData['amount'],
                'narration' => $customerData['narration'],
                'destinationBankCode' => $customerData['destination_bank_code'],
                'destinationAccountAumber' => $customerData['destination_account_number'],
                'currency' => $customerData['currency'],
                'sourceAccountNumber' => $customerData['source_account_number']

            ];

            $res =  $this->client->post('/v2/disbursements/single', $data)->throw()->json();
            dd($res);
        } catch (Throwable $e) {
    
            $this->handleException($e);
        }
    }


    public function token()
    {
        $res = (new MonnifyAuthRequest())->token();
        return $res;
    }

    // public function generateRef()
    // {
    //     $ref = time() . '_' . uniqid();

    //     // Ensure that the reference has not been used previously
    //     $validator = \Validator::make(['ref' => $ref], ['ref' => 'unique:payment_references,reference']);

    //     if ($validator->fails()) {
    //         return $this->generateRef();
    //     }

    //     return $ref;
    // }

    private function handleException(Exception $exception, ?string $message = null)
    {
        report($exception);

        if ($exception instanceof RequestException && $exception->response->status() === 503) {
            $message = 'Our service is currently not available.';
        }

        throw new ServiceUnavailableHttpException(
            null,
            $message ?? 'Unable to validate account name information.',
            $exception
        );
    }

   
}
