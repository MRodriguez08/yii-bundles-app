<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php if (count($model->getErrors()) > 0) { echo Yii::app()->params["formHasErrorPanel"]; }; ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'nick'); ?>
        <?php echo $form->textField($model, 'nick', array('disabled' => ($model->isNewRecord ? '' : 'true'),'size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>
        <?php echo $form->error($model, 'nick', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>
        <?php echo $form->error($model, 'email', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, "class" => "form-control input-sm")); ?>
        <?php echo $form->error($model, 'name', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'surname'); ?>
        <?php echo $form->textField($model, 'surname', array('size' => 60, 'maxlength' => 100, "class" => "form-control input-sm")); ?>
        <?php echo $form->error($model, 'surname', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'role'); ?>        
        <?php echo CHtml::dropDownList('User[role]', $model->role, 
            array('administrativo' => 'administrativo', 'agente' => 'agente', 'director' => 'director'),
            array("class" => "form-control input-sm")); ?>       
    </div>
    
    <a href="<?php echo Yii::app()->createUrl("user/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params["labelBotonCrear"] : Yii::app()->params["labelBotonGuardar"], array("class" => "btn btn-default")); ?>

    <?php $this->endWidget(); ?>

</div>