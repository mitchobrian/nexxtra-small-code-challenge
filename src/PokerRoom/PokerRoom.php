<?php

namespace Nscc\PokerRoom;

use \PDO;

class PokerRoom {

    public function getAll () {
        /*$sql = "SELECT * FROM poker_room ORDER BY created_at DESC";
        // Fetch all data
        $stmt = $pdo->query("SELECT * FROM employees");
        $employees = $stmt->fetchAll(PDO::FETCH_ALL);*/
    }

    public function insert () {
        /*$insert = $pdo->prepare("INSERT INTO employees (name, position) VALUES (:name, :position)");
        $insert->execute(['name' => 'John Doe', 'position' => 'Developer']);*/
    }

    public function update () {
        /*$update = $pdo->prepare("UPDATE employees SET position = :position WHERE name = :name");
        $update->execute(['position' => 'Senior Developer', 'name' => 'John Doe']);*/
    }

}
