<?php

class CalendarController extends AdminController {

    protected $pageTitle = ". : Mis eventos : .";
    
    /**
     * 
     * @return array action filters
     */
    public function filters() {
        Yii::app()->session[Constants::SESSION_CURRENT_TAB] = Constants::ITEM_MENU_CALENDARIO;
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
                'roles' => array(Constants::USER_ROLE_ADMINISTRATIVO,  Constants::USER_ROLE_AGENTE,  Constants::USER_ROLE_DIRECTOR),
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
        $model = new Evento('search');        
        $this->render('admin', array('model' => $model,));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TipoNotificacion the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model=Evento::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        
        $dH = new DateTimeHelper();
        $model->fecha_hora_desde = $dH->getUIDateTimeString($model->fecha_hora_desde);
        $model->fecha_hora_hasta = $dH->getUIDateTimeString($model->fecha_hora_hasta);
        
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TipoNotificacion $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tipo-notificacion-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }  

}
