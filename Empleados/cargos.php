<?php
include 'Modelo/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Puestos en la Empresa</title>
</head>
<body>
    <h1>Lista de Puestos</h1>
    <table border="2">
        <tr>
            <th>Identificacion</th>
            <th>Descripción</th>
            <th>Sueldo</th>
        </tr>
        <?php
        $stmt = $conn->prepare("SELECT * FROM cargos");
        $stmt->execute();
        $cargos = $stmt->fetchAll();
        foreach ($cargos as $cargo) {
            echo "<tr>
                    <td>{$cargo['idcargo']}</td>
                    <td>{$cargo['descripcion']}</td>
                    <td>{$cargo['sueldo']}</td>
                </tr>";
        }
        ?>
    </table>
    <a href="index.php">Aqui puedes ver los empleados</a>
</body>
</html>
