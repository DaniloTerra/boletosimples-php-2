<?php

namespace BoletoSimples\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use BoletoSimples\Configuration;
use BoletoSimples\Entity\Entity;
use BoletoSimples\Service\ClientRequest;

abstract class AbstractService
{
    private $httpClient;

    public function __construct(Configuration $configuration)
    {
        $this->httpClient = ClientRequest::getInstance($configuration);
    }

    public function getAll()
    {
        return $this->httpClient->get(static::URI);
    }
}
