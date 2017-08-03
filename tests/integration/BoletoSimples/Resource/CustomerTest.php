<?php

namespace BoletoSimples\Tests;

use PHPUnit\Framework\TestCase;

use BoletoSimples\Entity\Customer;
use BoletoSimples\Service\HttpRequester;
use BoletoSimples\Service\Api\Customer as CustomerApi;

final class CustomerTest extends TestCase
{
    private $service;

    private function getService()
    {
        if (!$this->service) {
            $this->service = new CustomerApi(HttpRequester::getInstance());
        }

        return $this->service;
    }

    private function getValidCustomer()
    {
        $name         = 'Nome do Cliente';
        $cnpjCpf      = '125.812.717-28';
        $zipcode      = '20071004';
        $address      = 'Rua quinhentos';
        $cityName     = 'Rio de Janeiro';
        $state        = 'RJ';
        $neighborhood = 'bairro';

        return new Customer(
            $name,
            $cnpjCpf,
            $zipcode,
            $address,
            $cityName,
            $state,
            $neighborhood
        );
    }

    public function testGetAll()
    {
        $service = $this->getService();

        $response = $service->getAll();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('[]', $response->getBody()->getContents());
    }

    public function testCreate()
    {
        $customer = $this->getValidCustomer();

        $service = $this->getService();

        $response = $service->create($customer);
    }
}
