<?php
require_once 'clases/Database.php';
require_once 'clases/Carrera.php';

$database = new Database();
$carrera = new Carrera($database);

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
        echo "Error al actualizar el carrera";
    }
}

$database->closeConnection();
?>