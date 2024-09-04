<?php

session_start();
if (!$_SESSION['login']) {
    // header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr' || $_SESSION['type'] === 'agency')) {
        // header('location: /index.php');
    }
}

include "includes/app.php";

$conn = connectDB();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    $nationality = $_POST['nationality'];
    $date_birth = $_POST['date_birth'];
    $color_eyes = $_POST['color_eyes'];
    $color_skin = $_POST['color_skin'];
    $blood_type = $_POST['blood_type'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $education = $_POST['education'];
    $color_hair = $_POST['color_hair'];
    $type_hair = $_POST['type_hair'];
    $type_body = $_POST['type_body'];
    $ocupation = $_POST['ocupation'];
    $profile = $_POST['profile'];
    $supplier = $_POST['supplier'];
    $price = $_POST['price'];
    $hobbie = $_POST['hobbie'];
    $color_favorite = $_POST['color_favorite'];
    $animal_favorite = $_POST['animal_favorite'];
    $book_movie_favorite = $_POST['book_movie_favorite'];
    $goal = $_POST['goal'];
    $ovarian_reserve = $_POST['ovarian_reserve'];
    $code = $_POST['code'];
    $code = strtoupper($code);

    $sql = "SELECT * FROM donants WHERE id=${id}";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $code_img = $row['code_img'];
        $ext_img_1 = $row['ext_img_1'];
        $ext_img_2 = $row['ext_img_2'];
        $ext_img_3 = $row['ext_img_3'];
        $ext_img_4 = $row['ext_img_4'];
    }
    if (isset($_FILES['image-1']['name'])) {
        $file = $_FILES['image-1']['name'];
        $path = pathinfo($file);
        $_FILES['image-1']['name'] = $id . "_1";
        if (($_FILES['image-1']['size']) > 0) {
            $result = $cloudinary->uploadApi()->upload(
                $_FILES['image-1']['tmp_name'],
                [
                    'public_id' => $_FILES['image-1']['name'],
                    'overwrite' => true,
                    'folder' => 'eggdonor',
                    'format' => 'png',
                    'invalidate' => true
                ]
            );
            $json  = json_encode($result);
            $array = json_decode($json, true);
            $secureUrl = $array['secure_url'];
            $query = "UPDATE donants SET ext_img_1='${secureUrl}' WHERE id = ${id}";
            $result   = mysqli_query($conn, $query);
        }
    }
    if (isset($_FILES['image-2']['name'])) {
        $file2 = $_FILES['image-2']['name'];
        $path2 = pathinfo($file2);
        $_FILES['image-2']['name'] = $id . "_2";
        if (($_FILES['image-2']['size']) > 0) {
            $result = $cloudinary->uploadApi()->upload(
                $_FILES['image-2']['tmp_name'],
                [
                    'public_id' => $_FILES['image-2']['name'],
                    'overwrite' => true,
                    'folder' => 'eggdonor',
                    'format' => 'png',
                    'invalidate' => true
                ]
            );
            $json  = json_encode($result);
            $array = json_decode($json, true);
            $secureUrl = $array['secure_url'];
            $query = "UPDATE donants SET ext_img_2='${secureUrl}' WHERE id = ${id}";
            $result   = mysqli_query($conn, $query);
        }
    }
    if (isset($_FILES['image-3']['name'])) {
        $file3 = $_FILES['image-3']['name'];
        $path3 = pathinfo($file3);
        $_FILES['image-3']['name'] = $id . "_3";
        if (($_FILES['image-3']['size']) > 0) {
            $result = $cloudinary->uploadApi()->upload(
                $_FILES['image-3']['tmp_name'],
                [
                    'public_id' => $_FILES['image-3']['name'],
                    'overwrite' => true,
                    'folder' => 'eggdonor',
                    'format' => 'png',
                    'invalidate' => true
                ]
            );
            $json  = json_encode($result);
            $array = json_decode($json, true);
            $secureUrl = $array['secure_url'];
            $query = "UPDATE donants SET ext_img_3='${secureUrl}' WHERE id = ${id}";
            $result   = mysqli_query($conn, $query);
        }
    }
    if (isset($_FILES['image-4']['name'])) {
        $file4 = $_FILES['image-4']['name'];
        $path4 = pathinfo($file4);
        $_FILES['image-4']['name'] = $id . "_4";
        if (($_FILES['image-4']['size']) > 0) {
            $result = $cloudinary->uploadApi()->upload(
                $_FILES['image-4']['tmp_name'],
                [
                    'public_id' => $_FILES['image-4']['name'],
                    'overwrite' => true,
                    'folder' => 'eggdonor',
                    'format' => 'png',
                    'invalidate' => true
                ]
            );
            $json  = json_encode($result);
            $array = json_decode($json, true);
            $secureUrl = $array['secure_url'];
            $query = "UPDATE donants SET ext_img_4='${secureUrl}' WHERE id = ${id}";
            $result   = mysqli_query($conn, $query);
        }
    }
}
if ($id) {
    $query = "UPDATE donants SET code='${code}', nationality='${nationality}', date_birth='${date_birth}', color_eyes='${color_eyes}', color_skin='${color_skin}', blood_type='${blood_type}', height='${height}', weight='${weight}', education='${education}', color_hair='${color_hair}', type_hair='${type_hair}', type_body='${type_body}', ocupation='${ocupation}', profile='${profile}', supplier='${supplier}', price='${price}',
    hobbie='${hobbie}', color_favorite='${color_favorite}', animal_favorite='${animal_favorite}', book_movie_favorite='${book_movie_favorite}', goal='${goal}', ovarian_reserve='${ovarian_reserve}' WHERE id = ${id}";
    $result = mysqli_query($conn, $query);
    if ($_SESSION['type'] == "agency") {
        header('Location: agency.php?msg=Los datos se han actualizado correctamente&code='.$code);
    } else {
        header('Location: donants.php?msg=Los datos se han actualizado correctamente&code='.$code);
    }
}