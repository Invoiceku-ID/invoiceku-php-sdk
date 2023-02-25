<?php

namespace InvoicekuId\InvoicekuPhpSdk\Data;

use Spatie\DataTransferObject\DataTransferObject;

class InvoicekuRequestData extends DataTransferObject
{
    public string $endpoint;

    public string $method;

    public array $headers;

    public ?array $body;

    public ?array $multipart;

}