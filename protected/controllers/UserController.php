<?php


/**
 * User controller
 * 
 * Contiene todas las acciones referentes a la gestion de usuarios registrados en el sitio.
 * 
 * @package controllers
 */
class UserController extends AdminController {

    protected $pageTitle = ". : Usuarios : .";
    public $defaultAction = 'admin';

    /**
     * @return array action filters
     */
    public function filters() {
        parent::initController();
        Yii::app()->session[Constantes::SESSION_CURRENT_TAB] = Constantes::ITEM_MENU_USUARIOS;
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
                'actions' => array('login'),
                'users' => array('?'),
            ),
            array('allow',
                'actions' => array('logout', 'miPerfil', 'editarMiPerfil','changePassword'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('create', 'update', 'view', 'admin', 'updateState', 'resetPassword'),
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

    public function actionMiPerfil() {
        $this->render('miPerfil', array(
            'model' => $this->loadModel(Yii::app()->user->id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->contrasenia = crypt(Parametro::model()->findByPk(Constantes::PARAMETRO_CONTRASENIA_REINICIO)->valor);
            if ($model->save()) {
                $authAssign = new AuthAssignment();
                $authAssign->itemname = $model->role;
                $authAssign->userid = $model->nick;
                $authAssign->save();
                $fsu = new FileSystemUtil;
                $fsu->createUserTmpFoderIfNotExists($model->nick);
                $this->audit->registrarAuditoria(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_USUARIO, Constantes::AUDITORIA_OPERACION_ALTA, $model->nick);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Usuario creado con &eacute;xito',
                    'message' => 'Haga click en volver para regresar a la gestión de usuarios',
                    'returnUrl' => Yii::app()->createUrl('user/admin'),
                    'viewUrl' => Yii::app()->createUrl("user/view", array("id" => $model->nick))
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

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save()) {

                $authAsign = AuthAssignment::model()->findByAttributes(array('userid' => $model->nick));
                $authAsign->itemname = $model->rol;
                if ($authAsign->save()) {
                    $this->audit->registrarAuditoria(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_USUARIO, Constantes::AUDITORIA_OPERACION_MODIFICACION, $model->nick);
                    $this->render('/site/successfullOperation', array(
                        'header' => 'Usuario modificado con &eacute;xito',
                        'message' => 'Haga click en volver para regresar a la gestión de usuarios',
                        'returnUrl' => Yii::app()->createUrl('user/admin'),
                        'viewUrl' => Yii::app()->createUrl("user/view", array("id" => $model->nick))
                    ));
                    return;
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionEditarMiPerfil() {
        $model = $this->loadModel(Yii::app()->user->id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save()) {
                $this->audit->registrarAuditoria(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_USUARIO, Constantes::AUDITORIA_OPERACION_MODIFICACION, $model->nick);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Perfil editado con &eacute;xito',
                    'message' => 'Haga click en volver para regresar a Mi Perfil',
                    'returnUrl' => Yii::app()->createUrl('user/miPerfil')
                ));
                return;
            }
        }

        $this->render('editarMiPerfil', array(
            'model' => $model,
        ));
    }
    
    public function actionChangePassword() {
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $model = new ChangePassword();
        if (isset($_POST['ChangePassword'])) {
            $model->attributes = $_POST['ChangePassword'];
            if ($model->save()) {
                $this->audit->registrarAuditoria(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_USUARIO, Constantes::AUDITORIA_OPERACION_CAMBIAR_CONTRASENIA, Yii::app()->user->id);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Contrase&ntilde;a modificada con &eacute;xito',
                    'message' => 'Haga click en volver para regresar a Mi Perfil',
                    'returnUrl' => Yii::app()->createUrl('nick/miPerfil')
                ));
                return;
            }
        }

        $this->render('changePassword', array(
            'model' => $model,
        ));
    }

    public function actionUpdateState($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $hU = new HttpUtils();
        if (strcmp($hU->getHttpRequestMethod(), HttpUtils::METHOD_POST) == 0) {
            if ($model->enabled == 1)
                $model->enabled = 0;
            else
                $model->enabled = 1;
            if ($model->save()) {
                $this->audit->registrarAuditoria(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_USUARIO, Constantes::AUDITORIA_OPERACION_MODIFICACION, $model->nick);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Usuario modificado con &eacute;xito',
                    'message' => 'Haga click en volver para regresar a la gestión de usuarios',
                    'returnUrl' => Yii::app()->createUrl('nick/admin'),
                    'viewUrl' => Yii::app()->createUrl("nick/view", array("id" => $model->nick))
                ));
                return;
            }
        }

        if ($model->enabled == 1) {
            $header = 'Bloquear usuario';
            $message = "¿Esta seguro que desea bloquear el usuario {$model->nick}?";
        } else {
            $header = 'Desbloquear usuario';
            $message = "¿Esta seguro que desea desbloquear el usuario {$model->nick}?";
        }

        $this->render('changeState', array(
            'header' => $header,
            'message' => $message
        ));
    }

    public function actionResetPassword($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->resetPassword();
            if ($model->save()) {
                $this->audit->registrarAuditoria(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_USUARIO, Constantes::AUDITORIA_OPERACION_MODIFICACION, $model->nick);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Contrase&ntilde;a reinicializada con &eacute;xito',
                    'message' => 'Haga click en volver para regresar a la gestión de usuarios',
                    'returnUrl' => Yii::app()->createUrl('user/admin'),
                    'viewUrl' => Yii::app()->createUrl("user/view", array("id" => $model->nick))
                ));
                return;
            }
        }

        $this->render('resetPassword', array(
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
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::app()->params["httpErrorCode404Message"]);
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->audit->registrarAuditoria(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_USUARIO, Constantes::AUDITORIA_OPERACION_LOGIN, '');
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->layout = '//layouts/oneColumn';
        $this->pageTitle = ". : Login : .";
        $this->render('login', array('model' => $model));
    }

    public function actionLogout() {
        $this->audit->registrarAuditoria(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_USUARIO, Constantes::AUDITORIA_OPERACION_LOGOUT, '');
        Yii::app()->user->logout();
        $this->redirect(array('login'));
    }

    public function getListaRoles() {
        return CHtml::listData(AuthItem::model()->findAll(), 'name', 'name');
    }

    protected function renderChangeState($data, $row) {
        if ($data->enabled == 1)
            echo "<a href=" . Yii::app()->createUrl("user/updateState", array("id" => $data->nick)) . "> " . Yii::app()->params["labelBotonGrillaLockUser"] . "</a>";
        else
            echo "<a href=" . Yii::app()->createUrl("user/updateState", array("id" => $data->nick)) . "> " . Yii::app()->params["labelBotonGrillaUnlockUser"] . "</a>";
    }

}
