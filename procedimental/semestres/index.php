<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "db_instituto";

$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

if (!$conexion) {
    die("Error de conexion: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Semestres - Procedimientos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h1>Lista de Semestres</h1>
    <a href="crear.php" class="btn">Nuevo Semestre</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>SemestreCodigo</th>
                <th>SemestreNumeral</th>
                <th>SemestreLiteral</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM semestres;";
            $resultado = mysqli_query($conexion, $sql);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>".$fila['id']."</td>";
                echo "<td>".$fila['SemestreCodigo']."</td>";
                echo "<td>".$fila['SemestreNumeral']."</td>";
                echo "<td>".$fila['SemestreLiteral']."</td>";
                echo "<td>";
                echo '<a href="editar.php?id='.$fila['id'].'" class="btn">Editar</a>';
                echo '<a href="eliminar.php?id='.$fila['id'].'" class="btn btn-danger">Eliminar</a>';
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>