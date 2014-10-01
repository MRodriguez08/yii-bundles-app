<?php

class RwsnotificacionController extends RWSController {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    private function ingresarNotificacion() {
        try {
            $ntf = new Notificacion;
            $ntf->customSetAttributes($this->arguments);
            if ($ntf->save()) {
                Response::ok(CJSON::encode(array("resultado" => Constantes::RESULTADO_OPERACION_EXITO, "mensaje" => "notificacion con id = {$ntf->id} ingresada con exito")));
            } else {
                Response::ok(CJSON::encode(array("resultado" => Constantes::RESULTADO_OPERACION_FALLA, "mensaje" => $ntf->getErrors())));
            }
        } catch (\Exception $e) {
            Response::error(CJSON::encode(array("resultado" => Constantes::RESULTADO_OPERACION_FALLA, "mensaje" => $e->getMessage())));
        }
    }

    
    public function processDelete() {
        Response::error('Not implemented yet');
    }

    public function processGet() {
        Response::error('Not implemented yet');
    }

    public function processHead() {
        Response::error('Not implemented yet');
    }

    public function processPost() {
        $this->ingresarNotificacion();
    }

    public function processPut() {
        Response::error('Not implemented yet');
    }

}
