<?php

namespace BoletoSimples\Service\Api;

use BoletoSimples\Service\HttpRequester;

trait Api
{
    public function __construct(HttpRequester $requester)
    {
        parent::__construct($requester);
    }
}
