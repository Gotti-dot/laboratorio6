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
    $MateriaCodigo = $_POST['txt-MateriaCodigo'];
    $MateriaNombre = $_POST['txt-MateriaNombre'];
    $MateriaHoraAcademica = $_POST['txt-MateriaHoraAcademica'];
    $MateriaTipo = $_POST['txt-MateriaTipo'];
    $MateriaPensum = $_POST['txt-MateriaPensum'];

    $sql = "UPDATE materias SET 
        id = '$id',
        MateriaCodigo = '$MateriaCodigo',
        MateriaNombre = '$MateriaNombre',
        MateriaHoraAcademica = '$MateriaHoraAcademica',
        MateriaTipo = '$MateriaTipo',
        MateriaPensum = '$MateriaPensum'
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