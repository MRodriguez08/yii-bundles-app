<?php

// conectar


$m = new MongoClient("mongodb://localhost:27017", array("db" => "plataforma_inmobiliaria"));


// seleccionar una base de datos
$db = $m->plataforma_inmobiliaria;

// seleccionar una colección (equivalente a una tabla en una base de datos relacional)
$collection = $db->bienes;

$cursor = $collection->find();
// recorrer el resultado
$return = array();
$i = 0;
while ($cursor->hasNext()) {

    $return[$i] = $cursor->getNext();
    $return[$i++]['_id'] = $cursor->key();
}
echo json_encode($return);
?>
