<?php

require('db.php');

$author = $_GET['author'];
$PreData = $database->query("SELECT * FROM notes WHERE author like '$author'");
$Rows = array();

while ($row = $PreData->fetch_assoc()) {
    $Rows[] = $row;
}

echo json_encode($Rows, JSON_UNESCAPED_UNICODE);

$database->close();

?>