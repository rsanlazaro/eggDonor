<?php

session_start();

include "includes/app.php";
$conn = connectDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
                    'folder' => 'test',
                    'format' => 'png',
                    'invalidate' => true
                ]
            );
            $json  = json_encode($result);
            $array = json_decode($json, true);
            $secureUrl = $array['secure_url'];
            header("Location: test.php");
        }
    }
}