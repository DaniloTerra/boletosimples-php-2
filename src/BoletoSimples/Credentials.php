<?php

namespace BoletoSimples;

use BoletoSimples\Dto\Dto;
use BoletoSimples\Dto\DtoCapabilities;

final class Credentials implements Dto
{
    use DtoCapabilities;

    /**
     * @var string
     */
    private $environment;

    /**
     * @var string
     */
    private $baseUri;

    /**
     * @var string
     */
    private $appName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $token;

    /**
     * Credentials constructor
     * @param string $environment
     * @param string $baseUri
     * @param string $appName
     * @param string $email
     * @param string $token
     */
    public function __construct(
        $environment,
        $baseUri,
        $appName,
        $email,
        $token
    ) {
        $this->environment = $environment;
        $this->baseUri = $baseUri;
        $this->appName = $appName;
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * @return string
     */
    public function getAppName()
    {
        return $this->appName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
