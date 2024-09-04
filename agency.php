<?php
include 'includes/templates/header.php';
include "includes/app.php";

if (!$_SESSION['login']) {
    header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr' || $_SESSION['type'] === 'agency')) {
        header('location: /index.php');
    }
}

$conn = connectDB();
if (isset($_GET['code'])) {
    $donant_code_search = $_GET['code'];
}
$idAgency = $_SESSION['username'];

$sql = "SELECT * FROM donants WHERE agency='${idAgency}'";
$result = mysqli_query($conn, $sql);
$index = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $id[++$index] = $row['id'];
    $nationality[$index] = $row['nationality'];
    $date_birth[$index] = $row['date_birth'];
    $color_eyes[$index] = $row['color_eyes'];
    $color_skin[$index] = $row['color_skin'];
    $blood_type[$index] = $row['blood_type'];
    $height[$index] = $row['height'];
    $weight[$index] = $row['weight'];
    $education[$index] = $row['education'];
    $color_hair[$index] = $row['color_hair'];
    $type_hair[$index] = $row['type_hair'];
    $type_body[$index] = $row['type_body'];
    $ocupation[$index] = $row['ocupation'];
    $profile[$index] = $row['profile'];
    $supplier[$index] = $row['supplier'];
    $price[$index] = $row['price'];
    $code[$index] = $row['code'];
}

?>

<main class="register">
    <div class="register-info">
        <h3>Donantes registradas</h3>
    </div>
    <?php if (isset($_GET['msg'])) { ?>
        <p class="error"><?php echo $_GET['msg']; ?></p>
    <?php } ?>
    <p>Hay un total de <?php echo $index ?> donantes registradas</p>
    <div class="menu-users">
        <div class="create-user">
            <a href="registrationDonant.php">
                Nueva donante
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
                    <input type="search" id="searchBox" placeholder="Filtrar..." value="<?php if (isset($donant_code_search)) {
                        echo $donant_code_search; } ?>"/>
                </div>
            </div>
        </div>
        <table class="responsive-table myTable table hover" id="myTable">
            <thead>
                <tr class="thead">
                    <th onclick="sortTable(0)">ID</th>
                    <th onclick="sortTable(1)">Origen/Etnia</th>
                    <th onclick="sortTable(2)">Año</th>
                    <th onclick="sortTable(3)">Color de ojos</th>
                    <th onclick="sortTable(4)">Color de piel</th>
                    <th onclick="sortTable(5)">Altura (m)</th>
                    <th onclick="sortTable(6)">Peso (kg)</th>
                    <th onclick="sortTable(7)">Color de cabello</th>
                    <th onclick="sortTable(8)">Tipo de cabello</th>
                    <th onclick="sortTable(9)">Perfil</th>
                    <th onclick="sortTable(10)">Proveedor</th>
                    <th onclick="sortTable(11)">Precio</th>
                    <th onclick="sortTable(12)">Familia</th>
                    <th onclick="sortTable(12)">Demográficos</th>
                    <?php if ($_SESSION['type'] === 'admin') { ?>
                        <th colspan="2">Acciones</th>
                    <?php } else { ?>
                        <th>Editar</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i <= $index; $i++) { ?>
                    <tr>
                        <td scope="row"><?php if (isset($code[$i])) {
                                            echo $code[$i];
                                        } else {
                                            echo "-";
                                        } ?></td>
                        <td data-title="Origen/Etnia"><?php if (isset($nationality[$i])) {
                                                            echo $nationality[$i];
                                                        } else {
                                                            echo "-";
                                                        } ?></td>
                        <td data-title="Año de nacimiento"><?php if (isset($date_birth[$i])) {
                                                                echo $date_birth[$i];
                                                            } else {
                                                                echo "-";
                                                            } ?></td>
                        <td data-title="Color de ojos"><?php if (isset($color_eyes[$i])) {
                                                            echo $color_eyes[$i];
                                                        } else {
                                                            echo "-";
                                                        } ?></td>
                        <td data-title="Color de piel"><?php if (isset($color_skin[$i])) {
                                                            echo $color_skin[$i];
                                                        } else {
                                                            echo "-";
                                                        } ?></td>
                        <td data-title="Altura"><?php if (isset($height[$i])) {
                                                    echo $height[$i];
                                                } else {
                                                    echo "-";
                                                } ?> </td>
                        <td data-title="Peso"><?php if (isset($weight[$i])) {
                                                    echo $weight[$i];
                                                } else {
                                                    echo "-";
                                                } ?> </td>
                        <td data-title="Color de cabello"><?php echo $color_hair[$i] ?></td>
                        <td data-title="Tipo de cabello"><?php if (isset($type_hair[$i])) {
                                                                echo $type_hair[$i];
                                                            } else {
                                                                echo "-";
                                                            } ?></td>
                        <td data-title="Perfil"><?php if (isset($profile[$i])) {
                                                    if ($profile[$i] === "Fenotipe") {
                                                        echo "Fenotipo";
                                                    } else {
                                                        echo $profile[$i];
                                                    }
                                                } else {
                                                    echo "-";
                                                } ?></td>
                        <td data-title="Proveedor"><?php if (isset($supplier[$i])) {
                                                        echo $supplier[$i];
                                                    } else {
                                                        echo "-";
                                                    } ?></td>
                        <td data-title="Precio"><?php
                                                if (isset($price[$i])) {
                                                    // if ($price[$i] == 0) {
                                                    //     echo "-";
                                                    // } else {
                                                    //     if ($profile[$i] == "Plus") {
                                                    //         echo "-";
                                                    //     } else {
                                                    //         $pattern = "/DVIP/i";
                                                    //         if (preg_match($pattern, $code[$i])) {
                                                    //             echo "4.000 " . "\xE2\x82\xAc";
                                                    //         } else {
                                                    //             if ($profile[$i] == "Elite") {
                                                    //                 echo number_format($price[$i], 2, ',', '.') . " MXN";
                                                    //             } else {
                                                    //                 echo number_format($price[$i], 2, ',', '.') . " " . "\xE2\x82\xAc";
                                                    //             }
                                                    //         }
                                                    //     }
                                                    // } 
                                                    echo $price[$i];
                                                } else {
                                                    echo "-";
                                                } ?></td>
                        <td>
                            <a href="donantFamily.php?id=<?php echo $id[$i]; ?>">Ver</a>
                        </td>
                        <td>
                            <a href="donantDemographics.php?id=<?php echo $id[$i]; ?>">Ver</a>
                        </td>
                        <td>
                            <a href="donantEdit.php?id=<?php echo $id[$i]; ?>">Editar</a>
                        </td>
                        <?php if ($_SESSION['type'] === 'admin') { ?>
                            <td>
                                <form method="POST" class="form-table" action="deleteDonant.php">
                                    <input type="hidden" value="<?php echo $id[$i]; ?>" name="id">
                                    <input type="submit" onclick="return confirm('¿Deseas eliminar el registro de la donante?')" class="boton-rojo-block" value="Eliminar">
                                </form>
                            </td>
                        <?php } ?>
                    </tr>
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
    <script>
        window.onload = function() {
            const trs = document.querySelectorAll('.myTable' + ' tr:not(.header)');
            trs.forEach(tr => tr.style.display = [...tr.children].find(td => td.innerHTML.toUpperCase().includes(filter)) ? '' : 'none');
        };
    </script>
    <!-- Pagination -->
    <script>
        const filter = document.querySelector('#searchBox').value;

        let options = {
            numberPerPage: 10, //Cantidad de datos por pagina
            goBar: true, //Barra donde puedes digitar el numero de la pagina al que quiere ir
            pageCounter: true, //Contador de paginas, en cual estas, de cuantas paginas
        };
        let filterOptions = {
            el: "#searchBox", //Caja de texto para filtrar, puede ser una clase o un ID
        };
        paginate.init(".myTable", options, filterOptions);
        const e2 = document.querySelector('#searchBox');
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
    </script>
</main>