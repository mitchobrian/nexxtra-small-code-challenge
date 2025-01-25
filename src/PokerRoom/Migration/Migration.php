<?php


namespace Nscc\PokerRoom\Migration;

use Nscc\Core\Model\Migrator;
use Nscc\Core\Model\SqlLite;
use PDO;

class Migration extends Migrator
{
    public string $migrationSqlStatement =
        "CREATE TABLE IF NOT EXISTS poker_room (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                room_name TEXT NOT NULL UNIQUE,
                email TEXT NOT NULL UNIQUE,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
}
