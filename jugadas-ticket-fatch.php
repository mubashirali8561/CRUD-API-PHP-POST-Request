<?php
header('Content-Type: application/json; charset=utf-8');
if (isset($_GET["id"])) {
    include('connection.php');
    $id = $_GET["id"];
    //fetch table rows from mysql db
    $sql = "SELECT * FROM `jugadas`as jugadas , tickets as ticket WHERE ticket.id = jugadas.ticket_id and ticket.usuario_id =$id";
    $result = mysqli_query($conn, $sql);
    //create an array
    $array = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
    }
    echo json_encode($array);

    //close the db connection
    mysqli_close($conn);
}