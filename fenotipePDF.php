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

$id = $_GET['id'];
$conn = connectDB();

if (isset($_GET['code'])) {
    $donant_code_search = $_GET['code'];
}

$sql = "SELECT * FROM donants WHERE id=${id}";
$result = mysqli_query($conn, $sql);
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
    $code = $row['code'];
    $supplier = $row['supplier'];
    $price = $row['price'];
    $hobbie = $row['hobbie'];
    $color_favorite = $row['color_favorite'];
    $animal_favorite = $row['animal_favorite'];
    $book_movie_favorite = $row['book_movie_favorite'];
    $goal = $row['goal'];
    $dream = $row['dream'];
    $ovarian_reserve = $row['ovarian_reserve'];
    $agency = $row['agency'];
    $ext_img_1 = $row['ext_img_1'];
    $ext_img_2 = $row['ext_img_2'];
    $ext_img_3 = $row['ext_img_3'];
    $ext_img_4 = $row['ext_img_4'];
}

$sql = "SELECT * FROM demographics WHERE donant_id=${id}";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    $index = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $donant_adict = $row['donant_adict'];
        $donant_alergy = $row['donant_alergy'];
        $donant_eyes = $row['donant_eyes'];
        $donant_dream = $row['donant_dream'];
        $donant_jewesh = $row['donant_jewesh'];
        $donant_autism = $row['donant_autism'];
        $donant_cancer = $row['donant_cancer'];
        $donant_cario = $row['donant_cario'];
        $donant_surgery = $row['donant_surgery'];
        $donant_congenit = $row['donant_congenit'];
        $donant_mental = $row['donant_mental'];
        $donant_diabetes = $row['donant_diabetes'];
        $donant_heart = $row['donant_heart'];
        $donant_inmune = $row['donant_inmune'];
        $donant_metabolic = $row['donant_metabolic'];
        $donant_skin = $row['donant_skin'];
        $donant_psycho = $row['donant_psycho'];
        $donant_renal = $row['donant_renal'];
        $donant_ets = $row['donant_ets'];
        $donant_esquizo = $row['donant_esquizo'];
        $donant_sx = $row['donant_sx'];
        $donant_hemo = $row['donant_hemo'];
        $donant_artery = $row['donant_artery'];
        $donant_parkinson = $row['donant_parkinson'];
        $donant_diet = $row['donant_diet'];
        $donant_cigar = $row['donant_cigar'];
        $family_adict = $row['family_adict'];
        $family_alergy = $row['family_alergy'];
        $family_eyes = $row['family_eyes'];
        $family_dream = $row['family_dream'];
        $family_jewesh = $row['family_jewesh'];
        $family_autism = $row['family_autism'];
        $family_cancer = $row['family_cancer'];
        $family_cario = $row['family_cario'];
        $family_surgery = $row['family_surgery'];
        $family_congenit = $row['family_congenit'];
        $family_mental = $row['family_mental'];
        $family_diabetes = $row['family_diabetes'];
        $family_heart = $row['family_heart'];
        $family_inmune = $row['family_inmune'];
        $family_metabolic = $row['family_metabolic'];
        $family_skin = $row['family_skin'];
        $family_psycho = $row['family_psycho'];
        $family_renal = $row['family_renal'];
        $family_ets = $row['family_ets'];
        $family_esquizo = $row['family_esquizo'];
        $family_sx = $row['family_sx'];
        $family_hemo = $row['family_hemo'];
        $family_artery = $row['family_artery'];
        $family_parkinson = $row['family_parkinson'];
        $family_diet = $row['family_diet'];
        $family_cigar = $row['family_cigar'];
    }
}

$index = 0;
$sql = "SELECT * FROM family WHERE donant_id=${id}";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id_fam[++$index] = $row['id'];
    $member_fam[$index] = $row['member'];
    $color_eyes_fam[$index] = $row['color_eyes'];
    $color_hair_fam[$index] = $row['color_hair'];
    $height_fam[$index] = $row['height'];
    $weight_fam[$index] = $row['weight'];
    $health_fam[$index] = $row['health'];
}
?>

<main>
    <div class="form-header">
        <div class="form-header-title form-white">
            <div class="spanish">
                Datos de fenotipo <?php echo $code; ?>
            </div>
        </div>
    </div>
    <form class="form form-phenotype" action="report.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <div class="form-characteristics">
            <div class="form-subtitle form-white">
                <div class="spanish">Datos generales</div>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Nacionalidad: <?php echo $nationality; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Fecha de nacimiento: <?php echo $date_birth; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Educación: <?php echo $education; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Ocupación: <?php echo $ocupation; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Color de ojos: <?php echo $color_eyes; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Color de piel: <?php echo $color_skin; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Color de pelo: <?php echo $color_hair; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Tipo de pelo: <?php echo $type_hair; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Grupo sanguíneo: <?php echo $blood_type; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Estatura: <?php echo $height . " m"; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-characteristics">
            <div class="form-subtitle form-white">
                <div class="spanish">Datos familiares</div>
            </div>
        </div>
        <?php if (isset($index)) { ?>
            <?php for ($i = 1; $i <= $index; $i++) { ?>
                <div class="form-top">
                    <div class="col-md-6 form-top-element">
                        <label for="validationDefault01">
                            <div class="spanish">
                                Miembro de la familia: <?php if (isset($member_fam[$i])) {
                                                            echo $member_fam[$i];
                                                        } else {
                                                            echo "-";
                                                        } ?>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="form-top">
                    <div class="col-md-6 form-top-element">
                        <label for="validationDefault01">
                            <div class="spanish">
                                Color de ojos: <?php if (isset($color_eyes_fam[$i])) {
                                                    echo $color_eyes_fam[$i];
                                                } else {
                                                    echo "-";
                                                } ?>
                            </div>
                        </label>
                    </div>
                    <div class="col-md-6 form-top-element">
                        <label for="validationDefault01">
                            <div class="spanish">
                                Color de pelo: <?php if (isset($color_hair_fam[$i])) {
                                                    echo $color_hair_fam[$i];
                                                } else {
                                                    echo "-";
                                                } ?>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="form-top">
                    <div class="col-md-6 form-top-element">
                        <label for="validationDefault01">
                            <div class="spanish">
                                Estatura: <?php if (isset($height_fam[$i])) {
                                                echo $height_fam[$i];
                                            } else {
                                                echo "-";
                                            } ?>
                            </div>
                        </label>
                    </div>
                    <div class="col-md-6 form-top-element">
                        <label for="validationDefault01">
                            <div class="spanish">
                                Peso: <?php if (isset($weight_fam[$i])) {
                                            echo $weight_fam[$i];
                                        } else {
                                            echo "-";
                                        } ?>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="form-top">
                    <div class="col-md-6 form-top-element">
                        <label for="validationDefault01">
                            <div class="spanish">
                                Estado de salud: <?php if (isset($health_fam[$i])) {
                                                        echo $health_fam[$i];
                                                    } else {
                                                        echo "-";
                                                    } ?>
                            </div>
                        </label>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="form-characteristics">
            <div class="form-subtitle form-white">
                <div class="spanish">Antecedentes familiares</div>
            </div>
        </div>
        <table class="responsive-table myTable table hover" id="myTable">
            <thead>
                <tr class="thead">
                    <th onclick="sortTable(0)">Problemas médicos</th>
                    <th onclick="sortTable(1)">Donante</th>
                    <th onclick="sortTable(2)">Familiares</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-title="Problemas médicos">
                        Adicciones
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_adict" value="<?php echo $donant_adict ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_adict" value="<?php echo $family_adict ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Alergias
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_alergy" value="<?php echo $donant_alergy ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_alergy" value="<?php echo $family_alergy ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Alteración vista
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_eyes" value="<?php echo $donant_eyes ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_eyes" value="<?php echo $family_eyes ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Alteraciones sueño
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_dream" value="<?php echo $donant_dream ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_dream" value="<?php echo $family_dream ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Ascendencia judía
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_jewesh" value="<?php echo $donant_jewesh ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_jewesh" value="<?php echo $family_jewesh ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Autismo
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_autism" value="<?php echo $donant_autism ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_autism" value="<?php echo $family_autism ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Cáncer
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_cancer" value="<?php echo $donant_cancer ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_cancer" value="<?php echo $family_cancer ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Cariotipo
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_cario" value="<?php echo $donant_cario ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_cario" value="<?php echo $family_cario ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Cirugías
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_surgery" value="<?php echo $donant_surgery ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_surgery" value="<?php echo $family_surgery ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Defectos congénitos
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_congenit" value="<?php echo $donant_congenit ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_congenit" value="<?php echo $family_congenit ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Deficiencia mental
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_mental" value="<?php echo $donant_mental ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_mental" value="<?php echo $family_mental ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Diabetes
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_diabetes" value="<?php echo $donant_diabetes ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_diabetes" value="<?php echo $family_diabetes ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Enf. cardiovascular
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_heart" value="<?php echo $donant_heart ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_heart" value="<?php echo $family_heart ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Enf. inmunológica
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_inmune" value="<?php echo $donant_inmune ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_inmune" value="<?php echo $family_inmune ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Enf. metabólica
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_metabolic" value="<?php echo $donant_metabolic ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_metabolic" value="<?php echo $family_metabolic ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Enf. piel
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_skin" value="<?php echo $donant_skin ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_skin" value="<?php echo $family_skin ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Enf. psiquiátrica
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_psycho" value="<?php echo $donant_psycho ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_psycho" value="<?php echo $family_psycho ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Enf. renal
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_renal" value="<?php echo $donant_renal ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_renal" value="<?php echo $family_renal ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        ETS
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_ets" value="<?php echo $donant_ets ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_ets" value="<?php echo $family_ets ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Esquizofrenia
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_esquizo" value="<?php echo $donant_esquizo ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_esquizo" value="<?php echo $family_esquizo ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Gen SX frágil
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_sx" value="<?php echo $donant_sx ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_sx" value="<?php echo $family_sx ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Hemofilia
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_hemo" value="<?php echo $donant_hemo ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_hemo" value="<?php echo $family_hemo ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Hipertensión arterial
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_artery" value="<?php echo $donant_artery ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_artery" value="<?php echo $family_artery ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Parkinson
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_parkinson" value="<?php echo $donant_parkinson ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_parkinson" value="<?php echo $family_parkinson ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Restricciones dieta
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_diet" value="<?php echo $donant_diet ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_diet" value="<?php echo $family_diet ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-title="Problemas médicos">
                        Tabaquismo
                    </td>
                    <td data-title="Donante">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_cigar" value="<?php echo $donant_cigar ?>" disabled />
                            </div>
                        </div>
                    </td>
                    <td data-title="Familiares">
                        <div class="col-md-12">
                            <div class="has-validation">
                                <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_cigar" value="<?php echo $family_cigar ?>" disabled />
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="form-characteristics">
            <div class="form-subtitle form-white">
                <div class="spanish">Imágenes</div>
            </div>
        </div>
        <?php if (isset($ext_img_1) || isset($ext_img_2) || isset($ext_img_3) || isset($ext_img_4)) { ?>
            <div class="form-top">
                <?php if (isset($ext_img_1) || strlen($ext_img_1) > 5) { ?>
                    <div class="col-md-3">
                        <div class="has-validation">
                            <br>
                            <label class="label-form" for="validationCustomUsername">Imagen 1:</label>
                            <br>
                            <br>
                            <img class="img-1-pre" src=<?php echo $ext_img_1 ?> alt="Image preview...">
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($ext_img_2) || strlen($ext_img_2) > 5) { ?>
                    <div class="col-md-3">
                        <div class="has-validation">
                            <br>
                            <label class="label-form" for="validationCustomUsername">Imagen 2:</label>
                            <br>
                            <br>
                            <img class="img-2-pre" src=<?php echo $ext_img_2 ?> alt="Image preview...">
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($ext_img_3) || strlen($ext_img_3) > 5) { ?>
                    <div class="col-md-3">
                        <div class="has-validation">
                            <br>
                            <label class="label-form" for="validationCustomUsername">Imagen 3:</label>
                            <br>
                            <br>
                            <img class="img-2-pre" src=<?php echo $ext_img_3 ?> alt="Image preview...">
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($ext_img_4) || strlen($ext_img_4) > 5) { ?>
                    <div class="col-md-3">
                        <div class="has-validation">
                            <br>
                            <label class="label-form" for="validationCustomUsername">Imagen 4:</label>
                            <br>
                            <br>
                            <img class="img-3-pre" src=<?php echo $ext_img_4 ?> alt="Image preview...">
                        </div>
                    </div>
                <?php } ?>
            </div>
            <br>
        <?php } else { ?>
            <p>No hay imágenes registradas</p>
        <?php } ?>
        <div class="form-characteristics">
            <div class="form-subtitle form-white">
                <div class="spanish">Seleccione las secciones que desea incluir en el reporte</div>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="first">Datos Generales:</label>
                <select id="first" name="first">
                    <option value="yes">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="second">Datos de Familiares:</label>
                <select id="second" name="second">
                    <option value="yes">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="third">Antecedentes Familiares:</label>
                <select id="third" name="third">
                    <option value="yes">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="fourth">Imágenes:</label>
                <select id="fourth" name="fourth">
                    <option value="yes">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
        <br>
        <input type="hidden" name="nationality" value="<?php echo $nationality; ?>">
        <input type="hidden" name="date_birth" value="<?php echo $date_birth; ?>">
        <input type="hidden" name="color_eyes" value="<?php echo $color_eyes; ?>">
        <input type="hidden" name="color_skin" value="<?php echo $color_skin; ?>">
        <input type="hidden" name="blood_type" value="<?php echo $blood_type; ?>">
        <input type="hidden" name="height" value="<?php echo $height; ?>">
        <input type="hidden" name="weight" value="<?php echo $weight; ?>">
        <input type="hidden" name="education" value="<?php echo $education; ?>">
        <input type="hidden" name="color_hair" value="<?php echo $color_hair; ?>">
        <input type="hidden" name="type_hair" value="<?php echo $type_hair; ?>">
        <input type="hidden" name="type_body" value="<?php echo $type_body; ?>">
        <input type="hidden" name="ocupation" value="<?php echo $ocupation; ?>">
        <input type="hidden" name="profile" value="<?php echo $profile; ?>">
        <input type="hidden" name="code" value="<?php echo $code; ?>">
        <input type="hidden" name="supplier" value="<?php echo $supplier; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <input type="hidden" name="hobbie" value="<?php echo $hobbie; ?>">
        <input type="hidden" name="color_favorite" value="<?php echo $color_favorite; ?>">
        <input type="hidden" name="animal_favorite" value="<?php echo $animal_favorite; ?>">
        <input type="hidden" name="book_movie_favorite" value="<?php echo $book_movie_favorite; ?>">
        <input type="hidden" name="goal" value="<?php echo $goal; ?>">
        <input type="hidden" name="dream" value="<?php echo $dream; ?>">
        <input type="hidden" name="ovarian_reserve" value="<?php echo $ovarian_reserve; ?>">
        <input type="hidden" name="agency" value="<?php echo $agency; ?>">
        <input type="hidden" name="donant_adict" value="<?php echo $donant_adict; ?>">
        <input type="hidden" name="donant_alergy" value="<?php echo $donant_alergy; ?>">
        <input type="hidden" name="donant_eyes" value="<?php echo $donant_eyes; ?>">
        <input type="hidden" name="donant_dream" value="<?php echo $donant_dream; ?>">
        <input type="hidden" name="donant_jewesh" value="<?php echo $donant_jewesh; ?>">
        <input type="hidden" name="donant_autism" value="<?php echo $donant_autism; ?>">
        <input type="hidden" name="donant_cancer" value="<?php echo $donant_cancer; ?>">
        <input type="hidden" name="donant_cario" value="<?php echo $donant_cario; ?>">
        <input type="hidden" name="donant_surgery" value="<?php echo $donant_surgery; ?>">
        <input type="hidden" name="donant_congenit" value="<?php echo $donant_congenit; ?>">
        <input type="hidden" name="donant_mental" value="<?php echo $donant_mental; ?>">
        <input type="hidden" name="donant_diabetes" value="<?php echo $donant_diabetes; ?>">
        <input type="hidden" name="donant_heart" value="<?php echo $donant_heart; ?>">
        <input type="hidden" name="donant_inmune" value="<?php echo $donant_inmune; ?>">
        <input type="hidden" name="donant_metabolic" value="<?php echo $donant_metabolic; ?>">
        <input type="hidden" name="donant_skin" value="<?php echo $donant_skin; ?>">
        <input type="hidden" name="donant_psycho" value="<?php echo $donant_psycho; ?>">
        <input type="hidden" name="donant_renal" value="<?php echo $donant_renal; ?>">
        <input type="hidden" name="donant_ets" value="<?php echo $donant_ets; ?>">
        <input type="hidden" name="donant_esquizo" value="<?php echo $donant_esquizo; ?>">
        <input type="hidden" name="donant_sx" value="<?php echo $donant_sx; ?>">
        <input type="hidden" name="donant_hemo" value="<?php echo $donant_hemo; ?>">
        <input type="hidden" name="donant_artery" value="<?php echo $donant_artery; ?>">
        <input type="hidden" name="donant_parkinson" value="<?php echo $donant_parkinson; ?>">
        <input type="hidden" name="donant_diet" value="<?php echo $donant_diet; ?>">
        <input type="hidden" name="donant_cigar" value="<?php echo $donant_cigar; ?>">
        <input type="hidden" name="family_adict" value="<?php echo $family_adict; ?>">
        <input type="hidden" name="family_alergy" value="<?php echo $family_alergy; ?>">
        <input type="hidden" name="family_eyes" value="<?php echo $family_eyes; ?>">
        <input type="hidden" name="family_dream" value="<?php echo $family_dream; ?>">
        <input type="hidden" name="family_jewesh" value="<?php echo $family_jewesh; ?>">
        <input type="hidden" name="family_autism" value="<?php echo $family_autism; ?>">
        <input type="hidden" name="family_cancer" value="<?php echo $family_cancer; ?>">
        <input type="hidden" name="family_cario" value="<?php echo $family_cario; ?>">
        <input type="hidden" name="family_surgery" value="<?php echo $family_surgery; ?>">
        <input type="hidden" name="family_congenit" value="<?php echo $family_congenit; ?>">
        <input type="hidden" name="family_mental" value="<?php echo $family_mental; ?>">
        <input type="hidden" name="family_diabetes" value="<?php echo $family_diabetes; ?>">
        <input type="hidden" name="family_heart" value="<?php echo $family_heart; ?>">
        <input type="hidden" name="family_inmune" value="<?php echo $family_inmune; ?>">
        <input type="hidden" name="family_metabolic" value="<?php echo $family_metabolic; ?>">
        <input type="hidden" name="family_skin" value="<?php echo $family_skin; ?>">
        <input type="hidden" name="family_psycho" value="<?php echo $family_psycho; ?>">
        <input type="hidden" name="family_renal" value="<?php echo $family_renal; ?>">
        <input type="hidden" name="family_ets" value="<?php echo $family_ets; ?>">
        <input type="hidden" name="family_esquizo" value="<?php echo $family_esquizo; ?>">
        <input type="hidden" name="family_sx" value="<?php echo $family_sx; ?>">
        <input type="hidden" name="family_hemo" value="<?php echo $family_hemo; ?>">
        <input type="hidden" name="family_artery" value="<?php echo $family_artery; ?>">
        <input type="hidden" name="family_parkinson" value="<?php echo $family_parkinson; ?>">
        <input type="hidden" name="family_diet" value="<?php echo $family_diet; ?>">
        <input type="hidden" name="family_cigar" value="<?php echo $family_cigar; ?>">
        <input type="hidden" name="ext_img_1" value="<?php echo $ext_img_1; ?>">
        <input type="hidden" name="ext_img_2" value="<?php echo $ext_img_2; ?>">
        <input type="hidden" name="ext_img_3" value="<?php echo $ext_img_3; ?>">
        <input type="hidden" name="ext_img_4" value="<?php echo $ext_img_4; ?>">
        <div class="form-btn btn-arrange">
            <button class="btn btn-send" type="submit">
                <div>Generar PDF</div>
            </button>
        </div>
    </form>
    <div class="menu-users">
        <div class="logout">
            <a href="logout.php">
                Cerrar sesión
            </a>
        </div>
    </div>
</main>
<?php include 'includes/templates/footer.php'; ?>
</body>

</html>