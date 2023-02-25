<?php

namespace InvoicekuId\InvoicekuPhpSdk\Domains\Membership\Data;

use Spatie\DataTransferObject\DataTransferObject;

class SettingData extends DataTransferObject
{
    public string $key;
    public mixed $value;
}