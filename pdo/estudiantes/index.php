<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/EstudiantePDO.php';

$database = new DatabasePDO();
$estudiante = new EstudiantePDO($database);
$estudiantes = $estudiante->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Estudiantes - PDO</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Estudiantes</h1>
        <a href="crear.php" class="btn">Nuevo Estudiante</a>
        <table>
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $fila): ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['ci']); ?></td>
                    <td><?php echo htmlspecialchars($fila['nombres']); ?></td>
                    <td><?php echo htmlspecialchars($fila['apellidos']); ?></td>
                    <td><?php echo htmlspecialchars($fila['email']); ?></td>
                    <td><?php echo htmlspecialchars($fila['celular']); ?></td>
                    <td><?php echo htmlspecialchars($fila['carrera']); ?></td>
                    <td>
                        <a href="editar.php?ci=<?php echo $fila['ci']; ?>" class="btn">Editar</a>
                        <a href="eliminar.php?ci=<?php echo $fila['ci']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $database->closeConnection(); ?>