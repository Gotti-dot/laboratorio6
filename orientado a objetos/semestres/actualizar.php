<?php
require_once 'clases/Database.php';
require_once 'clases/Semestre.php';

$database = new Database();
$semestre = new Semestre($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $data = [
        'id' => $_POST['id'],
        'SemestreCodigo' => $_POST['SemestreCodigo'],
        'SemestreNumeral' => $_POST['SemestreNumeral'],
        'SemestreLiteral' => $_POST['SemestreLiteral']
    ];

    if ($semestre->update($id, $data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el semestre";
    }
}

$database->closeConnection();
?>