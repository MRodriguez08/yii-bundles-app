<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'departamento-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
    
    <?php if (count($model->getErrors()) > 0) { echo Yii::app()->params["formHasErrorPanel"]; }; ?>
    
    <div class="form-group">
        <?php echo $form->labelEx($model, 'nombre'); ?>        
        <?php echo $form->textField($model, 'nombre', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>        
        <?php echo $form->error($model, 'nombre' , array("class" => "yii-error-alert")); ?>
    </div>

    <a href="<?php echo Yii::app()->createUrl("departamento/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params["labelBotonCrear"] : Yii::app()->params["labelBotonGuardar"], array("class" => "btn btn-default")); ?>


    <?php $this->endWidget(); ?>

</div><!-- form -->