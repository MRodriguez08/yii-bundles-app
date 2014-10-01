<?php

class InmuebleController extends AdminController {

    protected $pageTitle = ". : Inmuebles : .";

    /**
     * @return array action filters
     */
    public function filters() {
        parent::initController();
        Yii::app()->session[Constantes::SESSION_CURRENT_TAB] = Constantes::ITEM_MENU_INMUEBLES;
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('barrioDinamico', 
                    'ciudadDinamica', 'create', 'view', 'update', 'admin', 'delete', 
                    'upload', 'uploadImages','inmueblesPorTipo','inmueblesPorEstado','inmueblesPorBarrio'),
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
        $model = $this->loadModel($id);
        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Inmueble;

        $fsUtil = new FileSystemUtil;

        if (isset($_POST['Inmueble'])) {

            $model->attributes = $_POST['Inmueble'];
            if ($model->save()) {

                //creo el directorio para las imagenes del inmueble
                $fsUtil->createPropertyFoderIfNotExists($model->id);

                //guardo las imagenes para el inmueble
                $images = $fsUtil->getTmpFilesNames();
                foreach ($images as $img) {
                    $imgInm = new ImagenInmueble;
                    $imgInm->id_inmueble = $model->id;
                    $imgInm->ruta = $img;
                    if ($imgInm->save()) {
                        $fsUtil->copyFileFromTmpToFs($imgInm->ruta, $model->id);
                    }
                }

                $this->audit->registrarAuditoria(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_INMUEBLE, Constantes::AUDITORIA_OPERACION_ALTA, $model->id);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Inmueble creado con &eacute;xito',
                    'message' => 'Haga click en volver para regresar a la gestión de inmuebles',
                    'returnUrl' => Yii::app()->createUrl('inmueble/admin'),
                    'viewUrl' => Yii::app()->createUrl("inmueble/view", array("id" => $model->id))
                ));
                return;
            }
        }

        $fsUtil->clearUserTmpFolder();
        $this->render('create', array('model' => $model,));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

        $model = $this->loadModel($id);
        $fsUtil = new FileSystemUtil;

        if (isset($_POST['Inmueble'])) {
            $model->attributes = $_POST['Inmueble'];
            if ($model->save()) {

                //elimino las imagenes viejas de el sistema de archivos y de la bd (las referencias)
                $fsUtil->deleteImagesFromProperty($id);
                $model->deleteAllImages();

                //guardo las imagenes nuevas para el inmueble
                $images = $fsUtil->getTmpFilesNames();
                foreach ($images as $img) {
                    $imgInm = new ImagenInmueble;
                    $imgInm->id_inmueble = $model->id;
                    $imgInm->ruta = $img;
                    if ($imgInm->save()) {
                        $fsUtil->copyFileFromTmpToFs($imgInm->ruta, $model->id);
                    }
                }
                $this->audit->registrarAuditoria(Yii::app()->user->id, new DateTime, Constantes::AUDITORIA_OBJETO_INMUEBLE, Constantes::AUDITORIA_OPERACION_MODIFICACION, $model->id);
                $this->render('/site/successfullOperation', array(
                    'header' => 'Inmueble modificado con &eacute;xito',
                    'message' => 'Haga click en volver para regresar a la gestión de inmuebles',
                    'returnUrl' => Yii::app()->createUrl('inmueble/admin'),
                    'viewUrl' => Yii::app()->createUrl("inmueble/view", array("id" => $model->id))
                ));
                return;
            }
        }

        $fsUtil->clearUserTmpFolder();
        $fsUtil->copyPropertyFilesFromFsToTmp($model->id);
        $this->render('update', array('model' => $model));
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
        $dataProvider = new CActiveDataProvider('Inmueble');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {

        $model = new Inmueble('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Inmueble']))
            $model->attributes = $_GET['Inmueble'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Inmueble the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Inmueble::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $model->strArrayImagenes = $model->imagesToStringArray();
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Inmueble $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'inmueble-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function getListaDepartamentos() {
        return CHtml::listData(Departamento::model()->findAll(), 'id', 'nombre');
    }

    public function actionCiudadDinamica() {
        $idDep = $_POST["Inmueble"]["id_departamento"];
        $data = Ciudad::model()->findAll('id_departamento=:id_departamento', array(':id_departamento' => (int) $idDep));

        $data = CHtml::listData($data, 'id', 'nombre');
        echo CHtml::tag('option', array('value' => "-1"), CHtml::encode("--  Seleccione  --"), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionBarrioDinamico() {
        $idBar = $_POST["Inmueble"]["id_ciudad"];
        $data = Barrio::model()->findAll('id_ciudad=:id_ciudad', array(':id_ciudad' => (int) $idBar));

        $data = CHtml::listData($data, 'id', 'nombre');
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function getTipoOperacion() {
        $opciones = array();
        $opciones[Constantes::OPERACION_PUBLICACION_ALQUILER] = CHtml::encode("Alquiler");
        $opciones[Constantes::OPERACION_PUBLICACION_VENTA] = CHtml::encode("Venta");
        return $opciones;
    }

    public function getTipoInmueble() {
        $opciones = array();
        $opciones[Constantes::TIPO_INMUEBLE_APARTAMENTO] = CHtml::encode("Apartamento");
        $opciones[Constantes::TIPO_INMUEBLE_CASA] = CHtml::encode("Casa");
        $opciones[Constantes::TIPO_INMUEBLE_LOCAL] = CHtml::encode("Local");
        return $opciones;
    }

    public function getTipoInmuebleFiltros() {
        $opciones = array();
        $opciones[""] = CHtml::encode("Todos");
        $opciones[Constantes::TIPO_INMUEBLE_APARTAMENTO] = CHtml::encode("Apartamento");
        $opciones[Constantes::TIPO_INMUEBLE_CASA] = CHtml::encode("Casa");
        $opciones[Constantes::TIPO_INMUEBLE_LOCAL] = CHtml::encode("Local");
        return $opciones;
    }

    public function actionInmueblesPorTipo() {
        $result = array();
        $data = array();
        $inm = new Inmueble;
        $arr = $inm->countByTipo();
        $count = $inm->count();
        foreach (array_keys($arr) as $i) {
            $item = array();
            array_push($item, $arr[$i]["tipo_inmueble"]);
            array_push($item, (int) $arr[$i]["count"] / (int) $count * 100);
            array_push($data, $item);
        }

        $result["data"] = $data;
        $result["titulo"] = "Porcentaje de inmuebles por tipo";
        $result["nombreSerie"] = "Proporcion por tipo";
        Response::send(CJSON::encode($result));
    }

    public function actionInmueblesPorEstado() {
        $result = array();
        $data = array();
        $inm = new Inmueble;
        $arr = $inm->countByEstado();
        $count = $inm->count();
        foreach (array_keys($arr) as $i) {
            $item = array();
            array_push($item, $arr[$i]["estado_inmueble"]);
            array_push($item, (int) $arr[$i]["count"] / (int) $count * 100);
            array_push($data, $item);
        }

        $result["data"] = $data;
        $result["titulo"] = "Porcentaje de inmuebles por estado";
        $result["nombreSerie"] = "Proporcion por estado";
        Response::send(CJSON::encode($result));
    }

    public function actionInmueblesPorBarrio() {
        $result = array();
        $data = array();
        $inm = new Inmueble;
        $arr = $inm->countByBarrio();
        $count = $inm->count();
        foreach (array_keys($arr) as $i) {
            $item = array();
            array_push($item, $arr[$i]["barrio_inmueble"] == null ? "Sin barrio" : $arr[$i]["barrio_inmueble"]);
            array_push($item, (int) $arr[$i]["count"] / (int) $count * 100);
            array_push($data, $item);
        }

        $result["data"] = $data;
        $result["titulo"] = "Porcentaje de inmuebles por barrio";
        $result["nombreSerie"] = "Proporcion por barrio";
        Response::send(CJSON::encode($result));
    }

}
