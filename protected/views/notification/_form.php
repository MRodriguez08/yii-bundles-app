<?php
/* @var $this PropertyStateController */
/* @var $model PropertyState */
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
        <?php echo $form->labelEx($model, 'clientemail'); ?>
        <?php echo $form->textField($model, 'clientemail', array('size' => 60, 'maxlength' => 100, "class" => "form-control")); ?>
        <?php echo $form->error($model, 'clientemail'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'clientname'); ?>
        <?php echo $form->textField($model, 'clientname', array('size' => 60, 'maxlength' => 100, "class" => "form-control")); ?>
        <?php echo $form->error($model, 'clientname'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'message'); ?>
        <?php echo CHtml::activeTextArea($model, "message", array('size' => 60, 'maxlength' => 1024, "class" => "form-control")) ?>       
        <?php echo $form->error($model, 'message'); ?>
    </div>
    
    <div id="grp-inmueble-tipo" class="form-group">
        <?php echo $form->labelEx($model, 'state_id'); ?>
        <?php
        echo $form->dropDownList($model,'state_id',
                $this->getNotificationStatesList(), 
                array("class" => "form-control"));
        ?>  
        <?php echo $form->error($model, 'state_id'); ?>
    </div>

    <a href="<?php echo Yii::app()->createUrl("notification/admin") ?>"><?php echo Yii::app()->params["goBackButtonLabel"] ?></a>
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params["createButtonLabel"] : Yii::app()->params["createButtonLabel"], array("class" => "btn btn-default")); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->