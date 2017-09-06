<?php

namespace BoletoSimples\Tests\Integration;

use PHPUnit\Framework\TestCase;

use BoletoSimples\Entity\Customer as Entity;
use BoletoSimples\Service\HttpRequester;
use BoletoSimples\Service\Api\Customer as Service;

final class CustomerTest extends TestCase
{
    private function getService()
    {
        return new Service(HttpRequester::getInstance());
    }

    /**
     * @test
     */
    public function create()
    {
        $service = $this->getService();

        $newCustomer = [
            'customer' => [
                'person_name'  => 'Nome do Cliente',
                'cnpj_cpf'     => '06567335785',
                'zipcode'      => '20071004',
                'address'      => 'Rua quinhentos',
                'city_name'    => 'Rio de Janeiro',
                'state'        => 'RJ',
                'neighborhood' => 'bairro'
            ]
        ];

        $response = $service->create($newCustomer);

        $httpCode = $response->getStatusCode();
        $arrayBody = json_decode($response->getBody(), true);

        $this->assertEquals(201, $httpCode);
        $this->assertInternalType('array', $arrayBody);

        return $arrayBody['id'];
    }

    /**
     * @test
     * @depends create
     */
    public function getById($id)
    {
        $service = $this->getService();

        $response = $service->getById($id);

        $httpCode = $response->getStatusCode();
        $arrayBody = json_decode($response->getBody(), true);

        $this->assertEquals(200, $httpCode);
        $this->assertInternalType('array', $arrayBody);

        return $arrayBody['id'];
    }

    /**
     * @test
     * @depends getById
     */
    public function update($id)
    {
        $service = $this->getService();

        $updates = [
            'customer' => [
                'person_name'  => 'Novo nome',
                'address'      => 'Nova rua'
            ]
        ];

        $response = $service->update($id, $updates);

        $httpCode = $response->getStatusCode();

        $this->assertEquals(204, $httpCode);

        return $id;
    }

    /**
     * @test
     * @depends update
     */
    public function replace($id)
    {
        $service = $this->getService();

        $replace = [
            'customer' => [
                'person_name'  => 'Replace',
                'cnpj_cpf'     => '17139479437',
                'zipcode'      => '20071004',
                'address'      => 'Rua replace',
                'city_name'    => 'Rio replace',
                'state'        => 'RJ',
                'neighborhood' => 'bairro'
            ]
        ];

        $response = $service->replace($id, $replace);

        $httpCode = $response->getStatusCode();

        $this->assertEquals(204, $httpCode);

        return $id;
    }

    /**
     * @test
     * @depends replace
     */
    public function delete($id)
    {
        $service = $this->getService();

        $response = $service->delete($id);

        $httpCode = $response->getStatusCode();

        $this->assertEquals(204, $httpCode);
    }


    /**
     * @test
     */
    public function getAll()
    {
        $service = $this->getService();

        $response = $service->getAll();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertInternalType(
            'array',
            json_decode($response->getBody(), true)
        );
    }



}
