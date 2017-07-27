<?php

namespace BoletoSimples\Resource;

use BoletoSimples\Configuration;

final class Customer
{
    private $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getClientList()
    {
        $basicAuth = $this->configuration->getToken() . ':x';
        $headers = [$this->configuration->getUserAgentHeader()];
        $url = $this->configuration->getBaseUri() . '/userinfo';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $basicAuth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        echo $response;
        exit;
    }
}
