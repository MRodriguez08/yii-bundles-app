<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */

?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-map-marker"></span> Modificar departamento<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
    <div class="col-lg-8"></div>
</div>