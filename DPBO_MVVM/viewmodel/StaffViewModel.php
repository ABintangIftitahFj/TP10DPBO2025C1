<?php
require_once 'model/Staff.php';
require_once 'model/Department.php';
require_once 'model/Shift.php';

class StaffViewModel {
    private $staff;
    private $department;
    private $shift;

    public function __construct() {
        $this->staff = new Staff();
        $this->department = new Department();
        $this->shift = new Shift();
    }

    public function getStaffList() {
        return $this->staff->getAll();
    }

    public function getStaffById($id) {
        return $this->staff->getById($id);
    }

    public function getDepartments() {
        return $this->department->getAll();
    }

    public function getShifts() {
        return $this->shift->getAll();
    }

    public function addStaff($name, $department_id, $shift_id) {
        return $this->staff->create($name, $department_id, $shift_id);
    }

    public function updateStaff($id, $name, $department_id, $shift_id) {
        return $this->staff->update($id, $name, $department_id, $shift_id);
    }

    public function deleteStaff($id) {
        return $this->staff->delete($id);
    }
}
?>