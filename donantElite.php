<?php
include 'includes/templates/header.php';
include "includes/app.php";
if (!$_SESSION['login']) {
    header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'user' || $_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr') || $_SESSION['type'] === 'donant') {
        header('location: /index.php');
    }
}

$id = $_GET['id'];
$conn = connectDB();

$sql = "SELECT * FROM donants WHERE id=${id}";
$result = mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sql);
if (!$result->num_rows) {
    header('location: /');
}
while ($row = mysqli_fetch_assoc($result)) {
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
    $profile = $row['profile'];
    $price = $row['price'];
    $code = $row['code'];
    $code_img = $row['code_img'];
    $ext_img_1 = $row['ext_img_1'];
    $ext_img_2 = $row['ext_img_2'];
    $ext_img_3 = $row['ext_img_3'];
    $ext_img_4 = $row['ext_img_4'];
    $ovarian_reserve = $row['ovarian_reserve'];
}

$imagesQty = 0;

if ($ext_img_1 !== "") {
    $imagesQty = $imagesQty + 1;
}
if ($ext_img_2 !== "") {
    $imagesQty = $imagesQty + 1;
}
if ($ext_img_3 !== "") {
    $imagesQty = $imagesQty + 1;
}
if ($ext_img_4 !== "") {
    $imagesQty = $imagesQty + 1;
}
?>

<main class="donant-info">
    <div class="hero-img">
        <div class="img-container">
            <img src="build/img/hero/elite.webp" alt="hero-image" />
        </div>
    </div>
    <div class="donants">
        <?php if ($profile === "Elite") { ?>
            <div class="donant parent">
                <div class="img-1 div1">
                    <?php if ($ext_img_1 !== "-") { ?>
                        <img id="myImg1" <?php echo "src=" . $ext_img_1 ?> alt="img" style="width:100%">
                        <div id="myModal1" class="modal">

                            <!-- The Close Button -->
                            <span class="close1">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img <?php if ($ext_img_1 !== "-") {
                                        echo "class='modal-img'src=" . $ext_img_1;
                                    } else {
                                        echo "class='img-padding' src=build/img/admin/default.webp";
                                    }  ?> alt="picture">
                        </div>
                    <?php } else { ?>
                        <img <?php echo "class='img-padding' src=build/img/admin/default.webp"; ?> alt="picture">
                    <?php } ?>
                </div>
                <div class="donant-data div2">
                    <p>Código: <?php echo $code ?></p>
                    <ul>
                        <li>Nacionalidad: <?php echo $nationality ?></li>
                        <li>Fecha de nacimiento: <?php echo $date_birth ?></li>
                        <li>Color de ojos: <?php echo $color_eyes ?></li>
                        <li>Color de piel: <?php echo $color_skin ?></li>
                        <li>Grupo sanguíneo: <?php echo $blood_type ?></li>
                        <li>Estatura: <?php echo $height ?> m</li>
                        <li>Peso: <?php echo $weight ?> kg</li>
                        <li>Reserva ovárica: <?php echo $ovarian_reserve ?></li>
                        <li>Educación: <?php echo $education ?></li>
                        <li>Color de pelo: <?php echo $color_hair ?></li>
                        <li>TIpo de pelo: <?php echo $type_hair ?></li>
                        <li>Tipo de cuerpo: <?php echo $type_body ?></li>
                        <li>Ocupación: <?php echo $ocupation ?></li>
                        <li>Precio: <?php
                                    // if (isset($price)) {
                                    // echo "$" . " " . number_format($price, 2, ',', '.');
                                    // $price = substr($price, 0, -3);
                                    // echo "$" . " " . $price . " " . "MXN";
                                    echo $price . " " . "\xE2\x82\xAc";
                                    // } 
                                    ?></li>
                    </ul>
                </div>
                <div class="img-2 div3">
                    <?php if ($ext_img_2 !== "-") { ?>
                        <img id="myImg2" <?php echo "src=" . $ext_img_2 ?> alt="img" style="width:100%">
                        <div id="myModal2" class="modal">

                            <!-- The Close Button -->
                            <span class="close2">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img <?php if ($ext_img_2 !== "-") {
                                        echo "class='modal-img'src=" . $ext_img_2;
                                    } else {
                                        echo "class='img-padding' src=build/img/admin/default.webp";
                                    }  ?> alt="picture">
                        </div>
                    <?php } else { ?>
                        <img <?php echo "class='img-padding' src=build/img/admin/default.webp"; ?> alt="picture">
                    <?php } ?>
                </div>
                <div class="img-3 div4">
                    <?php if ($ext_img_3 !== "-") { ?>
                        <img id="myImg3" <?php echo "src=" . $ext_img_3 ?> alt="img" style="width:100%">
                        <div id="myModal3" class="modal">

                            <!-- The Close Button -->
                            <span class="close3">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img <?php if ($ext_img_3 !== "-") {
                                        echo "class='modal-img'src=" . $ext_img_3;
                                    } else {
                                        echo "class='img-padding' src=build/img/admin/default.webp";
                                    }  ?> alt="picture">
                        </div>
                    <?php } else { ?>
                        <img <?php echo "class='img-padding' src=build/img/admin/default.webp"; ?> alt="picture">
                    <?php } ?>
                </div>
                <div class="img-4 div5">
                    <?php if ($ext_img_4 !== "-") { ?>
                        <img id="myImg4" <?php echo "src=" . $ext_img_4 ?> alt="img" style="width:100%">
                        <div id="myModal4" class="modal">

                            <!-- The Close Button -->
                            <span class="close4">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img <?php if ($ext_img_4 !== "-") {
                                        echo "class='modal-img'src=" . $ext_img_4;
                                    } else {
                                        echo "class='img-padding' src=build/img/admin/default.webp";
                                    }  ?> alt="picture">
                        </div>
                    <?php } else { ?>
                        <img <?php echo "class='img-padding' src=build/img/admin/default.webp"; ?> alt="picture">
                    <?php } ?>
                </div>
            </div>
            <div class="catalogue-buttons">
                <div class="catalogue-button">
                    <a href=<?php echo "medical.php?id=" . $id ?>>Datos médicos</a>
                </div>
                <div class="catalogue-button">
                    <a href=<?php echo "family.php?id=" . $id ?>>Familia</a>
                </div>
                <div class="catalogue-button">
                    <a href=<?php echo "hobbies.php?id=" . $id ?>>Intereses/Hobbies</a>
                </div>
            </div>
        <?php } ?>
    </div>
</main>
<?php include 'includes/templates/footer.php'; ?>
</body>

</html>