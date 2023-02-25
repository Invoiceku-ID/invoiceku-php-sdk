<?php

namespace InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Contracts;

use InvoicekuId\InvoicekuPhpSdk\Config;
use InvoicekuId\InvoicekuPhpSdk\Data\InvoicekuRequestData;
use InvoicekuId\InvoicekuPhpSdk\Contracts\InteractsWithInvoiceku;
use InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\CustomerData;

abstract class HasCustomer
{
    use InteractsWithInvoiceku;

    public function get(int $per_page = 10, int $page = 1) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/customer?page={$page}&per_page={$per_page}",
            'method'    =>  "GET",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();

    }

    public function detail(string $customer_id) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/customer/{$customer_id}",
            'method'    =>  "GET",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();

    }

    public function delete(string $customer_id) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/customer/{$customer_id}",
            'method'    =>  "DELETE",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();

    }
    
    public function create(CustomerData $customerData) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/customer",
            'method'    =>  "POST",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json",
                "Content-Type"      =>  "application/json"
            ],
            'body'      => $customerData->toArray()
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();
    }

    public function update(string $customer_id, CustomerData $customerData) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/customer/{$customer_id}",
            'method'    =>  "PATCH",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ],
            'body'      => $customerData->toArray()
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();
    }

}