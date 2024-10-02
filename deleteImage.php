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
$apiResponse = $cloudinary->uploadApi()->destroy($deleteTgt,$options = [
    "media_metadata" => true
]);
$response = $apiResponse->offsetGet('result');