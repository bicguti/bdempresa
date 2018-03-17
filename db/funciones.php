<?php
//Archivo de funciones que intereactua deirectamente con a base de datos mongo
/**
 *
 */
class funciones
{

    function __construct()
    {
        # code...
    }

    /*
        Metodo para obtener los datos de la API de coinmarketcap
    */
    public function getData()
    {
        $url = "https://api.coinmarketcap.com/v1/ticker/";
        $data = file_get_contents($url);
        return json_decode($data, true);
    }

    /*
        Metodo para obtener los datos de las criptomonedas almacenadas en mongo
    */
    public function show($limit = 0)
    {
        require "conexion.php";
        $collection = $db->criptomonedas;
        if ($limit == 0) {
            $cursor = $collection->find([], ['sort' => ['market_cap_usd' => -1]]);
        }else {
            $cursor = $collection->aggregate([
                ['$sort' => ['market_cap_usd' => -1]],
                ['$limit' => 10],
            ]);
        }
        return $cursor;
    }

    /*
        Metodo para almacenar los datos de una criptomoneda que bienen de la API
    */
    public function store()
    {
        require "conexion.php";
        $data = $this->getData();
        $collection = $db->criptomonedas;
        foreach ($data as $key => $document) {
            $document['market_cap_usd'] = doubleval($document['market_cap_usd']);
            $existe = $collection->count($document);
            if($existe == 0)
            {
                $collection->insertOne($document);
            }
        }

       return "Document inserted successfully";
    }

    /*
        Metodo para obtener los nombres de una criptomoneda y poder eliminarlo
    */
    public function criptomonedas($value='')
    {
        require "conexion.php";
        $collection = $db->criptomonedas;
        $cursor = $collection->aggregate([
        ['$group' => ['_id' => '$id', 'name' => ['$first' => '$name'], 'market_cap_usd' => ['$first' => '$market_cap_usd']]],
        ['$sort' => ['name' => 1]],
        ]);

        return $cursor;
    }

    /*
    Metodo para eliminar los registros de una criptomoneda dada
    */
    public function destroy($key)
    {
        require "conexion.php";
        $collection = $db->criptomonedas;
        $deleteResult = $collection->deleteMany(['id' => $key]);
        return 'Los valores de la moneda '.$key.' fueron eliminados!!! '.$deleteResult->getDeletedCount();
    }

}



?>
