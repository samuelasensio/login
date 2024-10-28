<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Guardar los datos en un archivo
    $file = 'users.txt';
    $data = $username . ',' . $password . PHP_EOL;
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    echo "Registro exitoso.";
}
?>
