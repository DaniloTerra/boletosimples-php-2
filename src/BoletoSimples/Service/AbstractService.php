<?php

namespace BoletoSimples\Service;

use BoletoSimples\Service\HttpRequest;
use BoletoSimples\Entity\Entity;

abstract class AbstractService
{
    private $requester;

    public function __construct(HttpRequester $requester)
    {
        $this->requester = $requester;
    }

    public function getAll()
    {
        return $this->requester->get(static::URI);
    }

    public function getById($id)
    {
        if (gettype($id) !== 'integer') {
            throw new InvalidArgumentException('Invalid type for ID');
        }

        return $this->requester->get(static::URI . '/' .  $id);
    }

    public function create(Entity $entity)
    {
        return $this->requester->post(static::URI, $entity);
    }

    public function replaceById($id, Entity $entity)
    {
        $uri = static::URI . '/' . $id;
        return $this->requester->put($uri, $entity);
    }

    public function updateById($id, Entity $entity)
    {
        $uri = static::URI . '/' . $id;
        return $this->requester->patch($uri, $entity);    }

    public function deleteById($id)
    {
        if (gettype($id) !== 'integer') {
            throw new InvalidArgumentException('Invalid type for ID');
        }

        return $this->requester->delete(static::URI . '/' .  $id);
    }
}
