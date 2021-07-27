<?php


namespace Model;


use Vendor\PDOFactory;

abstract class AbstractManager
{
    protected $db;

    public function __construct()
    {
        $this->db = PDOFactory::getMysqlConnexion();
    }
}