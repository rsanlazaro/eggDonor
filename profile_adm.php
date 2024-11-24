<?php
include 'includes/templates/header.php';
include "includes/app.php";

if (!$_SESSION['login']) {
    header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr')) {
        header('location: /index.php');
    }
}

$conn = connectDB();

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$index = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $user[++$index] = $row['username'];
    $pass[$index] = $row['password'];
    $mail[$index] = $row['email'];
    $type[$index] = $row['type'];
    $id[$index] = $row['id'];
    $vip[$index] = $row['vip'];
    $plus[$index] = $row['plus'];
    $elite[$index] = $row['elite'];
    $fenotipo[$index] = $row['fenotipo'];
    $donante_1[$index] = $row['donant_1'];
    $donante_2[$index] = $row['donant_2'];
    $donante_3[$index] = $row['donant_3'];
    $code[$index] = $row['code'];
    $date[$index] = $row['date'];
}

?>

<main class="register">
    <div class="register-info">
        <h3>Perfiles registrados</h3>
    </div>

    <?php if (isset($_GET['msg'])) { ?>

        <p class="error"><?php echo $_GET['msg']; ?></p>

    <?php } ?>

    <p>Hay un total de <?php echo $index - 1 ?> Perfiles registrados</p>
    <div class="menu-users">
        <div class="create-user">
            <a href="registrationUser.php">
                Nuevo Perfil
            </a>
        </div>
        <div class="logout">
            <a href="logout.php">
                Cerrar sesión
            </a>
        </div>
    </div>

    <div class="container lab-pagination">
        <div class="panel">
            <div class="body">
                <div class="input-group">
                    <label for="searchBox">Búsqueda</label>
                    <input type="search" id="searchBox" placeholder="Filtrar..." />
                </div>
            </div>
        </div>
        <table class="responsive-table myTable table hover" id="myTable">
            <thead>
                <tr class="thead">
                    <th onclick="sortTable(0)">Usuario</th>
                    <?php if ($_SESSION['type'] === 'admin') { ?>
                    <th onclick="sortTable(1)">Password</th>
                    <?php } ?>
                    <th onclick="sortTable(2)">E-mail</th>
                    <th onclick="sortTable(3)">Acceso</th>
                    <!-- <th>Fenotipo</th> -->
                    <th>Fenotipo</th>
                    <th>VIP</th>
                    <th>Plus</th>
                    <th>Elite</th>
                    <th onclick="sortTable(8)">ID fenotipo</th>
                    <th colspan="3">Donantes seleccionadas</th>
                    <?php if ($_SESSION['type'] === 'admin') { ?>
                        <th colspan="2">Acciones</th>
                    <?php } else { ?>
                        <th>Editar</th>
                    <?php } ?>
                    <th onclick="sortTable(11)">Creación</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i <= $index; $i++) { ?>
                    <?php if (!($type[$i] === "user")) { ?>
                        <?php if ($fenotipo[$i] === "1") {
                            $idOff = $id[$i];
                            $vip[$i] = 0;
                            $plus[$i] = 0;
                            $elite[$i] = 0;
                            $query = "UPDATE `users` SET `vip`=0, `plus`=0, `elite`=0 WHERE id = ${idOff}";
                            $result = mysqli_query($conn, $query);
                        }
                        ?>
                        <?php if (!($user[$i] == 'SaludConceptAdmin')) { ?>
                            <tr>
                                <td data-title="Nombre de usuario" scope="row"><?php
                                                $idUser = $id[$i];
                                                $sql = "SELECT * FROM form WHERE userId=${idUser}";
                                                $result = mysqli_query($conn, $sql);
                                                $foundForm = $result->num_rows;
                                                $usernameTable = $user[$i];
                                                if ($foundForm > 0) {
                                                    echo "<a href='formData.php?id=" . $idUser . "'>" . $usernameTable . "</a>";
                                                } else {
                                                    echo $usernameTable;
                                                }

                                                ?></td>
                                <?php if ($_SESSION['type'] === 'admin') { ?>
                                <td data-title="Contraseña"><?php echo $pass[$i] ?></td>
                                <?php } ?>
                                <td data-title="Correo electrónico"><?php echo $mail[$i] ?></td>
                                <td data-title="Perfil">
                                    <?php if ($type[$i] === "user") {
                                        echo "IP";
                                    } elseif ($type[$i] === "admin") {
                                        echo "Admin";
                                    } else {
                                        echo "Usuario";
                                    } ?>
                                </td>
                                <td data-title="Fenotipo">
                                    <?php
                                    if ($fenotipo[$i] == "1") {
                                        echo
                                        "<a onclick='ActivateBtnFenotipe($id[$i])' id='fenotipe-" . $id[$i] . "' class='btn-green'></a>";
                                    } else {
                                        echo
                                        "<a onclick='ActivateBtnFenotipe($id[$i])' id='fenotipe-" . $id[$i] . "' class='btn-gray'></a>";
                                    }
                                    ?>
                                </td>
                                <td data-title="VIP">
                                    <?php
                                    if ($vip[$i] == "1") {
                                        echo
                                        "<a onclick='ActivateBtnVIP($id[$i])' id='vip-" . $id[$i] . "' class='btn-green'></a>";
                                    } else {
                                        echo
                                        "<a onclick='ActivateBtnVIP($id[$i])' id='vip-" . $id[$i] . "' class='btn-gray'></a>";
                                    }
                                    ?>
                                </td>
                                <td data-title="Plus">
                                    <?php
                                    if ($plus[$i] == "1") {
                                        echo
                                        "<a onclick='ActivateBtnPlus($id[$i])' id='plus-" . $id[$i] . "' class='btn-green'></a>";
                                    } else {
                                        echo
                                        "<a onclick='ActivateBtnPlus($id[$i])' id='plus-" . $id[$i] . "' class='btn-gray'></a>";
                                    }
                                    ?>
                                </td>
                                <td data-title="Elite">
                                    <?php
                                    if ($elite[$i] == "1") {
                                        echo
                                        "<a onclick='ActivateBtnElite($id[$i])' id='elite-" . $id[$i] . "' class='btn-green'></a>";
                                    } else {
                                        echo
                                        "<a onclick='ActivateBtnElite($id[$i])' id='elite-" . $id[$i] . "' class='btn-gray'></a>";
                                    }
                                    ?>
                                </td>
                                <td data-title="ID Fenotipo"><?php if (isset($code[$i])) {
                                                                    if ($code[$i] === "") {
                                                                        echo "-";
                                                                    } else {
                                                                        echo $code[$i];
                                                                    }
                                                                } else {
                                                                    echo "-";
                                                                } ?></td>
                                <td data-title="Donante 1"><?php if (isset($donante_1[$i])) {
                                                                if ($donante_1[$i] === "") {
                                                                    echo "-";
                                                                } else {
                                                                    echo $donante_1[$i];
                                                                }
                                                            } else {
                                                                echo "-";
                                                            } ?></td>
                                <td data-title="Donante 2"><?php if (isset($donante_2[$i])) {
                                                                if ($donante_2[$i] === "") {
                                                                    echo "-";
                                                                } else {
                                                                    echo $donante_2[$i];
                                                                }
                                                            } else {
                                                                echo "-";
                                                            } ?></td>
                                <td data-title="Donante 3"><?php if (isset($donante_3[$i])) {
                                                                if ($donante_3[$i] === "") {
                                                                    echo "-";
                                                                } else {
                                                                    echo $donante_3[$i];
                                                                }
                                                            } else {
                                                                echo "-";
                                                            } ?></td>
                                <td>
                                    <a href="user.php?id=<?php echo $id[$i]; ?>">Editar</a>
                                </td>
                                <?php if ($_SESSION['type'] === 'admin') { ?>
                                    <td>
                                        <form method="POST" class="form-table" action="deleteUser.php">
                                            <input type="hidden" name="id" value="<?php echo $id[$i]; ?>">
                                            <input type="submit" onclick="return confirm('¿Deseas eliminar al usuario?')" class="boton-rojo-block" value="Eliminar">
                                        </form>
                                    </td>
                                <?php } ?>
                                <td data-title="Creación"><?php echo $date[$i] ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure?');
        }
    </script>
    <!-- Custom JS -->
    <script src="build/js/bundle2.min.js"></script>
    <!-- Pagination -->
    <script>
        let options = {
            numberPerPage: 30, //Cantidad de datos por pagina
            goBar: true, //Barra donde puedes digitar el numero de la pagina al que quiere ir
            pageCounter: true, //Contador de paginas, en cual estas, de cuantas paginas
        };
        let filterOptions = {
            el: "#searchBox", //Caja de texto para filtrar, puede ser una clase o un ID
        };
        paginate.init(".myTable", options, filterOptions);
    </script>

    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("myTable");
            switching = true;
            //Set the sorting direction to ascending:
            dir = "asc";
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    /*check if the two rows should switch place,
                    based on the direction, asc or desc:*/
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    //Each time a switch is done, increase this count by 1:
                    switchcount++;
                } else {
                    /*If no switching has been done AND the direction is "asc",
                    set the direction to "desc" and run the while loop again.*/
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

        function ActivateBtnFenotipe(i) {
            btn = document.getElementById('fenotipe-' + i);
            btn2 = document.querySelector(".btn-green" + "#fenotipe-" + i);
            btnPlus = document.getElementById('plus-' + i);
            btnElite = document.getElementById('elite-' + i);
            btnVIP = document.getElementById('vip-' + i);
            var date = new Date();
            date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
            document.cookie = "id" + "=" + i + expires + "; path=/";
            document.cookie = "type" + "=" + "Fenotipe" + expires + "; path=/";
            if (btn2 === null) {
                btn.classList.remove("btn-gray");
                btn.classList.add("btn-green");
                btnPlus.classList.remove("btn-green");
                btnPlus.classList.add("btn-gray");
                btnElite.classList.remove("btn-green");
                btnElite.classList.add("btn-gray");
                btnVIP.classList.remove("btn-green");
                btnVIP.classList.add("btn-gray");
                fetch("activateBtnFenotipe.php")
                    .then(res => res.text())
                    .then(txt => console.log(txt))
                    .catch(err => console.error(err));
                return false;
            } else {
                btn.classList.add("btn-gray");
                btn.classList.remove("btn-green");
                fetch("deactivateBtn.php")
                    .then(res => res.text())
                    .then(txt => console.log(txt))
                    .catch(err => console.error(err));
                return false;
            }
        }

        function ActivateBtnPlus(i) {
            btn = document.getElementById('plus-' + i);
            btn2 = document.querySelector(".btn-green" + "#plus-" + i);
            btnFenotipe = document.querySelector(".btn-green" + "#fenotipe-" + i);
            var date = new Date();
            date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
            document.cookie = "id" + "=" + i + expires + "; path=/";
            document.cookie = "type" + "=" + "Plus" + expires + "; path=/";
            if ((btnFenotipe === null)) {
                if (btn2 === null) {
                    btn.classList.remove("btn-gray");
                    btn.classList.add("btn-green");
                    fetch("activateBtn.php")
                        .then(res => res.text())
                        .then(txt => console.log(txt))
                        .catch(err => console.error(err));
                    return false;
                } else {
                    btn.classList.add("btn-gray");
                    btn.classList.remove("btn-green");
                    fetch("deactivateBtn.php")
                        .then(res => res.text())
                        .then(txt => console.log(txt))
                        .catch(err => console.error(err));
                    return false;
                }
            }
        }

        function ActivateBtnElite(i) {
            btn = document.getElementById('elite-' + i);
            btn2 = document.querySelector(".btn-green" + "#elite-" + i);
            btnFenotipe = document.querySelector(".btn-green" + "#fenotipe-" + i);
            var date = new Date();
            date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
            document.cookie = "id" + "=" + i + expires + "; path=/";
            document.cookie = "type" + "=" + "Elite" + expires + "; path=/";
            if ((btnFenotipe === null)) {
                if (btn2 === null) {
                    btn.classList.remove("btn-gray");
                    btn.classList.add("btn-green");
                    fetch("activateBtn.php")
                        .then(res => res.text())
                        .then(txt => console.log(txt))
                        .catch(err => console.error(err));
                    return false;
                } else {
                    btn.classList.add("btn-gray");
                    btn.classList.remove("btn-green");
                    fetch("deactivateBtn.php")
                        .then(res => res.text())
                        .then(txt => console.log(txt))
                        .catch(err => console.error(err));
                    return false;
                }
            }
        }

        function ActivateBtnVIP(i) {
            btn = document.getElementById('vip-' + i);
            btn2 = document.querySelector(".btn-green" + "#vip-" + i);
            btnFenotipe = document.querySelector(".btn-green" + "#fenotipe-" + i);
            var date = new Date();
            date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
            document.cookie = "id" + "=" + i + expires + "; path=/";
            document.cookie = "type" + "=" + "VIP" + expires + "; path=/";
            if ((btnFenotipe === null)) {
                if (btn2 === null) {
                    btn.classList.remove("btn-gray");
                    btn.classList.add("btn-green");
                    fetch("activateBtn.php")
                        .then(res => res.text())
                        .then(txt => console.log(txt))
                        .catch(err => console.error(err));
                    return false;
                } else {
                    btn.classList.add("btn-gray");
                    btn.classList.remove("btn-green");
                    fetch("deactivateBtn.php")
                        .then(res => res.text())
                        .then(txt => console.log(txt))
                        .catch(err => console.error(err));
                    return false;
                }
            }
        }
    </script>
</main>