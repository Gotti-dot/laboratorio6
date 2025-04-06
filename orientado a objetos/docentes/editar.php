<?php
require_once 'clases/Database.php';
require_once 'clases/Docente.php';

$database = new Database();
$docente = new Docente($database);

$id = $_GET['id'] ?? null;
$datosDocente= $docente->getById($id);

if (!$datosDocente) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Docente - OOP</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Editar Docente</h1>
        <form action="actualizar.php" method="POST">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" value="<?php echo $datosDocente['id']; ?>" readonly>
            </div>            
            <div class="form-group">
                <label for="DocenteCodigo">DocenteCodigo:</label>
                <input type="text" name="DocenteCodigo" value="<?php echo $datosDocente['DocenteCodigo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="DocenteCarnetIdentidad">CI:</label>
                <input type="text" name="DocenteCarnetIdentidad" value="<?php echo $datosDocente['DocenteCarnetIdentidad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="DocenteNombres">Nombres:</label>
                <input type="DocenteNombres" name="DocenteNombres" value="<?php echo $datosDocente['DocenteNombres']; ?>" required>
            </div>
            <div class="form-group">
                <label for="DocenteFechaNacimiento">Fecha de Nacimiento:</label>
                <input type="text" name="DocenteFechaNacimiento" value="<?php echo $datosDocente['DocenteFechaNacimiento']; ?>">
            </div>
            <div class="form-group">
                <label for="DocenteDireccion">Direccion:</label>
                <input type="text" name="DocenteDireccion" value="<?php echo $datosDocente['DocenteDireccion']; ?>">
            </div>
            <div class="form-group">
                <label for="DocenteCelular">Celular:</label>
                <input type="text" name="DocenteCelular" value="<?php echo $datosDocente['DocenteCelular']; ?>">
            </div>

            <button type="submit" name="actualizar" class="btn">Actualizar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>
<?php $database->closeConnection(); ?>