<?php

namespace Nscc\Core\Model;

use \PDO;

abstract class Migrator {

    private PDO $conn;

    public string $migrationSqlStatement = "";

    public function __construct()
    {
        $sqlLite = new SqlLite();
        $this->conn = $sqlLite->getConnection();
    }

    public function migrate() {
        $this->conn->exec($this->migrationSqlStatement);
    }
}
