<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "company_db";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if an ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database
    $sql = "DELETE FROM employee_data WHERE id = $id";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        $message = "Record deleted successfully.";
        $conn->close();
        header("Location: employee_search.php?message=" . urlencode($message));
        exit();
    } else {
        $message = "Error deleting record: " . $conn->error;
        $conn->close();
        header("Location: employee_search.php?message=" . urlencode($message));
        exit();
    }
}
?>