<?php
/* @var $this PropertyStateController */
/* @var $model PropertyState */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-envelope"></span> Ver notificaci&oacute;n<?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>

        <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'email-notificacion-form',
                'enableAjaxValidation' => false,
            ));
            ?>

            <?php echo $form->errorSummary($model); ?>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'email_cliente'); ?>
                <?php echo $form->textField($model, 'email_cliente', array('size' => 60, 'maxlength' => 100, "class" => "form-control", "disabled" => "true")); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'name_cliente'); ?>
                <?php echo $form->textField($model, "name_cliente", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'fecha_hora_envio'); ?>
                <?php echo $form->textField($model, "fecha_hora_envio", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model->tipoNotificacion, 'name'); ?>
                <?php echo $form->textField($model->tipoNotificacion, "name", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model->tipoNotificacion, 'name'); ?>
                <?php echo $form->textArea($model->tipoNotificacion, "name", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>
            <a href="<?php echo Yii::app()->createUrl("emailNotificacion/admin")?>">Volver</a>
            <?php echo CHtml::button("Ingresar cliente", array("class" => "btn btn-default" , "onclick" => "notificacionCrearNuevoCliente()")); ?>
        <?php $this->endWidget(); ?>
    </div>
    <div class="col-lg-8"></div>
</div>
