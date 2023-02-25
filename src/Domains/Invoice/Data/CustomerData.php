<?php

namespace InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CustomerData extends DataTransferObject
{
    public string $name;

    public string $email;

    public string $phone;

    #[CastWith(ArrayCaster::class, CustomerAddressData::class)]
    public ?array $addresses;
}