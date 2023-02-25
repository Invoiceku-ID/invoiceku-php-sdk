<?php

namespace InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data;

use Spatie\DataTransferObject\DataTransferObject;

class CustomerAddressData extends DataTransferObject
{
    public string $full_address;

    public string $city;

    public string $state;

    public string $country;
}