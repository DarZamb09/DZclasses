<?php
include 'Modelo/db.php';
include 'Vista/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $titulo = $_POST['titulo'];
    $idcargo = $_POST['idcargo'];

    $stmt = $conn->prepare("INSERT INTO empleados (nombre, apellido, titulo, idcargo) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $apellido, $titulo, $idcargo]);

    header("Location: empleados.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">New Employee</h1>
        <form method="post" action="agregar_empleado.php">
            <div class="form-group">
                <label for="nombre">Name:</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Last name:</label>
                <input type="text" name="apellido" class="form-control" id="apellido" required>
            </div>
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" class="form-control" id="titulo" required>
            </div>
            <div class="form-group">
                <label for="idcargo">Ocupation:</label>
                <select name="idcargo" class="form-control" id="idcargo">
                    <?php
                    $stmt = $conn->prepare("SELECT idcargo, descripcion FROM cargos");
                    $stmt->execute();
                    $cargos = $stmt->fetchAll();
                    foreach ($cargos as $cargo) {
                        echo "<option value=\"{$cargo['idcargo']}\">{$cargo['descripcion']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">New emloyee</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php include 'Vista/footer.php'; ?>

