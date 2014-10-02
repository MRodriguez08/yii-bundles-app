<?php
/* @var $this ParametroController */
/* @var $model Parametro */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-wrench"></span> Modificar par&aacute;metro<?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
    <div class="col-lg-8"></div>
</div>



