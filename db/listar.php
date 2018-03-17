<?php
require "funciones.php";
$limit = $_GET['limite'];
$aux = new funciones();
$data = $aux->show($limit);
$result = array();
foreach ($data as $document) {
   $document['market_cap_usd'] = number_format($document['market_cap_usd'], 2, '.', ',');
   array_push($result, $document);
}
echo json_encode($result);
 ?>
