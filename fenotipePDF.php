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
                        Tipo de sangre: <?php echo $blood_type; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Altura (m): <?php echo $height; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Peso (kg): <?php echo $weight; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Educación: <?php echo $education; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Color de cabello: <?php echo $color_hair; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Tipo de cabello: <?php echo $type_hair; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Tipo de cuerpo: <?php echo $type_body; ?>
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
                        Profile: <?php echo $profile; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Code: <?php echo $code; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Supplier: <?php echo $supplier; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Price: <?php echo $price; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Hobbie: <?php echo $hobbie; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Color favorito: <?php echo $color_favorite; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Animal favorito: <?php echo $animal_favorite; ?>
                    </div>
                </label>
            </div>
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Reserva ovárica: <?php echo $ovarian_reserve; ?>
                    </div>
                </label>
            </div>
        </div>
        <div class="form-top">
            <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Agencia: <?php echo $agency; ?>
                    </div>
                </label>
            </div>
            <!-- <div class="col-md-6 form-top-element">
                <label for="validationDefault01">
                    <div class="spanish">
                        Price: <?php echo $price; ?>
                    </div>
                </label>
            </div> -->
        </div>
        <!-- <div class="form-characteristics">
            <div class="form-subtitle form-white">
                <div class="spanish">Datos de los familiares</div>
            </div>
        </div> -->
        <!-- <input type="hidden" name="form_name" value="<?php echo $form_name ?>">
        <input type="hidden" name="form_date" value="<?php echo $form_date ?>">
        <input type="hidden" name="form_age" value="<?php echo $form_age ?>">
        <input type="hidden" name="form_birth_place" value="<?php echo $form_birth_place ?>">
        <input type="hidden" name="form_status" value="<?php echo $form_status ?>">
        <input type="hidden" name="form_employment" value="<?php echo $form_employment ?>">
        <input type="hidden" name="form_height" value="<?php echo $form_height ?>">
        <input type="hidden" name="form_weight" value="<?php echo $form_weight ?>">
        <input type="hidden" name="form_hand" value="<?php echo $form_hand ?>">
        <input type="hidden" name="form_blood" value="<?php echo $form_blood ?>">
        <input type="hidden" name="form_implant" value="<?php echo $form_implant ?>">
        <input type="hidden" name="form_diu" value="<?php echo $form_diu ?>">
        <input type="hidden" name="form_risk_notes" value="<?php echo $form_risk_notes ?>">
        <input type="hidden" name="form_anemy" value="<?php echo $form_anemy ?>">
        <input type="hidden" name="form_diabetes" value="<?php echo $form_diabetes ?>">
        <input type="hidden" name="form_transfusion" value="<?php echo $form_transfusion ?>">
        <input type="hidden" name="form_hipertension" value="<?php echo $form_hipertension ?>">
        <input type="hidden" name="form_cancer" value="<?php echo $form_cancer ?>">
        <input type="hidden" name="form_dislexia" value="<?php echo $form_dislexia ?>">
        <input type="hidden" name="form_waist" value="<?php echo $form_waist ?>">
        <input type="hidden" name="form_migraine" value="<?php echo $form_migraine ?>">
        <input type="hidden" name="form_smoke" value="<?php echo $form_smoke ?>">
        <input type="hidden" name="form_smoke_times" value="<?php echo $form_smoke_times ?>">
        <input type="hidden" name="form_smoke_qty" value="<?php echo $form_smoke_qty ?>">
        <input type="hidden" name="form_alcohol" value="<?php echo $form_alcohol ?>">
        <input type="hidden" name="form_alcohol_freq" value="<?php echo $form_alcohol_freq ?>">
        <input type="hidden" name="form_fracture" value="<?php echo $form_fracture ?>">
        <input type="hidden" name="form_surgery" value="<?php echo $form_surgery ?>">
        <input type="hidden" name="form_fracture_info" value="<?php echo $form_fracture_info ?>">
        <input type="hidden" name="form_surgery_info" value="<?php echo $form_surgery_info ?>">
        <input type="hidden" name="form_type_pregnant_1" value="<?php echo $form_type_pregnant_1 ?>">
        <input type="hidden" name="form_height_pregnant_1" value="<?php echo $form_height_pregnant_1 ?>">
        <input type="hidden" name="form_weight_pregnant_1" value="<?php echo $form_weight_pregnant_1 ?>">
        <input type="hidden" name="form_term_pregnant_1" value="<?php echo $form_term_pregnant_1 ?>">
        <input type="hidden" name="form_week_pregnant_1" value="<?php echo $form_week_pregnant_1 ?>">
        <input type="hidden" name="form_year_pregnant_1" value="<?php echo $form_year_pregnant_1 ?>">
        <input type="hidden" name="form_comments_pregnant_1" value="<?php echo $form_comments_pregnant_1 ?>">
        <input type="hidden" name="form_type_pregnant_2" value="<?php echo $form_type_pregnant_2 ?>">
        <input type="hidden" name="form_height_pregnant_2" value="<?php echo $form_height_pregnant_2 ?>">
        <input type="hidden" name="form_weight_pregnant_2" value="<?php echo $form_weight_pregnant_2 ?>">
        <input type="hidden" name="form_term_pregnant_2" value="<?php echo $form_term_pregnant_2 ?>">
        <input type="hidden" name="form_week_pregnant_2" value="<?php echo $form_week_pregnant_2 ?>">
        <input type="hidden" name="form_year_pregnant_2" value="<?php echo $form_year_pregnant_2 ?>">
        <input type="hidden" name="form_comments_pregnant_2" value="<?php echo $form_comments_pregnant_2 ?>">
        <input type="hidden" name="form_type_pregnant_3" value="<?php echo $form_type_pregnant_3 ?>">
        <input type="hidden" name="form_height_pregnant_3" value="<?php echo $form_height_pregnant_3 ?>">
        <input type="hidden" name="form_weight_pregnant_3" value="<?php echo $form_weight_pregnant_3 ?>">
        <input type="hidden" name="form_term_pregnant_3" value="<?php echo $form_term_pregnant_3 ?>">
        <input type="hidden" name="form_week_pregnant_3" value="<?php echo $form_week_pregnant_3 ?>">
        <input type="hidden" name="form_year_pregnant_3" value="<?php echo $form_year_pregnant_3 ?>">
        <input type="hidden" name="form_comments_pregnant_3" value="<?php echo $form_comments_pregnant_3 ?>">
        <input type="hidden" name="form_type_pregnant_4" value="<?php echo $form_type_pregnant_4 ?>">
        <input type="hidden" name="form_height_pregnant_4" value="<?php echo $form_height_pregnant_4 ?>">
        <input type="hidden" name="form_weight_pregnant_4" value="<?php echo $form_weight_pregnant_4 ?>">
        <input type="hidden" name="form_term_pregnant_4" value="<?php echo $form_term_pregnant_4 ?>">
        <input type="hidden" name="form_week_pregnant_4" value="<?php echo $form_week_pregnant_4 ?>">
        <input type="hidden" name="form_year_pregnant_4" value="<?php echo $form_year_pregnant_4 ?>">
        <input type="hidden" name="form_comments_pregnant_4" value="<?php echo $form_comments_pregnant_4 ?>">
        <input type="hidden" name="form_type_pregnant_5" value="<?php echo $form_type_pregnant_5 ?>">
        <input type="hidden" name="form_height_pregnant_5" value="<?php echo $form_height_pregnant_5 ?>">
        <input type="hidden" name="form_weight_pregnant_5" value="<?php echo $form_weight_pregnant_5 ?>">
        <input type="hidden" name="form_term_pregnant_5" value="<?php echo $form_term_pregnant_5 ?>">
        <input type="hidden" name="form_week_pregnant_5" value="<?php echo $form_week_pregnant_5 ?>">
        <input type="hidden" name="form_year_pregnant_5" value="<?php echo $form_year_pregnant_5 ?>">
        <input type="hidden" name="form_comments_pregnant_5" value="<?php echo $form_comments_pregnant_5 ?>">
        <input type="hidden" name="form_type_pregnant_6" value="<?php echo $form_type_pregnant_6 ?>">
        <input type="hidden" name="form_height_pregnant_6" value="<?php echo $form_height_pregnant_6 ?>">
        <input type="hidden" name="form_weight_pregnant_6" value="<?php echo $form_weight_pregnant_6 ?>">
        <input type="hidden" name="form_term_pregnant_6" value="<?php echo $form_term_pregnant_6 ?>">
        <input type="hidden" name="form_week_pregnant_6" value="<?php echo $form_week_pregnant_6 ?>">
        <input type="hidden" name="form_year_pregnant_6" value="<?php echo $form_year_pregnant_6 ?>">
        <input type="hidden" name="form_comments_pregnant_6" value="<?php echo $form_comments_pregnant_6 ?>">
        <input type="hidden" name="form_type_abort_1" value="<?php echo $form_type_abort_1 ?>">
        <input type="hidden" name="form_year_abort_1" value="<?php echo $form_year_abort_1 ?>">
        <input type="hidden" name="form_week_abort_1" value="<?php echo $form_week_abort_1 ?>">
        <input type="hidden" name="form_comments_abort_1" value="<?php echo $form_comments_abort_1 ?>">
        <input type="hidden" name="form_type_abort_2" value="<?php echo $form_type_abort_2 ?>">
        <input type="hidden" name="form_year_abort_2" value="<?php echo $form_year_abort_2 ?>">
        <input type="hidden" name="form_week_abort_2" value="<?php echo $form_week_abort_2 ?>">
        <input type="hidden" name="form_comments_abort_2" value="<?php echo $form_comments_abort_2 ?>">
        <input type="hidden" name="form_type_abort_3" value="<?php echo $form_type_abort_3 ?>">
        <input type="hidden" name="form_year_abort_3" value="<?php echo $form_year_abort_3 ?>">
        <input type="hidden" name="form_week_abort_3" value="<?php echo $form_week_abort_3 ?>">
        <input type="hidden" name="form_comments_abort_3" value="<?php echo $form_comments_abort_3 ?>">
        <input type="hidden" name="form_coded_comments_pregnant_1" value="<?php echo $form_coded_comments_pregnant_1 ?>">
        <input type="hidden" name="form_coded_comments_pregnant_2" value="<?php echo $form_coded_comments_pregnant_2 ?>">
        <input type="hidden" name="form_coded_comments_pregnant_3" value="<?php echo $form_coded_comments_pregnant_3 ?>">
        <input type="hidden" name="form_coded_comments_pregnant_4" value="<?php echo $form_coded_comments_pregnant_4 ?>">
        <input type="hidden" name="form_coded_comments_pregnant_5" value="<?php echo $form_coded_comments_pregnant_5 ?>">
        <input type="hidden" name="form_coded_comments_pregnant_6" value="<?php echo $form_coded_comments_pregnant_6 ?>">
        <input type="hidden" name="family_alergy" value="<?php echo $family_alergy ?>">
        <input type="hidden" name="family_apoplejia" value="<?php echo $family_apoplejia ?>">
        <input type="hidden" name="family_cardiopathy" value="<?php echo $family_cardiopathy ?>">
        <input type="hidden" name="family_catarata" value="<?php echo $family_catarata ?>">
        <input type="hidden" name="family_cirrosis" value="<?php echo $family_cirrosis ?>">
        <input type="hidden" name="family_convulsive" value="<?php echo $family_convulsive ?>">
        <input type="hidden" name="family_distrophy" value="<?php echo $family_distrophy ?>">
        <input type="hidden" name="family_enfisem" value="<?php echo $family_enfisem ?>">
        <input type="hidden" name="family_epilepsy" value="<?php echo $family_epilepsy ?>">
        <input type="hidden" name="family_glaucom" value="<?php echo $family_glaucom ?>">
        <input type="hidden" name="family_hemofilia" value="<?php echo $family_hemofilia ?>">
        <input type="hidden" name="family_ictericia" value="<?php echo $family_ictericia ?>">
        <input type="hidden" name="family_migraine" value="<?php echo $family_migraine ?>">
        <input type="hidden" name="family_varicocele" value="<?php echo $family_varicocele ?>">
        <input type="hidden" name="family_equinovaro" value="<?php echo $family_equinovaro ?>">
        <input type="hidden" name="family_mental" value="<?php echo $family_mental ?>">
        <input type="hidden" name="family_drugs" value="<?php echo $family_drugs ?>">
        <input type="hidden" name="family_esquizo" value="<?php echo $family_esquizo ?>">
        <input type="hidden" name="family_alcohol" value="<?php echo $family_alcohol ?>">
        <input type="hidden" name="family_diabetes_young" value="<?php echo $family_diabetes_young ?>">
        <input type="hidden" name="family_bocio" value="<?php echo $family_bocio ?>">
        <input type="hidden" name="family_blind" value="<?php echo $family_blind ?>">
        <input type="hidden" name="family_daltonic" value="<?php echo $family_daltonic ?>">
        <input type="hidden" name="family_diabetes" value="<?php echo $family_diabetes ?>">
        <input type="hidden" name="family_psiquiatric" value="<?php echo $family_psiquiatric ?>">
        <input type="hidden" name="family_endometriosis" value="<?php echo $family_endometriosis ?>">
        <input type="hidden" name="family_fibrosis" value="<?php echo $family_fibrosis ?>">
        <input type="hidden" name="family_gota" value="<?php echo $family_gota ?>">
        <input type="hidden" name="family_hipertension" value="<?php echo $family_hipertension ?>">
        <input type="hidden" name="family_paladar" value="<?php echo $family_paladar ?>">
        <input type="hidden" name="family_kidney" value="<?php echo $family_kidney ?>">
        <input type="hidden" name="family_circulation" value="<?php echo $family_circulation ?>">
        <input type="hidden" name="family_psoriasis" value="<?php echo $family_psoriasis ?>">
        <input type="hidden" name="family_deaf" value="<?php echo $family_deaf ?>">
        <input type="hidden" name="family_alzheimer" value="<?php echo $family_alzheimer ?>">
        <input type="hidden" name="family_parkinson" value="<?php echo $family_parkinson ?>"> -->
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