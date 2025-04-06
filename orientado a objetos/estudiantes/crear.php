<?php
require_once 'clases/Database.php';
require_once 'clases/Estudiante.php';

$database = new Database();
$estudiante = new Estudiante($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'ci' => $_POST['ci'],
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'email' => $_POST['email'],
        'celular' => $_POST['celular'],
        'carrera' => $_POST['carrera']
    ];
    
    if ($estudiante->create($data)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error al crear el estudiante";
    }
}
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Crear Estudiante - OOP</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <div class="container">
            <h1>Crear Nuevo Estudiante</h1>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label for="ci">Cedula Identidad:</label>
                    <input type="text" name="ci" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" name="celular">
                </div>
                <div class="form-group">
                <label for="carrera">Carrera:</label>
                <input type="text" name="carrera">
                </div>

                <button type="submit" class="btn">Guardar</button>
                <a href="index.php" class="btn btn-cancel">Cancelar</a>
              </form>
           </div>
        </body>
</html>
<?php $database->closeConnection(); ?>