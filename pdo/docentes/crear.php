<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/DocentePDO.php';

$database = new DatabasePDO();
$docente = new DocentePDO($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => $_POST['id'],
        'DocenteCodigo' => $_POST['DocenteCodigo'],
        'DocenteCarnetIdentidad' => $_POST['DocenteCarnetIdentidad'],
        'DocenteNombres' => $_POST['DocenteNombres'],
        'DocenteFechaNacimiento' => $_POST['DocenteFechaNacimiento'],
        'DocenteDireccion' => $_POST['DocenteDireccion'],
        'DocenteCelular' => $_POST['DocenteCelular']
    ];

    if ($docente->create($data)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error al crear docente";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Docente - PDO</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Docente</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" required>
            </div>
            <div class="form-group">
                <label for="DocenteCodigo">DocenteCodigo:</label>
                <input type="text" name="DocenteCodigo" required>
            </div>
            <div class="form-group">
                <label for="DocenteCarnetIdentidad">CI:</label>
                <input type="text" name="DocenteCarnetIdentidad" required>
            </div>
            <div class="form-group">
                <label for="DocenteNombres">Nombres:</label>
                <input type="DocenteNombres" name="DocenteNombres" required>
            </div>
            <div class="form-group">
                <label for="DocenteFechaNacimiento">Fecha de Nacimiento:</label>
                <input type="text" name="DocenteFechaNacimiento">
            </div>
            <div class="form-group">
                <label for="DocenteDireccion">Direccion:</label>
                <input type="text" name="DocenteDireccion">
            </div>
            <div class="form-group">
                <label for="DocenteCelular">Celular:</label>
                <input type="text" name="DocenteCelular">
            </div>

            <button type="submit" class="btn">Guardar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>

<?php $database->closeConnection(); ?>