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
    $sql = "SELECT * FROM carreras WHERE id = '$id';";
    $resultado = mysqli_query($conexion, $sql);
    $carreras = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Edita Carreras</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Editar Carreras</h1>
        <form action="actualizar.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="txt-id" value="<?php echo $carreras['id']; ?>" readonly required>
            </div>

            <div class="form-group">
                <label for="CarreraCodigo">Codigo:</label>
                <input type="text" name="txt-CarreraCodigo" value="<?php echo $carreras['CarreraCodigo']; ?>" required>
            </div>

            <div class="form-group">
                <label for="CarreraNombre">Nombre de carrera:</label>
                <input type="text" name="txt-CarreraNombre" value="<?php echo $carreras['CarreraNombre']; ?>" required>
            </div>

            <div class="form-group">
                <label for="CarreraAbreviacion">Abreviacion:</label>
                <input type="text" name="txt-CarreraAbreviacion" value="<?php echo $carreras['CarreraAbreviacion']; ?>" required>
            </div>

            <button type="submit" name="actualizar" class="btn btn-actualizar">Actualizar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>