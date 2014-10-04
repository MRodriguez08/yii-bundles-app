<?php

class FileController extends CController {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', 
            'postOnly + delete', 
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('upload'),
                'roles' => array(Constants::USER_ROLE_ADMINISTRATIVO, Constants::USER_ROLE_DIRECTOR),
            ),
            array('allow',
                'actions' => array('display','displayPropertyImage'),
                'users' => array('*'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
    
    public function actionUpload() {
        error_reporting(E_ALL | E_STRICT);
        $upload_handler = new UploadHandler();
    }
    
    public function actionDisplay($id){
        $fs = new FileSystemUtil();
        $file = $fs->getTmpFile($id);
        Response::sendImage($file);
    }
    
    public function actionDisplayPropertyImage($idInmueble,$idArchivo){
        $fs = new FileSystemUtil;
        $file = $fs->getInmuebleFile($idInmueble, $idArchivo);
        Response::sendImage($file);
    }

}
