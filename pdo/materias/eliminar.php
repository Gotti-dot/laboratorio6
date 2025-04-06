<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/MateriaPDO.php';

$database = new DatabasePDO();
$materia = new MateriaPDO($database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($materia->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar  materia";
    }
}
$database->closeConnection();
?>