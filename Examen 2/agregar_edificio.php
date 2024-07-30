<?php
include 'Modelo/db.php';
include 'Vista/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcion = $_POST['descripcion'];
    $pisos = $_POST['pisos'];
    $estado = $_POST['estado'];
    $idtipo = $_POST['idtipo'];

    $stmt = $conn->prepare("INSERT INTO edificios (descripcion, pisos, estado, idtipo) VALUES (?, ?, ?, ?)");
    $stmt->execute([$descripcion, $pisos, $estado, $idtipo]);

    header("Location: edificios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Edificio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Descripcion </h1>
        <form method="post" action="agregar_edificio.php">
            <div class="form-group">
                <label for="descripcion">Detalles:</label>
                <input type="text" name="descripcion" class="form-control" id="descripcion" required>
            </div>
            <div class="form-group">
                <label for="pisos">Numero de pisos:</label>
                <input type="text" name="pisos" class="form-control" id="pisos" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado del edificio:</label>
                <input type="text" name="estado" class="form-control" id="estado" required>
            </div>
            <div class="form-group">
                <label for="idtipo">Tipo de Edificio:</label>
                <select name="idtipo" class="form-control" id="idtipo">
                    <?php
                    $stmt = $conn->prepare("SELECT idtipo, descriptipo FROM tipos");
                    $stmt->execute();
                    $tipos = $stmt->fetchAll();
                    foreach ($tipos as $tipo) {
                        echo "<option value=\"{$tipo['idtipo']}\">{$tipo['descriptipo']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Nuevo Edificio</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php include 'Vista/footer.php'; ?>

