<?php
require_once 'clases/Database.php';
require_once 'clases/Docente.php';

$database = new Database();
$docente = new Docente($database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($docente->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el docente";
    }
}
$database->closeConnection();
?>