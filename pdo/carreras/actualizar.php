<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/CarreraPDO.php';

$database = new DatabasePDO();
$carrera = new CarreraPDO($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $data = [
        'id' => $_POST['id'],
        'CarreraCodigo' => $_POST['CarreraCodigo'],
        'CarreraNombre' => $_POST['CarreraNombre'],
        'CarreraAbreviacion' => $_POST['CarreraAbreviacion']
    ];

    if ($carrera->update($id, $data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el estudiante";
    }
}
$database->closeConnection();
?>