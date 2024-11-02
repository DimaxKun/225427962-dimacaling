<?php
include 'db.php';

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM birthdays WHERE id = $id"; 
    $conn->query($sql);
}

$sql = "SELECT * FROM birthdays"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head> 
    <title>Birthday List</title> 
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Birthday Information</h2> 
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Month</th> 
            <th>Day</th>  
            <th>Year</th>  
            <th colspan="2">Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['birth_month'] . "</td>";
                echo "<td>" . $row['birth_day'] . "</td>";
                echo "<td>" . $row['birth_year'] . "</td>";
                echo "<td>
                        <form method='POST' action='index.php' style='display:inline;'>
                            <input type='hidden' name='delete_id' value='" . $row['id'] . "'>
                            <input type='submit' value='Delete' class='delete-button'>
                        </form>
                    </td>";        
                echo "<td><a href='edit.php?id=" . $row['id'] . "' class='button-link'>Edit</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No birthdays found.</td></tr>";
        }
        ?>
    </table>
    <br>
    <button onclick="window.location.href='add.php'">Add New Birthday</button>
</body>
</html>
