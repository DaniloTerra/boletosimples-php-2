<?php

namespace BoletoSimples\Tests\Unit;

use PHPUnit\Framework\TestCase;

use BoletoSimples\Entity\Customer;

final class CustomerTest extends TestCase
{
    private function getExpectedArray()
    {
        return [
            'customer' => [
                'person_name'       => 'Nome do Cliente',
                'cnpj_cpf'          => '125.812.717-28',
                'zipcode'           => '20071004',
                'address'           => 'Rua quinhentos',
                'city_name'         => 'Rio de Janeiro',
                'state'             => 'RJ',
                'neighborhood'      => 'bairro'
            ]
        ];
    }

    public function testToApiArray()
    {
        $obj = new Customer(
            'Nome do Cliente',
            '125.812.717-28',
            '20071004',
            'Rua quinhentos',
            'Rio de Janeiro',
            'RJ',
            'bairro'
        );

        $this->assertEquals($this->getExpectedArray(), $obj->toApiArray());
    }
}
