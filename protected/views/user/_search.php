<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <?php echo Yii::app()->params["labelDesplegarFiltros"]; ?>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse <?php echo Yii::app()->params["filterPanelInitialState"] ?>">
                <div class="panel-body">

                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'action' => Yii::app()->createUrl($this->route),
                        'method' => 'get',
                    ));
                    ?>
                    <div class="form-group col-lg-3">
                        <?php echo $form->label($model, 'nick', array("for" => "Usuario_username")); ?>
                        <?php echo $form->textField($model, 'nick', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>
                    </div>
                    <div class="form-group col-lg-3">
                        <?php echo $form->label($model, 'email', array("for" => "Usuario_email")); ?>
                        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 64, "class" => "form-control input-sm")); ?>
                    </div>
                    <div class="form-group col-lg-3">
                        <?php echo $form->label($model, 'name', array("for" => "Usuario_name")); ?>
                        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, "class" => "form-control input-sm")); ?>
                    </div>
                    <div class="form-group col-lg-3">
                        <?php echo $form->label($model, 'surname', array("for" => "Usuario_surname")); ?>
                        <?php echo $form->textField($model, 'surname', array('size' => 60, 'maxlength' => 100, "class" => "form-control input-sm")); ?>
                    </div>
                    <!--
                    <div class="form-group col-lg-3">
                        <?php echo $form->label($model, 'role'); ?>
                        <?php echo $form->dropDownList($model , 'role', $this->getListaRoles(), array("class" => "form-control input-sm")) ?>
                    </div>
                    -->
                    <div class="form-group col-lg-12">
                        <button type="submit" class="btn btn-default btn-sm">
                            <?php echo Yii::app()->params["labelBotonFiltrar"] ?>
                        </button>             
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>