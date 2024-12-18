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
    $ext_img_1 = $row['ext_img_1'];
    $ext_img_2 = $row['ext_img_2'];
    $ext_img_3 = $row['ext_img_3'];
    $ext_img_4 = $row['ext_img_4'];
}

// When form submitted, insert values into the database.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    echo $id;
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
    if ($result) {
        header("Location: donants.php?msg=El usuario se ha creado exitosamente");
    } else {
        header("Location: donants.php?msg=Hubo un problema registrando al usuario. Por favor, intente nuevamente");
    }
}
?>
<main class="register">
    <div class="register-info">
        <h3>Ingresar información de fenotipo</h3>
    </div>
    <?php if (isset($_GET['msg'])) { ?>
        <p class="error"><?php echo $_GET['msg']; ?></p>
    <?php } ?>
    <div class="register-form new-user">
        <div class="form-body">
            <div class="contact-form">
                <h2 class="contact-form-title">Nuevo donante</h1>
                    <form class="form" action="" method="post" enctype="multipart/form-data" id="file-upload">
                        <div class="col-md-12">
                            <label for="validationCustom01">Código de identificación</label>
                            <input type="text" class="form-control" id="validationCustom01" name="code" value="<?php echo $codeId; ?>" disabled />
                            <div class="invalid-feedback">
                                <div>Ingrese el código de identificación</div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="validationCustom01" name="id" value="<?php echo $idNew; ?>" />
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Imagen (Ojos - relación de imagen recomendada: 2400x1200):</label>
                                <input type="file" onchange="previewFile()" class="form-control img-1-input" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="image-1" />
                                <img class="img-1-pre" src=<?php echo $ext_img_1 ?> height="200" alt="Image preview...">
                                <div class="invalid-feedback">
                                    <div>Seleccione una imagen</div>
                                </div>
                                <?php if ($ext_img_1 !== null){ if (strlen($ext_img_1) > 10) { ?>
                                    <div class="delete-btn">
                                        <button type="button" id="btn1" onclick="deleteImg1()">Borrar imagen 1</button>
                                    </div>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Imagen (Nariz - relación de imagen recomendada: 2400x1200):</label>
                                <input type="file" onchange="previewFile2()" class="form-control img-2-input" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="image-2" />
                                <img class="img-2-pre" src=<?php echo $ext_img_2 ?> height="200" alt="Image preview...">
                                <div class="invalid-feedback">
                                    <div>Seleccione una imagen</div>
                                </div>
                                <?php if ($ext_img_2 !== null){ if (strlen($ext_img_2) > 10) { ?>
                                    <div class="delete-btn">
                                        <button type="button" id="btn2" onclick="deleteImg2()">Borrar imagen 2</button>
                                    </div>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Imagen (Boca - relación de imagen recomendada: 2400x1200):</label>
                                <input type="file" onchange="previewFile3()" class="form-control img-3-input" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="image-3" />
                                <img class="img-3-pre" src=<?php echo $ext_img_3 ?> height="200" alt="Image preview...">
                                <div class="invalid-feedback">
                                    <div>Seleccione una imagen</div>
                                </div>
                                <?php if ($ext_img_3 !== null){ if (strlen($ext_img_3) > 10) { ?>
                                    <div class="delete-btn">
                                        <button type="button" id="btn3" onclick="deleteImg3()">Borrar imagen 3</button>
                                    </div>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="form-btn">
                            <button class="btn btn-send" type="submit">
                                <div>Actualizar perfil de donante</div>
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</main>
<script src="build/js/bundle.min.js"></script>
<script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
<script type="text/javascript">
    function previewFile() {
        var preview = document.querySelector(".img-1-pre");
        var file = document.querySelector(".img-1-input").files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.height = '25rem';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function previewFile2() {
        var preview = document.querySelector(".img-2-pre");
        var file = document.querySelector(".img-2-input").files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.height = '25rem';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function previewFile3() {
        var preview = document.querySelector(".img-3-pre");
        var file = document.querySelector(".img-3-input").files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.height = '25rem';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function previewFile4() {
        var preview = document.querySelector(".img-4-pre");
        var file = document.querySelector(".img-4-input").files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.height = '25rem';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function deleteImg1() {
        var jsVar = "<?php echo $ext_img_1; ?>";
        let lastPart = jsVar.substring(jsVar.lastIndexOf('/') + 1);
        confirm("¿Deseas borrar la imagen " + lastPart + "?");
        fetch('deleteImage.php', {
            method: 'POST', // Use POST method
            headers: {
                'Content-Type': 'application/json', // Sending JSON data
            },
            body: JSON.stringify(jsVar) // Convert the data to a JSON string
        })
    }

    function deleteImg2() {
        var jsVar = "<?php echo $ext_img_2; ?>";
        let lastPart = jsVar.substring(jsVar.lastIndexOf('/') + 1);
        confirm("¿Deseas borrar la imagen " + lastPart + "?");
        fetch('deleteImage.php', {
            method: 'POST', // Use POST method
            headers: {
                'Content-Type': 'application/json', // Sending JSON data
            },
            body: JSON.stringify(jsVar) // Convert the data to a JSON string
        })
    }

    function deleteImg3() {
        var jsVar = "<?php echo $ext_img_3; ?>";
        let lastPart = jsVar.substring(jsVar.lastIndexOf('/') + 1);
        confirm("¿Deseas borrar la imagen " + lastPart + "?");
        fetch('deleteImage.php', {
            method: 'POST', // Use POST method
            headers: {
                'Content-Type': 'application/json', // Sending JSON data
            },
            body: JSON.stringify(jsVar) // Convert the data to a JSON string
        })
    }
</script>
</body>

</html>