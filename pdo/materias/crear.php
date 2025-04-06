<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/MateriaPDO.php';

$database = new DatabasePDO();
$materia = new MateriaPDO($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => $_POST['id'],
        'MateriaCodigo' => $_POST['MateriaCodigo'],
        'MateriaNombre' => $_POST['MateriaNombre'],
        'MateriaHoraAcademica' => $_POST['MateriaHoraAcademica'],
        'MateriaTipo' => $_POST['MateriaTipo'],
        'MateriaPensum' => $_POST['MateriaPensum']
    ];

    if ($materia->create($data)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error al crear materia";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Carrera - PDO</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nueva Carrera</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" required>
            </div>
            <div class="form-group">
                <label for="MateriaCodigo">MateriaCodigo:</label>
                <input type="text" name="MateriaCodigo" required>
            </div>
            <div class="form-group">
                <label for="MateriaNombre">MateriaNombre:</label>
                <input type="text" name="MateriaNombre" required>
            </div>
            <div class="form-group">
                <label for="MateriaHoraAcademica">MateriaHoraAcademica:</label>
                <input type="MateriaHoraAcademica" name="MateriaHoraAcademica" required>
            </div>
            <div class="form-group">
                <label for="MateriaTipo">MateriaTipo:</label>
                <input type="text" name="MateriaTipo">
            </div>
            <div class="form-group">
                <label for="MateriaPensum">MateriaPensum:</label>
                <input type="text" name="MateriaPensum">
            </div>
            <button type="submit" class="btn">Guardar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>

<?php $database->closeConnection(); ?>