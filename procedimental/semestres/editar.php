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
    $sql = "SELECT * FROM semestres WHERE id = '$id';";
    $resultado = mysqli_query($conexion, $sql);
    $semestres = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Semestres</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Editar Semestres</h1>
        <form action="actualizar.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="txt-id" value="<?php echo $semestres['id']; ?>" readonly required>
            </div>

            <div class="form-group">
                <label for="SemestreCodigo">SemestreCodigo:</label>
                <input type="text" name="txt-SemestreCodigo" value="<?php echo $semestres['SemestreCodigo']; ?>" required>
            </div>

            <div class="form-group">
                <label for="SemestreNumeral">SemestreNumeral:</label>
                <input type="text" name="txt-SemestreNumeral" value="<?php echo $semestres['SemestreNumeral']; ?>" required>
            </div>

            <div class="form-group">
                <label for="SemestreLiteral">SemestreLiteral:</label>
                <input type="text" name="txt-SemestreLiteral" value="<?php echo $semestres['SemestreLiteral']; ?>" required>
            </div>

            <button type="submit" name="actualizar" class="btn btn-actualizar">Actualizar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>