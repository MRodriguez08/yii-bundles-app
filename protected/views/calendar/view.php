<?php
/* @var $this ClienteController */
/* @var $model Cliente */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'ciudad-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="form-group">
    <?php echo $form->labelEx($model, 'title'); ?>
    <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 100, "class" => "form-control", "disabled" => "true")); ?>
    <?php echo $form->error($model, 'title'); ?>
</div>

<?php $this->endWidget(); ?>