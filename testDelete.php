<?php
header("Location: www.youtube.com");
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
// if (headers_sent()) {
//     die("Headers have already been sent!");
// }
if ($response == "ok") {
    header("Location: test.php?msg=La imagen ha sido borrada exitosamente.");
    exit;
} else {
    header("Location: test.php?msg=Ocurrió un problema con la eliminación de la imagen. Por favor, intente de nuevo.");
    exit;
}