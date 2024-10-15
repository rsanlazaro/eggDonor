<?php
include 'includes/templates/header.php';
?>
<?php
include "includes/app.php";

if (!$_SESSION['login']) {
    header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr' || $_SESSION['type'] === 'agency')) {
        header('location: /index.php');
    }
}
$id = $_GET['id'];
$conn = connectDB();
$sql = "SELECT * FROM donants";
$result = mysqli_query($conn, $sql);
$index = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $idAll[++$index] = $row['id'];
}
$idNew = max($idAll) + 1;
$query = "SELECT * FROM donants WHERE id='${id}'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $codeId = $row['code'];
    $nationality = $row['nationality'];
    $date_birth = $row['date_birth'];
    $color_eyes = $row['color_eyes'];
    $color_skin = $row['color_skin'];
    $blood_type = $row['blood_type'];
    $height = $row['height'];
    $weight = $row['weight'];
    $education = $row['education'];
    $color_hair = $row['color_hair'];
    $type_hair = $row['type_hair'];
    $type_body = $row['type_body'];
    $ocupation = $row['ocupation'];
    $profile = "Fenotipe";
    $supplier = $row['supplier'];
    $price = $row['price'];
    $oldCode = $row['code'];
    $charToLook = "-";
    if (strpos($oldCode, $charToLook) !== false) {
        $parts = explode("-", $oldCode);
        $before = $parts[0];
        if ($before == "VIP" || "PLUS" || "ELITE") {
            $before = "FN";
        }
        $after = $parts[1];
        $code = $before . "-" . strrev($after);
    } else {
        $code = strrev($oldCode);
    }
    $code_img = $row['code_img'];
    $ext_img_1 = "";
    $ext_img_2 = "";
    $ext_img_3 = "";
    $ext_img_4 = "";
    $hobbie = $row['hobbie'];
    $agency = $row['agency'];
    $color_favorite = $row['color_favorite'];
    $animal_favorite = $row['animal_favorite'];
    $book_movie_favorite = $row['book_movie_favorite'];
    $goal = $row['goal'];
    $ovarian_reserve = $row['ovarian_reserve'];
}

$query    = "INSERT into `donants` 
    (id, 
    nationality, 
    date_birth, 
    color_eyes, 
    color_skin, 
    blood_type, 
    height, 
    weight, 
    education, 
    color_hair, 
    type_hair, 
    type_body, 
    ocupation, 
    profile, 
    supplier, 
    price, 
    code, 
    code_img, 
    hobbie, 
    color_favorite, 
    animal_favorite, 
    book_movie_favorite, 
    goal, 
    ovarian_reserve, 
    agency)
    VALUES 
    ('$idNew', 
    '$nationality', 
    '$date_birth', 
    '$color_eyes', 
    '$color_skin', 
    '$blood_type', 
    '$height', 
    '$weight', 
    '$education', 
    '$color_hair', 
    '$type_hair', 
    '$type_body', 
    '$ocupation', 
    '$profile', 
    '$supplier', 
    '$price', 
    '$code', 
    '$code_img', 
    '$hobbie', 
    '$color_favorite', 
    '$animal_favorite', 
    '$book_movie_favorite', 
    '$goal', 
    '$ovarian_reserve', 
    '$agency')";
$result = mysqli_query($conn, $query);
if ($result) {
    header("Location: donants.php?msg=El usuario se ha creado exitosamente");
} else {
    header("Location: donants.php?msg=Hubo un problema registrando al usuario. Por favor, intente nuevamente");
}
?>