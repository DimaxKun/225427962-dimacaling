<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $birth_month = $_POST['birth_month'];
    $birth_day = $_POST['birth_day'];
    $birth_year = $_POST['birth_year'];

    if (!empty($name) && !empty($birth_month) && !empty($birth_day) && !empty($birth_year)) {
        $sql = "INSERT INTO birthdays (name, birth_month, birth_day, birth_year) VALUES ('$name', $birth_month, $birth_day, $birth_year)";

        if ($conn->query($sql) === TRUE) {
            echo "New birthday added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Birthday</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Add a New Birthday</h2> 
    <form method="post" action="add.php">
        Name: <input type="text" name="name"><br><br>
        Birth Month: <input type="number" name="birth_month" min="1" max="12"><br><br>
        Birth Day: <input type="number" name="birth_day" min="1" max="31"><br><br>  
        Birth Year: <input type="number" name="birth_year" min="1900" max="2100"><br><br>
        <input class='add-button' type="submit" value="Add Birthday"><br><br>
    </form>
    <button onclick="window.location.href='index.php'">Back to Birthday List</button>
</body>
</html>
