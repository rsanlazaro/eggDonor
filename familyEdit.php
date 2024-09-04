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

$sql = "SELECT * FROM family WHERE id=${id}";
$result = mysqli_query($conn, $sql);
if (!$result->num_rows) {
    header('location: /');
}
while ($row = mysqli_fetch_assoc($result)) {
    $member = $row['member'];
    $color_eyes = $row['color_eyes'];
    $color_hair = $row['color_hair'];
    $height = $row['height'];
    $weight = $row['weight'];
    $health = $row['health'];
}
?>
<main class="register">
    <div class="register-info">
        <h3>Editar información del familiar</h3>
    </div>
    <div class="register-form new-user">
        <div class="form-body">
            <div class="contact-form">
                <h2 class="contact-form-title">Familiar (<?php echo $member ?>)</h1>
                    <form class="form" action="updateFamily.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="col-md-12">
                            <label for="validationCustom01">Miembro de la familia</label>
                            <input type="text" class="form-control" id="validationCustom01" name="member" value="<?php echo $member ?>" required />
                            <div class="invalid-feedback">
                                <div>Ingrese el parentesco</div>
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
                                <label class="label-form" for="validationCustomUsername">Color del cabello</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="color_hair" required value="<?php echo $color_hair ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el color del cabello</div>
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
                                <label class="label-form" for="validationCustomUsername">Estado de salud</label>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="health" required value="<?php echo $health ?>" />
                                <div class="invalid-feedback">
                                    <div>Ingrese el estado de salud</div>
                                </div>
                            </div>
                        </div>
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

</body>

</html>