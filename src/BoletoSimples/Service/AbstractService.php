<?php

namespace BoletoSimples\Service;

use BoletoSimples\Service\HttpRequester;

abstract class AbstractService implements ServiceInterface
{
    private $requester;

    public function __construct(HttpRequester $requester)
    {
        $this->requester = $requester;
    }

    public function create(array $data)
    {
        return $this->requester->post(static::URI, $data);
    }

    public function getById($id)
    {
        if (gettype($id) !== 'integer') {
            throw new \InvalidArgumentException('Invalid type for ID');
        }

        return $this->requester->get(static::URI . '/' .  $id);
    }

    public function update($id, array $data)
    {
        $uri = static::URI . '/' . $id;
        return $this->requester->patch($uri, $data);
    }

    public function replace($id, array $data)
    {
        $uri = static::URI . '/' . $id;
        return $this->requester->put($uri, $data);
    }

    public function delete($id)
    {
        $uri = static::URI . '/' . $id;
        return $this->requester->delete($uri);
    }

    public function getAll()
    {
        return $this->requester->get(static::URI);
    }
}
