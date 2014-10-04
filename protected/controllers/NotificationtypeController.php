<?php

class NotificationtypeController extends AdminController {

    protected $pageTitle = ". : Tipos de notificacion : .";

    /**
     * @return array action filters
     */
    public function filters() {
        parent::initController();
        Yii::app()->session[Constantes::SESSION_CURRENT_TAB] = Constantes::ITEM_MENU_TIPOS_NOTIFICACION;
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
                'actions' => array('admin', 'create', 'view', 'delete', 'update'),
                'roles' => array(Constantes::USER_ROLE_DIRECTOR),
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
    public function actionCreate() {
        $model = new NotificationType;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['NotificationType'])) {
            $model->attributes = $_POST['NotificationType'];
            if ($model->save()){
                $this->audit->logAudit(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_TIPO_NOTIFICACION, Constantes::AUDITORIA_OPERACION_ALTA, $model->id);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Tipo de notificaci&oacute;n creado con &eacute;xito' , 
                    'message' => 'Haga click en volver para regresar a la gestión de tipos de notificación',
                    'returnUrl'=>Yii::app()->createUrl('notificationtype/admin'),
                    'viewUrl'=>Yii::app()->createUrl("notificationtype/view", array("id"=>$model->id))
                ));
                return;
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['NotificationType'])) {
            $model->attributes = $_POST['NotificationType'];
            if ($model->save()){
                $this->audit->logAudit(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_TIPO_NOTIFICACION, Constantes::AUDITORIA_OPERACION_MODIFICACION, $model->id);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Tipo de notificaci&oacute;n modificado con &eacute;xito' , 
                    'message' => 'Haga click en volver para regresar a la gestión de tipos de notificación',
                    'returnUrl'=>Yii::app()->createUrl('notificationtype/admin'),
                    'viewUrl'=>Yii::app()->createUrl("notificationtype/view", array("id"=>$model->id))
                ));
                return;
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('NotificationType');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new NotificationType('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['NotificationType']))
            $model->attributes = $_GET['NotificationType'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return NotificationType the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = NotificationType::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param NotificationType $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'notification-type-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
