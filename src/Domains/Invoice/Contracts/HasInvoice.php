<?php

namespace InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Contracts;

use InvoicekuId\InvoicekuPhpSdk\Config;
use InvoicekuId\InvoicekuPhpSdk\Data\InvoicekuRequestData;
use InvoicekuId\InvoicekuPhpSdk\Contracts\InteractsWithInvoiceku;
use InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\InvoiceData;

abstract class HasInvoice
{
    use InteractsWithInvoiceku;

    public function get(int $per_page = 10, int $page = 1, string $order_by = "asc") : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/invoice?page={$page}&per_page={$per_page}&order_by={$order_by}",
            'method'    =>  "GET",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();

    }

    public function summary() : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/invoice/summary",
            'method'    =>  "GET",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();

    }

    public function create(InvoiceData $invoiceData) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/invoice",
            'method'    =>  "POST",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json",
                "Content-Type"      =>  "application/json"
            ],
            'body'      => $invoiceData->toArray()
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();
    }

    public function detail(string $invoice_id) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/invoice/{$invoice_id}",
            'method'    =>  "GET",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();
    }

    public function updateStatus(string $invoice_id, string $status) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/invoice/{$invoice_id}/status-update",
            'method'    =>  "PATCH",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ],
            'body'      => [
                "status" => $status
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();
    }

}