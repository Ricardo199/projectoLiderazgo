<?php
session_start();
require('dbh.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE correo = '$username' and contrasena = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        header("location: index.html"); // Redirige a la página de inicio después del inicio de sesión exitoso
    } else {
        $error = "Usuario o contraseña incorrectos";
        header("location: pages/login.html?error=" . urlencode($error));
    }
}
?>
