<?php
require_once 'clases/Database.php';
require_once 'clases/Materia.php';

$database = new Database();
$materia = new Materia($database);
$materias = $materia->getAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Materias - OOP</title>
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
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Hora Academica</th>
      <th>Materia</th>
      <th>MateriaPensum</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($fila = $materias->fetch_assoc()): ?>
    <tr>
      <td><?php echo $fila['id']; ?></td>
      <td><?php echo $fila['MateriaCodigo']; ?></td>
      <td><?php echo $fila['MateriaNombre']; ?></td>
      <td><?php echo $fila['MateriaHoraAcademica']; ?></td>
      <td><?php echo $fila['MateriaTipo']; ?></td>
      <td><?php echo $fila['MateriaPensum']; ?></td>
      <td>
        <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn">Editar</a>
        <a href="eliminar.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger">Eliminar</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div>
</body>
</html>
<?php $database->closeConnection(); ?>