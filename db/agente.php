<?php
    require "funciones.php";
    // require "conexion.php";
   //  $aux = new getapi();
   //  $data = $aux->getData();
   //  // var_dump($data[0]);
   //  $collection = $db->mycolle;
   //
   // $document = $data[0];
   //
   // $collection->insertOne($document);
   // echo "Document inserted successfully";
   //
   // $cursor = $collection->find();
   // // iterate cursor to display title of documents
   //
   // foreach ($cursor as $document) {
   //    echo $document["name"] . "\n";
   // }
   $aux = new funciones();
   $msg = $aux->store();
   echo $msg;
   // $temp = $aux->getData();
   // foreach ($temp as $key => $row) {
   //    print_r($row);
   //    echo '</br></br></br>';
   // }
 ?>
