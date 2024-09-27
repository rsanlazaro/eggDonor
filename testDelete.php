<?php

session_start();

include "includes/app.php";
$conn = connectDB();

// Get the raw POST body
$rawData = file_get_contents('php://input');

// Decode the JSON into a PHP associative array
$data = json_decode($rawData, true);
$twoElementsArr = explode("/", $data);
$twoElements = array_slice($twoElementsArr,-2);
$twoElementsExt = explode(".", $twoElements[1]);
$deleteTgt = $twoElements[0] . "/" . $twoElementsExt[0]; 

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_FILES['image-1']['name'])) {
//         $file = $_FILES['image-1']['name'];
//         $path = pathinfo($file);
//         $_FILES['image-1']['name'] = $id . "_1";
// if (($_FILES['image-1']['size']) > 0) {
$result = $cloudinary->uploadApi()
->destroy($deleteTgt);
var_dump($result);
//     $json  = json_encode($result);
//     $array = json_decode($json, true);
//     $secureUrl = $array['secure_url'];
header("Location: test.php?msg=La imagen ha sido borrada exitosamente");
// }
//     }
// }