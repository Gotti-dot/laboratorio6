<?php
require_once 'clases/Database.php';
require_once 'clases/Estudiante.php';

$database = new Database();
$estudiante = new Estudiante($database);

$ci = $_GET['ci'] ?? null;
$datosEstudiante = $estudiante->getById($ci);

if (!$datosEstudiante) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante - OOP</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Editar Estudiante</h1>
        <form action="actualizar.php" method="POST">
            <div class="form-group">
                <label for="ci">Cedula Identidad:</label>
                <input type="text" name="ci" value="<?php echo $datosEstudiante['ci']; ?>" readonly>
            </div>            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombres" value="<?php echo $datosEstudiante['nombres']; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellidos" value="<?php echo $datosEstudiante['apellidos']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $datosEstudiante['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" name="celular" value="<?php echo $datosEstudiante['celular']; ?>">
            </div>
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <input type="text" name="carrera" value="<?php echo $datosEstudiante['carrera']; ?>">
            </div>
            <button type="submit" name="actualizar" class="btn">Actualizar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>
<?php $database->closeConnection(); ?>