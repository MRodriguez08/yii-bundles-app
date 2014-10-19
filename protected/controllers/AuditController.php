<?php

class AuditController extends AdminController {

    protected $pageTitle = ". : Auditoria : .";

    /**
     * @return array action filters
     */
    public function filters() {
        parent::initController();
        Yii::app()->session[Constants::SESSION_CURRENT_TAB] = Constants::ITEM_MENU_AUDITORIA;
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
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin'),
                'roles' => array(Constants::USER_ROLE_DIRECTOR),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }   

    /**
     * Manages all models.
     */
    public function actionAdmin() {

        $model = new Audit('search');
        $model->unsetAttributes();
        if (isset($_GET['Audit'])) {
            $model->attributes = $_GET['Audit'];
        }

        $dH = new DateTimeHelper;   
        if (isset($_GET["Audit"]["dateTimeFrom"]) && strcmp($_GET["Audit"]["dateTimeFrom"],"") !== 0) {
            $model->dateTimeFrom = $_GET["Audit"]["dateTimeFrom"];
        } else {
            $model->dateTimeFrom = $dH->getDefaultStartRangeFilter("")->format(Yii::app()->params["dateTimeDisplayFormat"]);
        }
        if (isset($_GET["Audit"]["dateTimeTo"]) && strcmp($_GET["Audit"]["dateTimeTo"],"") !== 0) {
            $model->dateTimeTo = $_GET["Audit"]["dateTimeTo"];
        } else {
            $model->dateTimeTo = $dH->getDefaultEndRangeFilter("")->format(Yii::app()->params["dateTimeDisplayFormat"]);
        }
        
        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
