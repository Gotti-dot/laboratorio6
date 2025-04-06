<?php
require_once 'clases/Database.php';
require_once 'clases/Docente.php';

$database = new Database();
$docente = new Docente($database);
$docentes = $docente->getAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Docentes - OOP</title>
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
      <th>Nombres</th>
      <th>Fecha de Nacimiento</th>
      <th>Direccion</th>
      <th>Celular</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($fila = $docentes->fetch_assoc()): ?>
    <tr>
      <td><?php echo $fila['id']; ?></td>
      <td><?php echo $fila['DocenteCodigo']; ?></td>
      <td><?php echo $fila['DocenteCarnetIdentidad']; ?></td>
      <td><?php echo $fila['DocenteNombres']; ?></td>
      <td><?php echo $fila['DocenteFechaNacimiento']; ?></td>
      <td><?php echo $fila['DocenteDireccion']; ?></td>
      <td><?php echo $fila['DocenteCelular']; ?></td>
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