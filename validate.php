<?php
session_start();
include "includes/app.php";

if (!$_SESSION['login']) {
    header('location: /index.php');
} else {
    if (!($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'admin-jr')) {
        header('location: /index.php');
    }
}

$conn = connectDB();



if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$username = validate($_POST['username']);
$password = validate($_POST['password']);

if (empty($username)) {

    header("Location: login.php?error = User Name is required");
    exit();
} else if (empty($password)) {

    header("Location: login.php?error = Password is required");
    exit();
} else {

    // $sql = "SELECT * FROM users WHERE username='$username' AND password ='$password'";
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($password === $row['password']) {
        $auth = 1;
    }

    if (mysqli_num_rows($result) === 1) {
        // $row = mysqli_fetch_assoc($result);

        if ($row['username'] === $username && $auth) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['login'] = true;
            $_SESSION['type'] = $row['type'];
            $_SESSION['vip'] = $row['vip'];
            $_SESSION['plus'] = $row['plus'];
            $_SESSION['elite'] = $row['elite'];
            $_SESSION['fenotipe'] = $row['fenotipo'];
            $_SESSION['code'] = $row['code'];
            $_SESSION['code_2'] = $row['code_2'];
            $_SESSION['code_3'] = $row['code_3'];
            $checkId = $row['id'];
            $sql = "SELECT * FROM form WHERE userId=${checkId}";
            $result =  mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                $_SESSION['form'] = true;
            } else {
                $_SESSION['form'] = false;
            }
            if ($row['type'] == "admin" || $row['type'] == "admin-jr") {
                header("Location: admin.php");
            } else {
                if ($row['type'] == "agency") {
                    header("Location: agency.php");
                }else {
                    header("Location: catalogue.php");
                }
            }
            exit();
        } else {
            header("Location: login.php?error=Usuario o contraseña incorrecta");
            exit();
        }
    } else {
        header("Location: login.php?error=Usuario o contraseña incorrecta");
        exit();
    }
}
