<?php
   require "../vendor/autoload.php";
   // connect to mongodb using localhost or ip adress
   $m = new MongoDB\Client('mongodb://172.16.6.224:27017');
   // select a database
   $db = $m->proyecto;
   // echo "Base de datos proyecto seleccionado!!!";
?>
