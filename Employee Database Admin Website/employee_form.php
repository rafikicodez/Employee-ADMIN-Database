<!DOCTYPE html>

<!-- Nicholas DiCicco, Herzing University, FINAL PROJECT -- ADVANCED WEB DEVELOPMENT -->

<html lang ="eng">
<head>
    <title>Employee Form</title>
</head>
<body>
    <h1>Employee Form</h1>
    <form method="post" action="process_form.php">
        
        <label for="employee_name">Name:</label>
        <input type="text" name="employee_name" id="employee_name" required><br><br>
        
        <label for="employee_address">Address:</label>
        <input type="text" name="employee_address" id="employee_address" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required><br><br>
        
        <label for="language_spoken">Language Spoken:</label>
        <select name="language_spoken" id="language_spoken">
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="French">French</option>
            <option value="Italian">Italian</option>
        </select><br><br>
        
        <label for="is_married">Married/Single:</label>
        <input type="checkbox" name="is_married" id="is_married"><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>