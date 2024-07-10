<?php

declare(strict_types=1);

namespace PizzaApp\Core;

use PDO;

class Database
{
    public $statment;

    public function connection()
    {

        $dsn = 'mysql:host=' . DBconfig::$DBhost . ';dbname=' . DBconfig::$DBname . ';charset=utf8';
        $conn = new PDO($dsn, DBconfig::$DBuser, DBconfig::$DBpass, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $conn;
    }

    public function query($query, $params = [])
    {
        $this->statment = $this->connection()->prepare($query);
        $this->statment->execute($params);
        return $this;
    }

    public function findAll()
    {
        return $this->statment->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find()
    {
        return $this->statment->fetch(PDO::FETCH_ASSOC);
    }
}
