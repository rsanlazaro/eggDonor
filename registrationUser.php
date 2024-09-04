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

$conn = connectDB();


// When form submitted, insert values into the database.
if (isset($_REQUEST['username'])) {
    $usernameCheck = $_REQUEST['username'];
    $sql = "SELECT * FROM users WHERE username='${usernameCheck}'";
    $result = mysqli_query($conn, $sql);
    $repeat = $result->num_rows;
    if ($repeat > 0) {
        header("location: /registrationUser.php?msg=El nombre de usuario ya ha sido registrado. Por favor, seleccione otro.");
    } else {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $sql = "SELECT * FROM users WHERE username='${username}'";
        $result = mysqli_query($conn, $sql);
        $repeat = $result->num_rows;
        if ($repeat > 0) {
            header("location: /registrationUser.php?msg=El nombre de usuario ya ha sido registrado. Por favor, seleccione otro.");
        } else {
            $email    = stripslashes($_REQUEST['email']);
            $email    = mysqli_real_escape_string($conn, $email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);
            // $password = password_hash($password, PASSWORD_DEFAULT);
            $type = stripslashes($_REQUEST['type']);
            $type = mysqli_real_escape_string($conn, $type);
            $VIP = stripslashes($_REQUEST['VIP']);
            $VIP = mysqli_real_escape_string($conn, $VIP);
            $Plus = stripslashes($_REQUEST['Plus']);
            $Plus = mysqli_real_escape_string($conn, $Plus);
            $Elite = stripslashes($_REQUEST['Elite']);
            $Elite = mysqli_real_escape_string($conn, $Elite);
            $Fenotipe = stripslashes($_REQUEST['Fenotipe']);
            $Fenotipe = mysqli_real_escape_string($conn, $Fenotipe);
            $code = stripslashes($_REQUEST['code']);
            $code = mysqli_real_escape_string($conn, $code);
            date_default_timezone_set('America/Mexico_City');
            $create_datetime = date("y-m-d G:i:s");
            $query    = "INSERT into `users` (username, password, email, type, vip, plus, elite, fenotipo, code, date)
                    VALUES ('$username', '" . $password . "', '$email', '$type', '$VIP', '$Plus', '$Elite', '$Fenotipe', '$code', '$create_datetime')";
            $result   = mysqli_query($conn, $query);
            if ($result) {
                header("Location: users.php?msg=El usuario se ha creado exitosamente");
            } else {
                header("Location: users.php?msg=Hubo un problema registrando al usuario. Por favor, intente nuevamente");
            }
        }
    }
} else {
    $sql = "SELECT * FROM donants WHERE profile='Fenotipe'";
    $result = mysqli_query($conn, $sql);
    $index = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $code[$index++] = $row['code'];
    }
?>
    <main class="register">
        <div class="register-info">
            <h3>Ingresar información de usuario</h3>
        </div>
        <?php if (isset($_GET['msg'])) { ?>

            <p class="error"><?php echo $_GET['msg']; ?></p>

        <?php } ?>
        <div class="register-form new-user">
            <div class="form-body">
                <div class="contact-form">
                    <h2 class="contact-form-title">Nuevo usuario</h1>
                        <form class="form" action="" method="post">
                            <div class="col-md-12">
                                <label for="validationCustom01">Nombre de usuario</label>
                                <input type="text" class="form-control" id="validationCustom01" name="username" required />
                                <div class="invalid-feedback">
                                    <div>Ingrese un nombre de usuario</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Correo electrónico</label>
                                    <input type="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="email" required />
                                    <div class="invalid-feedback">
                                        <div>Ingrese su correo electrónico</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Contraseña</label>
                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="password" required />
                                    <div class="invalid-feedback">
                                        <div>Ingrese su contraseña</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="type-select">Tipo de usuario</label>
                                    <div class="form-control">
                                        <select name="type" class="selector" id="type-select">
                                            <option value="user">IP</option>
                                            <option value="agency">Agencia</option>
                                            <?php if ($_SESSION['type'] === 'admin') { ?>
                                                <option value="admin">Admin</option>
                                                <option value="admin-jr">Usuario</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        <div>Seleccione un tipo de usuario</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="type-select">Fenotipo</label>
                                    <div class="form-control">
                                        <select name="Fenotipe" class="selector" id="type-select">
                                            <option value="0">No</option>
                                            <option value="1">Sí</option>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        <div>Seleccione un tipo de acceso</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="type-select">Plus</label>
                                    <div class="form-control">
                                        <select name="Plus" class="selector" id="type-select">
                                            <option value="0">No</option>
                                            <option value="1">Sí</option>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        <div>Seleccione un tipo de acceso</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="type-select">VIP</label>
                                    <div class="form-control">
                                        <select name="VIP" class="selector" id="type-select">
                                            <option value="0">No</option>
                                            <option value="1">Sí</option>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        <div>Seleccione un tipo de acceso</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="type-select">Elite</label>
                                    <div class="form-control">
                                        <select name="Elite" class="selector" id="type-select">
                                            <option value="0">No</option>
                                            <option value="1">Sí</option>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        <div>Seleccione un tipo de acceso</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="ID-select">Referencia de fenotipo</label>
                                    <div class="form-control">
                                        <select name="code" class="selector" id="ID-select">
                                            <option value="-">-</option>
                                            <?php for ($i = 0; $i <= $index - 1; $i++) { ?>
                                                <option value="<?php echo $code[$i] ?>"> <?php echo $code[$i] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        <div>Seleccione un ID de fenotipo</div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="has-validation">
                                    <label class="label-form" for="validationCustomUsername">Referencia de fenotipo</label>
                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="code" />
                                    <div class="invalid-feedback">
                                        <div>Ingrese el ID del fenotipo</div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-btn">
                                <button class="btn btn-send" type="submit">
                                    <div>Crear usuario</div>
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </main>
<?php } ?>
</body>

</html>