<?php

namespace InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class InvoiceData extends DataTransferObject
{
    public string $customer_id;

    public string $payment_gateway_id;

    public string $invoice_code;

    public string $status = "pending";

    public ?string $description;

    public ?string $note;

    public string $expired_at;

    #[CastWith(ArrayCaster::class, InvoiceItemData::class)]
    public array $items;
}