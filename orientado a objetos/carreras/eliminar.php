<?php
require_once 'clases/Database.php';
require_once 'clases/Carrera.php';

$database = new Database();
$carrera = new Carrera($database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($carrera->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el estudiante";
    }
}

$database->closeConnection();
?>