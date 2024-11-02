<?php
include 'db.php';

// Check if delete form was submitted
if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM contacts WHERE id = $id";
    $conn->query($sql);
}

// Retrieve the updated list of contacts
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head> 
    <title>Phonebook</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Phonebook Contacts</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
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
            echo "<tr><td colspan='4'>No contacts found.</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="add.php">Add New Contact</a>
</body>
</html>
