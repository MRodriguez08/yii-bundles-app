<?php

class RwsinmuebleController extends RWSController {

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    private function view($id) {
        $model = Inmueble::model()->findByPk($id);
        if ($model !== null) {
            Response::ok(CJSON::encode($model->toArray()));
        } else {
            Response::ok(CJSON::encode(array("resultado" => "falla", "mensaje" => "inmueble no encontrado")));
        }
    }

    /**
     * Funcion para recuperar inmuebles que cumplan con los filtros pasados como parametros, paginados segun inicio y offset.
     * @param json $filters
     * @return array
     */
    private function findByfilters($filters) {
        try {
            $validator = new WsParameters;
            $validator->validatePropertiesFilters($filters);

            $arrFilters = CJSON::decode($filters);
            $inmuebles = Inmueble::findByFilters($arrFilters);
            $arrInmuebles = array();
            foreach ($inmuebles as $inm) {
                array_push($arrInmuebles, $inm->toArray());
            }

            $resp = array(
                "cantTotalInmuebles" => Inmueble::countByFilters($arrFilters),
                "cantInmuebles" => count($arrInmuebles),
                "inmuebles" => $arrInmuebles
            );
            
            Response::ok(CJSON::encode($resp));
        } catch (Exception $ex) {
            Response::error(CJSON::encode(array(
                "resultado" => Constantes::RESULTADO_OPERACION_FALLA,
                "mensaje" => $ex->getMessage()
            )));
        }
    }

    private function inmueblesDestacados() {
        $inmuebles = Inmueble::findDestacados();
        $arrInmuebles = array();
        foreach ($inmuebles as $inm) {
            array_push($arrInmuebles, $inm->toArray());
        }
        Response::ok(CJSON::encode($arrInmuebles));
    }

    /**
     * Performs the AJAX validation.
     * @param Inmueble $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'inmueble-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function processDelete() {
        
    }

    /**
     * Procesamiento de metodo get. Casuistica:
     *  - Si no tengo parametros de get respondo con Inmuebles Destacados
     *  - Si el parametro es un enter respondo con el Inmueble
     *  - Si el parametro es un json respondo con los inmuebles que cumplen con los filtros
     */
    public function processGet() {
        if (!isset($this->arguments["data"])) {
            $this->inmueblesDestacados();
        } else if (is_numeric($this->arguments["data"])) {
            $this->view((int) $this->arguments["data"]);
        } else {
            $this->findByfilters($this->arguments["data"]);
        }
    }

    public function processHead() {
        
    }

    public function processPost() {
        
    }

    public function processPut() {
        
    }

}
