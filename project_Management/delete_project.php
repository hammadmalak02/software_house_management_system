<?php
include '../software_house_management/db_connection.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to delete the project
    $sql = "DELETE FROM software_house_management WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Project deleted successfully.'); window.location.href='index.php';</script>";
    } else {
        echo "Error deleting project: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
