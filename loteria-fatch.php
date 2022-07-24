<?php
header('Content-Type: application/json; charset=utf-8');
include('connection.php');
//fetch table rows from mysql db
$sql = "SELECT * FROM `loteria`";
$result = mysqli_query($conn, $sql);
//create an array
$array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}
echo json_encode($array);

//close the db connection
mysqli_close($conn);