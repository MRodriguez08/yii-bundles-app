<?php

class CityController extends AdminController {

    protected $pageTitle = ". : Ciudades : .";
    
    /**
     * @return array action filters
     */
    public function filters() {
        parent::initController();
        Yii::app()->session[Constants::SESSION_CURRENT_TAB] =  Constants::ITEM_MENU_CIUDADES ;
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
                'actions' => array('create', 'update', 'view', 'admin'),
                'roles' => array(Constants::USER_ROLE_DIRECTOR),
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
        $model = new City;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['City'])) {
            $model->attributes = $_POST['City'];
            if ($model->save()){
                $this->audit->logAudit(Yii::app()->user->id, new DateTime, Constants::AUDITORIA_OBJETO_CIUDAD, Constants::AUDITORIA_OPERACION_ALTA, $model->id);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Ciudad creada con &eacute;xito' , 
                    'message' => 'Haga click en volver para regresar a la gestión de ciudades',
                    'returnUrl'=>Yii::app()->createUrl('city/admin'),
                    'viewUrl'=>Yii::app()->createUrl("city/view", array("id"=>$model->id))
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

        if (isset($_POST['City'])) {
            $model->attributes = $_POST['City'];
            if ($model->save()){
                $this->audit->logAudit(Yii::app()->user->id, new DateTime, Constants::AUDITORIA_OBJETO_CIUDAD, Constants::AUDITORIA_OPERACION_MODIFICACION, $model->id);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Ciudad modificada con &eacute;xito' , 
                    'message' => 'Haga click en volver para regresar a la gestión de ciudades',
                    'returnUrl'=>Yii::app()->createUrl('city/admin'),
                    'viewUrl'=>Yii::app()->createUrl("city/view", array("id"=>$model->id))
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
        $dataProvider = new CActiveDataProvider('City');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new City('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['City']))
            $model->attributes = $_GET['City'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return City the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = City::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        //$model->departamento = Department::model()->findByPk($model->department_id);
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param City $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'city-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function getDepartmentsList() {
        return CHtml::listData(Department::model()->findAll(), 'id', 'name');
    }
    
    protected function renderDepartmentName($data,$row)
    {
       return Department::model()->findByPk($data->department_id)->name;            
    }

}
