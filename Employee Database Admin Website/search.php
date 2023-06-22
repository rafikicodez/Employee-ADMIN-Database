<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "company_db";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search by name
if (isset($_POST['search_name'])) {
    $search_name = $_POST['search_name'];

    // Retrieve matching records from the database
    $sql = "SELECT * FROM employee_data WHERE employee_name LIKE '%$search_name%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $records = array();
        while ($row = $result->fetch_assoc()) {
            $records[] = $row;
        }
        $conn->close();
        header("Location: employee_search.php?records=" . urlencode(serialize($records)));
        exit();
    } else {
        $message = "No records found.";
        $conn->close();
        header("Location: employee_search.php?message=" . urlencode($message));
        exit();
    }
}

// Search by language
if (isset($_POST['search_language'])) {
    $search_language = $_POST['search_language'];

    // Retrieve matching records from the database
    $sql = "SELECT * FROM employee_data WHERE language_spoken = '$search_language'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $records = array();
        while ($row = $result->fetch_assoc()) {
            $records[] = $row;
        }
        $conn->close();
        header("Location: employee_search.php?records=" . urlencode(serialize($records)));
        exit();
    } else {
        $message = "No records found.";
        $conn->close();
        header("Location: employee_search.php?message=" . urlencode($message));
        exit();
    }
}
?>