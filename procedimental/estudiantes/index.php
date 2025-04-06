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
    <title>CRUD Estudiantes - Procedimientos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h1>Lista de Estudiantes</h1>
    <a href="crear.php" class="btn">Nuevo Estudiante</a>
    <table border="1">
        <thead>
            <tr>
                <th>CI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM estudiante;";
            $resultado = mysqli_query($conexion, $sql);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>".$fila['ci']."</td>";
                echo "<td>".$fila['nombres']."</td>";
                echo "<td>".$fila['apellidos']."</td>";
                echo "<td>".$fila['email']."</td>";
                echo "<td>".$fila['celular']."</td>";
                echo "<td>".$fila['carrera']."</td>";
                echo "<td>";
                echo '<a href="editar.php?ci='.$fila['ci'].'" class="btn">Editar</a>';
                echo '<a href="eliminar.php?ci='.$fila['ci'].'" class="btn btn-danger">Eliminar</a>';
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>