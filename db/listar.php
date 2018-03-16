<?php
require "funciones.php";
$limit = $_GET['limite'];
$aux = new funciones();
// $limit = 0;
$data = $aux->show($limit);
$result = array();
foreach ($data as $document) {
   // echo $document["name"] . "\n";
   array_push($result, $document);
}
echo json_encode($result);
// echo $temp[0]->name;
 ?>
