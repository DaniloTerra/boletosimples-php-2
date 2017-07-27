<?php

namespace BoletoSimples\Tests;

use PHPUnit\Framework\TestCase;

use BoletoSimples\Configuration;

final class ConfigurationTest extends TestCase
{
    private function getConfiguration()
    {
        return new Configuration(API_ENVIRONMENT, API_BASE_URI, API_TOKEN, API_APP);
    }

    public function testGetToken()
    {
        $credential = $this->getConfiguration();
        $this->assertEquals(API_TOKEN, $credential->getToken());
    }

    public function testGetApplicationName()
    {
        $credential = $this->getConfiguration();
        $this->assertEquals(API_APP, $credential->getApplicationName());
    }
}
