<?php
/* @var $this AuditoriaController */
/* @var $model Auditoria */
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
                    $form = $this->beginWidget("CActiveForm", array(
                        "action" => Yii::app()->createUrl($this->route),
                        "method" => "get",
                    ));
                    ?>

                    <div class="form-group col-lg-3">
                        <?php echo $form->label($model, "user"); ?>
                        <?php echo $form->textField($model, "user", array("class" => "form-control input-sm")); ?>
                    </div>

                    <div class="form-group col-lg-3">
                        <?php echo $form->label($model, "object"); ?>                        
                        <?php
                        echo $form->dropDownList($model, 'object', array("" => Yii::app()->params["labelEmptyComboBoxValue"], Constants::AUDITORIA_OBJETO_EVENTO => "Eventos", Constants::AUDITORIA_OBJETO_INMUEBLE => "Inmuebles", Constants::AUDITORIA_OBJETO_PARAMETRO => "Parametros", Constants::AUDITORIA_OBJETO_USUARIO => "Usuario"), array("class" => "form-control input-sm"));
                        ?>       
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <?php echo $form->label($model, "operation"); ?>
                            <?php
                            echo $form->dropDownList($model, 'operation', array("" => Yii::app()->params["labelEmptyComboBoxValue"], Constants::AUDITORIA_OPERACION_ALTA => "Altas", Constants::AUDITORIA_OPERACION_BAJA => "Bajas", Constants::AUDITORIA_OPERACION_LOGIN => "Login", Constants::AUDITORIA_OPERACION_LOGOUT => "Logout", Constants::AUDITORIA_OPERACION_MODIFICACION => "Modificaciones"), array("class" => "form-control input-sm"));
                            ?>    
                        </div>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <?php echo $form->label($model, "dateTimeFrom"); ?>
                            <div class="input-group date">
                                <?php echo $form->textField($model, "dateTimeFrom", array("class" => "date form-control input-sm", "data-date-format" => Yii::app()->params["inputDataDateFormat"])); ?>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <?php echo $form->label($model, "dateTimeTo"); ?>
                            <div class="input-group date">
                                <?php echo $form->textField($model, "dateTimeTo", array("class" => "date form-control input-sm", "data-date-format" => Yii::app()->params["inputDataDateFormat"])); ?>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
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