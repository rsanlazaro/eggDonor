<?php
session_start();
include "includes/config/database.php";

if (!$_SESSION['login']) {
    header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'ADMIN')) {
        header('location: /index.php');
    } 
}

$conn = connectDB();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    var_dump($id);
}
if ($id) {
    $query = "DELETE FROM users WHERE id = ${id}";
    $result = mysqli_query($conn, $query);
    header("Location: users.php?msg=El usuario se ha eliminado exitosamente");
}
?>