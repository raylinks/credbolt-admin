<?php

namespace App\Http\Clients;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

class MonnifyAuthRequest
{   
    protected PendingRequest $client;

    public function __construct()
    {
        //  "Basic TUtfVEVTVF8yM0hKVUNWREpOOllCQVRLSFY3Q0NSUEZBUjU4VzJES042MkFNODRYMlA5" 
        //dd($this->getEncodedAuth());
        $this->client = Http::withHeaders(['Authorization' => "Basic TUtfVEVTVF8yM0hKVUNWREpOOllCQVRLSFY3Q0NSUEZBUjU4VzJES042MkFNODRYMlA5" ]) //$this->getEncodedAuth();
            ->baseUrl(config('monnify.base_url'));
    }

    public function token()
    {
    
        try {
           $response =   $this->client->post("v1/auth/login")->throw()->json();
           return $response['responseBody']['accessToken'];
          // dd($response['responseBody']['accessToken']);
      
        } catch (Exception $exception) {
        dd($exception);
        }

    }


    /**
     * Get the encoded data for requests authorization
     *
     * @return string
     */
    private function getEncodedAuth(): string
    {
        return base64_encode(
            sprintf(
                '%s:%s',
                config('monnify.api_key'),
                config('monnify.secret_key')
            )
        );
    }
}   