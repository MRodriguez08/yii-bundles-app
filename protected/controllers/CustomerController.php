<?php

class CustomerController extends AdminController {

    protected $pageTitle = ". : Clientes : .";
    
    /**
     * @return array action filters
     */
    public function filters() {
        parent::initController();
        Yii::app()->session[Constants::SESSION_CURRENT_TAB] =  Constants::ITEM_MENU_CLIENTES ;
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
                'actions' => array('admin', 'delete', 'view', 'create' , 'update'),
                'roles' => array(Constants::USER_ROLE_DIRECTOR,  Constants::USER_ROLE_ADMINISTRATIVO),
            ),
            array('deny',
                'users'=>array('*'),
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
        $model = new Customer;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Customer'])) {
            $model->attributes = $_POST['Customer'];
            if ($model->save()){
                $this->audit->logAudit(Yii::app()->user->id, new DateTime, Constants::AUDITORIA_OBJETO_CLIENTE, Constants::AUDITORIA_OPERACION_ALTA, $model->id);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Cliente creado con &eacute;xito' , 
                    'message' => 'Haga click en volver para regresar a la gestión de clientes',
                    'returnUrl'=>Yii::app()->createUrl('customer/admin'),
                    'viewUrl'=>Yii::app()->createUrl("customer/view", array("id"=>$model->id))
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

        if (isset($_POST['Customer'])) {
            $model->attributes = $_POST['Customer'];
            if ($model->save()){
                $this->audit->logAudit(Yii::app()->user->id, new DateTime, Constants::AUDITORIA_OBJETO_CLIENTE, Constants::AUDITORIA_OPERACION_MODIFICACION, $model->id);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Cliente modificado con &eacute;xito' , 
                    'message' => 'Haga click en volver para regresar a la gestión de clientes',
                    'returnUrl'=>Yii::app()->createUrl('customer/admin'),
                    'viewUrl'=>Yii::app()->createUrl("customer/view", array("id"=>$model->id))
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
        $dataProvider = new CActiveDataProvider('Customer');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Customer('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Customer']))
            $model->attributes = $_GET['Customer'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Customer the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Customer::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Customer $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cliente-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
