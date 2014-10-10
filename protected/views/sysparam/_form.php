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
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm", "disabled" => "true")); ?>
        <?php echo $form->error($model, 'name', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo CHtml::activeTextArea($model, "description", array('size' => 60, 'maxlength' => 1024, "class" => "form-control input-sm")) ?>
        
        <?php echo $form->error($model, 'description', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'value'); ?>
        <?php echo $form->textField($model, 'value', array('size' => 60, 'maxlength' => 512, "class" => "form-control input-sm")); ?>
        <?php echo $form->error($model, 'value', array("class" => "yii-error-alert")); ?>
    </div>

    <a href="<?php echo Yii::app()->createUrl("parametro/admin") ?>"><?php echo Yii::app()->params["goBackButtonLabel"] ?></a>
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params["createButtonLabel"] : Yii::app()->params["createButtonLabel"], array("class" => "btn btn-default")); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->