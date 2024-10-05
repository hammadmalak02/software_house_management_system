// Function to fetch tasks from the server and display them in the table
function fetchTasks() {
    fetch('task_manager.php')
    .then(response => response.json())
    .then(data => {
        const tableBody = document.querySelector('#task-table tbody');
        tableBody.innerHTML = '';  // Clear the table before appending

        data.forEach(task => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${task.task_name}</td>
                <td>${task.description}</td>
                <td>${task.assigned_to}</td>
                <td>${task.deadline}</td>
                <td>${task.status}</td>
            `;
            tableBody.appendChild(row);
        });
    })
    .catch(error => console.error('Error fetching tasks:', error));
}

// Handle form submission (AJAX to PHP for inserting new tasks)
document.getElementById('task-form').addEventListener('submit', function (e) {
    e.preventDefault();  // Prevent form from refreshing the page

    const formData = new FormData(this);

    fetch('task_manager.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);  // Output success or error message
        fetchTasks();  // Refresh the task list after adding
        this.reset();  // Clear the form
    })
    .catch(error => console.error('Error adding task:', error));
});

// Fetch tasks on page load
fetchTasks();
