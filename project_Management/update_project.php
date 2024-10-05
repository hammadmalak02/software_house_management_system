<?php
include '../software_house_management/db_connection.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current data of the project
    $sql = "SELECT * FROM software_house_management WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
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
            <!-- Form to Update Project -->
        <h2>Update Project</h2>
        <form action="update_project.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <label for="project_name">Project Name:</label>
            <input type="text" name="project_name" value="<?php echo $row['project_name']; ?>" required><br>

            <label for="description">Description:</label>
            <textarea name="description" rows="4" cols="50" required><?php echo $row['description']; ?></textarea><br>

            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" value="<?php echo $row['start_date']; ?>" required><br>

            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" value="<?php echo $row['end_date']; ?>" required><br>

            <label for="status">Status:</label>
            <select name="status" required>
                <option value="Pending" <?php if($row['status'] == "Pending") echo 'selected'; ?>>Pending</option>
                <option value="In Progress" <?php if($row['status'] == "In Progress") echo 'selected'; ?>>In Progress</option>
                <option value="Completed" <?php if($row['status'] == "Completed") echo 'selected'; ?>>Completed</option>
            </select><br>

            <input type="submit" name="update" value="Update Project">
        </form>
        </body>
        </html>

        <?php
    }
}

// Update the project data when form is submitted
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];

    // SQL query to update the project
    $sql = "UPDATE software_house_management 
            SET project_name = '$project_name', description = '$description', start_date = '$start_date', end_date = '$end_date', status = '$status' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Project updated successfully.'); window.location.href='index.php';</script>";
    } else {
        echo "Error updating project: " . $conn->error;
    }

    $conn->close();
}
?>
