<?php
// header("Location: www.youtube.com");
session_start();
include "includes/app.php";
$conn = connectDB();
$rawData = file_get_contents('php://input');
$data = json_decode($rawData, true);
$twoElementsArr = explode("/", $data);
$twoElements = array_slice($twoElementsArr,-2);
$twoElementsExt = explode(".", $twoElements[1]);
$deleteTgt = $twoElements[0] . "/" . $twoElementsExt[0];
$index = substr($deleteTgt,-1);
$cellElement = "ext_img_" + $index;
$idElement = substr($deleteTgt,-6,4);
// $query = "UPDATE donants SET ${cellElement} = NULL WHERE id = ${idElement}";
var_dump($cellElement);
var_dump($idElement);
// $result = mysqli_query($conn, $query); 
// $apiResponse = $cloudinary->uploadApi()->destroy($deleteTgt,$options = [
//     "media_metadata" => true
// ]);
// $response = $apiResponse->offsetGet('result');