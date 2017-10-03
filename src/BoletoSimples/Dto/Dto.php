<?php

namespace BoletoSimples\Dto;

interface Dto
{
    public static function fromArray(array $data);

    public function toArray();

    public function toJson(array $options = null);
}
