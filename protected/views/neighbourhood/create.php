<?php
/* @var $this BarrioController */
/* @var $model Barrio */
?>


<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-map-marker"></span> Nuevo barrio<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
    <div class="col-lg-8"></div>
</div>