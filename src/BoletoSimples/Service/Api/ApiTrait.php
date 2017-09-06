<?php

namespace BoletoSimples\Service\Api;

use BoletoSimples\Service\HttpRequester;

trait ApiTrait
{
    public function __construct(HttpRequester $requester)
    {
        parent::__construct($requester);
    }
}
