<?php

namespace InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data;

use Spatie\DataTransferObject\DataTransferObject;

class ProductData extends DataTransferObject
{
    /**
     * @param ?string $image
     * Url gambar / Lokasi File
     */
    public ?string $image;

    public string $name;

    public string $slug;

    public string $status;

    public ?string $sku;

    public ?string $plu;

    public float $price;
    
    public string $description;

    public ?array $meta;
}