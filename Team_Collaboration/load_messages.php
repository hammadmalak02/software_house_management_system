<?php
include('../project_Management/db_connection.php');

// Fetch messages from the database
$sql = "SELECT * FROM messages ORDER BY timestamp ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row['user_name'] . ":</strong> " . $row['message'] . " <small>(" . $row['timestamp'] . ")</small></p>";
    }
} else {
    echo "No messages yet.";
}

$conn->close();
?>
