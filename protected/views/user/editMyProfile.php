<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>



<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-user"></span> Editar mi perfil<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
        <div class="row">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'user-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions'=>array(
                        'enctype'=>'multipart/form-data'
                     ),
                ));
                ?>

                <?php
                if (count($model->getErrors()) > 0) {
                    echo Yii::app()->params["formHasErrorPanel"];
                };
                ?>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'nick'); ?>
                    <?php echo $form->textField($model, 'nick', array('disabled' => ($model->isNewRecord ? '' : 'true'), 'size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'nick', array("class" => "yii-error-alert")); ?>
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
                    <?php echo $form->labelEx($model, 'surname'); ?>
                    <?php echo $form->textField($model, 'surname', array('size' => 60, 'maxlength' => 100, "class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'surname', array("class" => "yii-error-alert")); ?>
                </div>
            
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'photo'); ?>
                    <input name="User_photo_file" type="file" class="form-control input-sm" id="User_photo" />
                    <?php echo $form->error($model, 'photo', array("class" => "yii-error-alert")); ?>
                </div>

                <a href="<?php echo Yii::app()->createUrl("user/myProfile") ?>"><?php echo Yii::app()->params["goBackButtonLabel"] ?></a>
                <?php echo CHtml::submitButton(Yii::app()->params["createButtonLabel"], array("class" => "btn btn-default")); ?>

                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-8"></div>
</div>