<?php
require_once 'clases/Database.php';
require_once 'clases/Semestre.php';

$database = new Database();
$semestre = new Semestre($database);
$semestres = $semestre->getAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Semestres - OOP</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Semestres</h1>
        <a href="crear.php" class="btn">Nuevo Semestre</a>
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
    <?php while ($fila = $semestres->fetch_assoc()): ?>
    <tr>
      <td><?php echo $fila['id']; ?></td>
      <td><?php echo $fila['SemestreCodigo']; ?></td>
      <td><?php echo $fila['SemestreNumeral']; ?></td>
      <td><?php echo $fila['SemestreLiteral']; ?></td>
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