<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */
/* @var $form CActiveForm */
?>

<div class="wide form">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <?php echo Yii::app()->params["showFiltersLabel"]; ?>
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
                        <?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 100, "class" => "form-control input-sm")); ?>
                    </div>

                    <div class="form-group col-lg-3">
                        <?php echo $form->label($model, 'description'); ?>
                        <?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 2048, "class" => "form-control input-sm")); ?>
                    </div>

                    <div class="form-group col-lg-3">
                        <?php echo $form->label($model, 'tipo_inmueble'); ?>
                        <?php
                        echo $form->dropDownList($model, 'tipo_inmueble', $this->getTipoInmuebleFiltros(), array("class" => "form-control input-sm", "onchange" => "configurarFormularioSegunTipo()"));
                        ?>  
                    </div>
                    <div class="form-group col-lg-12">
                        <button type="submit" class="btn btn-default btn-sm">
                            <?php echo Yii::app()->params["filterButtonLabel"] ?>
                        </button>             
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>



</div><!-- search-form -->