<?php
/* @var $this ParametroController */
/* @var $model Parametro */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'parametro-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php if (count($model->getErrors()) > 0) { echo Yii::app()->params["formHasErrorPanel"]; }; ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'nombre'); ?>
        <?php echo $form->textField($model, 'nombre', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm", "disabled" => "true")); ?>
        <?php echo $form->error($model, 'nombre', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'descripcion'); ?>
        <?php echo CHtml::activeTextArea($model, "descripcion", array('size' => 60, 'maxlength' => 1024, "class" => "form-control input-sm")) ?>
        
        <?php echo $form->error($model, 'descripcion', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'valor'); ?>
        <?php echo $form->textField($model, 'valor', array('size' => 60, 'maxlength' => 512, "class" => "form-control input-sm")); ?>
        <?php echo $form->error($model, 'valor', array("class" => "yii-error-alert")); ?>
    </div>

    <a href="<?php echo Yii::app()->createUrl("parametro/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params["labelBotonCrear"] : Yii::app()->params["labelBotonGuardar"], array("class" => "btn btn-default")); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->