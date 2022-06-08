<?php
$conexion = mysqli_connect("localhost", "root", "", "bd");
if(!$conexion){
    echo 'Error al conectar con la base de datos';
}
