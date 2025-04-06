<?php
require_once 'clases/Database.php';
require_once 'clases/Semestre.php';

$database = new Database();
$semestre = new Semestre($database);

$id = $_GET['id'] ?? null;
$datosSemestre = $semestre->getById($id);

if (!$datosSemestre) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Semestre - OOP</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Editar Semestre</h1>
        <form action="actualizar.php" method="POST">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" value="<?php echo $datosSemestre['id']; ?>" readonly>
            </div>            
            <div class="form-group">
                <label for="SemestreCodigo">SemestreCodigo:</label>
                <input type="text" name="SemestreCodigo" value="<?php echo $datosSemestre['SemestreCodigo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="SemestreNumeral">SemestreNumeral:</label>
                <input type="text" name="SemestreNumeral" value="<?php echo $datosSemestre['SemestreNumeral']; ?>" required>
            </div>
            <div class="form-group">
                <label for="SemestreLiteral">SemestreLiteral:</label>
                <input type="SemestreLiteral" name="SemestreLiteral" value="<?php echo $datosSemestre['SemestreLiteral']; ?>" required>
        
            <button type="submit" name="actualizar" class="btn">Actualizar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>
<?php $database->closeConnection(); ?>