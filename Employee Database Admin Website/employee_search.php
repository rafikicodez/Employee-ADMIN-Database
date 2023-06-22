<!DOCTYPE html>
<html lang ="eng">
<head>
    <title>Employee Search</title>
</head>
<body>
    <h1>Employee Search</h1>

    <!-- Search by name form -->
    <form method="post" action="search.php">
        <label for="search_name">Search by Name:</label>
        <input type="text" name="search_name" id="search_name">
        <input type="submit" value="Search">
    </form>

    <!-- Search by language form -->
    <form method="post" action="search.php">
        <label for="search_language">Search by Language:</label>
        <select name="search_language" id="search_language">
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="French">French</option>
            <option value="Italian">Italian</option>
        </select>
        <input type="submit" value="Search">
    </form>

    <!-- Display search results -->
    <?php
    if (isset($_GET['message'])) {
        echo "<p>{$_GET['message']}</p>";
    }

    if (isset($_GET['records'])) {
        $records = $_GET['records'];

        echo "<h2>Search Results</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Age</th><th>Language</th><th>Marital Status</th><th>Delete</th></tr>";

        foreach ($records as $record) {
            echo "<tr>";
            echo "<td>{$record['id']}</td>";
            echo "<td>{$record['employee_name']}</td>";
            echo "<td>{$record['employee_address']}</td>";
            echo "<td>{$record['age']}</td>";
            echo "<td>{$record['language_spoken']}</td>";
            echo "<td>" . ($record['is_married'] ? 'Married' : 'Single') . "</td>";
            echo "<td><a href='delete.php?id={$record['id']}'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>

</body>
</html>