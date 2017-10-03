<?php

namespace BoletoSimples\Tests\Unit;

use PHPUnit\Framework\TestCase;

use BoletoSimples\Credentials;

class CredentialsText extends TestCase
{
    /**
     * @covers Credentials::getEnvironment
     * @covers Credentials::getBaseUri
     * @covers Credentials::getAppName
     * @covers Credentials::getEmail
     * @covers Credentials::getToken
     */
    public function testGetValues()
    {
        $environment = 'sandbox';
        $baseUri = 'https://test.com/api/test';
        $appName = 'TestApp';
        $email = 'email@contact.com';
        $token = 'abcdef123456789abcdef123';

        $obj = new Credentials(
            $environment,
            $baseUri,
            $appName,
            $email,
            $token
        );

        $this->assertEquals($environment, $obj->getEnvironment());
        $this->assertEquals($baseUri, $obj->getBaseUri());
        $this->assertEquals($appName, $obj->getAppName());
        $this->assertEquals($email, $obj->getEmail());
        $this->assertEquals($token, $obj->getToken());
    }

    /**
     * @covers Credentials::fromArray
     */
    public function testFromArray()
    {
        $obj = $this->getObjFromArray();

        $this->assertInstanceOf(Credentials::class, $obj);
    }

    /**
     * @covers Credentials::toArray
     */
    public function testToArray()
    {
        $obj = $this->getObjFromArray();

        $this->assertEquals(
            $this->getArrayToFromArrayConstruct(),
            $obj->toArray()
        );
    }

    /**
     * @covers Credentials::toJson
     */
    public function testToJson()
    {
        $obj = $this->getObjFromArray();

        $this->assertEquals(
            json_encode($this->getArrayToFromArrayConstruct(), null),
            $obj->toJson()
        );
    }

    private function getObjFromArray()
    {
        return Credentials::fromArray($this->getArrayToFromArrayConstruct());
    }

    private function getArrayToFromArrayConstruct()
    {
        return [
            'environment' => 'sandbox',
            'baseUri' => 'https://test.com/api/test',
            'appName' => 'TestApp',
            'email' => 'email@contact.com',
            'token' => 'abcdef123456789abcdef123'
        ];
    }
}
