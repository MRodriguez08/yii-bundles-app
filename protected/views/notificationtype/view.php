<?php
/* @var $this TipoNotificacionController */
/* @var $model TipoNotificacion */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-comment"></span> Ver info de tipo de notificaci&oacute;n<?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>
        <div class="form">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'tipo-notificacion-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation' => false,
            ));
            ?>

            <?php echo $form->errorSummary($model); ?>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'name'); ?>
                <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm" , "disabled" => "true")); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'description'); ?>
                <?php echo $form->textArea($model, 'description', array('size' => 60, 'maxlength' => 512, "class" => "form-control input-sm", "disabled" => "true")); ?>
                <?php echo $form->error($model, 'description'); ?>
            </div>

            <a href="<?php echo Yii::app()->createUrl("notificationtype/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
    <div class="col-lg-8"></div>
</div>
