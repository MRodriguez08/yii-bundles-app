<?php ?>
<div class="row">
    <div class="col-lg-12">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-th"></span> <?php echo Yii::app()->params["topPropertiesFunctionalityLabel"] ?><?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl("site/index") ?>">Inicio</a></li>
            <li class="active"><?php echo Yii::app()->params["topPropertiesFunctionalityLabel"] ?></li>
        </ol>
        
        <div class="row">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'portada-form',
                'enableAjaxValidation' => false,
            ));
            ?>

            <div class="col-lg-6">
                
                <?php if (count($model->getErrors()) > 0) { echo Yii::app()->params["formHasErrorPanel"]; }; ?>
                
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'idDestacado1'); ?>
                    <?php echo $form->dropDownList($model, 'idDestacado1', $model->getListaInmuebles(), array("class" => "form-control combo-suggest input-sm")); ?>
                    <?php echo $form->error($model, 'idDestacado1', array("class" => "yii-error-alert")); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'idDestacado2'); ?>
                    <?php echo $form->dropDownList($model, 'idDestacado2', $model->getListaInmuebles(), array("class" => "form-control combo-suggest input-sm")); ?>
                    <?php echo $form->error($model, 'idDestacado2', array("class" => "yii-error-alert")); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'idDestacado3'); ?>
                    <?php echo $form->dropDownList($model, 'idDestacado3', $model->getListaInmuebles(), array("class" => "form-control combo-suggest input-sm")); ?>
                    <?php echo $form->error($model, 'idDestacado3', array("class" => "yii-error-alert")); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'idDestacado4'); ?>
                    <?php echo $form->dropDownList($model, 'idDestacado4', $model->getListaInmuebles(), array("class" => "form-control combo-suggest input-sm")); ?>
                    <?php echo $form->error($model, 'idDestacado4', array("class" => "yii-error-alert")); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'idDestacado5'); ?>
                    <?php echo $form->dropDownList($model, 'idDestacado5', $model->getListaInmuebles(), array("class" => "form-control combo-suggest input-sm")); ?>
                    <?php echo $form->error($model, 'idDestacado5', array("class" => "yii-error-alert")); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'idDestacado6'); ?>
                    <?php echo $form->dropDownList($model, 'idDestacado6', $model->getListaInmuebles(), array("class" => "form-control combo-suggest input-sm")); ?>
                    <?php echo $form->error($model, 'idDestacado6', array("class" => "yii-error-alert")); ?>
                </div>

            </div>
            <div class="col-lg-12">
                <?php echo CHtml::submitButton(Yii::app()->params["createButtonLabel"], array("class" => "btn btn-default")); ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>