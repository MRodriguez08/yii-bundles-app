<?php
/* @var $this ChangePasswordController */
/* @var $model ChangePassword */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><i class="fa fa-key"></i> Cambiar contrase&ntilde;a<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
        <div class="row">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'change-password-changePassword-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // See class documentation of CActiveForm for details on this,
                // you need to use the performAjaxValidation()-method described there.
                'enableAjaxValidation' => false,
            ));
            ?>

            <?php
            if (count($model->getErrors()) > 0) {
                echo Yii::app()->params["formHasErrorPanel"];
            };
            ?>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'oldPassword'); ?>
                <?php echo $form->passwordField($model, 'oldPassword', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>
                <?php echo $form->error($model, 'oldPassword', array("class" => "yii-error-alert")); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'newPassword'); ?>
                <?php echo $form->passwordField($model, 'newPassword', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>
                <?php echo $form->error($model, 'newPassword', array("class" => "yii-error-alert")); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'newPasswordConfirmation'); ?>
                <?php echo $form->passwordField($model, 'newPasswordConfirmation', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>
                <?php echo $form->error($model, 'newPasswordConfirmation', array("class" => "yii-error-alert")); ?>
            </div>

            <a href="<?php echo Yii::app()->createUrl("usuario/miPerfil") ?>"><?php echo Yii::app()->params["goBackButtonLabel"] ?></a>
            <?php echo CHtml::submitButton(Yii::app()->params["createButtonLabel"], array("class" => "btn btn-default")); ?>

            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
</div>