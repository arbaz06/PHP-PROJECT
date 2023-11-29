<?php

require_once 'db.php';
require_once 'Employee.php';

$employeeModel = new Employee($pdo);
$employees = $employeeModel->getAllEmployees();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employeeModel->addEmployee($_POST);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            border-collapse: collapse;
            width: 80%; /* Adjust the width as needed */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
        }

        a:hover {
            background-color: #0056b3;
        }

        a.delete {
            background-color: #dc3545;
        }

        a.delete:hover {
            background-color: #bd2130;
        }
    </style>
</head>
<body>

<h1>Employee Management</h1>
<button onclick="openModal()">Add Employee</button>
<!-- Display Employee Listing -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>DOB</th>
        <th>Salary</th>
        <th>Joining Date</th>
        <th>Relieving Date</th>
        <th>Contact</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?= $employee['id'] ?></td>
            <td><?= $employee['name'] ?></td>
            <td><?= $employee['dob'] ?></td>
            <td><?= $employee['salary'] ?></td>
            <td><?= $employee['joining_date'] ?></td>
            <td><?= $employee['relieving_date'] ?></td>
            <td><?= $employee['contact'] ?></td>
            <td><?= $employee['status'] ?></td>
            <td>
                <a href="edit.php?id=<?= $employee['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $employee['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Add Employee Form -->

<div id="addEmployeeModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Add Employee</h2>
        <form action="index.php" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="dob">DOB:</label>
    <input type="date" name="dob"><br>

    <label for="salary">Salary:</label>
    <input type="text" name="salary"><br>

    <label for="joining_date">Joining Date:</label>
    <input type="date" name="joining_date"><br>

    <label for="relieving_date">Relieving Date:</label>
    <input type="date" name="relieving_date"><br>

    <label for="contact">Contact:</label>
    <input type="text" name="contact"><br>

    <label for="status">Status:</label>
    <select name="status">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select><br>

    <button type="submit">Add Employee</button>
        </form>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
