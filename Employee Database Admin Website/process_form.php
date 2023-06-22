<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "company_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
$employee_name = $_POST['employee_name'];
$employee_address = $_POST['employee_address'];
$age = $_POST['age'];
$language_spoken = $_POST['language_spoken'];
$is_married = isset($_POST['is_married']) ? 1 : 0;

// Validate the age
if (!is_numeric($age) || $age < 16) {
    die("Error: Age must be a numeric value and greater than or equal to 16.");
}

// Prepare and execute the SQL statement to insert the data
$sql = "INSERT INTO employee_data (employee_name, employee_address, age, language_spoken, is_married)
        VALUES ('$employee_name', '$employee_address', $age, '$language_spoken', $is_married)";

if ($conn->query($sql) === TRUE) {
    echo "Employee data stored successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>