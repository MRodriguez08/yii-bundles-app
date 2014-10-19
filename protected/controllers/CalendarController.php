<?php

class CalendarController extends AdminController {

    protected $pageTitle = ". : Mis eventos : .";

    /**
     * 
     * @return array action filters
     */
    public function filters() {
        parent::initController();
        Yii::app()->session[Constants::SESSION_CURRENT_TAB] = Constants::ITEM_MENU_CALENDARIO;
        return array(
            'accessControl',
            'postOnly + delete,createEvent',
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
                'actions' => array('admin', 'createEvent', 'updateEvent', 'getAllEvents','view'),
                'roles' => array(Constants::USER_ROLE_ADMINISTRATIVO, Constants::USER_ROLE_AGENTE, Constants::USER_ROLE_DIRECTOR),
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
        $this->render('admin');
    }
    
    public function actionView($id) {
        $this->layout = '';
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TipoNotificacion the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Event::model()->findByPk($id);
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

    public function actionCreateEvent() {
        $transaction = Yii::app()->db->beginTransaction();
        try {

            $dU = new DateTimeHelper();

            $e = new Event;
            $e->title = $_POST['title'];
            $e->body = $_POST['body'];
            $dt = $dU->getDateTimeFromUI($_POST['end']);
            $e->end = $dt->getTimestamp();
            $dt = $dU->getDateTimeFromUI($_POST['start']);
            $e->start = $dt->getTimestamp();
            $e->user_id = Yii::app()->user->id;

            if (!$e->save()){
                $transaction->commit();
                Response::ok(CJSON::encode(array("result" => "error", "message" => CJSON::encode($e->getErrors()))));
            } else {                
                Response::ok(CJSON::encode(array("result" => "success", "message" => $e->id)));
            }
        } catch (Exception $exc) {
            $transaction->rollback();
            Yii::log($exc->getMessage(), DBLog::LOG_LEVEL_ERROR);
            Response::error(CJSON::encode(array("result" => "error", "message" => Yii::app()->params["httpErrorCode500Message"])));
        }
    }

    public function actionUpdateEvent() {
        
    }

    public function actionGetAllEvents() {
        $out = array();
        try {
            $events = Event::model()->findAll("user_id=:userId", array("userId" => Yii::app()->user->id));
            foreach ($events as $e) { 
                $item = array(
                    'id' => $e->id,
                    'title' => $e->title,
                    'url' => Yii::app()->baseUrl . '/index.php/event/' . $e->id,
                    'class' => 'event-important',
                    'start' => $e->start . '000',
                    'end' => $e->end . '000'
                );
                array_push($out, $item);
            }
            Response::ok(CJSON::encode(array('success' => 1, 'result' => $out)));
        } catch (Exception $exc) {
            Yii::log($exc->getMessage(), DBLog::LOG_LEVEL_ERROR);
            Response::error(CJSON::encode(array("result" => "error", "message" => Yii::app()->params["httpErrorCode500Message"])));
        }
    }

}
