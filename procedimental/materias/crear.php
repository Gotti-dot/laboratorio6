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
    <title>Crear Materia</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nueva Materia</h1>
        <form action="crear.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="txt-id" required>
            </div>
            <div class="form-group">
                <label for="MateriaCodigo">Codigo de Materia:</label>
                <input type="text" name="txt-MateriaCodigo" required>
            </div>
            <div class="form-group">
                <label for="MateriaNombre">Materia:</label>
                <input type="text" name="txt-MateriaNombre" required>
            </div>
            <div class="form-group">
                <label for="MateriaHoraAcademica">Hora Academica:</label>
                <input type="text" name="txt-MateriaHoraAcademica" required>
            </div>
            <div class="form-group">
                <label for="MateriaTipo">Materia Tipo:</label>
                <input type="text" name="txt-MateriaTipo" required>
            </div>
            <div class="form-group">
                <label for="MateriaPensum">Materia Pensum:</label>
                <input type="text" name="txt-MateriaPensum">
            </div>
            <button type="submit" name="crear" class="btn">Guardar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
<?php
if (isset($_POST['crear'])) {
    $id = $_POST['txt-id'];
    $MateriaCodigo = $_POST['txt-MateriaCodigo'];
    $MateriaNombre = $_POST['txt-MateriaNombre'];
    $MateriaHoraAcademica = $_POST['txt-MateriaHoraAcademica'];
    $MateriaTipo = $_POST['txt-MateriaTipo'];
    $MateriaPensum = $_POST['txt-MateriaPensum'];

    $sql = "INSERT INTO materias (id, MateriaCodigo, MateriaNombre, MateriaHoraAcademica, MateriaTipo, MateriaPensum)
            VALUES ('$id', '$MateriaCodigo', '$MateriaNombre', '$MateriaHoraAcademica', '$MateriaTipo', '$MateriaPensum');";

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