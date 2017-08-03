<?php

namespace BoletoSimples\Entity;

use BoletoSimples\Entity\Entity;

final class Customer implements Entity
{
    private $person_name;
    private $cnpj_cpf;
    private $zipcode;
    private $address;
    private $city_name;
    private $state;
    private $neighborhood;

    public function __construct(
        $person_name,
        $cnpj_cpf,
        $zipcode,
        $address,
        $city_name,
        $state,
        $neighborhood
    ) {
        $this->person_name  = $person_name;
        $this->cnpj_cpf     = $cnpj_cpf;
        $this->zipcode      = $zipcode;
        $this->address      = $address;
        $this->city_name    = $city_name;
        $this->state        = $state;
        $this->neighborhood = $neighborhood;
    }


    public function toApiArray()
    {
        return [
            'customer' => [
                'person_name'       => $this->person_name,
                'cnpj_cpf'          => $this->cnpj_cpf,
                'zipcode'           => $this->zipcode,
                'address'           => $this->address,
                'city_name'         => $this->city_name,
                'state'             => $this->state,
                'neighborhood'      => $this->neighborhood
            ]
        ];
    }
}
