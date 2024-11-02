<?php

include "db.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM birthdays WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $birth_month = $row['birth_month'];
        $birth_day = $row['birth_day']; 
        $birth_year = $row['birth_year']; 
    } else {
        echo "No birthday found with that id";
    } 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $birth_month = $_POST['birth_month'];
    $birth_day = $_POST['birth_day'];
    $birth_year = $_POST['birth_year'];
    $id = $_POST['id'];

    if (!empty($name) && !empty($birth_month) && !empty($birth_day) && !empty($birth_year)) {
        $sql = "UPDATE birthdays SET name='$name', birth_month=$birth_month, birth_day=$birth_day, birth_year=$birth_year WHERE id=$id"; 

        if ($conn->query($sql) === TRUE) {
            echo "Birthday successfully updated."; 
        } else {
            echo "Error updating record: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please fill in all fields."; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Birthday</title> 
<body>
<h2>Edit Birthday</h2> 
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>"><br><br>
        Birth Month: <input type="number" name="birth_month" value="<?php echo $birth_month; ?>" min="1" max="12"><br><br> 
        Birth Day: <input type="number" name="birth_day" value="<?php echo $birth_day; ?>" min="1" max="31"><br><br>   
        Birth Year: <input type="number" name="birth_year" value="<?php echo $birth_year; ?>" min="1900" max="2100"><br><br> 
        <input type="submit" value="Update Birthday"><br><br> 
    </form>
    <a href="index.php">Back to Birthday List</a> 
</body>
</html>
