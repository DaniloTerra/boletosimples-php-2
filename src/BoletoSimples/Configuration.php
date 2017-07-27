<?php

namespace BoletoSimples;

final class Configuration
{
    private $environment;
    private $baseUri;
    private $clientToken;
    private $applicationName;

    public function __construct($environment, $baseUri, $clientToken, $applicationName)
    {
        $this->environment     = $environment;
        $this->baseUri         = $baseUri;
        $this->clientToken     = $clientToken;
        $this->applicationName = $applicationName;
    }

    public function getEnvironment()
    {
        return $this->environment;
    }

    public function getBaseUri()
    {
        return $this->baseUri;
    }

    public function getToken()
    {
        return $this->clientToken;
    }

    public function getApplicationName()
    {
        return $this->applicationName;
    }

    public function getUserAgentHeader()
    {
        return 'User-Agent: ' . $this->getApplicationName();
    }
}
