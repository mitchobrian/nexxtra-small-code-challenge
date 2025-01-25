<?php


namespace Nscc\PokerUser\Migration;

use Nscc\Core\Model\Migrator;
use Nscc\Core\Model\SqlLite;
use PDO;

class Migration extends Migrator
{
    public string $migrationSqlStatement =
        "CREATE TABLE IF NOT EXISTS poker_user (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT NOT NULL UNIQUE,
                email TEXT NOT NULL UNIQUE,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
}
