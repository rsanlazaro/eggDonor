<!DOCTYPE html>
<html lang="es">

<head>
  <!-- <link rel="icon" href="build/img/logo/icon.png" /> -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Primary Meta Tags -->
  <title>EggDonor</title>
  <meta name="title" content="EggDonor" />
  <meta name="description" content="EggDonor" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <!-- Leaflet -->
  <!-- Font awesome -->
  <!-- Style -->
  <link rel="stylesheet" href="build/css/app.css" />
</head>

<body>
  <header>
    <div class="background-image">
      <img src="build/img/home/background.webp" alt="background-image">
    </div>
    <div class="header-top">
      <div class="header-phone">
        <div class="img-container">
          <img src="build/img/icons/phone.webp" alt="phone" />
        </div>
        <p>55 5922 3371</p>
      </div>
      <div class="header-social-media">
        <a href="https://www.facebook.com/" class="img-container facebook">
          <img src="build/img/icons/facebook.webp" alt="facebook" />
        </a>
        <a href="https://www.instagram.com/" class="img-container instagram">
          <img src="build/img/icons/instagram.webp" alt="instagram" />
        </a>
        <a href="mailto:recepcion@saludconcept.mx" class="img-container mail">
          <img src="build/img/icons/mail.webp" alt="mail" />
        </a>
      </div>
    </div>
    <div class="header-middle">
      <div class="img-container">
        <a href="\"><img src="build/img/icons/EggDonorWhite.webp" alt="logo" /></a>
      </div>
    </div>
    <nav class="navbar navbar-expand-md">
      <div class="navbar-nav header-bottom">
        <div class="navbar">
          <li class="nav-item">
            <a class="nav-link" href="/">
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/us.php">
              <p>Nosotros</p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="programs.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Programas</p>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="donation.php">Donación de óvulos</a>
              </li>
              <li>
                <a class="dropdown-item" href="donantBank.php">Selecciona tu donante</a>
              </li>
              <li>
                <a class="dropdown-item" href="freezing.php">Congelación de óvulos</a>
              </li>
            </ul>
          </li>
          <?php
          session_start();
          if (!(isset($_SESSION['type']))) { ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">
                <p>Acceder</p>
              </a>
            </li>
            <?php } else {
            if ($_SESSION['type'] == "admin") { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="admin.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <p>Administrador</p>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li>
                    <a class="dropdown-item" href="users.php">Perfiles</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="donants.php">Donantes</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="catalogue.php">Catálogo</a>
                  </li>
                </ul>
              </li>
            <?php } else if ($_SESSION['type'] == "user") { ?>
              <?php if (($_SESSION['vip'] === '0' && $_SESSION['plus'] === '0' && $_SESSION['elite'] === "0" && (!(isset($codeUser)) || $codeUser === "-")) && (!$_SESSION['form']) ) { ?>
                <li class="nav-item">
                  <a class="nav-link" href="phenotypeFIle.php">
                    <p>Formulario</p>
                  </a>
                </li>
              <?php } else { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link " href="catalogue.php" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                    <p>Catálogo</p>
                  </a>
                </li>
              <?php } ?>
            <?php } else if ($_SESSION['type'] === 'admin-jr') { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="admin.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <p>Usuario</p>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li>
                    <a class="dropdown-item" href="users.php">Perfiles</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="donants.php">Donantes</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="catalogue.php">Catálogo</a>
                  </li>
                </ul>
              </li>
            <?php } else if ($_SESSION['type'] === 'agency') { ?>
              <li class="nav-item">
                <a class="nav-link" href="agency.php">
                  <p>Donantes</p>
                </a>
              </li>
            <?php } else {?>
              <li class="nav-item">
                <a class="nav-link" href="phenotypeFIle.php">
                  <p>Formulario</p>
                </a>
              </li>
          <?php } ?>
          <?php } ?>
        </div>
      </div>
    </nav>
  </header>