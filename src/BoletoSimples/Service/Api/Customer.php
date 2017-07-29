<?php

namespace BoletoSimples\Service\Api;

use BoletoSimples\Configuration;
use BoletoSimples\Service\AbstractService;

final class Customer extends AbstractService
{
    public function __construct(Configuration $configuration)
    {
        parent::__construct($configuration);
    }

    const URI = 'customers';
}
