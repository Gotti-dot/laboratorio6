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
    $sql = "SELECT * FROM materias WHERE id = '$id';";
    $resultado = mysqli_query($conexion, $sql);
    $materias = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Edita Materias</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Editar Materias</h1>
        <form action="actualizar.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="txt-id" value="<?php echo $materias['id']; ?>" readonly required>
            </div>

            <div class="form-group">
                <label for="MateriaCodigo">Codigo de Materia:</label>
                <input type="text" name="txt-MateriaCodigo" value="<?php echo $materias['MateriaCodigo']; ?>" required>
            </div>

            <div class="form-group">
                <label for="MateriaNombre">Materia:</label>
                <input type="text" name="txt-MateriaNombre" value="<?php echo $materias['MateriaNombre']; ?>" required>
            </div>

            <div class="form-group">
                <label for="MateriaHoraAcademica">Hora Academica:</label>
                <input type="text" name="txt-MateriaHoraAcademica" value="<?php echo $materias['MateriaHoraAcademica']; ?>" required>
            </div>

            <div class="form-group">
                <label for="MateriaTipo">Materia Tipo:</label>
                <input type="text" name="txt-MateriaTipo" value="<?php echo $materias['MateriaTipo']; ?>" required>
            </div>

            <div class="form-group">
                <label for="MateriaPensum">Materia Pensum:</label>
                <input type="text" name="txt-MateriaPensum" value="<?php echo $materias['MateriaPensum']; ?>">
            </div>

            <button type="submit" name="actualizar" class="btn btn-actualizar">Actualizar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>