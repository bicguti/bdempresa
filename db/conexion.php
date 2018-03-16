<?php
   require "../vendor/autoload.php";
   // connect to mongodb
   $m = new MongoDB\Client('mongodb://172.16.1.109:27017');

//    echo "Connection to database successfully";
   // select a database
   $db = $m->proyecto;

   // echo "Base de datos proyecto seleccionado!!!";
?>
