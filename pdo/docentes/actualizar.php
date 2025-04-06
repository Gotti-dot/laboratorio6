<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/DocentePDO.php';

$database = new DatabasePDO();
$docente = new DocentePDO($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $data = [
        'id' => $_POST['id'],
        'DocenteCodigo' => $_POST['DocenteCodigo'],
        'DocenteCarnetIdentidad' => $_POST['DocenteCarnetIdentidad'],
        'DocenteNombres' => $_POST['DocenteNombres'],
        'DocenteFechaNacimiento' => $_POST['DocenteFechaNacimiento'],
        'DocenteDireccion' => $_POST['DocenteDireccion'],
        'DocenteCelular' => $_POST['DocenteCelular']
    ];

    if ($docente->update($id, $data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar docente";
    }
}
$database->closeConnection();
?>