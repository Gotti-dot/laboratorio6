<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "db_instituto";

$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);
if (!$conexion) {
    die("Error de conexion: ".mysqli_connect_error());
}

if (isset($_POST['actualizar'])) {
    $id = $_POST['txt-id'];
    $CarreraCodigo = $_POST['txt-CarreraCodigo'];
    $CarreraNombre = $_POST['txt-CarreraNombre'];
    $CarreraAbreviacion = $_POST['txt-CarreraAbreviacion'];

    $sql = "UPDATE carreras SET 
        id = '$id',
        CarreraCodigo = '$CarreraCodigo',
        CarreraNombre = '$CarreraNombre',
        CarreraAbreviacion = '$CarreraAbreviacion'
       
        ";

    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: ".mysqli_error($conexion);
    }
}
?>