<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/MateriaPDO.php';

$database = new DatabasePDO();
$materia = new MateriaPDO($database);
$materias = $materia->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Materias - PDO</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Materias</h1>
        <a href="crear.php" class="btn">Nueva Materia</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>MateriaCodigo</th>
                    <th>MateriaNombre</th>
                    <th>MateriaHoraAcademica</th>
                    <th>MateriaTipo</th>
                    <th>MateriaPensum</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($materias as $fila): ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['id']); ?></td>
                    <td><?php echo htmlspecialchars($fila['MateriaCodigo']); ?></td>
                    <td><?php echo htmlspecialchars($fila['MateriaNombre']); ?></td>
                    <td><?php echo htmlspecialchars($fila['MateriaHoraAcademica']); ?></td>
                    <td><?php echo htmlspecialchars($fila['MateriaTipo']); ?></td>
                    <td><?php echo htmlspecialchars($fila['MateriaPensum']); ?></td>
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