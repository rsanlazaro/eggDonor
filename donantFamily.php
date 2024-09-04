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

$id_query = $_GET['id'];
$_SESSION['donant_id'] = $id_query;
$conn = connectDB();
$index = 0;
$sql = "SELECT * FROM family WHERE donant_id=${id_query}";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id[++$index] = $row['id'];
    $member[$index] = $row['member'];
    $color_eyes[$index] = $row['color_eyes'];
    $color_hair[$index] = $row['color_hair'];
    $height[$index] = $row['height'];
    $weight[$index] = $row['weight'];
    $health[$index] = $row['health'];
}

$sql = "SELECT * FROM donants WHERE id=${id_query}";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $code = $row['code'];
}
?>
<main class="register">
    <div class="register-info">
        <h3>Familia del donante <?php echo $code; ?></h3>
    </div>
    <?php if (isset($_GET['msg'])) { ?>
        <p class="error"><?php echo $_GET['msg']; ?></p>
    <?php } ?>
    <div class="menu-users">
        <div class="create-user">
            <a href="registrationFamily.php?id=<?php echo $id_query; ?>">
                Nuevo familiar 
            </a>
        </div>
    </div>

    <div class="container lab-pagination">
        <table class="responsive-table myTable table hover" id="myTable">
            <thead>
                <tr class="thead">
                    <th onclick="sortTable(0)">Miembro de la familia</th>
                    <th onclick="sortTable(1)">Color de ojos</th>
                    <th onclick="sortTable(2)">Color de cabello</th>
                    <th onclick="sortTable(3)">Altura (m)</th>
                    <th onclick="sortTable(4)">Peso (kg)</th>
                    <th onclick="sortTable(5)">Estado de salud</th>
                    <?php if ($_SESSION['type'] === 'admin') { ?>
                        <th colspan="2">Acciones</th>
                    <?php } else { ?>
                        <th>Editar</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($index)) { ?>
                    <?php for ($i = 1; $i <= $index; $i++) { ?>
                        <tr>
                            <td data-title="Miembro de la familia"><?php if (isset($member[$i])) {
                                                                        echo $member[$i];
                                                                    } else {
                                                                        echo "-";
                                                                    } ?></td>
                            <td data-title="Color de ojos"><?php if (isset($color_eyes[$i])) {
                                                                echo $color_eyes[$i];
                                                            } else {
                                                                echo "-";
                                                            } ?></td>
                            <td data-title="Color del cabello"><?php if (isset($color_hair[$i])) {
                                                                    echo $color_hair[$i];
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
                            <td data-title="Estado de salud"><?php echo $health[$i] ?></td>
                            <td>
                                <a href="familyEdit.php?id=<?php echo $id[$i]; ?>">Editar</a>
                            </td>
                            <?php if ($_SESSION['type'] === 'admin') { ?>
                                <td>
                                    <form method="POST" class="form-table" action="deleteFamily.php">
                                        <input type="hidden" value="<?php echo $id[$i]; ?>" name="id">
                                        <input type="submit" onclick="return confirm('¿Deseas eliminar el registro del familiar?')" class="boton-rojo-block" value="Eliminar">
                                    </form>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="menu-users">
        <div class="create-user">
            <a href=<?php if ($_SESSION['type'] == "agency") { echo "agency.php?code=" . $code;} else { echo "donants.php?code=" . $code;} ?>>
                Regresar
            </a>
        </div>
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
            numberPerPage: 10, //Cantidad de datos por pagina
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
    </script>
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
</script>
</body>

</html>