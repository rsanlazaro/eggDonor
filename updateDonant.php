<?php

function compressImage($source, $destination, $quality)
{
    // Get image info 
    $imgInfo = getimagesize($source);
    $mime = $imgInfo['mime'];

    // Create a new image from file 
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            imagejpeg($image, $destination, $quality);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            imagepng($image, $destination, $quality);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            imagegif($image, $destination, $quality);
            break;
        default:
            $image = imagecreatefromjpeg($source);
            imagejpeg($image, $destination, $quality);
    }


    // Return compressed image 
    return $destination;
}

session_start();

if (!$_SESSION['login']) {
    // header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr')) {
        // header('location: /index.php');
    }
}

include "includes/app.php";
$conn = connectDB();
var_dump($_FILES);
var_dump($_POST);
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
        $compressedImage = compressImage($_FILES['image-1']['tmp_name'], $_FILES['image-1']['tmp_name'], 25);
        $file = $_FILES['image-1']['name'];
        $path = pathinfo($file);
        $ext_img_1 = $path['extension'];
        $_FILES['image-1']['name'] = $code_img . "_1";
        $cloudinary->uploadApi()->upload(
            $_FILES['image-1']['tmp_name'],
            [
                'public_id' => 'RAFA',
                'overwrite' => true,
                'folder' => 'eggdonor'
            ]
        );
    }
    if (($_FILES['image-2']['size'] > 0)) {
        $file2 = $_FILES['image-2']['name'];
        $path2 = pathinfo($file2);
        $ext_img_2 = $path2['extension'];
        $_FILES['image-2']['name'] = $code_img . "_2";
        $cloudinary->uploadApi()->upload(
            $_FILES['image-2']['tmp_name'],
            [
                'public_id' => $_FILES['image-2']['name'],
                'overwrite' => true,
                'folder' => 'eggdonor'
            ]
        );
    }
    if (($_FILES['image-3']['size'] > 0)) {
        $file3 = $_FILES['image-3']['name'];
        $path3 = pathinfo($file3);
        $ext_img_3 = $path3['extension'];
        $_FILES['image-3']['name'] = $code_img . "_3";
        $cloudinary->uploadApi()->upload(
            $_FILES['image-3']['tmp_name'],
            [
                'public_id' => $_FILES['image-3']['name'],
                'overwrite' => true,
                'folder' => 'eggdonor'
            ]
        );
    }
    if (($_FILES['image-4']['size'] > 0)) {
        $file4 = $_FILES['image-4']['name'];
        $path4 = pathinfo($file4);
        $ext_img_4 = $path4['extension'];
        $_FILES['image-4']['name'] = $code_img . "_4";
        $cloudinary->uploadApi()->upload(
            $_FILES['image-4']['tmp_name'],
            [
                'public_id' => $_FILES['image-4']['name'],
                'overwrite' => true,
                'folder' => 'eggdonor'
            ]
        );
    }
}
// if ($id) {
//     $query = "UPDATE donants SET code='${code}', nationality='${nationality}', date_birth='${date_birth}', color_eyes='${color_eyes}', color_skin='${color_skin}', blood_type='${blood_type}', height='${height}', weight='${weight}', education='${education}', color_hair='${color_hair}', type_hair='${type_hair}', type_body='${type_body}', ocupation='${ocupation}', profile='${profile}', supplier='${supplier}', price='${price}', ext_img_1='${ext_img_1}', ext_img_2='${ext_img_2}', ext_img_3='${ext_img_3}', ext_img_4='${ext_img_4}' WHERE id = ${id}";
//     $result = mysqli_query($conn, $query);
//     header("Location: donants.php?msg=Los datos se han actualizado correctamente");
// }
