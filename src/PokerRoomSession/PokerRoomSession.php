<?php

namespace Nscc\PokerRoomSession;

use \PDO;
use Nscc\Core\Model\SqlLite;

class PokerRoomSession {

    private PDO $conn;

    public function __construct()
    {
        $this->conn = new SqlLite()->getConnection();
    }

    public function getAllByRoomId (int $room_id): array {
        $sql = "SELECT * FROM poker_room_session
                WHERE poker_room_id = :poker_room_id
                ORDER BY created_at DESC
                ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['poker_room_id' => $room_id]);
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res ?? [];
    }

    public function getByRoomIdAndUserName (int $room_id, string $user_name): ?object {
        $sql = "SELECT * FROM poker_room_session 
                WHERE 
                    poker_room_id = :poker_room_id
                AND 
                    user_name = :user_name
                ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'poker_room_id' => $room_id,
            'user_name' => $user_name,
        ]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result ?: null;
    }

    public function insert (array $input): void {
        if (empty($input['poker_room_id'])) {
            throw new \Exception('Room name cannot be empty');
        }
        if (empty($input['user_name'])) {
            throw new \Exception('User name cannot be empty');
        }

        $roomID = $input["poker_room_id"];
        $userName = $input["user_name"];
        $sql = "INSERT INTO poker_room_session (poker_room_id, user_name) VALUES (:poker_room_id, :user_name)";
        $insert = $this->conn->prepare($sql);
        $insert->execute([
            'poker_room_id' => $roomID,
            'user_name' => $userName,
        ]);
    }

    public function updateCardIndex (int $card_index, int $id): void {
        if (empty($card_index)) {
            throw new \Exception('Card index cannot be empty');
        }
        if (empty($id)) {
            throw new \Exception('ID cannot be empty');
        }

        $sql = "UPDATE poker_room_session SET card_index = :card_index WHERE id = :id";
        $update = $this->conn->prepare($sql);
        $update->execute([
            'card_index' => $card_index,
            'id' => $id
        ]);
    }

}
