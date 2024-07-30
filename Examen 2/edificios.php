<?php
include 'Modelo/db.php';
include 'Vista/header.php';
?>

<h1>Lista de Edificios a consultar</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Código</th>
            <th>Descripcion</th>
            <th>Pisos</th>
            <th>Estado</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stmt = $conn->prepare("SELECT e.codigo, e.descripcion, e.pisos, e.estado, c.descriptipo FROM edificios e JOIN tipos c ON e.idtipo = c.idtipo");
        $stmt->execute();
        $edificios = $stmt->fetchAll();
        foreach ($edificios as $edificio) {
            echo "<tr>
                    <td>{$edificio['codigo']}</td>
                    <td>{$edificio['descripcion']}</td>
                    <td>{$edificio['pisos']}</td>
                    <td>{$edificio['estado']}</td>
                    <td>{$edificio['descriptipo']}</td>
                </tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'Vista/footer.php'; ?>
