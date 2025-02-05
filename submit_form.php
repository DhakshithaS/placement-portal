<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL username
$password = "";     // Default password is empty
$dbname = "loginform"; // Use the correct database name

// Create connection using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if POST variables are set and sanitize them
    if (isset($_POST['Name'], $_POST['Rollno'], $_POST['Gender'], $_POST['Email'])) {
        $name = $conn->real_escape_string($_POST['Name']);
        $rollno = $conn->real_escape_string($_POST['Rollno']);
        $gender = $conn->real_escape_string($_POST['Gender']);
        $email = $conn->real_escape_string($_POST['Email']);
        
        // Use a prepared statement to insert the data securely
        $stmt = $conn->prepare("INSERT INTO Students_sub (Name, RollNo, Gender, Email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $name, $rollno, $gender, $email); // "siss" corresponds to (string, int, string, string)

        // Execute the query
        if ($stmt->execute()) {
            echo "Record added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Please fill all required fields.";
    }
} else {
    echo "Invalid request method. Please submit the form properly.";
}

// Close the connection
$conn->close();

