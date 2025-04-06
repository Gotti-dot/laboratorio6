<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/SemestrePDO.php';

$database = new DatabasePDO();
$semestre = new SemestrePDO($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => $_POST['id'],
        'SemestreCodigo' => $_POST['SemestreCodigo'],
        'SemestreNumeral' => $_POST['SemestreNumeral'],
        'SemestreLiteral' => $_POST['SemestreLiteral']
    ];

    if ($semestre->create($data)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error al crear semestre";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Semestre - PDO</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Semestre</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" required>
            </div>
            <div class="form-group">
                <label for="SemestreCodigo">SemestreCodigo:</label>
                <input type="text" name="SemestreCodigo" required>
            </div>
            <div class="form-group">
                <label for="SemestreNumeral">SemestreNumeral:</label>
                <input type="text" name="SemestreNumeral" required>
            </div>
            <div class="form-group">
                <label for="SemestreLiteral">SemestreLiteral:</label>
                <input type="SemestreLiteral" name="SemestreLiteral" required>
            </div>

            <button type="submit" class="btn">Guardar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>
<?php $database->closeConnection(); ?>