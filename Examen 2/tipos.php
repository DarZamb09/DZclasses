<?php
include 'Modelo/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Puestos en la Empresa</title>
</head>
<body>
    <h1>Lista de tipos de edificio</h1>
    <table border="2">
        <tr>
            <th>Numero</th>
            <th>Descripción</th>
        </tr>
        <?php
        $stmt = $conn->prepare("SELECT * FROM tipos");
        $stmt->execute();
        $tipos = $stmt->fetchAll();
        foreach ($tipos as $tipo) {
            echo "<tr>
                    <td>{$tipo['idtipo']}</td>
                    <td>{$tipo['descriptipo']}</td>
                </tr>";
        }
        ?>
    </table>
    <a href="index.php">Aqui puedes ver los edificios</a>
</body>
</html>
