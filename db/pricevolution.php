<?php
require "funciones.php";
$aux = new funciones();
// $limit = 0;
$data = $aux->priceEvolution();
$result = array();
foreach ($data as $document) {
   $document['market_cap_usd'] = number_format($document['market_cap_usd'], 2, '.', ',');
   array_push($result, $document);
}
echo json_encode($result);
// echo $temp[0]->name;
 ?>
