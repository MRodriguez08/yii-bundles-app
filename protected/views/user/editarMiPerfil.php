<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>



<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-user"></span> Editar mi perfil<?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>
        <div class="row">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'usuario-form',
                    'enableAjaxValidation' => false,
                ));
                ?>

                <?php
                if (count($model->getErrors()) > 0) {
                    echo Yii::app()->params["formHasErrorPanel"];
                };
                ?>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'usuario'); ?>
                    <?php echo $form->textField($model, 'usuario', array('disabled' => ($model->isNewRecord ? '' : 'true'), 'size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'usuario', array("class" => "yii-error-alert")); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'email', array("class" => "yii-error-alert")); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'name'); ?>
                    <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, "class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'name', array("class" => "yii-error-alert")); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'apellido'); ?>
                    <?php echo $form->textField($model, 'apellido', array('size' => 60, 'maxlength' => 100, "class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'apellido', array("class" => "yii-error-alert")); ?>
                </div>

                <a href="<?php echo Yii::app()->createUrl("usuario/miPerfil") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
                <?php echo CHtml::submitButton(Yii::app()->params["labelBotonGuardar"], array("class" => "btn btn-default")); ?>

                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-8"></div>
</div>