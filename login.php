<?php
include 'includes/templates/header.php';
?>

<main class="register">
  <div class="hero-img">
    <div class="img-container">
      <img src="build/img/hero/register.webp" alt="hero-image" />
    </div>
  </div>
  <div class="register-info">
    <h3>Mi cuenta</h3>
    <p>
      Para poder acceder al catálogo de gestantes, es necesario tener una cuenta.
    </p>
  </div>
  <div class="register-form">
    <div class="form-body">
      <div class="contact-form">
        <div class="login-img-container">
          <img class="login-img" src="build/img/icons/login.webp" alt="login">
        </div>
        <?php if (isset($_GET['error'])) { ?>

          <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>
        <form action="validate.php" method="POST" class="needs-validation" novalidate>
          <div class="col-md-12">
            <label for="validationCustom01">Nombre de usuario</label>
            <input type="text" class="form-control" id="validationCustom01" name="username" placeholder="" required />
            <div class="invalid-feedback">
              <div>Ingrese un nombre de usuario</div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="has-validation">
              <label class="label-form" for="validationCustomUsername">Contraseña</label>
              <input type="password" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="password" required placeholder="" />
              <div class="invalid-feedback">
                <div>Ingrese su contraseña</div>
              </div>
            </div>
          </div>

          <div>
            <div class="form-check">
              <!-- <input class="form-check-input" type="checkbox" value="" id="invalidCheck" />
                <label class="form-check-label" for="invalidCheck">
                  <p>Recuérdame</p>
                </label> -->
            </div>
          </div>
          <!-- <input type="hidden" name="_next" value="https://www.mpetsa.com/thanks.php" />
            <input type="hidden" name="_subject" value="Solicitud de informes" /> -->
          <div class="form-btn">
            <button class="btn btn-send" type="submit">
              <div>Login</div>
            </button>
          </div>
        </form>
        <!-- <div class="form-options">
          <a href="#">¿Olvidaste la contraseña?</a>
          <a href="registration.php">Crear cuenta</a>
        </div> -->
      </div>
    </div>
  </div>
</main>

<?php
include 'includes/templates/footer.php';
?>

<!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Custom JS -->
<script src="build/js/bundle.min.js"></script>
</body>

</html>