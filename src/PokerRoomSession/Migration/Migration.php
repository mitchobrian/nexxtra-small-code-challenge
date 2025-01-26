<?php


namespace Nscc\PokerRoomSession\Migration;

use Nscc\Core\Model\Migrator;
use Nscc\Core\Model\SqlLite;
use PDO;

class Migration extends Migrator
{
    public string $migrationSqlStatement =
        "CREATE TABLE IF NOT EXISTS poker_room_session (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        poker_room_id INTEGER,
        user_name VARCHAR(255),
        card_index INTEGER DEFAULT 0,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
}
