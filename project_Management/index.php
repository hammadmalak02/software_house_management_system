<?php
include '../software_house_management/db_connection.php'; // Include your database connection file
// Handle Form Submission
if (isset($_POST['submit'])) {
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];

    // Insert Project into Database
    $sql = "INSERT INTO software_house_management (project_name, description, start_date, end_date, status) 
        VALUES ('$project_name', '$description', '$start_date', '$end_date', '$status')";

    if ($conn->query($sql) === TRUE) {
        // Display success message
        echo "<div style='padding: 15px; background-color: #dff0d8; color: #3c763d; border-radius: 5px; margin-bottom: 20px;'>
            <strong>Success!</strong> Your project <strong>$project_name</strong> has been successfully added to the list!
          </div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Project Management</title>

<body>

    </head>
</body>

<nav>
        <div class="logo">
            <h2>SoftwareHouse</h2>
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Team</a></li>
            <li><a href="#">Clients</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

<div class="container">
    <h2>Project Management</h2>

    <!-- Form to Add New Project -->
    <form method="POST" action="index.php">
        <label for="project_name">Project Name:</label>
        <input type="text" id="project_name" name="project_name" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date">

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>

        <input type="submit" name="submit" value="Add Project">
    </form>


    <!-- Display Project List -->
    <h3>Project List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch Projects from Database
            $sql = "SELECT * FROM software_house_management";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['project_name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['start_date'] . "</td>";
                    echo "<td>" . $row['end_date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>
                    <a href='update_project.php?id=" . $row["id"] . "'>Update</a> | 
                    <a href='delete_project.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this project?\")'>Delete</a>
                  </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No projects found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</div>

<script src="./navbar.js"></script>
</body>

</html>

<?php
// Close the Database Connection
$conn->close();
?>