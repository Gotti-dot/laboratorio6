<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/MateriaPDO.php';

$database = new DatabasePDO();
$materia = new MateriaPDO($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $data = [
        'id' => $_POST['id'],
        'MateriaCodigo' => $_POST['MateriaCodigo'],
        'MateriaNombre' => $_POST['MateriaNombre'],
        'MateriaHoraAcademica' => $_POST['MateriaHoraAcademica'],
        'MateriaTipo' => $_POST['MateriaTipo'],
        'MateriaPensum' => $_POST['MateriaPensum']
    ];

    if ($materia->update($id, $data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar carrera";
    }
}
$database->closeConnection();
?>