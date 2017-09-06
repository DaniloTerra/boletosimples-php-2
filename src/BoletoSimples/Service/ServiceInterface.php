<?php

namespace BoletoSimples\Service;

use BoletoSimples\Service\HttpRequester;

interface ServiceInterface
{
    public function __construct(HttpRequester $requester);
    public function create(array $data);
    public function getById($id);
    public function getAll();
    public function update($id, array $data);
    public function replace($id, array $data);
}
