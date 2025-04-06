<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/CarreraPDO.php';

$database = new DatabasePDO();
$carrera = new CarreraPDO($database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($carrera->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar la carrera";
    }
}

$database->closeConnection();
?>