<?php
include 'Modelo/db.php';
include 'Vista/header.php';
?>

<h1>Lista de Empleados a consultar</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Título</th>
            <th>Cargo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stmt = $conn->prepare("SELECT e.id, e.nombre, e.apellido, e.titulo, c.descripcion FROM empleados e JOIN cargos c ON e.idcargo = c.idcargo");
        $stmt->execute();
        $empleados = $stmt->fetchAll();
        foreach ($empleados as $empleado) {
            echo "<tr>
                    <td>{$empleado['id']}</td>
                    <td>{$empleado['nombre']}</td>
                    <td>{$empleado['apellido']}</td>
                    <td>{$empleado['titulo']}</td>
                    <td>{$empleado['descripcion']}</td>
                </tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'Vista/footer.php'; ?>
