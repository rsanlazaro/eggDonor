<?php

include "includes/app.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!($_SESSION['login'])) {
    header('location: /index.php');
}
// Include Composer's autoload file
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of mPDF
$mpdf = new \Mpdf\Mpdf();

$id = $_POST['id'];
$conn = connectDB();
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

$imageUrl1 = $_POST['ext_img_1'];
$imageUrl2 = $_POST['ext_img_2'];
$imageUrl3 = $_POST['ext_img_3'];
$imageUrl4 = $_POST['ext_img_4'];

if (isset($imageUrl1) && strlen($imageUrl1)>5) {$imageData1 = base64_encode(file_get_contents($imageUrl1));}
if (isset($imageUrl2) && strlen($imageUrl2)>5) {$imageData2 = base64_encode(file_get_contents($imageUrl2));}
if (isset($imageUrl3) && strlen($imageUrl3)>5) {$imageData3 = base64_encode(file_get_contents($imageUrl3));}
if (isset($imageUrl4) && strlen($imageUrl4)>5) {$imageData4 = base64_encode(file_get_contents($imageUrl4));}

$html1 = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <img src="build/img/icons/EggDonor.png" width="600" />
    <h1>Perfil Donante</h1>
    <img src="build/img/report/initial.png" width="750" />
    <p class="firstbold">Contenido exclusivo de Eggdonor</p>
    <p class="firstfootcover">www.eggdonor.mx</p>

    <div style="page-break-before: always;"></div>

    <div class="dark-bg"></div>
    <h2 class="donant-name">Donante ' . $_POST['code'] . '</h2>
    <img class="info" src="build/img/report/info.png" width="750" />
    <div class="spacer-table"></div>';

if($_POST['first'] == "yes") {

$html1 = $html1 . '<table class="table1">
        <tr>
            <td class="td1">
                <div class="td-icon">
                    <img class="icon" src="build/img/report/nationality.png" width="750" />
                </div>
                <div class="td-info">
                    <h3 class="td-info1">Nacionalidad</h3>
                    <p class="td-info2">' . $_POST['nationality'] . '</p>
                </div>
            </td>
            <td class="td1">
                <div class="td-icon2">
                    <img class="icon" src="build/img/report/birth.png" width="750" />
                </div>
                <div class="td-info">
                    <h3 class="td-info1">Fecha de nacimiento</h3>
                    <p class="td-info2">' . $_POST['date_birth'] . '</p>
                </div>
            </td>
            <td class="td1">
                <div class="td-icon3">
                    <img class="icon" src="build/img/report/education.png" width="750" />
                </div>
                <div class="td-info">
                    <h3 class="td-info1">Educación</h3>
                    <p class="td-info2">' . $_POST['education'] . '</p>
                </div>
            </td>
            <td class="td1">
                <div class="td-icon4">
                    <img class="icon" src="build/img/report/job.png" width="750" />
                </div>
                <div class="td-info">
                    <h3 class="td-info1">Ocupación</h3>
                    <p class="td-info2">' . $_POST['ocupation'] . '</p>
                </div>
            </td>
        </tr>
    </table>
    <table class="table2">
        <tr>
            <td class="td1">
                <div class="td-icon5">
                    <img class="icon" src="build/img/report/eyes.png" width="750" />
                </div>
                <div class="td-info">
                    <h3 class="td-info1">Color de ojos</h3>
                    <p class="td-info2">' . $_POST['color_eyes'] . '</p>
                </div>
            </td>
            <td class="td1">
                <div class="td-icon6">
                    <img class="icon" src="build/img/report/skin.png" width="750" />
                </div>
                <div class="td-info">
                    <h3 class="td-info1">Color de piel</h3>
                    <p class="td-info2">' . $_POST['color_skin'] . '</p>
                </div>
            </td>
            <td class="td1">
                <div class="td-icon7">
                    <img class="icon" src="build/img/report/haircolor.png" width="750" />
                </div>
                <div class="td-info">
                    <h3 class="td-info1">Color de pelo</h3>
                    <p class="td-info2">' . $_POST['color_hair'] . '</p>
                </div>
            </td>
            <td class="td1">
                <div class="td-icon8">
                    <img class="icon" src="build/img/report/hair.png" width="750" />
                </div>
                <div class="td-info">
                    <h3 class="td-info1">Tipo de pelo</h3>
                    <p class="td-info2">' . $_POST['type_hair'] . '</p>
                </div>
            </td>
        </tr>
    </table>';

}

$html1 = $html1 . '<div style="page-break-before: always;"></div>

    <h2 class="donant-name2">Donante ' . $_POST['code'] . '</h2>
    <h4> Datos Demográficos y Físicos</h4>

    <table class="table4">
        <tr class="table4-tr">
            <td class="table4-td">
                <table class="nested-table">
                    <tr class="nested-title">
                        <td>Grupo Sanguíneo</td>
                    </tr>
                    <tr class="nested-text">
                        <td>' . $_POST['blood_type'] . '</td>
                    </tr>
                </table>
            </td>
            <td class="table4-td">
                <table class="nested-table">
                    <tr class="nested-title">
                        <td>Estatura</td>
                    </tr>
                    <tr class="nested-text">
                        <td>' . $_POST['height'] . ' m</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table class="table5">
        <tr class="table4-tr">
            <td class="table4-td">
                <table class="nested-table">
                    <tr class="nested-title">
                        <td>Peso</td>
                    </tr>
                    <tr class="nested-text">
                        <td>' . $_POST['weight'] . ' kg</td>
                    </tr>
                </table>
            </td>
            <td class="table4-td">
                <table class="nested-table">
                    <tr class="nested-title">
                        <td>Tipo de cuerpo</td>
                    </tr>
                    <tr class="nested-text">
                        <td>' . $_POST['type_body'] . '</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>';

if ($_POST['second'] == "yes") {

    $html1 = $html1 . '<table class="table3">
        <thead class="table3-head">
            <tr class="table3-head">
                <th class="left-align">
                    Miembro de la familia
                </th>
                <th class="left-align">
                    Color de ojos
                </th>
                <th class="left-align">
                    Color de pelo
                </th>
                <th class="left-align">
                    Estatura
                </th>
                <th class="left-align">
                    Peso
                </th>
                <th class="left-align">
                    Estado de salud
                </th>
            </tr>
        </thead>
        <tbody class="table3-body">';


        for ($i = 1; $i <= $index; $i++) {
            $html1 = $html1 . '<tr class=table-light>
                <td>
                    '. $member_fam[$i] .'
                </td>
                <td>
                    '. $color_eyes_fam[$i] .'
                </td>
                <td>
                    '. $color_hair_fam[$i] .'
                </td>
                <td>
                    '. $height_fam[$i] .' m
                </td>
                <td>
                    '. $weight_fam[$i] .' kg
                </td>
                <td>
                    '. $health_fam[$i] .'
                </td>
            </tr>';
        }

        $html1 = $html1 . '
        </tbody>
    </table>';

}

$html1 = $html1 . '<div style="page-break-before: always;"></div>';

if ($_POST['third'] == "yes") {

$html1 = $html1 . '

    <h2 class="donant-name2">Donante FN-MJAN</h2>
    <h4> Antecedentes Médicos y Familiares</h4>

    <table class="table3">
        <thead class="table3-head">
            <tr class="table3-head">
                <th class="left-align">
                    Padecimiento
                </th>
                <th class="left-align">
                    Donante
                </th>
                <th class="left-align">
                    Familiares
                </th>
            </tr>
        </thead>
        <tbody class="table3-body">
            <tr class=table-light>
                <td>
                    Adicciones
                </td>
                <td>
                    ' . $_POST['donant_adict'] . '
                </td>
                <td>
                    ' . $_POST['family_adict'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Alergias
                </td>
                <td>
                    ' . $_POST['donant_alergy'] . '
                </td>
                <td>
                    ' . $_POST['family_alergy'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    Alteración vista
                </td>
                <td>
                    ' . $_POST['donant_eyes'] . '
                </td>
                <td>
                    ' . $_POST['family_eyes'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Alteraciones sueño
                </td>
                <td>
                    ' . $_POST['donant_dream'] . '
                </td>
                <td>
                    ' . $_POST['family_dream'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    Ascendencia judía
                </td>
                <td>
                    ' . $_POST['donant_jewesh'] . '
                </td>
                <td>
                    ' . $_POST['family_jewesh'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Autismo
                </td>
                <td>
                    ' . $_POST['donant_autism'] . '
                </td>
                <td>
                    ' . $_POST['family_autism'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    Cáncer
                </td>
                <td>
                    ' . $_POST['donant_cancer'] . '
                </td>
                <td>
                    ' . $_POST['family_cancer'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Cariotipo
                </td>
                <td>
                    ' . $_POST['donant_cario'] . '
                </td>
                <td>
                    ' . $_POST['family_cario'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    Cirugías
                </td>
                <td>
                    ' . $_POST['donant_surgery'] . '
                </td>
                <td>
                    ' . $_POST['family_surgery'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Defectos congénitos
                </td>
                <td>
                    ' . $_POST['donant_congenit'] . '
                </td>
                <td>
                    ' . $_POST['family_congenit'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    Deficiencia mental
                </td>
                <td>
                    ' . $_POST['donant_mental'] . '
                </td>
                <td>
                    ' . $_POST['family_mental'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Diabetes
                </td>
                <td>
                    ' . $_POST['donant_diabetes'] . '
                </td>
                <td>
                    ' . $_POST['family_diabetes'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    Enf. cardiovascular
                </td>
                <td>
                    ' . $_POST['donant_heart'] . '
                </td>
                <td>
                    ' . $_POST['family_heart'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Enf. inmunológica
                </td>
                <td>
                    ' . $_POST['donant_inmune'] . '
                </td>
                <td>
                    ' . $_POST['family_inmune'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    Enf. metabólica
                </td>
                <td>
                    ' . $_POST['donant_metabolic'] . '
                </td>
                <td>
                    ' . $_POST['family_metabolic'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Enf. piel
                </td>
                <td>
                    ' . $_POST['donant_skin'] . '
                </td>
                <td>
                    ' . $_POST['family_skin'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    Enf. psiquiátrica
                </td>
                <td>
                    ' . $_POST['donant_psycho'] . '
                </td>
                <td>
                    ' . $_POST['family_psycho'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Enf. renal
                </td>
                <td>
                    ' . $_POST['donant_renal'] . '
                </td>
                <td>
                    ' . $_POST['family_renal'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    ETS
                </td>
                <td>
                    ' . $_POST['donant_ets'] . '
                </td>
                <td>
                    ' . $_POST['family_ets'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Esquizofrénica
                </td>
                <td>
                    ' . $_POST['donant_esquizo'] . '
                </td>
                <td>
                    ' . $_POST['family_esquizo'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    Gen SX frágil
                </td>
                <td>
                    ' . $_POST['donant_sx'] . '
                </td>
                <td>
                    ' . $_POST['family_sx'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Hemofilia
                </td>
                <td>
                    ' . $_POST['donant_hemo'] . '
                </td>
                <td>
                    ' . $_POST['family_hemo'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    Hipertensión arterial
                </td>
                <td>
                    ' . $_POST['donant_artery'] . '
                </td>
                <td>
                    ' . $_POST['family_artery'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Parkinson
                </td>
                <td>
                    ' . $_POST['donant_parkinson'] . '
                </td>
                <td>
                    ' . $_POST['family_parkinson'] . '
                </td>
            </tr>
            <tr class=table-light>
                <td>
                    Restricciones dieta
                </td>
                <td>
                    ' . $_POST['donant_diet'] . '
                </td>
                <td>
                    ' . $_POST['family_diet'] . '
                </td>
            </tr>
            <tr class=table-dark>
                <td>
                    Tabaquismo
                </td>
                <td>
                    ' . $_POST['donant_cigar'] . '
                </td>
                <td>
                    ' . $_POST['family_cigar'] . '
                </td>
            </tr>
        </tbody>
    </table>

    <div style="page-break-before: always;"></div>';

}

$html2 = '';
$html3 = '';
$html4 = '';
$html5 = '';

if ($_POST['fourth'] == "yes") {

$html1 = $html1 . '<div class="dark-bg"></div>
<h2 class="donant-name">Donante FN-MJAN</h2>
<div></div>';

    if (isset($imageUrl1) && strlen($imageUrl1)>5) {
        $html2 = $html2 . '<img class="img1" src="data:image/png;base64,' . $imageData1 . '" height="150"/>
        <br>';
    }

    if (isset($imageUrl2) && strlen($imageUrl2)>5) {
        $html3 = $html3 . '<img class="img2" src="data:image/png;base64,' . $imageData2 . '" height="150"/>
    <br>';
    }

    if (isset($imageUrl3) && strlen($imageUrl3)>5) {
        $html4 = $html4 . '<img class="img2" src="data:image/png;base64,' . $imageData3 . '" height="150"/>
    <br>';
    }

    if (isset($imageUrl4) && strlen($imageUrl4)>5) {
        $html5 = $html5 . '<img class="img3" src="data:image/png;base64,' . $imageData4 . '" height="150"/>';
    }

    $html5 = $html5 . '<p class="lastfootcover">www.eggdonor.mx</p>
    <div style="page-break-before: always;"></div>';

}

$html6 = '
    <img class="lastimg" src="build/img/icons/EggDonor.png" width="600" />
    <p class="lastbold">Contenido exclusivo de Eggdonor</p>
    <p class="lastfootcover">www.eggdonor.mx</p>
</body>
</html>
';

$htmlChunks = [
    $html1,
    $html2,
    $html3,
    $html4,
    $html5,
    $html6
];


$stylesheet = "
<style>
    p {
        color: #a08d87;
    }
    body {
        width: 100%;
        text-align: center;
        background-color: #f0ebe9;
        font-size: 1.25rem;
        padding: 0;
        margin: 0;
        font-family: 'Arial';
    }
    h1 {
        margin-top: 3rem;
        margin-bottom: 3rem;
        color: #a08d87;
        font-size: 3rem;
    }
    p {
        color: #a08d87;
    }
    .firstbold, .lastbold {
        font-weight: bold;
    }
    .firstbold {
        padding-bottom: 0;
        margin-top: 8rem;
    }
    .firstfootcover {
        margin-top: 0rem;
        padding-top: 0;
    }
    .lastbold {
        margin-top: 10rem;     
    }
    .lastimg {
        margin-top: 15rem;
        margin-bottom: 15rem;
    }
    .dark-bg {
        position: absolute;
        background-color: #a08d87;
        left: -10rem;
        top: 0;
        height: 20rem;
        width: 80rem;
        z-index: -1;
    }
    .donant-name {
        color: white;
        font-size: 2rem;
        z-index: 80;
    }
    .donant-name2 {
        color: #a08d87;
        font-size: 2rem;
        z-index: 2;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    h4 {
        margin-top: 0;
        padding-top: 0;
        color: #a08d87;
        font-weight: normal;
    }
    .info {
        margin-top: 78px;
        z-index: 2;
    }
    .spacer-table {
        height: 5rem;
    }
    .table1 {
        width: 100%;
        margin-top: 0;
        border-spacing: 15px; /* Adjusts space between cells */
    }
    .table2 {
        margin-top: 3rem;
    }      
    .td1 {
        width: 15%;  /* Each column takes up 25% of the total width (4 columns = 100%) */
        padding: 15px;
        margin: 2rem;
        height: 10rem;
        background-color: #00557d;
        text-align: center;
        margin-top: 5rem;
        position: relative;
        z-index: -1;
    }
    .td-rectangle {
        position: absolute;
        background-color: #a08d87;
        left: -10rem;
        top: 0;
        height: 20rem;
        width: 80rem;
        z-index: 10;
    }
    .td-icon, .td-icon2, .td-icon3, .td-icon4, .td-icon5, .td-icon6, .td-icon7, .td-icon8 {
        width: 4rem;
        padding: 0.5rem;
        position: absolute;
        z-index: 100;
        background-color: #f0ebe9;
    }
    .td-icon {
        top: 550px;
        left: 110px;
    }
    .td-icon2 {
        top: 550px;
        left: 290px;
    }
    .td-icon3 {
        top: 550px;
        left: 450px;
    }
    .td-icon4 {
        top: 550px;
        left: 600px;
    }
    .td-icon5 {
        top: 810px;
        left: 95px;
    }
    .td-icon6 {
        top: 810px;
        left: 260px;
    }
    .td-icon7 {
        top: 810px;
        left: 420px;
    }
    .td-icon8 {
        top: 810px;
        left: 590px;
    }
    .td-info {
        background-color: #00557d;
        height: 5rem;
        width: 100%;
        color: red;
        z-index: 3;
    }
    .td-info1 {
        color: white;
        margin: 0;
        padding: 0;
    }
    .td-info2 {
        color: white;
        margin: 0;
        padding: 0;
    }
    .nested-title {
        text-align: center;
    }
    .nested-title td {
        background-color: #c8b6ae;
        height: 2rem;
        padding: auto 30px;
        font-weight: bold;
        text-align: center;
    }
    .nested-text td {
        background-color: #00557d;
        color: white;
        height: 5rem;
        width: 15rem;
        text-align: center;
        margin: auto;
        padding: auto;
    }
    .table3 {
        font-size: 0.8rem;
        width: 100%;
        margin-top: 0;
        border-spacing: 1px 5px; /* Adjusts space between cells */
    }
    .table3-head {   
        background-color: #00557d;
    }
    .left-align {
        text-align: left;
        color: white;
        padding: 10px;
    }
    .table-light {
        background-color: #c8b6ae;
    }
    .table-light td {
        padding: 5px 10px;
    }
    .table-dark {
        background-color: #a08c86;
    }
    .table-dark td {
        padding: 5px 10px;
    }
    .table4 {
        margin: auto;
        border-spacing: 80px 10px;
    }   
    .table5 {
        margin: auto;
        border-spacing: 80px 100px;
    }   
    .img1 {
        display: block;
        margin-top: 15rem;
    }
    .img2 {
        display: block;
        margin-top: 2rem;
    }
    .img3 {
        display: block;
        margin-top: 2rem;
        margin-bottom: 3rem;
    }
</style>
";

// Add the stylesheet and HTML content to mPDF
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
foreach ($htmlChunks as $chunk) {
    $mpdf->WriteHTML($chunk, \Mpdf\HTMLParserMode::HTML_BODY);
}

// Add HTML content to mPDF
// $mpdf->WriteHTML($html);

// Add the online image using mPDF's image() method
// $mpdf->Image($imageUrl, 10, 50, 100, 100); // (URL, x, y, width, height)

// Output PDF
$mpdf->Output('sample.pdf', 'I'); // D = force download, I = inline display, F = save to file
