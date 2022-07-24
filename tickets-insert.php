<?php
include('connection.php');
// Check for POST variable
if (isset($_POST['id']) && isset($_POST['usuario_id']) && isset($_POST['lng']) && isset($_POST['estado']) && isset($_POST['total'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    // $fecha = mysqli_real_escape_string($conn, $_POST['fecha']);
    $fecha = date('Y-m-d H:i:s');
    $usuario_id = mysqli_real_escape_string($conn, $_POST['usuario_id']);
    $lng = mysqli_real_escape_string($conn, $_POST['lng']); //longitude
    $lat = mysqli_real_escape_string($conn, $_POST['lat']); //latititude
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $total = mysqli_real_escape_string($conn, $_POST['total']);
    $query = "INSERT INTO `tickets`(`id`, `fecha`, `usuario_id`, `ubicacion`, `estado`, `total`) VALUES('$id','$fecha','$usuario_id',POINT( $lng, $lat ),'$estado','$total')";
    if (mysqli_query($conn, $query)) {
        echo json_encode('Done');
    } else {
        echo json_encode('Error ' . mysqli_error($conn));
    }
}