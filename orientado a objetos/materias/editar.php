<?php
require_once 'clases/Database.php';
require_once 'clases/Materia.php';

$database = new Database();
$materia = new Materia($database);

$id = $_GET['id'] ?? null;
$datosMateria = $materia->getById($id);

if (!$datosMateria) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Materia - OOP</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Editar Materia</h1>
        <form action="actualizar.php" method="POST">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" value="<?php echo $datosMateria['id']; ?>" readonly>
            </div>            
            <div class="form-group">
                <label for="MateriaCodigo">MateriaCodigo:</label>
                <input type="text" name="MateriaCodigo" value="<?php echo $datosMateria['MateriaCodigo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="MateriaNombre">MateriaNombre:</label>
                <input type="text" name="MateriaNombre" value="<?php echo $datosMateria['MateriaNombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="MateriaHoraAcademica">MateriaHoraAcademica:</label>
                <input type="MateriaHoraAcademica" name="MateriaHoraAcademica" value="<?php echo $datosMateria['MateriaHoraAcademica']; ?>" required>
            </div>
            <div class="form-group">
                <label for="MateriaTipo">MateriaTipo:</label>
                <input type="text" name="MateriaTipo" value="<?php echo $datosMateria['MateriaTipo']; ?>">
            </div>
            <div class="form-group">
                <label for="MateriaPensum">MateriaPensum:</label>
                <input type="text" name="MateriaPensum" value="<?php echo $datosMateria['MateriaPensum']; ?>">
            </div>
            <button type="submit" name="actualizar" class="btn">Actualizar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>
<?php $database->closeConnection(); ?>