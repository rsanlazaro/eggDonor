<?php

include "includes/app.php";
$db = new mysqli(
        $_ENV['DB_HOST'],
        $_ENV['DB_USER'],
        $_ENV['DB_PASS'] ?? '',
        $_ENV['DB_BD']);

    if(!$db) {
        echo "Error, no se pudo conectar";
        exit;
    }

// Check if id is set or not, if true,
// toggle else simply go back to the page
if (isset($_GET['id'])) {

    // Store the value from get to
    // a local variable "course_id"
    $val_id = $_GET['id'];
    $type = $_GET['type'];

    // SQL query that sets the status to
    // 0 to indicate deactivation.
    if ($type == "fenotipo") {
        $sql = "UPDATE `users` SET
			`fenotipo`=0 WHERE id='$val_id'";
        // Execute the query
        mysqli_query($db, $sql);
    }
    if ($type == "vip") {
        $sql = "UPDATE `users` SET
			`vip`=0 WHERE id='$val_id'";
        // Execute the query
        mysqli_query($db, $sql);
    }
    if ($type == "plus") {
        $sql = "UPDATE `users` SET
			`plus`=0 WHERE id='$val_id'";
        // Execute the query
        mysqli_query($db, $sql);
    }
    if ($type == "elite") {
        $sql = "UPDATE `users` SET
			`elite`=0 WHERE id='$val_id'";
        // Execute the query
        mysqli_query($db, $sql);
    }
}

// Go back to course-page.php
header('location: users.php');