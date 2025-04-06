<?php
//Formulario para editar
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "db_instituto";

$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM docentes WHERE id = '$id';";
    $resultado = mysqli_query($conexion, $sql);
    $docentes = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Docentes</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Editar Docentes</h1>
        <form action="actualizar.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="txt-id" value="<?php echo $docentes['id']; ?>" readonly required>
            </div>

            <div class="form-group">
                <label for="DocenteCodigo">DocenteCodigo:</label>
                <input type="text" name="txt-DocenteCodigo" value="<?php echo $docentes['DocenteCodigo']; ?>" required>
            </div>

            <div class="form-group">
                <label for="DocenteCarnetIdentidad">DocenteCarnetIdentidad:</label>
                <input type="text" name="txt-DocenteCarnetIdentidad" value="<?php echo $docentes['DocenteCarnetIdentidad']; ?>" required>
            </div>

            <div class="form-group">
                <label for="DocenteNombres">DocenteNombres:</label>
                <input type="text" name="txt-DocenteNombres" value="<?php echo $docentes['DocenteNombres']; ?>" required>
            </div>

            <div class="form-group">
                <label for="DocenteFechaNacimiento">DocenteFechaNacimiento:</label>
                <input type="text" name="txt-DocenteFechaNacimiento" value="<?php echo $docentes['DocenteFechaNacimiento']; ?>" required>
            </div>

            <div class="form-group">
                <label for="DocenteDireccion">DocenteDireccion:</label>
                <input type="text" name="txt-DocenteDireccion" value="<?php echo $docentes['DocenteDireccion']; ?>">
            </div>

            <div class="form-group">
                <label for="DocenteCelular">DocenteCelular:</label>
                <input type="text" name="txt-DocenteCelular" value="<?php echo $docentes['DocenteCelular']; ?>">
            </div>

            <button type="submit" name="actualizar" class="btn btn-actualizar">Actualizar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>