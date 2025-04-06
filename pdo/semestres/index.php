<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/SemestrePDO.php';

$database = new DatabasePDO();
$semestre = new SemestrePDO($database);
$semestres = $semestre->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Semestres - PDO</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Semestres</h1>
        <a href="crear.php" class="btn">Nuevo Estudiante</a>
        <table>
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
                <?php foreach ($semestres as $fila): ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['id']); ?></td>
                    <td><?php echo htmlspecialchars($fila['SemestreCodigo']); ?></td>
                    <td><?php echo htmlspecialchars($fila['SemestreNumeral']); ?></td>
                    <td><?php echo htmlspecialchars($fila['SemestreLiteral']); ?></td>
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