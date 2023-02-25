<?php

namespace InvoicekuId\InvoicekuPhpSdk\Contracts;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Response;
use InvoicekuId\InvoicekuPhpSdk\Config;
use InvoicekuId\InvoicekuPhpSdk\Data\InvoicekuRequestData;

trait InteractsWithInvoiceku
{
    private Response $response;

    public function request(InvoicekuRequestData $request_data) : self
    {
        $client = new Client([
            "base_uri" => Config::$app_url
        ]);

        if(strtolower($request_data->method) == "get"){

            $this->response = $client->get($request_data->endpoint, [
                "headers"   => $request_data->headers,
                "body"      => json_encode($request_data->body)
            ]);
            
        }

        if(strtolower($request_data->method) == "post"){

            if($request_data->multipart){

                $this->response = $client->post($request_data->endpoint, [
                    "headers"       => $request_data->headers,
                    "multipart"     => $request_data->multipart
                ]);
            }

            if(empty($request_data->multipart)){
                $this->response = $client->post($request_data->endpoint, [
                    "headers"   => $request_data->headers,
                    "body"      => json_encode($request_data->body)
                ]);
            }
            
        }

        if(strtolower($request_data->method) == "delete"){

            $this->response = $client->delete($request_data->endpoint, [
                "headers"   => $request_data->headers
            ]);
            
        }

        if(strtolower($request_data->method) == "patch"){

            $this->response = $client->patch($request_data->endpoint, [
                "headers"   => $request_data->headers,
                "form_params"      => $request_data->body
            ]);
            
        }


        return $this;
    }

    public function getStatusCode() : int
    {
        return $this->response->getStatusCode();
    }

    public function getResponseBody() : array
    {
        return json_decode($this->response->getBody(), true);
    }
}