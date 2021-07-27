<?php

namespace Vendor;

class PDOFactory
{
    public static function getMysqlConnexion()
    {
        try {
            $db = new \PDO('mysql:host=db;dbname=blog_crud', 'root', 'example');
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            ob_start();
            ?>
            <h1>Rien de méchant, juste une erreur...</h1>
            <p><?= $e->getMessage(); ?></p>
            <?php
            echo ob_get_clean();
        }

        return $db;
    }
}
