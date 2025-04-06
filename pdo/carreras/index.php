<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/CarreraPDO.php';

$database = new DatabasePDO();
$carrera = new CarreraPDO($database);
$carreras = $carrera->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Carrera - PDO</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Carrera</h1>
        <a href="crear.php" class="btn">Nuevo Carrera</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CarreraCodigo</th>
                    <th>CarreraNombre</th>
                    <th>CarreraAbreviacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carreras as $fila): ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['id']); ?></td>
                    <td><?php echo htmlspecialchars($fila['CarreraCodigo']); ?></td>
                    <td><?php echo htmlspecialchars($fila['CarreraNombre']); ?></td>
                    <td><?php echo htmlspecialchars($fila['CarreraAbreviacion']); ?></td>
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