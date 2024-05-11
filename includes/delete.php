<?php
include "./connect.php";

if (isset($_GET["deleteid"])) {
    $id = $_GET["deleteid"];

    // sql query to delete from table
    $sql = "DELETE FROM students WHERE id = $id";

    if (!mysqli_query($conn, $sql)) {
        die(mysqli_connect_error());
    }

    header("location: ../index.php");
}
