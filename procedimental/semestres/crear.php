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
    <title>Crear Semestres</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Semestre</h1>
        <form action="crear.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="txt-id" required>
            </div>
            <div class="form-group">
                <label for="SemestreCodigo">SemestreCodigo:</label>
                <input type="text" name="txt-SemestreCodigo" required>
            </div>
            <div class="form-group">
                <label for="SemestreNumeral">SemestreNumeral:</label>
                <input type="text" name="txt-SemestreNumeral" required>
            </div>
            <div class="form-group">
                <label for="SemestreLiteral">SemestreLiteral:</label>
                <input type="text" name="txt-SemestreLiteral" required>
           
            <button type="submit" name="crear" class="btn">Guardar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
<?php
if (isset($_POST['crear'])) {
    $id = $_POST['txt-id'];
    $SemestreCodigo = $_POST['txt-SemestreCodigo'];
    $SemestreNumeral = $_POST['txt-SemestreNumeral'];
    $SemestreLiteral = $_POST['txt-SemestreLiteral'];

    $sql = "INSERT INTO semestres (id, SemestreCodigo, SemestreNumeral, SemestreLiteral)
            VALUES ('$id', '$SemestreCodigo', '$SemestreNumeral', '$SemestreLiteral');";

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