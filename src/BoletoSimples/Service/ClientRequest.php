<?php

namespace BoletoSimples\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use BoletoSimples\Configuration;

final class ClientRequest
{
    private static $instance;
    private $httpClient;
    private $baseUri;
    private $authUser;
    private $authPass;
    private $userAgent;

    private function __construct(Configuration $configuration)
    {
        $this->baseUri      = $configuration->getBaseUri();
        $this->authUser     = $configuration->getToken();
        $this->authPassword = $configuration->getPassword();
        $this->userAgent    = $configuration->getUserAgentHeader();
    }

    public static function getInstance(Configuration $configuration)
    {
        if (!self::$instance) {
            self::$instance = new self($configuration);
        }

        return self::$instance;
    }

    private function getHttpClient()
    {
        if (!$this->httpClient) {
            $this->httpClient = new Client([
                'base_uri' => $this->baseUri,
                'auth'    => [$this->authUser, $this->authPassword],
                'headers' => ['User-Agent' => $this->userAgent]
            ]);
        }

        // var_dump($this->httpClient); exit;

        return $this->httpClient;
    }

    public function get($path)
    {
        return $this->getHttpClient()->get($path);
    }

    public function post($path)
    {
        return $this->getHttpClient()->post($path);
    }

    public function put($path)
    {
        return $this->getHttpClient()->put($path);
    }

    public function patch($path)
    {
        return $this->getHttpClient()->patch($path);
    }

    public function delete($path)
    {
        return $this->getHttpClient()->delete($path);
    }
}
