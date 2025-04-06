<?php
require_once 'clases/Database.php';
require_once 'clases/Semestre.php';

$database = new Database();
$semestre = new Semestre($database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($semestre->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el semestre";
    }
}

$database->closeConnection();
?>