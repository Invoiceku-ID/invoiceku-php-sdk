<?php

namespace InvoicekuId\InvoicekuPhpSdk\Domains\Payment\Contracts;

use InvoicekuId\InvoicekuPhpSdk\Config;
use InvoicekuId\InvoicekuPhpSdk\Data\InvoicekuRequestData;
use InvoicekuId\InvoicekuPhpSdk\Contracts\InteractsWithInvoiceku;

abstract class HasPaymentGateway
{
    use InteractsWithInvoiceku;

    public function get(int $per_page = 10, int $page = 1) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/payment-gateway?page={$page}&per_page=$per_page",
            'method'    =>  "GET",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();

    }
}