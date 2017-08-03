<?php

namespace BoletoSimples\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use BoletoSimples\Configuration;
use BoletoSimples\Service\HttpClient;
use BoletoSimples\Entity\Entity;

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

    public function post($uri, Entity $entity)
    {
        return $this->httpClient->getClient()->post(
            $uri,
            [ 'json' => $entity->toApiArray() ]
        );
    }

    public function put($uri, Entity $entity)
    {
        return $this->httpClient->getClient()->put(
            $uri,
            [ 'json' => $entity->toApiArray() ]
        );
    }

    public function patch($uri, Entity $entity)
    {
        return $this->httpClient->getClient()->patch(
            $uri,
            [ 'json' => $entity->toApiArray() ]
        );
    }

    public function delete($uri)
    {
        return $this->httpClient->getClient()->delete($uri);
    }
}
