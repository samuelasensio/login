<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Leer el archivo de usuarios
    $file = 'users.txt';
    $users = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($users as $user) {
        list($stored_username, $stored_password) = explode(',', $user);
        
        if ($username === $stored_username && password_verify($password, $stored_password)) {
            $_SESSION['username'] = $username;
            echo "Inicio de sesión exitoso.";
            exit;
        }
    }
    echo "Usuario o contraseña incorrectos.";
}
?>
