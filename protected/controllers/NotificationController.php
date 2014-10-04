<?php

class NotificationController extends AdminController {

    protected $pageTitle = ". : Notificaciones : .";

    /**
     * @return array action filters
     */
    public function filters() {
        Yii::app()->session[Constants::SESSION_CURRENT_TAB] = Constants::ITEM_MENU_NOTIFICACIONES;
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
                'actions' => array('admin', 'view', 'resolve', 'createClient','getNotificationesPendientes'),
                'roles' => array(Constants::USER_ROLE_DIRECTOR, Constants::USER_ROLE_ADMINISTRATIVO),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreateClient() {

        $hU = new HttpUtils();
        if ($hU->isAjaxRequest() == false)
            Response::error("not allowed ;)");

        if (isset($_POST["clientName"]) == false || isset($_POST["clientEmail"]) == false)
            Response::ok(CJSON::encode(array(
                        "resultado" => Constants::RESULTADO_OPERACION_FALLA,
                        "detalle" => "Faltan par&aacute;metros obligatorios")));
        $cl = Cliente::model()->findAll("email=:email", array(':email' => $_POST["clientEmail"]));
        if (sizeof($cl) > 0)
            Response::ok(CJSON::encode(array(
                        "resultado" => Constants::RESULTADO_OPERACION_FALLA,
                        "detalle" => "Cliente {$_POST["clientEmail"]} ya registrado en el sistema")));

        $cl = new Cliente;
        $cl->surname = "";
        $cl->comments = "";
        $cl->streetaddress = "";
        $cl->name = $_POST["clientName"];
        $cl->email = $_POST["clientEmail"];
        if ($cl->save())
            Response::ok(CJSON::encode(array(
                        "resultado" => Constants::RESULTADO_OPERACION_EXITO,
                        "detalle" => "Cliente {$cl->email} registrado con &eacute;xito")));
        else
            Response::ok(CJSON::encode(array(
                        "resultado" => Constants::RESULTADO_OPERACION_FALLA,
                        "detalle" => "Error registrando cliente {$cl->email} en el sistema")));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionResolve($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Notification'])) {
            $model->attributes = $_POST['Notification'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Notification('search');
        $model->unsetAttributes();  // clear any default values
        //$arr = $_GET['Notification'];
        if (isset($_GET['Notification'])){
            $model->attributes = $_GET['Notification'];
        }            
        $this->render('admin', array('model' => $model,));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TipoNotification the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Notification::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TipoNotification $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tipo-notificacion-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function getNotificationStatesList() {
        return CHtml::listData(NotificationState::model()->findAll(), 'id', 'name');
    }
    
    public function getNotificationTypesList() {
        return CHtml::listData(NotificationType::model()->findAll(), 'id', 'name');
    }
    
    public function actionGetPendingNotifications(){
        Response::ok(CJSON::encode(Notification::model()->findAll('id_estado_notificacion=:idEstado' , array("idEstado" => 1))));
    }

}
