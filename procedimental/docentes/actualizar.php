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
    $DocenteCodigo = $_POST['txt-DocenteCodigo'];
    $DocenteCarnetIdentidad = $_POST['txt-DocenteCarnetIdentidad'];
    $DocenteNombres = $_POST['txt-DocenteNombres'];
    $DocenteFechaNacimiento = $_POST['txt-DocenteFechaNacimiento'];
    $DocenteDireccion = $_POST['txt-DocenteDireccion'];
    $DocenteCelular = $_POST['txt-DocenteCelular'];

    $sql = "UPDATE docentes SET 
        id = '$id',
        DocenteCodigo = '$DocenteCodigo',
        DocenteCarnetIdentidad = '$DocenteCarnetIdentidad',
        DocenteNombres = '$DocenteNombres',
        DocenteFechaNacimiento = '$DocenteFechaNacimiento',
        DocenteDireccion = '$DocenteDireccion',
        DocenteCelular = '$DocenteCelular'
        WHERE id = '$id'
        ";

    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: ".mysqli_error($conexion);
    }
}
?>