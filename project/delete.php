<?php

require_once 'db.php';
require_once 'Employee.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$employeeModel = new Employee($pdo);
$employee = $employeeModel->getEmployeeById($_GET['id']);

if (!$employee) {
    header('Location: index.php');
    exit;
}

$employeeModel->deleteEmployee($_GET['id']);
header('Location: index.php');
exit;
