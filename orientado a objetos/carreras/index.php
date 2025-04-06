<?php
require_once 'clases/Database.php';
require_once 'clases/Carrera.php';

$database = new Database();
$carrera = new Carrera($database);
$carreras = $carrera->getAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Carreras - OOP</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Carreras</h1>
        <a href="crear.php" class="btn">Nueva Carrera</a>
        <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Abreviacion</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($fila = $carreras->fetch_assoc()): ?>
    <tr>
      <td><?php echo $fila['id']; ?></td>
      <td><?php echo $fila['CarreraCodigo']; ?></td>
      <td><?php echo $fila['CarreraNombre']; ?></td>
      <td><?php echo $fila['CarreraAbreviacion']; ?></td>
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