<?php
require "funciones.php";
$aux = new funciones();
$key = $_GET['id'];
$msg = $aux->destroy($key);
echo json_encode($msg);
// echo $temp[0]->name;
 ?>
