<?php
include('connection.php');
// Check for POST variable
if (isset($_POST['id']) && isset($_POST['usuario']) && isset($_POST['pass']) && isset($_POST['nombre']) && isset($_POST['rol']) && isset($_POST['porc']) && isset($_POST['referidor'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $rol = mysqli_real_escape_string($conn, $_POST['rol']);
    $porc = mysqli_real_escape_string($conn, $_POST['porc']);
    $referidor = mysqli_real_escape_string($conn, $_POST['referidor']);
    $query = "INSERT INTO `usr`(`id`, `usuario`, `pass`, `nombre`, `rol`, `porc`, `referidor`) VALUES('$id','$usuario','$pass','$nombre','$rol','$porc','$referidor')";
    if (mysqli_query($conn, $query)) {
        echo 'Done';
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }
}