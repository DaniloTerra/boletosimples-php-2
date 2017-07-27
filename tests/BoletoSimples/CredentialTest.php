<?php

namespace BoletoSimples\Tests;

use PHPUnit\Framework\TestCase;

use BoletoSimples\Credential;

final class CredentialTest extends TestCase
{
    private function getValidToken()
    {
        return 'zjuio96wkixkzy6z98sy';
    }

    private function getValidApplicationName()
    {
        return 'MyApp (myapp@example.com)';
    }

    private function getCredential()
    {
        return new Credential(
            $this->getValidToken(),
            $this->getValidApplicationName()
        );
    }

    public function testGetToken()
    {
        $credential = $this->getCredential();

        $this->assertEquals($this->getValidToken(), $credential->getToken());
    }

    public function testGetApplicationName()
    {
        $this->assertEquals($this->getValidToken(), $this->getValidToken());
    }
}
