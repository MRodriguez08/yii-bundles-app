<?php
/* @var $this TipoNotificacionController */
/* @var $model TipoNotificacion */
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
                        <?php echo $form->label($model, 'titulo'); ?>
                        <?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 512, "class" => "form-control input-sm")); ?>
                    </div>
                    <div class="form-group col-lg-3">
                        <?php echo $form->label($model, "fechaDesde"); ?>
                        <div class="input-group date">
                            <?php echo $form->textField($model, "fechaDesde", array("class" => "date form-control input-sm", "data-date-format" => Yii::app()->params["inputDataDateFormat"])); ?>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <?php echo $form->label($model, "fechaHasta"); ?>
                        <div class="input-group date">
                            <?php echo $form->textField($model, "fechaHasta", array("class" => "date form-control input-sm", "data-date-format" => Yii::app()->params["inputDataDateFormat"])); ?>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

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

</div><!-- search-form -->