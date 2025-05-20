<?php
require_once 'config/Database.php';

class Staff {
    private $conn;
    private $table = 'staff';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT s.*, d.name as department_name, sh.shift_name 
                 FROM " . $this->table . " s 
                 JOIN department d ON s.department_id = d.id 
                 JOIN shift sh ON s.shift_id = sh.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT s.*, d.name as department_name, sh.shift_name 
                 FROM " . $this->table . " s 
                 JOIN department d ON s.department_id = d.id 
                 JOIN shift sh ON s.shift_id = sh.id 
                 WHERE s.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $department_id, $shift_id) {
        $query = "INSERT INTO " . $this->table . " (name, department_id, shift_id) VALUES (:name, :department_id, :shift_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->bindParam(':shift_id', $shift_id);
        return $stmt->execute();
    }

    public function update($id, $name, $department_id, $shift_id) {
        $query = "UPDATE " . $this->table . " SET name = :name, department_id = :department_id, shift_id = :shift_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->bindParam(':shift_id', $shift_id);
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