<?php

namespace BoletoSimples\Service\Api;

use BoletoSimples\Service\Api\ApiTrait;
use BoletoSimples\Service\AbstractService;

final class Customer extends AbstractService
{
    use ApiTrait;

    const URI = 'customers';
}
