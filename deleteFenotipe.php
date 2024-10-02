<?php
include "includes/app.php";

if (!$_SESSION['login']) {
    header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr')) {
        header('location: /index.php');
    }
}

$conn = connectDB();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    $img1 = "eggdonor/" . $id . "_1";
    $img2 = "eggdonor/" . $id . "_2";
    $img3 = "eggdonor/" . $id . "_3";
    $img4 = "eggdonor/" . $id . "_4";
}
if ($id) {
    $sql = "SELECT * FROM donants WHERE id=${id}";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $code = $row['code'];
    }
    $cloudinary->uploadApi()->destroy($img1);
    $cloudinary->uploadApi()->destroy($img2);
    $cloudinary->uploadApi()->destroy($img3);
    $cloudinary->uploadApi()->destroy($img4);
    $query = "DELETE FROM donants WHERE id=${id} AND profile='Fenotipe'";
    $result = mysqli_query($conn, $query);
    header("Location: donants.php?msg=La donante se ha eliminado exitosamente");
}
