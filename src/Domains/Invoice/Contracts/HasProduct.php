<?php

namespace InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Contracts;

use finfo;
use InvoicekuId\InvoicekuPhpSdk\Config;
use InvoicekuId\InvoicekuPhpSdk\Data\InvoicekuRequestData;
use InvoicekuId\InvoicekuPhpSdk\Contracts\InteractsWithInvoiceku;
use InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\ProductData;
use InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\CustomerData;

abstract class HasProduct
{
    use InteractsWithInvoiceku;

    public function get(int $per_page = 10, int $page = 1) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/product?page={$page}&per_page={$per_page}",
            'method'    =>  "GET",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();

    }

    public function detail(string $product_id) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/product/{$product_id}",
            'method'    =>  "GET",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();

    }

    public function delete(string $product_id) : array
    {
        $apikey = Config::$api_key;

        $request_data = new InvoicekuRequestData([
            'endpoint'  =>  "api/product/{$product_id}",
            'method'    =>  "DELETE",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json"
            ]
        ]);

        $this->request($request_data);

        return (array)$this->getResponseBody();

    }
    
    public function create(ProductData $productData) : array
    {
        $apikey = Config::$api_key;

        $request_props = [
            'endpoint'  =>  "api/product",
            'method'    =>  "POST",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json",
                "Content-Type"      =>  "application/json"
            ],
            'body'      => $productData->toArray()
        ];

        if($productData->image){
            $multiparts = [];

            foreach($productData->toArray() as $key => $value){
                if($key == "image"){

                    $file = file_get_contents($value);

                    $file_info = new finfo(FILEINFO_MIME_TYPE);
                    $mime_type = $file_info->buffer($file);

                    $ext = match($mime_type){
                        "image/jpeg" => ".jpeg",
                        "image/png" => ".png",
                        default => ".jpg"
                    };

                    $multiparts[] = [
                        "name"      =>  $key,
                        "contents"  =>  $file,
                        "filename"  =>  "image{$ext}"
                    ];
                }

                if($key != "image"){
                    $multiparts[] = [
                        "name"      =>  $key,
                        "contents"  =>  $value
                    ];
                }
            }

            $request_props = [
                'endpoint'  =>  "api/product",
                'method'    =>  "POST",
                'headers'   =>  [
                    "Authorization"     =>  "Bearer {$apikey}",
                    "Accept"            =>  "application/json"
                ],
                'multipart' => $multiparts
            ];
        }

        $request_data = new InvoicekuRequestData($request_props);

        $this->request($request_data);

        return (array)$this->getResponseBody();
    }

    public function update(string $product_id, ProductData $productData) : array
    {
        $apikey = Config::$api_key;

        $request_props = [
            'endpoint'  =>  "api/product/{$product_id}",
            'method'    =>  "POST",
            'headers'   =>  [
                "Authorization"     =>  "Bearer {$apikey}",
                "Accept"            =>  "application/json",
                "Content-Type"      =>  "application/json"
            ],
            'body'      => $productData->toArray()
        ];

        if($productData->image){
            $multiparts = [];

            foreach($productData->toArray() as $key => $value){
                if($key == "image"){

                    $file = file_get_contents($value);

                    $file_info = new finfo(FILEINFO_MIME_TYPE);
                    $mime_type = $file_info->buffer($file);

                    $ext = match($mime_type){
                        "image/jpeg" => ".jpeg",
                        "image/png" => ".png",
                        default => ".jpg"
                    };

                    $multiparts[] = [
                        "name"      =>  $key,
                        "contents"  =>  $file,
                        "filename"  =>  "image{$ext}"
                    ];
                }

                if($key != "image"){
                    $multiparts[] = [
                        "name"      =>  $key,
                        "contents"  =>  $value
                    ];
                }
            }

            $request_props = [
                'endpoint'  =>  "api/product/{$product_id}",
                'method'    =>  "POST",
                'headers'   =>  [
                    "Authorization"     =>  "Bearer {$apikey}",
                    "Accept"            =>  "application/json"
                ],
                'multipart' => $multiparts
            ];
        }

        $request_data = new InvoicekuRequestData($request_props);

        $this->request($request_data);

        return (array)$this->getResponseBody();
    }

}