<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */
/* @var $form CActiveForm */
?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/open-street-map_ver.js"></script>
<div class="row">
    <div class="col-lg-12">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-home"></span> Ver info de inmueble (<?php echo $model->id; ?>)<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#datos-comunes" data-toggle="tab">Datos com&uacute;nes</a></li>
            <li><a id="tab-ubicacion" href="#ubicacion" data-toggle="tab">Ubicaci&oacute;n</a></li>
            <li><a href="#imagenes" data-toggle="tab">Im&aacute;genes</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active inmueble-tab-container" id="datos-comunes">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'inmueble-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data')
                ));
                ?>
                <?php echo $form->errorSummary($model); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div id="grp-inmueble-titulo" class="form-group">
                            <?php echo $form->labelEx($model, 'titulo'); ?>
                            <?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 100, "class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-operacion_publicacion" class="form-group">
                            <?php echo $form->labelEx($model, 'operacion_publicacion'); ?>
                            <?php echo $form->textField($model, 'operacion_publicacion', array('size' => 60, 'maxlength' => 100, "class" => "form-control", "disabled" => "true")); ?>
                            <?php echo $form->error($model, 'operacion_publicacion'); ?>
                        </div>

                        <div id="grp-inmueble-direccion_corta" class="form-group">
                            <?php echo $form->labelEx($model, 'direccion_corta'); ?>
                            <?php echo $form->textArea($model, 'direccion_corta', array('size' => 60, 'maxlength' => 2048, "class" => "form-control", "disabled" => "true")); ?>
                        </div>
                        
                        <div id="grp-inmueble-description" class="form-group">
                            <?php echo $form->labelEx($model, 'description'); ?>
                            <?php echo $form->textArea($model, 'description', array('size' => 60, 'maxlength' => 2048, "class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-tipo" class="form-group">
                            <?php echo $form->labelEx($model, 'tipo_inmueble'); ?>
                            <?php
                            echo CHtml::dropDownList('Inmueble[tipo_inmueble]', $model->tipo_inmueble, array(
                                'apartamento' => 'APARTAMENTO',
                                'casa' => 'CASA',
                                'local' => 'LOCAL COMERCIAL'), array("class" => "form-control", "onchange" => "configurarFormularioSegunTipo()", "disabled" => "true"));
                            ?> 
                        </div>

                        <div id="grp-inmueble-vista_al_mar" class="form-group">
                            <?php echo $form->labelEx($model, 'vista_al_mar'); ?>
                            <?php echo $form->checkBox($model, 'vista_al_mar', array("disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-tiene_calefaccion" class="form-group">
                            <?php echo $form->labelEx($model, 'tiene_calefaccion'); ?>
                            <?php echo $form->checkBox($model, 'tiene_calefaccion', array("disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-gastos_comunes" class="form-group">
                            <?php echo $form->labelEx($model, 'gastos_comunes'); ?>
                            <?php echo $form->textField($model, 'gastos_comunes', array("class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-anio_construccion_aproximado" class="form-group">
                            <?php echo $form->labelEx($model, 'anio_construccion_aproximado'); ?>
                            <?php echo $form->textField($model, 'anio_construccion_aproximado', array("class" => "form-control", "disabled" => "true")); ?>
                        </div>


                        <div id="grp-inmueble-coord_latitud" class="form-group">
                            <?php echo $form->labelEx($model, 'coord_latitud'); ?>
                            <?php echo $form->textField($model, 'coord_latitud', array("class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-coord_longitud" class="form-group">
                            <?php echo $form->labelEx($model, 'coord_longitud'); ?>
                            <?php echo $form->textField($model, 'coord_longitud', array("class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-cant_banios" class="form-group">
                            <?php echo $form->labelEx($model, 'cant_banios'); ?>
                            <?php echo $form->textField($model, 'cant_banios', array("class" => "form-control", "disabled" => "true")); ?>
                        </div>                
                    </div>
                    <div class="col-lg-6">
                        <div id="grp-inmueble-cant_dormitorios" class="form-group">
                            <?php echo $form->labelEx($model, 'cant_dormitorios'); ?>
                            <?php echo $form->textField($model, 'cant_dormitorios', array("class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-numero_de_piso" class="form-group">
                            <?php echo $form->labelEx($model, 'numero_de_piso'); ?>
                            <?php echo $form->textField($model, 'numero_de_piso', array("class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-tiene_ascensor" class="form-group">
                            <?php echo $form->labelEx($model, 'tiene_ascensor'); ?>
                            <?php echo $form->checkBox($model, 'tiene_ascensor', array("disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-tiene_porteria" class="form-group">
                            <?php echo $form->labelEx($model, 'tiene_porteria'); ?>
                            <?php echo $form->checkBox($model, 'tiene_porteria', array("disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-tiene_portero_electrico" class="form-group">
                            <?php echo $form->labelEx($model, 'tiene_portero_electrico'); ?>
                            <?php echo $form->checkBox($model, 'tiene_portero_electrico', array("disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-tiene_vigilancia" class="form-group">
                            <?php echo $form->labelEx($model, 'tiene_vigilancia'); ?>
                            <?php echo $form->checkBox($model, 'tiene_vigilancia', array("disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-tipo_local" class="form-group">
                            <?php echo $form->labelEx($model, 'tipo_local'); ?>
                            <?php echo $form->textField($model, 'tipo_local', array('size' => 50, 'maxlength' => 50, "class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-mts2_edificados" class="form-group">
                            <?php echo $form->labelEx($model, 'mts2_edificados'); ?>
                            <?php echo $form->textField($model, 'mts2_edificados', array('size' => 50, 'maxlength' => 50, "class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-cant_plantas_casa" class="form-group">
                            <?php echo $form->labelEx($model, 'cant_plantas_casa'); ?>
                            <?php echo $form->textField($model, 'cant_plantas_casa', array('size' => 50, 'maxlength' => 50, "class" => "form-control", "disabled" => "true")); ?>
                        </div>


                        <div id="grp-inmueble-tipo_local_observacion" class="form-group">
                            <?php echo $form->labelEx($model, 'tipo_local_observacion'); ?>
                            <?php echo $form->textField($model, 'tipo_local_observacion', array('size' => 60, 'maxlength' => 1024, "class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-tiene_planta_alta" class="form-group">
                            <?php echo $form->labelEx($model, 'tiene_planta_alta'); ?>
                            <?php echo $form->checkBox($model, 'tiene_planta_alta', array("disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-altura_salon_principal" class="form-group">
                            <?php echo $form->labelEx($model, 'altura_salon_principal'); ?>
                            <?php echo $form->textField($model, 'altura_salon_principal', array("class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-cant_plantas_local" class="form-group">
                            <?php echo $form->labelEx($model, 'cant_plantas_local'); ?>
                            <?php echo $form->textField($model, 'cant_plantas_local', array("class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-tiene_estacionamiento" class="form-group">
                            <?php echo $form->labelEx($model, 'tiene_estacionamiento'); ?>
                            <?php echo $form->checkBox($model, 'tiene_estacionamiento', array("disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-tiene_deposito" class="form-group">
                            <?php echo $form->labelEx($model, 'tiene_deposito'); ?>
                            <?php echo $form->checkBox($model, 'tiene_deposito', array("disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-es_propiedad_horizontal" class="form-group">
                            <?php echo $form->labelEx($model, 'es_propiedad_horizontal'); ?>
                            <?php echo $form->checkBox($model, 'es_propiedad_horizontal', array("disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-potencia_contratada" class="form-group">
                            <?php echo $form->labelEx($model, 'potencia_contratada'); ?>
                            <?php echo $form->textField($model, 'potencia_contratada', array('size' => 10, 'maxlength' => 10, "class" => "form-control", "disabled" => "true")); ?>
                        </div>

                        <div id="grp-inmueble-fk_estado" class="form-group">
                            <?php echo $form->labelEx($model, 'fk_estado'); ?>
                            <?php echo $form->dropDownList($model, 'fk_estado', $model->getListaEstadosInmueble(), array("class" => "form-control", "disabled" => "true")); ?>
                        </div>
                    </div>
                </div>
                <div class="row row-botonera-inferior">
                    <div class="col-lg-12">
                        <a href="<?php echo Yii::app()->createUrl("inmueble/admin") ?>"><?php echo Yii::app()->params["goBackButtonLabel"] ?></a>
                    </div>
                </div>
                <?php echo $form->textField($model, 'strArrayImagenes', array("class" => "form-control hidden", "disabled" => "true")); ?>
                <?php $this->endWidget(); ?>
            </div>
            <div class="tab-pane fade in inmueble-tab-container" id="ubicacion">
                <div id="mapa-ubicacion">

                </div>
            </div>
            <div class="tab-pane fade in inmueble-tab-container" id="imagenes">

                <div class="row">
                    <div class="col-lg-12">
                        <div id="carousel-imagenes" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="http://www.arqhys.com/general/imagenes/Inmuebles.jpg" alt="...">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="http://www.sanmartinenred.com/noticia/Foto_Portada/Full/NP00942_propietarios-de-inmuebles-deben-presentar-declaracion-desde-el-30-de-mayo-hasta-el-12-de-junio-de-este-ano.jpg" alt="...">
                                    <div class="carousel-caption">                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-imagenes" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-imagenes" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">

    $("#tab-ubicacion").on('click', function() {
        initWithDelay();
    });

    function initWithDelay()
    {
        setTimeout(wrapperInit, 500); //wait ten seconds before continuing
    }
    ;

    function wrapperInit()
    {
        initOpenStreetMapVerInmueble();
    }
    ;

    $(document).ready(function() {
        configurarFormularioSegunTipo();
        loadImagenesInmueble();
    });

</script>

