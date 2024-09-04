<?php
session_start();
include "includes/app.php";
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
    $member = $_POST['member'];
    $color_eyes = $_POST['color_eyes'];
    $color_hair = $_POST['color_hair'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $health = $_POST['health'];
}
if ($id) {
    $query = "UPDATE family SET member='${member}', color_eyes='${color_eyes}', color_hair='${color_hair}', height='${height}', weight='${weight}', health='${health}' WHERE id = ${id}";
    $result = mysqli_query($conn, $query);
    if (isset($_SESSION['donant_id'])) {
        header("Location: donantFamily.php?id=" . $_SESSION['donant_id'] . "&msg=Los datos se han actualizado correctamente");
    } else {
        if ($_SESSION['type'] == "agency") {
            header("Location: agency.php?msg=Los datos se han actualizado correctamente");
        }else {
            header("Location: donants.php?msg=Los datos se han actualizado correctamente");
        }
    }
}
?>