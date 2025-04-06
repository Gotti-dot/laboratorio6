<?php
require_once 'clases/Database.php';
require_once 'clases/Docente.php';

$database = new Database();
$docente = new Docente($database);

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
        echo "Error al actualizar el docente";
    }
}
$database->closeConnection();
?>