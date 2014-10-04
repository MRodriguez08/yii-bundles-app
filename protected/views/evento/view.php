<?php
/* @var $this ClienteController */
/* @var $model Cliente */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-calendar"></span> Info de evento<?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>
        <?php
        /* @var $this PropertyStateController */
        /* @var $model PropertyState */
        /* @var $form CActiveForm */
        ?>

        <div class="form">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'evento-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation' => false,
            ));
            ?>

            <?php echo $form->errorSummary($model); ?>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'titulo'); ?>
                <?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 100, "class" => "form-control", "disabled" => "true")); ?>
                <?php echo $form->error($model, 'titulo'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'fecha_hora_desde'); ?>
                <?php echo $form->textField($model, "fecha_hora_desde", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'fecha_hora_hasta'); ?>
                <?php echo $form->textField($model, "fecha_hora_hasta", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'id_cliente'); ?>
                <?php echo $form->textField($model->cliente, "name", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'id_inmueble'); ?>
                <?php echo $form->textField($model->inmueble, "titulo", array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")) ?>       
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'description'); ?>
                <?php echo $form->textArea($model, 'description', array('size' => 60, 'maxlength' => 2048, "class" => "form-control", "disabled" => "true")); ?>
            </div>

            <a href="<?php echo Yii::app()->createUrl("evento/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>

            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
    <div class="col-lg-8"></div>
</div>