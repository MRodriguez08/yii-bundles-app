<?php
/* @var $this ClienteController */
/* @var $model Cliente */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-calendar"></span> Editar evento<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
    <div class="col-lg-8"></div>
</div>