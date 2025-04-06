<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/DocentePDO.php';

$database = new DatabasePDO();
$docente = new DocentePDO($database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($docente->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar docente";
    }
}

$database->closeConnection();
?>