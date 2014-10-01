<?php
/* @var $this CiudadController */
/* @var $model Ciudad */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ciudad-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php if (count($model->getErrors()) > 0) { echo Yii::app()->params["formHasErrorPanel"]; }; ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'nombre'); ?>
        <?php echo $form->textField($model, 'nombre', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>
        <?php echo $form->error($model, 'nombre', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'id_departamento'); ?>
        <?php echo $form->dropDownList($model, 'id_departamento', $this->getListaDepartamentos(), array("class" => "form-control combo-suggest input-sm")); ?>
        <?php echo $form->error($model, 'id_departamento', array("class" => "yii-error-alert")); ?>
    </div>

    <a href="<?php echo Yii::app()->createUrl("ciudad/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params["labelBotonCrear"] : Yii::app()->params["labelBotonGuardar"], array("class" => "btn btn-default")); ?>


    <?php $this->endWidget(); ?>

</div><!-- form -->