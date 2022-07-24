<?php
include('connection.php');
// Check for POST variable
if (isset($_POST['id']) && isset($_POST['nombre'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    // $sorteo = mysqli_real_escape_string($conn, $_POST['sorteo']);
    $query = "INSERT INTO `loteria`(`id`, `nombre`, `sorteo`) VALUES('$id','$nombre',CURRENT_TIME())";
    if (mysqli_query($conn, $query)) {
        echo json_encode('Done');
    } else {
        echo json_encode('Error ' . mysqli_error($conn));
    }
}