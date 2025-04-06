<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/DocentePDO.php';

$database = new DatabasePDO();
$docente = new DocentePDO($database);
$docentes = $docente->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Docentes - PDO</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Docentes</h1>
        <a href="crear.php" class="btn">Nuevo Docente</a>
        <table>
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
                <?php foreach ($docentes as $fila): ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['id']); ?></td>
                    <td><?php echo htmlspecialchars($fila['DocenteCodigo']); ?></td>
                    <td><?php echo htmlspecialchars($fila['DocenteCarnetIdentidad']); ?></td>
                    <td><?php echo htmlspecialchars($fila['DocenteNombres']); ?></td>
                    <td><?php echo htmlspecialchars($fila['DocenteFechaNacimiento']); ?></td>
                    <td><?php echo htmlspecialchars($fila['DocenteDireccion']); ?></td>
                    <td><?php echo htmlspecialchars($fila['DocenteCelular']); ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn">Editar</a>
                        <a href="eliminar.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $database->closeConnection(); ?>