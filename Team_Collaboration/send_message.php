<?php
include('../project_Management/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'];
    $user_name = 'User';  // You can fetch the logged-in user's name

    // Insert the message into the database
    $sql = "INSERT INTO messages (user_name, message) VALUES ('$user_name', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
header("Location: chat.php");
exit();
?>
