<?php

namespace Nscc\PokerRoom;

use \PDO;
use Nscc\Core\Model\SqlLite;

class PokerRoom {

    private PDO $conn;

    public function __construct()
    {
        $this->conn = new SqlLite()->getConnection();
    }

    public function getAll (): array {
        $sql = "SELECT * FROM poker_room ORDER BY created_at DESC";
        // Fetch all data
        $stmt = $this->conn->query($sql);
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res ?? [];
    }

    public function getById (int $id): ?object {
        $sql = "SELECT * FROM poker_room WHERE id = :id ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result ?: null;
    }

    public function insert (array $input): void {
        if (empty($input['room_name'])) {
            throw new \Exception('Room name cannot be empty');
        }

        $room_name = $input["room_name"];
        $insert = $this->conn->prepare("INSERT INTO poker_room (room_name) VALUES (:name)");
        $insert->execute(['name' => $room_name]);
    }

    public function update (array $input, int $id): void {
        if (empty($input['room_name'])) {
            throw new \Exception('Room name cannot be empty');
        }
        if (empty($id)) {
            throw new \Exception('ID cannot be empty');
        }

        $sql = "UPDATE poker_room SET room_name = :room_name WHERE id = :id";
        $update = $this->conn->prepare($sql);
        $room_name = $input["room_name"];
        $update->execute([
            'room_name' => $room_name,
            'id' => $id
        ]);
    }

}
