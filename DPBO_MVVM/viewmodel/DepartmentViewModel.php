<?php
require_once 'model/Department.php';

class DepartmentViewModel {
    private $department;

    public function __construct() {
        $this->department = new Department();
    }

    public function getDepartmentList() {
        return $this->department->getAll();
    }

    public function getDepartmentById($id) {
        return $this->department->getById($id);
    }

    public function addDepartment($name) {
        return $this->department->create($name);
    }

    public function updateDepartment($id, $name) {
        return $this->department->update($id, $name);
    }

    public function deleteDepartment($id) {
        return $this->department->delete($id);
    }
}
?>