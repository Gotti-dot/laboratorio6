<?php
require_once 'clases/Database.php';
require_once 'clases/Materia.php';

$database = new Database();
$materia = new Materia($database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($materia->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar la materia";
    }
}

$database->closeConnection();
?>