<?php

namespace Nscc\Core\Model;

use PDO;

class SqlLite
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO("sqlite:" . __DIR__ . "/SqlLite.db");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection () {
        return $this->pdo;
    }
}