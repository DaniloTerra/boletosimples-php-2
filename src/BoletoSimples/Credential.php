<?php

namespace BoletoSimples;

final class Credential
{
    private $clientToken;
    private $applicationName;

    public function __construct($clientToken, $applicationName)
    {
        $this->clientToken = $clientToken;
        $this->applicationName = $applicationName;
    }

    public function getToken()
    {
        return $this->clientToken;
    }

    public function getApplicationName()
    {
        return $this->applicationName;
    }
}
