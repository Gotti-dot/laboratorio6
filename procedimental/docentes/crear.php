<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "db_instituto";

$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

if (!$conexion) {
    die("Error de conexion: " . mysqli_connect_error());
}
echo "Conexion realizada con exito.";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Docentes</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Docente</h1>
        <form action="crear.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="txt-id" required>
            </div>
            <div class="form-group">
                <label for="DocenteCodigo">DocenteCodigo:</label>
                <input type="text" name="txt-DocenteCodigo" required>
            </div>
            <div class="form-group">
                <label for="DocenteCarnetIdentidad">DocenteCarnetIdentidad:</label>
                <input type="text" name="txt-DocenteCarnetIdentidad" required>
            </div>
            <div class="form-group">
                <label for="DocenteNombres">DocenteNombres:</label>
                <input type="text" name="txt-DocenteNombres" required>
            </div>
            <div class="form-group">
                <label for="DocenteFechaNacimiento">DocenteFechaNacimiento:</label>
                <input type="text" name="txt-DocenteFechaNacimiento" required>
            </div>
            <div class="form-group">
                <label for="DocenteDireccion">DocenteDireccion:</label>
                <input type="text" name="txt-DocenteDireccion">
            </div>
            <div class="form-group">
                <label for="DocenteCelular">DocenteCelular:</label>
                <input type="text" name="txt-DocenteCelular">
            </div>
            <button type="submit" name="crear" class="btn">Guardar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
<?php
if (isset($_POST['crear'])) {
    $id = $_POST['txt-id'];
    $DocenteCodigo = $_POST['txt-DocenteCodigo'];
    $DocenteCarnetIdentidad = $_POST['txt-DocenteCarnetIdentidad'];
    $DocenteNombres = $_POST['txt-DocenteNombres'];
    $DocenteFechaNacimiento = $_POST['txt-DocenteFechaNacimiento'];
    $DocenteDireccion = $_POST['txt-DocenteDireccion'];
    $DocenteCelular = $_POST['txt-DocenteCelular'];

    $sql = "INSERT INTO docentes (id, DocenteCodigo, DocenteCarnetIdentidad, DocenteNombres, DocenteFechaNacimiento, DocenteDireccion, DocenteCelular)
            VALUES ('$id', '$DocenteCodigo', '$DocenteCarnetIdentidad', '$DocenteNombres', '$DocenteFechaNacimiento', '$DocenteDireccion', '$DocenteCelular');";

    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
    } else {
        echo "<p class='error'>" . mysqli_error($conexion) . "</p>";
    }
}
?>
    </div>
</body>
</html>