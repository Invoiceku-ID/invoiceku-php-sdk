<?php

namespace InvoicekuId\InvoicekuPhpSdk\Domains\Membership\Contracts;

use InvoicekuId\InvoicekuPhpSdk\Config;
use InvoicekuId\InvoicekuPhpSdk\Data\InvoicekuRequestData;
use InvoicekuId\InvoicekuPhpSdk\Contracts\InteractsWithInvoiceku;
use InvoicekuId\InvoicekuPhpSdk\Domains\Membership\Data\SettingData;

abstract class HasUserData
{
    use InteractsWithInvoiceku;

    public function getProfile() : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/user/profile",
            'method'    =>  "GET",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();

    }

    public function getSettings() : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/user/settings",
            'method'    =>  "GET",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();
    }

    public function setSetting(SettingData $settingData) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/user/settings",
            'method'    =>  "POST",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json",
                "Content-Type"      =>  "application/json"
            ],
            "body" => [
                "settings" => [
                    $settingData->toArray()
                ]
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();
    }
}