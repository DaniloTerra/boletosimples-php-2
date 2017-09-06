<?php

namespace BoletoSimples\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use BoletoSimples\Configuration;
use BoletoSimples\Service\HttpClient;

final class HttpRequester
{
    private static $instance;
    private $httpClient;

    private function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self(HttpClient::make());
        }

        return self::$instance;
    }

    public function get($uri)
    {
        return $this->httpClient->getClient()->get($uri);
    }

    public function post($uri, array $data)
    {
        return $this->httpClient->getClient()->post(
            $uri,
            ['json' => $data]
        );
    }

    public function put($uri, array $data)
    {
        return $this->httpClient->getClient()->put(
            $uri,
            ['json' => $data]
        );
    }

    public function patch($uri, array $data)
    {
        return $this->httpClient->getClient()->patch(
            $uri,
            ['json' => $data]
        );
    }

    public function delete($uri)
    {
        return $this->httpClient->getClient()->delete($uri);
    }
}
