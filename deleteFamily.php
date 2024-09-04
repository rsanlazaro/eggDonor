<?php
include "includes/app.php";
session_start();

if (!$_SESSION['login']) {
    header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr' || $_SESSION['type'] === 'agency')) {
        header('location: /index.php');
    } 
}

$conn = connectDB();
    
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
}
if ($id) {
    $query = "DELETE FROM family WHERE id = ${id}";
    $result = mysqli_query($conn, $query);
    header("Location: donantFamily.php?id=" . $_SESSION['donant_id'] . "&msg=Los datos se han eliminado exitosamente");
}
?>