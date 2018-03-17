<?php
   require "../vendor/autoload.php";
   // connect to mongodb using localhost or ip adress
   $m = new MongoDB\Client('mongodb://localhost:27017');
   // select a database
   $db = $m->proyecto;
   // echo "Base de datos proyecto seleccionado!!!";
?>
