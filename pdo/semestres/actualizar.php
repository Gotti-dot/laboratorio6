<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/SemestrePDO.php';

$database = new DatabasePDO();
$semestre = new SemestrePDO($database);

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
        echo "Error al actualizar semestre";
    }
}
$database->closeConnection();
?>