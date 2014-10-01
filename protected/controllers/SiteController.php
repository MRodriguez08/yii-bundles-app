<?php

class SiteController extends AdminController {
    
    protected $pageTitle = ". : Home : .";
    
    /**
     * @return array action filters
     */
    public function filters() {
        Yii::app()->session[Constantes::SESSION_CURRENT_TAB] = Constantes::ITEM_MENU_HOME;
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
                'actions' => array('error','index','successfullOperation'),
                'roles' => array(Constantes::USER_ROLE_DIRECTOR, Constantes::USER_ROLE_AGENTE, Constantes::USER_ROLE_ADMINISTRATIVO),
            ),            
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
    
    public function actionIndex(){
        Yii::app()->session[Constantes::SESSION_CURRENT_TAB] =  Constantes::ITEM_MENU_HOME ;
        $this->render('index');
    }

}
