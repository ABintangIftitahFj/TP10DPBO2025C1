<?php
require_once 'model/Shift.php';

class ShiftViewModel {
    private $shift;

    public function __construct() {
        $this->shift = new Shift();
    }

    public function getShiftList() {
        return $this->shift->getAll();
    }

    public function getShiftById($id) {
        return $this->shift->getById($id);
    }

    public function addShift($shift_name) {
        return $this->shift->create($shift_name);
    }

    public function updateShift($id, $shift_name) {
        return $this->shift->update($id, $shift_name);
    }

    public function deleteShift($id) {
        return $this->shift->delete($id);
    }
}
?>