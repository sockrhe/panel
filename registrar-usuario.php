<?php
session_start();
$conn = new PDO ('mysql:host=localhost; dbname=panel;', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$nick = $_POST['nickname'];
$pass = trim($_POST['password']);
$con_pass = trim($_POST['password']);
$date = date('Y-m-d');

$sql = $conn->prepare("SELECT * FROM usuarios WHERE us_nickname = '$nick' ");
$sql->execute();
$resultado = $sql->fetch();

if (empty($resultado['us_id'])) {
    if ($pass == $con_pass) {
        $md5_pass = md5($pass);
        $sql = $conn->prepare("INSERT INTO usuarios VALUES(NULL, '$nombre', '$apellidos', '$nick', '$md5_pass', '$date', 'Activo') ");
        $sql->execute();
        $msg = 1;
    } else {
        $msg = 2; // contrasenas no coinciden    
    }
} else {
    $msg = 3; // el nickname ya existe
}

echo $msg;
?>