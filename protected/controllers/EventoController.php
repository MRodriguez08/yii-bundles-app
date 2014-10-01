<?php

class EventoController extends AdminController {

    protected $pageTitle = ". : Mis eventos : .";
    
    /**
     * 
     * @return array action filters
     */
    public function filters() {
        Yii::app()->session[Constantes::SESSION_CURRENT_TAB] = Constantes::ITEM_MENU_CALENDARIO;
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
                'actions' => array('admin', 'create', 'view', 'delete','update', 'getNotificacionesPendientes'),
                'roles' => array(Constantes::USER_ROLE_ADMINISTRATIVO,  Constantes::USER_ROLE_AGENTE,  Constantes::USER_ROLE_DIRECTOR),
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
    public function actionCreate()
    {
        $model=new Evento;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Evento']))
        {
            $dh = new DateTimeHelper();
            $model->attributes=$_POST['Evento'];
            $model->id_usuario = Yii::app()->user->id;
            $d = $dh->getDateTimeFromUI($_POST['Evento']["fecha_hora_desde"]);
            if ($d !== false)
                $model->fecha_hora_desde = $d->getTimestamp();
            $h = $d = $dh->getDateTimeFromUI($_POST['Evento']["fecha_hora_hasta"]);
            if ($h !== false)
                $model->fecha_hora_hasta = $h->getTimestamp();
            if ($model->save()){
                $this->render('/site/successfullOperation', array(
                    'header' => 'Evento creado con &eacute;xito' , 
                    'message' => 'Haga click en volver para regresar a la gestión de eventos',
                    'returnUrl'=>Yii::app()->createUrl('evento/admin'),
                    'viewUrl'=>Yii::app()->createUrl("evento/view", array("id"=>$model->id))
                ));
                return;
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }   
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Evento']))
        {
            $model->attributes=$_POST['Evento'];
            $dh = new DateTimeHelper();
            $d = $dh->getDateTimeFromUI($_POST['Evento']["fecha_hora_desde"]);
            if ($d !== false)
                $model->fecha_hora_desde = $d->getTimestamp();
            $h = $d = $dh->getDateTimeFromUI($_POST['Evento']["fecha_hora_hasta"]);
            if ($h !== false)
                $model->fecha_hora_hasta = $h->getTimestamp();
            if($model->save()){
                $a = new Auditoria;
                $a->registrarAuditoria(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_EVENTO, Constantes::AUDITORIA_OPERACION_MODIFICACION, $model->id);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Evento modificado con &eacute;xito' , 
                    'message' => 'Haga click en volver para regresar a la gestión de eventos',
                    'returnUrl'=>Yii::app()->createUrl('evento/admin'),
                    'viewUrl'=>Yii::app()->createUrl("evento/view", array("id"=>$model->id))
                ));
                return;
            }
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Evento('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Evento']))
        {
            $model->attributes = $_GET['Evento'];
        }
        
        $dH = new DateTimeHelper;   
        if (isset($_GET["Evento"]["fechaDesde"]) && strcmp($_GET["Evento"]["fechaDesde"],"") !== 0) {
            $model->fechaDesde = $_GET["Evento"]["fechaDesde"];
        } else {
            $model->fechaDesde = $dH->getDefaultStartRangeFilter("")->format(Yii::app()->params["dateTimeDisplayFormat"]);
        }
        if (isset($_GET["Evento"]["fechaHasta"]) && strcmp($_GET["Evento"]["fechaHasta"],"") !== 0) {
            $model->fechaHasta = $_GET["Evento"]["fechaHasta"];
        } else {
            $model->fechaHasta = $dH->getDefaultEndRangeFilter("")->format(Yii::app()->params["dateTimeDisplayFormat"]);
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
    
    public function getEventosByUsuario ($idUsuario)
    {
        return CHtml::listData(Evento::model()->findByAttributes(array('idUsuario'=>$idUsuario)));
    }    
    
    public function getListaClientes() {
        $list = Cliente::model()->findAll();
        return CHtml::listData($list, 'id', 'email');
    }
    
    public function getListaInmuebles() {
        return CHtml::listData(Inmueble::model()->findAll(), 'id', 'titulo');
    }
    
    protected function renderTituloInmueble($data, $row) {
        return Inmueble::model()->findByPk($data->id_inmueble)->titulo;
    }
    
    protected function renderFechaDesde($data, $row) {
        $dH = new DateTimeHelper();
        return $dH->getUIDateTimeString($data->fecha_hora_desde);
    }
    
    protected function renderFechaHasta($data, $row) {
        $dH = new DateTimeHelper();
        return $dH->getUIDateTimeString($data->fecha_hora_hasta);
    }

}
