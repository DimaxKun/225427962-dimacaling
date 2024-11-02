<?php

include "db.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM birthdays WHERE id = $id"; 
    if ($conn->query($sql) === TRUE) {
        echo "Birthday successfully deleted."; 
    } else {
        echo "Error deleting record: " . $sql . "<br>" . $conn->error;
    }
}
?>
