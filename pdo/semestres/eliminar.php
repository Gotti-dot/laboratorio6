<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/SemestrePDO.php';

$database = new DatabasePDO();
$semestre = new SemestrePDO($database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($semestre->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar semestre";
    }
}

$database->closeConnection();
?>