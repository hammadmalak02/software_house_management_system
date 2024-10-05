<?php

// Include database connection
include('../software_house_management/db_connection.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "software_house_management";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission (Insert new task)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $assigned_to = $_POST['assigned_to'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO tasks (task_name, description, assigned_to, deadline, status)
                            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $task_name, $description, $assigned_to, $deadline, $status);

    if ($stmt->execute()) {
        echo "New task added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Handle fetching of tasks (for displaying in the table)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Set content type to JSON
    header('Content-Type: application/json');

    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);

    $tasks = array();
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }

    // Return tasks in JSON format for front-end rendering
    echo json_encode($tasks);
}

$conn->close();
?>
