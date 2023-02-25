<?php

namespace InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data;

use Spatie\DataTransferObject\DataTransferObject;

class InvoiceItemData extends DataTransferObject
{
    public string $name;

    public ?string $product_id;

    public ?string $description;

    public int $price;

    public int $quantity;

    public ?string $image_url;
}