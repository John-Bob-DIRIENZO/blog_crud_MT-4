<?php


namespace Model;


use Vendor\Hydrator;

abstract class Entity
{
    use Hydrator;

    public function __construct($data)
    {
        $this->hydrate($data);
    }
}