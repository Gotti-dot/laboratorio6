<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/EstudiantePDO.php';

$database = new DatabasePDO();
$estudiante = new EstudiantePDO($database);

if (isset($_GET['ci'])) {
    $ci = $_GET['ci'];
    if ($estudiante->delete($ci)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el estudiante";
    }
}

$database->closeConnection();
?>