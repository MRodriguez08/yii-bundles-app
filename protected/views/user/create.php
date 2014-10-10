<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-user"></span> Crear usuario<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
    <div class="col-lg-8"></div>
</div>