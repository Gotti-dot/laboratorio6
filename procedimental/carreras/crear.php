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
    <title>Crear Carreras</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nueva Carrera</h1>
        <form action="crear.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="txt-id" required>
            </div>
            <div class="form-group">
                <label for="CarreraCodigo">Codigo:</label>
                <input type="text" name="txt-CarreraCodigo" required>
            </div>
            <div class="form-group">
                <label for="CarreraNombre">Nombre de carrera:</label>
                <input type="text" name="txt-CarreraNombre" required>
            </div>
            <div class="form-group">
                <label for="CarreraAbreviacion">Abreviacion:</label>
                <input type="text" name="txt-CarreraAbreviacion" required>
           
            <button type="submit" name="crear" class="btn">Guardar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
<?php
if (isset($_POST['crear'])) {
    $id = $_POST['txt-id'];
    $CarreraCodigo = $_POST['txt-CarreraCodigo'];
    $CarreraNombre = $_POST['txt-CarreraNombre'];
    $CarreraAbreviacion = $_POST['txt-CarreraAbreviacion'];

    $sql = "INSERT INTO carreras (id, CarreraCodigo, CarreraNombre, CarreraAbreviacion)
            VALUES ('$id', '$CarreraCodigo', '$CarreraNombre', '$CarreraAbreviacion');";

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