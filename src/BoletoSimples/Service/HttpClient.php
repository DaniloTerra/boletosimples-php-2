<?php

namespace BoletoSimples\Service;

use GuzzleHttp\Client;

final class HttpClient
{
    private $client;

    private function __construct(Client $client)
    {
        $this->client = $client;
    }

    public static function make()
    {
        if (!self::isCredentialDefined()) {
            throw new \Exception("Boleto Simples' Credentials not defined");
        }

        return new self(new Client([
            'base_uri' => BOLETO_SIMPLES_BASE_URI,
            'http_errors' => false,
            'auth'     => [
                BOLETO_SIMPLES_TOKEN, 'x'
            ],
            'headers'  => [
                'User-Agent' => BOLETO_SIMPLES_APP_NAME
            ]
        ]));
    }

    public function getClient()
    {
        return $this->client;
    }

    private function isCredentialDefined()
    {
        return defined('BOLETO_SIMPLES_ENVIRONMENT') &&
               defined('BOLETO_SIMPLES_BASE_URI')    &&
               defined('BOLETO_SIMPLES_TOKEN')       &&
               defined('BOLETO_SIMPLES_APP_NAME');
    }
}
