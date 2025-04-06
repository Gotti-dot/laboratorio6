<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/CarreraPDO.php';

$database = new DatabasePDO();
$carrera = new CarreraPDO($database);

$id = $_GET['id'] ?? null;
$datosCarrera = $carrera->getById($id);

if (!$datosCarrera) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Carrera - PDO</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Editar Carrera</h1>
        <form action="actualizar.php" method="POST">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" value="<?php echo htmlspecialchars($datosCarrera['id']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="CarreraCodigo">CarreraCodigo:</label>
                <input type="text" name="CarreraCodigo" value="<?php echo htmlspecialchars($datosCarrera['CarreraCodigo']); ?>" required>
            </div>
            <div class="form-group">
                <label for="CarreraNombre">CarreraNombre:</label>
                <input type="text" name="CarreraNombre" value="<?php echo htmlspecialchars($datosCarrera['CarreraNombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="CarreraAbreviacion">CarreraAbreviacion:</label>
                <input type="CarreraAbreviacion" name="CarreraAbreviacion" value="<?php echo htmlspecialchars($datosCarrera['CarreraAbreviacion']); ?>" required>
            </div>
        
            <button type="submit" name="actualizar" class="btn">Actualizar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>
<?php $database->closeConnection(); ?>