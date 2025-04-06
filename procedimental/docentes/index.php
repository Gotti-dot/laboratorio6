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
    <title>CRUD Docentes - Procedimientos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h1>Lista de Docentes</h1>
    <a href="crear.php" class="btn">Nuevo Docente</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>DocenteCodigo</th>
                <th>CI</th>
                <th>DocenteNombres</th>
                <th>Fecha de Nacimiento</th>
                <th>Direccion</th>
                <th>Celular</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM docentes;";
            $resultado = mysqli_query($conexion, $sql);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>".$fila['id']."</td>";
                echo "<td>".$fila['DocenteCodigo']."</td>";
                echo "<td>".$fila['DocenteCarnetIdentidad']."</td>";
                echo "<td>".$fila['DocenteNombres']."</td>";
                echo "<td>".$fila['DocenteFechaNacimiento']."</td>";
                echo "<td>".$fila['DocenteDireccion']."</td>";
                echo "<td>".$fila['DocenteCelular']."</td>";
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