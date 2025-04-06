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
    $SemestreCodigo = $_POST['txt-SemestreCodigo'];
    $SemestreNumeral = $_POST['txt-SemestreNumeral'];
    $SemestreLiteral = $_POST['txt-SemestreLiteral'];

    $sql = "UPDATE semestres SET 
        id = '$id',
        SemestreCodigo = '$SemestreCodigo',
        SemestreNumeral = '$SemestreNumeral',
        SemestreLiteral = '$SemestreLiteral'
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