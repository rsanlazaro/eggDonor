<?php
include 'includes/templates/header.php';
?>
<?php
include "includes/app.php";

if (!$_SESSION['login']) {
    header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr')) {
        header('location: /index.php');
    }
}

$id = $_GET['id'];
$conn = connectDB();

    
$sql = "SELECT * FROM donants WHERE id=${id}";
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
    $supplier = $row['supplier'];
    $price = $row['price'];
    $code = $row['code'];
    $code_img = $row['code_img'];
    $ext_img_1 = $row['ext_img_1'];
    $ext_img_2 = $row['ext_img_2'];
    $ext_img_3 = $row['ext_img_3'];
    $ext_img_4 = $row['ext_img_4'];
}
?>
<main class="register">
    <div class="register-info">
        <h3>Editar información de donante</h3>
    </div>
    <div class="register-form new-user">
        <div class="form-body">
            <div class="contact-form">
                <h2 class="contact-form-title">Donante <?php echo $code ?></h1>
                    <form class="form" action="updateDonant.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Código de identificación</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="code" required value="<?php echo $code ?>" <?php if (!($_SESSION['type'] === 'admin')) {
                                                                                                                                                                                                echo "readonly='readonly'";
                                                                                                                                                                                            } ?> />
                                <div class="invalid-feedback">
                                    <div>Ingrese el código de identificación</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01">Nacionalidad</label>
                            <input type="text" class="form-control" id="validationCustom01" name="nationality" value="<?php echo $nationality ?>" required />
                            <div class="invalid-feedback">
                                <div>Ingrese la nacionalidad</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Año de nacimiento</label>
                                <input type="number" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="date_birth" required value="<?php echo $date_birth ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el año de nacimiento</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Color de ojos</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="color_eyes" required value="<?php echo $color_eyes ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el color de ojos</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Color de piel</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="color_skin" required value="<?php echo $color_skin ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el color de piel</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Tipo de sangre</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="blood_type" required value="<?php echo $blood_type ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el tipo de sangre</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Altura</label>
                                <input type="number" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="height" required value="<?php echo $height ?>" min="0" step=".01" />
                                <div class="invalid-feedback">
                                    <div>Ingrese la altura</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Peso</label>
                                <input type="number" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="weight" required value="<?php echo $weight ?>" min="0" step=".01" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el peso</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Nivel educativo</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="education" required value="<?php echo $education ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el nivel educativo</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Color de cabello</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="color_hair" required value="<?php echo $color_hair ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el color de cabello</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Tipo de cabello</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="type_hair" required value="<?php echo $type_hair ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el tipo de cabello</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Tipo de cuerpo</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="type_body" required value="<?php echo $type_body ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el tipo de cuerpo</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Ocupación</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="ocupation" required value="<?php echo $ocupation ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese la ocupación</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Proveedor</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="supplier" required value="<?php echo $supplier ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el proveedor</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="validationCustomUsername">Precio</label>
                                <input type="number" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="price" required value="<?php echo $price ?>" min="0" step=".01" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el precio</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="has-validation">
                                <label class="label-form" for="type-select">Perfil</label>
                                <div class="form-control">
                                    <select name="profile" class="selector" id="type-select">
                                        <?php if ($profile === 'Fenotipe') { ?>
                                            <option value="Fenotipe" selected>Fenotipo</option>
                                            <option value="Plus">Plus</option>
                                            <option value="VIP">VIP</option>
                                            <option value="Elite">Elite</option>
                                        <?php } elseif ($profile === 'Plus') { ?>
                                            <option value="Fenotipe">Fenotipo</option>
                                            <option value="Plus" selected>Plus</option>
                                            <option value="VIP">VIP</option>
                                            <option value="Elite">Elite</option>
                                        <?php } elseif ($profile === 'VIP') { ?>
                                            <option value="Fenotipe">Fenotipo</option>
                                            <option value="Plus">Plus</option>
                                            <option value="VIP" selected>VIP</option>
                                            <option value="Elite">Elite</option>
                                        <?php } else { ?>
                                            <option value="Fenotipe">Fenotipo</option>
                                            <option value="Plus">Plus</option>
                                            <option value="VIP">VIP</option>
                                            <option value="Elite" selected>Elite</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="invalid-feedback">
                                    <div>Seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <?php if (!($profile === 'Fenotipe')) { ?>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Imagen 1:</label>
                                    <input type="file" onchange="previewFile()" class="form-control img-1-input" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="image-1" />
                                    <img class="img-1-pre" src=<?php echo $ext_img_1 ?> height="200" alt="Image preview...">
                                    <div class="invalid-feedback">
                                        <div>Seleccione una imagen</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Imagen 2:</label>
                                    <input type="file" onchange="previewFile2()" class="form-control img-2-input" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="image-2" />
                                    <img class="img-2-pre" src=<?php echo $ext_img_2 ?> height="200" alt="Image preview...">
                                    <div class="invalid-feedback">
                                        <div>Seleccione una imagen</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Imagen 3:</label>
                                    <input type="file" onchange="previewFile3()" class="form-control img-3-input" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="image-3" />
                                    <img class="img-3-pre" src=<?php echo $ext_img_3 ?> height="200" alt="Image preview...">
                                    <div class="invalid-feedback">
                                        <div>Seleccione una imagen</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Imagen 4:</label>
                                    <input type="file" onchange="previewFile4()" class="form-control img-4-input" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="image-4" />
                                    <img class="img-4-pre" src=<?php echo $ext_img_4 ?> height="200" alt="Image preview...">
                                    <div class="invalid-feedback">
                                        <div>Seleccione una imagen</div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-btn">
                            <button class="btn btn-send" type="submit">
                                <div>Actualizar datos</div>
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
            img1 = reader.result;
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
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>
</body>

</html>