<?php
require_once 'viewmodel/StaffViewModel.php';
require_once 'viewmodel/DepartmentViewModel.php';
require_once 'viewmodel/ShiftViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'staff';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'staff') {
    $viewModel = new StaffViewModel();
    if ($action == 'list') {
        $staffList = $viewModel->getStaffList();
        require_once 'views/staff_list.php';
    } elseif ($action == 'add') {
        $departments = $viewModel->getDepartments();
        $shifts = $viewModel->getShifts();
        require_once 'views/staff_form.php';
    } elseif ($action == 'edit') {
        $staff = $viewModel->getStaffById($_GET['id']);
        $departments = $viewModel->getDepartments();
        $shifts = $viewModel->getShifts();
        require_once 'views/staff_form.php';
    } elseif ($action == 'save') {
        $viewModel->addStaff($_POST['name'], $_POST['department_id'], $_POST['shift_id']);
        header('Location: index.php?entity=staff');
    } elseif ($action == 'update') {
        $viewModel->updateStaff($_GET['id'], $_POST['name'], $_POST['department_id'], $_POST['shift_id']);
        header('Location: index.php?entity=staff');
    } elseif ($action == 'delete') {
        $viewModel->deleteStaff($_GET['id']);
        header('Location: index.php?entity=staff');
    }
} elseif ($entity == 'department') {
    $viewModel = new DepartmentViewModel();
    if ($action == 'list') {
        $departmentList = $viewModel->getDepartmentList();
        require_once 'views/department_list.php';
    } elseif ($action == 'add') {
        require_once 'views/department_form.php';
    } elseif ($action == 'edit') {
        $department = $viewModel->getDepartmentById($_GET['id']);
        require_once 'views/department_form.php';
    } elseif ($action == 'save') {
        $viewModel->addDepartment($_POST['name']);
        header('Location: index.php?entity=department');
    } elseif ($action == 'update') {
        $viewModel->updateDepartment($_GET['id'], $_POST['name']);
        header('Location: index.php?entity=department');
    } elseif ($action == 'delete') {
        $viewModel->deleteDepartment($_GET['id']);
        header('Location: index.php?entity=department');
    }
} elseif ($entity == 'shift') {
    $viewModel = new ShiftViewModel();
    if ($action == 'list') {
        $shiftList = $viewModel->getShiftList();
        require_once 'views/shift_list.php';
    } elseif ($action == 'add') {
        require_once 'views/shift_form.php';
    } elseif ($action == 'edit') {
        $shift = $viewModel->getShiftById($_GET['id']);
        require_once 'views/shift_form.php';
    } elseif ($action == 'save') {
        $viewModel->addShift($_POST['shift_name']);
        header('Location: index.php?entity=shift');
    } elseif ($action == 'update') {
        $viewModel->updateShift($_GET['id'], $_POST['shift_name']);
        header('Location: index.php?entity=shift');
    } elseif ($action == 'delete') {
        $viewModel->deleteShift($_GET['id']);
        header('Location: index.php?entity=shift');
    }
}
?>
