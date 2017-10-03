<?php

namespace BoletoSimples\Dto;

trait DtoCapabilities
{
    public static function fromArray(array $data)
    {
        $reflection = new \ReflectionClass(get_called_class());
        return $reflection->newInstanceArgs($data);
    }

    public function toArray()
    {
        $result = [];
        $class = new \ReflectionClass($this);

        foreach ($class->getMethods() as $method) {
            if (substr($method->name, 0, 3) != 'get') {
                continue;
            }

            $propName = strtolower(substr($method->name, 3, 1)) . substr($method->name, 4);
            $result[$propName] = $method->invoke($this);
        }

        return $result;
    }

    public function toJson(array $options = null)
    {
        return json_encode($this->toArray(), $options);
    }
}
