<?php

namespace BoletoSimples\Service\Api;

use BoletoSimples\Service\Api\Api;
use BoletoSimples\Service\AbstractService;

final class Customer extends AbstractService
{
    use Api;

    const URI = 'customers';
}
