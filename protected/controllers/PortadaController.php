<?php

class PortadaController extends AdminController {

    protected $pageTitle = ". : Configurar portada : .";
    
    /**
     * @return array action filters
     */
    public function filters() {
        parent::initController();
        Yii::app()->session[Constants::SESSION_CURRENT_TAB] = Constants::ITEM_MENU_PORTADA;
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
                'actions' => array('admin'),
                'roles' => array(Constants::USER_ROLE_DIRECTOR,  Constants::USER_ROLE_ADMINISTRATIVO),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new EditarDestacados;
        
        if (isset($_POST["EditarDestacados"])){
            $model->attributes = $_POST["EditarDestacados"];
            if ($model->save()){
                $this->audit->registrarAuditoria(Yii::app()->user->id, new DateTime, Constants::AUDITORIA_OBJETO_PORTADA, Constants::AUDITORIA_OPERACION_MODIFICACION, '');
                $this->render('/site/successfullOperation', array(
                    'header' => 'Portada modificada con &eacute;xito' , 
                    'message' => 'Haga click en volver para regresar al formulario de portada',
                    'returnUrl'=>Yii::app()->createUrl('portada/admin'),
                ));
                return;
            }
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
