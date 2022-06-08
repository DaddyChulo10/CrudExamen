<?php
include_once('../conexion/conexion.php');
date_default_timezone_set('America/Mexico_City');


if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $edad = $_POST['edad'];
    $enfermedades = $_POST['enfermedades'];
    $fecha = date("y/m/d - G:i:s");
    $query = "INSERT INTO mascotas VALUES(NULL,'$nombre', '$tipo', '$edad', '$enfermedades', '$fecha', '0000-00:00')";
    echo $query;

    $resultado = $conexion->query($query);
    if (!$resultado) {
        echo 'MAL';
    }
}


if (isset($_POST['consultar'])) {
    $query = "SELECT * FROM mascotas ORDER BY id DESC";
    $resultado = $conexion->query($query);
?>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Edad</th>
                <th>Enfermedades</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultado as $row) {


            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['tipo'] ?></td>
                    <td><?php echo $row['edad'] ?></td>
                    <td><?php echo $row['enfermedades'] ?></td>
                    <td><?php echo $row['created_at'] ?></td>
                    <td><?php echo $row['updated_at'] ?></td>
                    <td> <button class="btn btn-warning" onclick="modal(<?php echo $row['id'] ?>, '<?php echo $row['nombre'] ?>', '<?php echo $row['tipo'] ?>', <?php echo $row['edad'] ?>, '<?php echo $row['enfermedades'] ?>')">Editar</button> </td>
                    <td> <button class="btn btn-danger" onclick="eliminarTabla(<?php echo $row['id'] ?>)">Eliminar</button></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

<?php
}


if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM mascotas WHERE id = $id";
    $resultado = $conexion->query($query);
    if (!$resultado) {
        echo 'MAL';
    }
}

if (isset($_POST['editar'])) {
    $fecha = date("y/m/d - G:i:s");
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $edad = $_POST['edad'];
    $enfermedades = $_POST['enfermedades'];
    $query = "UPDATE mascotas SET nombre = '$nombre', tipo = '$tipo', edad = $edad, enfermedades = '$enfermedades', updated_at = '$fecha' WHERE id = $id";
    $resultado = $conexion->query($query);
    if (!$resultado) {
        echo 'MAL';
    }
}
