<?php
include 'includes/templates/header.php';
if (!$_SESSION['login']) {
    header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr')) {
        header('location: /index.php');
    } 
}
?>

<main class="register">
    <div class="register-info">
        <h3>Registro de donantes</h3>
    </div>
    <div class="esthetics-options">
        <div class="esthetics-options-grid">
            <a href="donantsAgency.php" class="esthetics-packages">
                <div class="esthetics-options-img">
                    <img src="build/img/admin/users.webp" alt="users" />
                </div>
                <div class="esthetics-options-bg">
                    <div class="esthetics-title">
                        <h2>Por agencia<br /> <span></span></h2>
                    </div>
                </div>
            </a>
            <a href="donants.php" class="esthetics-options-treatments">
                <div class="esthetics-options-img">
                    <img src="build/img/admin/users.webp" alt="donants" />
                </div>
                <div class="esthetics-options-bg">
                    <div class="esthetics-title">
                        <h2>Todas<br /> <span></span></h2>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="menu-users">
        <div class="logout">
            <a href="logout.php">
                Cerrar sesión
            </a>
        </div>
    </div>
</main>

</body>

</html>