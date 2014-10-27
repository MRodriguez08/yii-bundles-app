<?php

class RwscatalogueController extends RWSController {

    public function __construct() {
        parent::__construct();
    }
    
    public function processDelete() {
        Response::error('Not implemented yet');
    }

    public function processGet() {
        $list = Product::model()->findAll();
        $items = array();
        foreach ($list as $p){
            array_push($items, array(
                "id" => $p->id,
                "name" => $p->name,
                "description" => $p->description,
                "images" => $p->images,
            ));            
        }
        
        Response::ok(CJSON::encode(
            array(
                "version" => "xxxxxxxxxxxxxxxxxxx", 
                "items" => $items
            )
         ));
    }

    public function processHead() {
        Response::error('Not implemented yet');
    }

    public function processPost() {
        Response::error('Not implemented yet');
    }

    public function processPut() {
        Response::error('Not implemented yet');
    }

}
