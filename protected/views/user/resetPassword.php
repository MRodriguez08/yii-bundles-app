<?php
/* @var $this UsuarioController */
/* @var $error array */
?>

<div class="row">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuario-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <h2>¿Desea reinicializar la contrase&ntilde;a para el usuario <?php echo $model->usuario ?>?</h2>
    <?php echo $form->textField($model, 'usuario', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm hidden")); ?>
    <a href="<?php echo Yii::app()->createUrl("usuario/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
    <?php echo CHtml::submitButton(Yii::app()->params["labelBotonConfirmar"], array("class" => "btn btn-default")); ?>       
    <?php $this->endWidget(); ?>
</div>