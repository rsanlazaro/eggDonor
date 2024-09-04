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

$donant_id = $_SESSION['donant_id'];
$id = $_GET['id'];

$conn = connectDB();

// When form submitted, insert values into the database.
if (isset($_REQUEST['member'])) {
    $member = stripslashes($_REQUEST['member']);
    $member = mysqli_real_escape_string($conn, $member);
    $color_eyes = stripslashes($_REQUEST['color_eyes']);
    $color_eyes = mysqli_real_escape_string($conn, $color_eyes);
    $color_hair = stripslashes($_REQUEST['color_hair']);
    $color_hair = mysqli_real_escape_string($conn, $color_hair);
    $height = stripslashes($_REQUEST['height']);
    $height = mysqli_real_escape_string($conn, $height);
    $weight = stripslashes($_REQUEST['weight']);
    $weight = mysqli_real_escape_string($conn, $weight);
    $health = stripslashes($_REQUEST['health']);
    $health = mysqli_real_escape_string($conn, $health);
    $query    = "INSERT into `family` (member, color_eyes, color_hair, height, weight, health, donant_id)
                    VALUES ('$member', '$color_eyes', '$color_hair', '$height', '$weight', '$health', '$donant_id')";
    $result   = mysqli_query($conn, $query);
    if ($result) {
        if (isset($_SESSION['donant_id'])) {
            header("Location: donantFamily.php?id=" . $_SESSION['donant_id'] . "&msg=Los datos se han actualizado correctamente");
        } else {
            if ($_SESSION['type'] == "agency") {
                header("Location: agency.php?msg=Los datos se han actualizado correctamente");
            } else {
                header("Location: donants.php?msg=Los datos se han actualizado correctamente");
            }
        }
    } else {
        header("Location: donantFamily.php?id=" . $_SESSION['donant_id'] . "&msg=Hubo un error realizando el registro. Por favor, intente nuevamente");
    }
} else {
?>
    <main class="register">
        <div class="register-info">
            <h3>Ingresar información del familiar</h3>
        </div>
        <?php if (isset($_GET['msg'])) { ?>

            <p class="error"><?php echo $_GET['msg']; ?></p>

        <?php } ?>
        <div class="register-form new-user">
            <div class="form-body">
                <div class="contact-form">
                    <h2 class="contact-form-title">Nuevo familiar</h1>
                        <form class="form" action="" method="post">
                            <div class="col-md-12">
                                <label for="validationCustom01">Miembro de la familia</label>
                                <input type="text" class="form-control" id="validationCustom01" name="member" required />
                                <div class="invalid-feedback">
                                    <div>Ingrese el parentesco</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Color de ojos</label>
                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="color_eyes" required />
                                    <div class="invalid-feedback">
                                        <div>Ingrese el color de los ojos</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Color del cabello</label>
                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="color_hair" required />
                                    <div class="invalid-feedback">
                                        <div>Ingrese el color del cabello</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Altura (m)</label>
                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="height" required />
                                    <div class="invalid-feedback">
                                        <div>Ingrese la altura</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Peso (kg)</label>
                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="weight" required />
                                    <div class="invalid-feedback">
                                        <div>Ingrese el peso</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Estado de salud</label>
                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="health" required />
                                    <div class="invalid-feedback">
                                        <div>Ingrese el estado de salud</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <button class="btn btn-send" type="submit">
                                    <div>Crear familiar</div>
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <div class="menu-users">
            <div class="create-user">
                <a href="donantFamily.php?id=<?php echo $id; ?>">
                    Regresar
                </a>
            </div>
        </div>
    </main>
<?php } ?>
</body>

</html>