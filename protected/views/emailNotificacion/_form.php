<?php
/* @var $this EstadoInmuebleController */
/* @var $model EstadoInmueble */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'email-notificacion-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'email_cliente'); ?>
        <?php echo $form->textField($model, 'email_cliente', array('size' => 60, 'maxlength' => 100, "class" => "form-control")); ?>
        <?php echo $form->error($model, 'email_cliente'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'nombre_cliente'); ?>
        <?php echo $form->textField($model, 'nombre_cliente', array('size' => 60, 'maxlength' => 100, "class" => "form-control")); ?>
        <?php echo $form->error($model, 'nombre_cliente'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'mensaje'); ?>
        <?php echo CHtml::activeTextArea($model, "mensaje", array('size' => 60, 'maxlength' => 1024, "class" => "form-control")) ?>       
        <?php echo $form->error($model, 'mensaje'); ?>
    </div>
    
    <div id="grp-inmueble-tipo" class="form-group">
        <?php echo $form->labelEx($model, 'id_estado_notificacion'); ?>
        <?php
        echo $form->dropDownList($model,'id_estado_notificacion',
                $this->getEstadosNotificacion(), 
                array("class" => "form-control"));
        ?>  
        <?php echo $form->error($model, 'tipo_inmueble'); ?>
    </div>

    <a href="<?php echo Yii::app()->createUrl("emailNotificacion/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params["labelBotonCrear"] : Yii::app()->params["labelBotonGuardar"], array("class" => "btn btn-default")); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->