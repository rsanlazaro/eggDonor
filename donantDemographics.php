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

$id = $_GET['id'];
$conn = connectDB();

$sql = "SELECT * FROM donants WHERE id=${id}";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $code = $row['code'];
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
        $donant_id = $row['donant_id'];
    }
} else {
    $query    = "INSERT into `demographics` (donant_id) VALUES ('$id')";
    $result   = mysqli_query($conn, $query);
    $sql = "SELECT * FROM demographics WHERE donant_id=${id}";
    $result = mysqli_query($conn, $sql);
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
        $donant_id = $row['donant_id'];
    }
}
?>

<main class="register">
    <div class="register-info">
        <h3>Datos demográficos y físicos (<?php echo $code; ?>)</h3>
    </div>

    <?php if (isset($_GET['msg'])) { ?>

        <p class="error"><?php echo $_GET['msg']; ?></p>

    <?php } ?>

    <div class="container lab-pagination">
        <form class="form" action="updateDemographics.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id ?>">
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_adict" value="<?php echo $donant_adict ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_adict" value="<?php echo $family_adict ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_alergy" value="<?php echo $donant_alergy ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_alergy" value="<?php echo $family_alergy ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_eyes" value="<?php echo $donant_eyes ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_eyes" value="<?php echo $family_eyes ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_dream" value="<?php echo $donant_dream ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_dream" value="<?php echo $family_dream ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_jewesh" value="<?php echo $donant_jewesh ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_jewesh" value="<?php echo $family_jewesh ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_autism" value="<?php echo $donant_autism ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_autism" value="<?php echo $family_autism ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_cancer" value="<?php echo $donant_cancer ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_cancer" value="<?php echo $family_cancer ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_cario" value="<?php echo $donant_cario ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_cario" value="<?php echo $family_cario ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_surgery" value="<?php echo $donant_surgery ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_surgery" value="<?php echo $family_surgery ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_congenit" value="<?php echo $donant_congenit ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_congenit" value="<?php echo $family_congenit ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_mental" value="<?php echo $donant_mental ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_mental" value="<?php echo $family_mental ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_diabetes" value="<?php echo $donant_diabetes ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_diabetes" value="<?php echo $family_diabetes ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_heart" value="<?php echo $donant_heart ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_heart" value="<?php echo $family_heart ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_inmune" value="<?php echo $donant_inmune ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_inmune" value="<?php echo $family_inmune ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_metabolic" value="<?php echo $donant_metabolic ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_metabolic" value="<?php echo $family_metabolic ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_skin" value="<?php echo $donant_skin ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_skin" value="<?php echo $family_skin ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_psycho" value="<?php echo $donant_psycho ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_psycho" value="<?php echo $family_psycho ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_renal" value="<?php echo $donant_renal ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_renal" value="<?php echo $family_renal ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_ets" value="<?php echo $donant_ets ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_ets" value="<?php echo $family_ets ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_esquizo" value="<?php echo $donant_esquizo ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_esquizo" value="<?php echo $family_esquizo ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_sx" value="<?php echo $donant_sx ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_sx" value="<?php echo $family_sx ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_hemo" value="<?php echo $donant_hemo ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_hemo" value="<?php echo $family_hemo ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_artery" value="<?php echo $donant_artery ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_artery" value="<?php echo $family_artery ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_parkinson" value="<?php echo $donant_parkinson ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_parkinson" value="<?php echo $family_parkinson ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_diet" value="<?php echo $donant_diet ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_diet" value="<?php echo $family_diet ?>" />
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
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="donant_cigar" value="<?php echo $donant_cigar ?>" />
                                </div>
                            </div>
                        </td>
                        <td data-title="Familiares">
                            <div class="col-md-12">
                                <div class="has-validation">
                                    <input type="text" class="form-control-demo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="family_cigar" value="<?php echo $family_cigar ?>" />
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" value=<?php echo $code ?> name="code"/>
            <div class="form-btn">
                <button class="btn btn-send" type="submit">
                    <div>Actualizar datos</div>
                </button>
            </div>
        </form>
    </div>
    <div class="menu-users">
        <div class="create-user">
            <a href=<?php if ($_SESSION['type'] ==  "agency") {echo "agency.php?code=".$code; } else {echo "donants.php?code=".$code; }?>>
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