<?php
include "includes/app.php";

session_start();
if (!$_SESSION['login']) {
    header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr' || $_SESSION['type'] === 'agency')) {
        header('location: /index.php');
    } 
}

$conn = connectDB();
    
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    $donant_adict = $_POST['donant_adict'];
    $donant_alergy = $_POST['donant_alergy'];
    $donant_eyes = $_POST['donant_eyes'];
    $donant_dream = $_POST['donant_dream'];
    $donant_jewesh = $_POST['donant_jewesh'];
    $donant_autism = $_POST['donant_autism'];
    $donant_cancer = $_POST['donant_cancer'];
    $donant_cario = $_POST['donant_cario'];
    $donant_surgery = $_POST['donant_surgery'];
    $donant_congenit = $_POST['donant_congenit'];
    $donant_mental = $_POST['donant_mental'];
    $donant_diabetes = $_POST['donant_diabetes'];
    $donant_heart = $_POST['donant_heart'];
    $donant_inmune = $_POST['donant_inmune'];
    $donant_metabolic = $_POST['donant_metabolic'];
    $donant_skin = $_POST['donant_skin'];
    $donant_psycho = $_POST['donant_psycho'];
    $donant_renal = $_POST['donant_renal'];
    $donant_ets = $_POST['donant_ets'];
    $donant_esquizo = $_POST['donant_esquizo'];
    $donant_sx = $_POST['donant_sx'];
    $donant_hemo = $_POST['donant_hemo'];
    $donant_artery = $_POST['donant_artery'];
    $donant_parkinson = $_POST['donant_parkinson'];
    $donant_diet = $_POST['donant_diet'];
    $donant_cigar = $_POST['donant_cigar'];
    $family_adict = $_POST['family_adict'];
    $family_alergy = $_POST['family_alergy'];
    $family_eyes = $_POST['family_eyes'];
    $family_dream = $_POST['family_dream'];
    $family_jewesh = $_POST['family_jewesh'];
    $family_autism = $_POST['family_autism'];
    $family_cancer = $_POST['family_cancer'];
    $family_cario = $_POST['family_cario'];
    $family_surgery = $_POST['family_surgery'];
    $family_congenit = $_POST['family_congenit'];
    $family_mental = $_POST['family_mental'];
    $family_diabetes = $_POST['family_diabetes'];
    $family_heart = $_POST['family_heart'];
    $family_inmune = $_POST['family_inmune'];
    $family_metabolic = $_POST['family_metabolic'];
    $family_skin = $_POST['family_skin'];
    $family_psycho = $_POST['family_psycho'];
    $family_renal = $_POST['family_renal'];
    $family_ets = $_POST['family_ets'];
    $family_esquizo = $_POST['family_esquizo'];
    $family_sx = $_POST['family_sx'];
    $family_hemo = $_POST['family_hemo'];
    $family_artery = $_POST['family_artery'];
    $family_parkinson = $_POST['family_parkinson'];
    $family_diet = $_POST['family_diet'];
    $family_cigar = $_POST['family_cigar'];
    $code = $_POST['code'];
}
if ($id) {
    $query = "UPDATE demographics SET donant_adict='${donant_adict}', donant_alergy = '${donant_alergy}', donant_eyes = '${donant_eyes}', donant_dream = '${donant_dream}', donant_jewesh = '${donant_jewesh}', donant_autism = '${donant_autism}', donant_cancer = '${donant_cancer}', donant_cario = '${donant_cario}', donant_surgery = '${donant_surgery}', donant_congenit = '${donant_congenit}', donant_mental = '${donant_mental}', donant_diabetes = '${donant_diabetes}', donant_heart = '${donant_heart}', donant_inmune = '${donant_inmune}', donant_metabolic = '${donant_metabolic}', donant_skin = '${donant_skin}', donant_psycho = '${donant_psycho}', donant_renal = '${donant_renal}', donant_ets = '${donant_ets}', donant_esquizo = '${donant_esquizo}', donant_sx = '${donant_sx}', donant_hemo = '${donant_hemo}', donant_artery = '${donant_artery}', donant_parkinson = '${donant_parkinson}', donant_diet = '${donant_diet}', donant_cigar = '${donant_cigar}', family_adict = '${family_adict}', family_alergy = '${family_alergy}', family_eyes = '${family_eyes}', family_dream = '${family_dream}', family_jewesh = '${family_jewesh}', family_autism = '${family_autism}', family_cancer = '${family_cancer}', family_cario = '${family_cario}', family_surgery = '${family_surgery}', family_congenit = '${family_congenit}', family_mental = '${family_mental}', family_diabetes = '${family_diabetes}', family_heart = '${family_heart}', family_inmune = '${family_inmune}', family_metabolic = '${family_metabolic}', family_skin = '${family_skin}', family_psycho = '${family_psycho}', family_renal = '${family_renal}', family_ets = '${family_ets}', family_esquizo = '${family_esquizo}', family_sx = '${family_sx}', family_hemo = '${family_hemo}', family_artery = '${family_artery}', family_parkinson = '${family_parkinson}', family_diet = '${family_diet}', family_cigar = '${family_cigar}' WHERE donant_id = ${id}";
    $result = mysqli_query($conn, $query);
    if ($_SESSION['type'] == "agency") {
        header('Location: agency.php?msg=Los datos se han actualizado correctamente&code='.$code);
    } else {
        header('Location: donants.php?msg=Los datos se han actualizado correctamente&code='.$code);
    }
}
?>