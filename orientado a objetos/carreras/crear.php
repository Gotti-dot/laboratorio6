<?php
require_once 'clases/Database.php';
require_once 'clases/Carrera.php';

$database = new Database();
$carrera = new Carrera($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => $_POST['id'],
        'CarreraCodigo' => $_POST['CarreraCodigo'],
        'CarreraNombre' => $_POST['CarreraNombre'],
        'CarreraAbreviacion' => $_POST['CarreraAbreviacion']
    ];
    
    if ($carrera->create($data)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error al crear la carrera";
    }
}
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Crear Carrera - OOP</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <div class="container">
            <h1>Crear Nueva Carrera</h1>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" name="id" required>
                </div>
                <div class="form-group">
                    <label for="CarreraCodigo">CarreraCodigo:</label>
                    <input type="text" name="CarreraCodigo" required>
                </div>
                <div class="form-group">
                    <label for="CarreraNombre">CarreraNombre:</label>
                    <input type="text" name="CarreraNombre" required>
                </div>
                <div class="form-group">
                    <label for="CarreraAbreviacion">CarreraAbreviacion:</label>
                    <input type="text" name="CarreraAbreviacion" required>
                </div>

                <button type="submit" class="btn">Guardar</button>
                <a href="index.php" class="btn btn-cancel">Cancelar</a>
              </form>
           </div>
        </body>
</html>
<?php $database->closeConnection(); ?>