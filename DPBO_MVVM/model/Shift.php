<?php
require_once 'config/Database.php';

class Shift {
    private $conn;
    private $table = 'shift';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($shift_name) {
        $query = "INSERT INTO " . $this->table . " (shift_name) VALUES (:shift_name)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':shift_name', $shift_name);
        return $stmt->execute();
    }

    public function update($id, $shift_name) {
        $query = "UPDATE " . $this->table . " SET shift_name = :shift_name WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':shift_name', $shift_name);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>