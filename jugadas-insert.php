<?php
include('connection.php');
// Check for POST variable
if (isset($_POST['jugada_id']) && isset($_POST['ticket_id']) && isset($_POST['numeros']) && isset($_POST['tipo']) && isset($_POST['loteria']) && isset($_POST['monto'])) {
    $jugada_id = mysqli_real_escape_string($conn, $_POST['jugada_id']);
    $ticket_id = mysqli_real_escape_string($conn, $_POST['ticket_id']);
    $numeros = mysqli_real_escape_string($conn, $_POST['numeros']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $loteria = mysqli_real_escape_string($conn, $_POST['loteria']);
    $monto = mysqli_real_escape_string($conn, $_POST['monto']);
    $query = "INSERT INTO `jugadas`(`jugada_id`, `ticket_id`, `numeros`, `tipo`, `loteria`, `monto`) VALUES('$jugada_id','$ticket_id','$numeros','$tipo','$loteria','$monto')";
    if (mysqli_query($conn, $query)) {
        echo 'Done';
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }
}