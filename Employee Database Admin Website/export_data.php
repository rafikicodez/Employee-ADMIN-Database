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

// Retrieve data from the database
$sql = "SELECT * FROM employee_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Create a temporary file to store the CSV data
    $tempFile = tempnam(sys_get_temp_dir(), 'employee_data_');
    $file = fopen($tempFile, 'w');

    // Write the CSV headers
    $headers = array('ID', 'Name', 'Address', 'Age', 'Language', 'Marital Status');
    fputcsv($file, $headers);

    // Write each record as a CSV row
    while ($row = $result->fetch_assoc()) {
        $csvData = array($row['id'], $row['employee_name'], $row['employee_address'], $row['age'], $row['language_spoken'], $row['is_married'] ? 'Married' : 'Single');
        fputcsv($file, $csvData);
    }

    fclose($file);

    // Set the headers to download the CSV file
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="employee_data.csv"');
    header('Pragma: no-cache');
    readfile($tempFile);

    // Delete the temporary file
    unlink($tempFile);
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();
?>