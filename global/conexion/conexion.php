<?php
$conexion = mysqli_connect("localhost", "root", "", "quaxar");
if(!$conexion){
    echo 'Error al conectar con la base de datos';
}
