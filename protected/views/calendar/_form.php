<?php
/* @var $this PropertyStateController */
/* @var $model PropertyState */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'evento-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php if (count($model->getErrors()) > 0) { echo Yii::app()->params["formHasErrorPanel"]; }; ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'titulo'); ?>
        <?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 100, "class" => "form-control input-sm")); ?>
        <?php echo $form->error($model, 'titulo', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'fecha_hora_desde'); ?>
        <div class='input-group date'>
            <?php echo $form->textField($model, "fecha_hora_desde", array('size' => 60, 'maxlength' => 1024, "class" => "date form-control input-sm", "data-date-format" => Yii::app()->params["inputDataDateFormat"])) ?>       
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>        
        <?php echo $form->error($model, 'fecha_hora_desde', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'fecha_hora_hasta'); ?>
        <div class='input-group date' >
            <?php echo $form->textField($model, "fecha_hora_hasta", array('size' => 60, 'maxlength' => 1024, "class" => "date form-control input-sm", "data-date-format" => Yii::app()->params["inputDataDateFormat"])) ?>       
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>          
        <?php echo $form->error($model, 'fecha_hora_hasta'); ?>
    </div>

    <div id="grp-inmueble-fk_estado" class="form-group">
        <?php echo $form->labelEx($model, 'id_cliente'); ?>
        <?php echo $form->dropDownList($model, 'id_cliente', $this->getListaClientes(), array("class" => "form-control combo-suggest input-sm")); ?>
        <?php echo $form->error($model, 'id_cliente', array("class" => "yii-error-alert")); ?>
    </div>
    
    <div id="grp-inmueble-fk_estado" class="form-group">
        <?php echo $form->labelEx($model, 'id_inmueble'); ?>
        <?php echo $form->dropDownList($model, 'id_inmueble', $this->getListaInmuebles(), array("class" => "form-control combo-suggest input-sm")); ?>
        <?php echo $form->error($model, 'id_inmueble', array("class" => "yii-error-alert")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo CHtml::activeTextArea($model, "description", array('size' => 60, 'maxlength' => 1024, "class" => "form-control input-sm")) ?>       
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <a href="<?php echo Yii::app()->createUrl("evento/admin") ?>"><?php echo Yii::app()->params["goBackButtonLabel"] ?></a>
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params["createButtonLabel"] : Yii::app()->params["createButtonLabel"], array("class" => "btn btn-default")); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->