<?php

class RwsnotificationController extends RWSController {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    private function createNotification() {
        try {
            $ntf = new Notification;
            $ntf->customSetAttributes($this->arguments);
            if ($ntf->save()) {
                Response::ok(CJSON::encode(array("result" => Constants::RESULTADO_OPERACION_EXITO, "message" => "notificacion con id = {$ntf->id} ingresada con exito")));
            } else {
                Response::ok(CJSON::encode(array("result" => Constants::RESULTADO_OPERACION_FALLA, "message" => $ntf->getErrors())));
            }
        } catch (\Exception $e) {
            Response::error(CJSON::encode(array("result" => Constants::RESULTADO_OPERACION_FALLA, "message" => $e->getMessage())));
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
        $this->createNotification();
    }

    public function processPut() {
        Response::error('Not implemented yet');
    }

}
