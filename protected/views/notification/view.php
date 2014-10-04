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
                <?php echo $form->labelEx($model, 'clientemail'); ?>
                <?php echo $form->textField($model, 'clientemail', array('size' => 60, 'maxlength' => 100, "class" => "form-control", "disabled" => "true")); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'clientname'); ?>
                <?php echo $form->textField($model, "clientname", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'datetimesent'); ?>
                <?php echo $form->textField($model, "datetimesent", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>
            <div class="form-group">
                <label>Tipo</label>
                <?php echo $form->textField($model->type, "name", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'message'); ?>
                <?php echo $form->textArea($model, "message", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>
            <a href="<?php echo Yii::app()->createUrl("notification/admin")?>">Volver</a>
            <?php echo CHtml::button("Ingresar cliente", array("class" => "btn btn-default" , "onclick" => "notificacionCrearNuevoCliente()")); ?>
        <?php $this->endWidget(); ?>
    </div>
    <div class="col-lg-8"></div>
</div>
