<?php

class EmailNotificacionController extends AdminController {

    protected $pageTitle = ". : Notificaciones : .";

    /**
     * @return array action filters
     */
    public function filters() {
        Yii::app()->session[Constantes::SESSION_CURRENT_TAB] = Constantes::ITEM_MENU_NOTIFICACIONES;
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
                'actions' => array('admin', 'view', 'resolve', 'createClient','getNotificacionesPendientes'),
                'roles' => array(Constantes::USER_ROLE_DIRECTOR, Constantes::USER_ROLE_ADMINISTRATIVO),
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

        if (isset($_POST["nameCliente"]) == false || isset($_POST["emailCliente"]) == false)
            Response::ok(CJSON::encode(array(
                        "resultado" => Constantes::RESULTADO_OPERACION_FALLA,
                        "detalle" => "Faltan par&aacute;metros obligatorios")));
        $cl = Cliente::model()->findAll("email=:email", array(':email' => $_POST["emailCliente"]));
        if (sizeof($cl) > 0)
            Response::ok(CJSON::encode(array(
                        "resultado" => Constantes::RESULTADO_OPERACION_FALLA,
                        "detalle" => "Cliente {$_POST["emailCliente"]} ya registrado en el sistema")));

        $cl = new Cliente;
        $cl->apellido = "";
        $cl->comentarios = "";
        $cl->direccion = "";
        $cl->name = $_POST["nameCliente"];
        $cl->email = $_POST["emailCliente"];
        if ($cl->save())
            Response::ok(CJSON::encode(array(
                        "resultado" => Constantes::RESULTADO_OPERACION_EXITO,
                        "detalle" => "Cliente {$cl->email} registrado con &eacute;xito")));
        else
            Response::ok(CJSON::encode(array(
                        "resultado" => Constantes::RESULTADO_OPERACION_FALLA,
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

        if (isset($_POST['Notificacion'])) {
            $model->attributes = $_POST['Notificacion'];
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
        $model = new Notificacion('search');
        $model->unsetAttributes();  // clear any default values
        //$arr = $_GET['Notificacion'];
        if (isset($_GET['Notificacion'])){
            $model->attributes = $_GET['Notificacion'];
        }            
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
        $model = Notificacion::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
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

    public function getListaEstadosNotificacion() {
        return CHtml::listData(EstadoNotificacion::model()->findAll(), 'id', 'name');
    }
    
    public function getListaTiposNotificacion() {
        return CHtml::listData(TipoNotificacion::model()->findAll(), 'id', 'name');
    }
    
    public function actionGetNotificacionesPendientes(){
        Response::ok(CJSON::encode(Notificacion::model()->findAll('id_estado_notificacion=:idEstado' , array("idEstado" => 1))));
    }

}
