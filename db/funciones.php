<?php
// require "conexion.php";
//Archivo para consumir la api de todas las criptomonedas y guardar los datos
/**
 *
 */
class funciones
{

    function __construct()
    {
        # code...
    }

    public function getData()
    {
        $url = "https://api.coinmarketcap.com/v1/ticker/";
        $data = file_get_contents($url);
        return json_decode($data, true);
    }

    public function show($limit = 0)
    {
        require "conexion.php";
        $collection = $db->criptomonedas;
        if ($limit == 0) {
            $cursor = $collection->find([], ['sort' => ['market_cap_usd' => -1]]);
        }else {
            // $cursor = $collection->find([], ['skip' => 0, 'limit' => 10, 'sort' => ['market_cap_usd' => -1]]);
            $cursor = $collection->aggregate([
                // ['$group' => ['_id' => '$state', 'count' => ['$sum' => 1]]],
                ['$sort' => ['market_cap_usd' => 1]],
                ['$limit' => 10],
            ]);
        }

        // iterate cursor to display title of documents
        // foreach ($cursor as $document) {
        //    echo $document["name"] . "\n";
        // }
        return $cursor;
    }

    public function store()
    {
        require "conexion.php";
        $data = $this->getData();
        $collection = $db->criptomonedas;
        foreach ($data as $key => $document) {
            // $document['market_cap_usd'] = number_format($document['market_cap_usd'], 1, '.', ',');

            $existe = $collection->count($document);
            if($existe == 0)
            {
                $collection->insertOne($document);
            }
        }

       return "Document inserted successfully";
    }

    public function update($value='')
    {
        # code...
    }

    public function search($value='')
    {
        # code...
    }

    public function criptomonedas($value='')
    {
        require "conexion.php";
        $collection = $db->criptomonedas;
        $cursor = $collection->aggregate([
        // ['$group' => ['_id' => 'identi', ]],
        ['$group' => ['_id' => '$id', 'name' => ['$first' => '$name'], 'market_cap_usd' => ['$first' => '$market_cap_usd']]],
        ['$sort' => ['name' => 1]],
        // ['$limit' => 5],
        ]);

        return $cursor;
    }

    public function destroy($key)
    {
        require "conexion.php";
        $collection = $db->criptomonedas;
        $deleteResult = $collection->deleteMany(['id' => $key]);
        return 'Los valores de la moneda '.$key.' fueron eliminados!!! '.$deleteResult->getDeletedCount();
    }

}



?>
