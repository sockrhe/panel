<?php
session_start();
$conn = new PDO ('mysql:host=localhost; dbname=panel;', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$nick = $_POST['nickname'];
$pass= md5(trim($_POST['password']));
$sql = $conn->prepare("SELECT * FROM usuarios WHERE us_nickname = '$nick' AND us_password = '$pass' ");
$sql->execute();
$resultado = $sql->fetch();

if (!empty($resultado) && isset($resultado)) {
    $_SESSION['id_user'] = $resultado['us_id'];
    $_SESSION['apodo'] = $resultado['us_nickname'];
    $msg = 1;
}else{
    $msg = 2;
}

echo $msg;
?>