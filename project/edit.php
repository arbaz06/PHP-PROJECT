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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employeeModel->updateEmployee($_GET['id'], $_POST);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Employee</h2>

<form action="edit.php?id=<?= $employee['id'] ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?= $employee['name'] ?>" required><br>

    <label for="dob">DOB:</label>
    <input type="date" name="dob" value="<?= $employee['dob'] ?>"><br>

    <label for="salary">Salary:</label>
    <input type="text" name="salary" value="<?= $employee['salary'] ?>"><br>

    <label for="joining_date">Joining Date:</label>
    <input type="date" name="joining_date" value="<?= $employee['joining_date'] ?>"><br>

    <label for="relieving_date">Relieving Date:</label>
    <input type="date" name="relieving_date" value="<?= $employee['relieving_date'] ?>"><br>

    <label for="contact">Contact:</label>
    <input type="text" name="contact" value="<?= $employee['contact'] ?>"><br>

    <label for="status">Status:</label>
    <select name="status">
        <option value="active" <?= ($employee['status'] === 'active') ? 'selected' : '' ?>>Active</option>
        <option value="inactive" <?= ($employee['status'] === 'inactive') ? 'selected' : '' ?>>Inactive</option>
    </select><br>

    <button type="submit">Update Employee</button>
</form>

</body>
</html>
