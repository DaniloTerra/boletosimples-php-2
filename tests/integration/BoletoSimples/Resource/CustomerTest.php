<?php

namespace BoletoSimples\Tests;

use PHPUnit\Framework\TestCase;

use BoletoSimples\Configuration;
use BoletoSimples\Service\Api\Customer;

final class CustomerTest extends TestCase
{
    public function getValidConfiguration()
    {
        return new Configuration(API_ENVIRONMENT, API_BASE_URI, API_TOKEN, API_APP);
    }

    public function testGetClientList()
    {
        $service = new Customer($this->getValidConfiguration());

        $this->assertEquals(200, $service->getAll()->getStatusCode());
    }
}
