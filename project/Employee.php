<?php

class Employee
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllEmployees()
    {
        $stmt = $this->pdo->query("SELECT * FROM employees");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEmployee($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO employees (name, dob, salary, joining_date, relieving_date, contact, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$data['name'], $data['dob'], $data['salary'], $data['joining_date'], $data['relieving_date'], $data['contact'], $data['status']]);
    }

    public function getEmployeeById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM employees WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateEmployee($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE employees SET name=?, dob=?, salary=?, joining_date=?, relieving_date=?, contact=?, status=? WHERE id=?");
        $stmt->execute([$data['name'], $data['dob'], $data['salary'], $data['joining_date'], $data['relieving_date'], $data['contact'], $data['status'], $id]);
    }

    public function deleteEmployee($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM employees WHERE id = ?");
        $stmt->execute([$id]);
    }
}
