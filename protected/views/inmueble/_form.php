<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */
/* @var $form CActiveForm */
?>

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
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
        ?>
        <?php if (count($model->getErrors()) > 0) {
            echo Yii::app()->params["formHasErrorPanel"];
        }; ?>
        <div class="row">
            <div class="col-lg-6">
                <div id="grp-inmueble-titulo" class="form-group">
                    <?php echo $form->labelEx($model, 'titulo'); ?>
<?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 100, "class" => "form-control input-sm")); ?>
<?php echo $form->error($model, 'titulo', array("class" => "yii-error-alert")); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'operacion_publicacion'); ?>        
                    <?php
                    echo CHtml::dropDownList('Inmueble[operacion_publicacion]', $model->operacion_publicacion, $this->getTipoOperacion(), array("class" => "form-control  input-sm"));
                    ?>       
                </div>
                <div id="grp-inmueble-direccion_corta" class="form-group">
                    <?php echo $form->labelEx($model, 'direccion_corta'); ?>
                    <?php echo $form->textField($model, 'direccion_corta', array("class" => "form-control  input-sm")); ?>
                    <?php echo $form->error($model, 'direccion_corta', array("class" => "yii-error-alert")); ?>
                </div>
                <div id="grp-inmueble-description" class="form-group">
                    <?php echo $form->labelEx($model, 'description'); ?>
                    <?php echo $form->textArea($model, 'description', array('size' => 60, 'maxlength' => 2048, "class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'description', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-tipo" class="form-group">
                    <?php echo $form->labelEx($model, 'tipo_inmueble'); ?>
                    <?php
                    echo $form->dropDownList($model, 'tipo_inmueble', $this->getTipoInmueble(), array("class" => "form-control input-sm", "onchange" => "configurarFormularioSegunTipo()"));
                    ?>  
                    <?php echo $form->error($model, 'tipo_inmueble', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-vista_al_mar" class="form-group">
<?php echo $form->labelEx($model, 'vista_al_mar'); ?>
                    <?php echo $form->checkBox($model, 'vista_al_mar'); ?>
                    <?php echo $form->error($model, 'vista_al_mar', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-tiene_calefaccion" class="form-group">
<?php echo $form->labelEx($model, 'tiene_calefaccion'); ?>
                    <?php echo $form->checkBox($model, 'tiene_calefaccion'); ?>
                    <?php echo $form->error($model, 'tiene_calefaccion', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-precio_publicacion" class="form-group">
<?php echo $form->labelEx($model, 'precio_publicacion'); ?>
                    <div class="input-group">
                        <span class="input-group-addon">U$S</span>
<?php echo $form->textField($model, 'precio_publicacion', array("class" => "form-control input-sm")); ?>
                    </div>
                        <?php echo $form->error($model, 'precio_publicacion', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-gastos_comunes" class="form-group">
<?php echo $form->labelEx($model, 'gastos_comunes'); ?>
                    <div class="input-group">
                        <span class="input-group-addon">U$S</span>
<?php echo $form->textField($model, 'gastos_comunes', array("class" => "form-control input-sm")); ?>
                    </div>
                        <?php echo $form->error($model, 'gastos_comunes', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-anio_construccion_aproximado" class="form-group">
<?php echo $form->labelEx($model, 'anio_construccion_aproximado'); ?>
                    <?php echo $form->textField($model, 'anio_construccion_aproximado', array("class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'anio_construccion_aproximado', array("class" => "yii-error-alert")); ?>
                </div>


                <div id="grp-inmueble-coord_latitud" class="form-group">
<?php echo $form->labelEx($model, 'coord_latitud'); ?>
                    <?php echo $form->textField($model, 'coord_latitud', array("class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'coord_latitud', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-coord_longitud" class="form-group">
<?php echo $form->labelEx($model, 'coord_longitud'); ?>
                    <?php echo $form->textField($model, 'coord_longitud', array("class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'coord_longitud', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-cant_banios" class="form-group">
<?php echo $form->labelEx($model, 'cant_banios'); ?>
                    <?php echo $form->textField($model, 'cant_banios', array("class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'cant_banios', array("class" => "yii-error-alert")); ?>
                </div>                
            </div>
            <div class="col-lg-6">
                <div id="grp-inmueble-cant_dormitorios" class="form-group">
<?php echo $form->labelEx($model, 'cant_dormitorios'); ?>
                    <?php echo $form->textField($model, 'cant_dormitorios', array("class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'cant_dormitorios', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-numero_de_piso" class="form-group">
<?php echo $form->labelEx($model, 'numero_de_piso'); ?>
                    <?php echo $form->textField($model, 'numero_de_piso', array("class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'numero_de_piso', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-tiene_ascensor" class="form-group">
<?php echo $form->labelEx($model, 'tiene_ascensor'); ?>
                    <?php echo $form->checkBox($model, 'tiene_ascensor'); ?>
                    <?php echo $form->error($model, 'tiene_ascensor', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-tiene_porteria" class="form-group">
<?php echo $form->labelEx($model, 'tiene_porteria'); ?>
                    <?php echo $form->checkBox($model, 'tiene_porteria'); ?>
                    <?php echo $form->error($model, 'tiene_porteria', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-tiene_portero_electrico" class="form-group">
<?php echo $form->labelEx($model, 'tiene_portero_electrico'); ?>
                    <?php echo $form->checkBox($model, 'tiene_portero_electrico'); ?>
                    <?php echo $form->error($model, 'tiene_portero_electrico', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-tiene_vigilancia" class="form-group">
<?php echo $form->labelEx($model, 'tiene_vigilancia'); ?>
                    <?php echo $form->checkBox($model, 'tiene_vigilancia'); ?>
                    <?php echo $form->error($model, 'tiene_vigilancia', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-tipo_local" class="form-group">
<?php echo $form->labelEx($model, 'tipo_local'); ?>
                    <?php echo $form->textField($model, 'tipo_local', array('size' => 50, 'maxlength' => 50, "class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'tipo_local', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-mts2_edificados" class="form-group">
<?php echo $form->labelEx($model, 'mts2_edificados'); ?>
                    <?php echo $form->textField($model, 'mts2_edificados', array('size' => 50, 'maxlength' => 50, "class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'mts2_edificados', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-cant_plantas_casa" class="form-group">
<?php echo $form->labelEx($model, 'cant_plantas_casa'); ?>
                    <?php echo $form->textField($model, 'cant_plantas_casa', array('size' => 50, 'maxlength' => 50, "class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'cant_plantas_casa', array("class" => "yii-error-alert")); ?>
                </div>


                <div id="grp-inmueble-tipo_local_observacion" class="form-group">
<?php echo $form->labelEx($model, 'tipo_local_observacion'); ?>
                    <?php echo $form->textField($model, 'tipo_local_observacion', array('size' => 60, 'maxlength' => 1024, "class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'tipo_local_observacion', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-tiene_planta_alta" class="form-group">
<?php echo $form->labelEx($model, 'tiene_planta_alta'); ?>
                    <?php echo $form->checkBox($model, 'tiene_planta_alta'); ?>
                    <?php echo $form->error($model, 'tiene_planta_alta', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-altura_salon_principal" class="form-group">
<?php echo $form->labelEx($model, 'altura_salon_principal'); ?>
                    <?php echo $form->textField($model, 'altura_salon_principal', array("class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'altura_salon_principal', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-cant_plantas_local" class="form-group">
<?php echo $form->labelEx($model, 'cant_plantas_local'); ?>
                    <?php echo $form->textField($model, 'cant_plantas_local', array("class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'cant_plantas_local', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-tiene_estacionamiento" class="form-group">
<?php echo $form->labelEx($model, 'tiene_estacionamiento'); ?>
                    <?php echo $form->checkBox($model, 'tiene_estacionamiento'); ?>
                    <?php echo $form->error($model, 'tiene_estacionamiento', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-tiene_deposito" class="form-group">
<?php echo $form->labelEx($model, 'tiene_deposito'); ?>
                    <?php echo $form->checkBox($model, 'tiene_deposito'); ?>
                    <?php echo $form->error($model, 'tiene_deposito', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-es_propiedad_horizontal" class="form-group">
<?php echo $form->labelEx($model, 'es_propiedad_horizontal'); ?>
                    <?php echo $form->checkBox($model, 'es_propiedad_horizontal'); ?>
                    <?php echo $form->error($model, 'es_propiedad_horizontal', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-potencia_contratada" class="form-group">
<?php echo $form->labelEx($model, 'potencia_contratada'); ?>
                    <div class="input-group">                        
                    <?php echo $form->textField($model, 'potencia_contratada', array('size' => 10, 'maxlength' => 10, "class" => "form-control input-sm")); ?>
                        <span class="input-group-addon">KW</span>
                    </div>
<?php echo $form->error($model, 'potencia_contratada', array("class" => "yii-error-alert")); ?>
                </div>

                <div class="form-group">
<?php echo $form->labelEx($model, 'id_departamento'); ?>                    
                    <?php
                    echo $form->dropDownList($model, 'id_departamento', $this->getListaDepartamentos(), array(
                        'empty' => '--  Seleccione  --',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('inmueble/ciudadDinamica'),
                            'update' => '#Inmueble_id_ciudad'
                        ),
                        'class' => 'form-control input-sm',
                            )
                    );
                    ?>
                    <?php echo $form->error($model, 'id_departamento'); ?>
                </div>

                <div class="form-group">
<?php echo $form->labelEx($model, 'id_ciudad'); ?>                    
                    <?php
                    echo $form->dropDownList($model, 'id_ciudad', array(), array(
                        'empty' => '--  Seleccione  --',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('inmueble/barrioDinamico'),
                            'update' => '#Inmueble_id_barrio'
                        ),
                        'class' => 'form-control input-sm',
                            )
                    );
                    ?>
                    <?php echo $form->error($model, 'id_departamento', array("class" => "yii-error-alert")); ?>
                </div>

                <div class="form-group">
<?php echo $form->labelEx($model, 'id_barrio'); ?>
                    <?php echo $form->dropDownList($model, 'id_barrio', array(), array("class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'id_barrio', array("class" => "yii-error-alert")); ?>
                </div>

                <div id="grp-inmueble-fk_estado" class="form-group">
<?php echo $form->labelEx($model, 'fk_estado'); ?>
                    <?php echo $form->dropDownList($model, 'fk_estado', $model->getListaEstadosInmueble(), array("class" => "form-control input-sm")); ?>
                    <?php echo $form->error($model, 'fk_estado', array("class" => "yii-error-alert")); ?>
                </div>
            </div>
        </div>
        <div class="row row-botonera-inferior">
            <div class="col-lg-12">
                <a href="<?php echo Yii::app()->createUrl("inmueble/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
<?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params["labelBotonCrear"] : Yii::app()->params["labelBotonGuardar"], array("class" => "btn btn-default")); ?>
            </div>
        </div>
<?php $this->endWidget(); ?>
    </div>
    <div class="tab-pane fade in inmueble-tab-container" id="ubicacion">
        <div id="mapa-ubicacion">

        </div>
    </div>
    <div class="tab-pane fade in inmueble-tab-container" id="imagenes">

        <div class="row">
            <div class="col-lg-12">
                <form id="fileupload" action="<?php echo Yii::app()->createUrl("file/upload"); ?>" method="POST" enctype="multipart/form-data">
                    <!-- Redirect browsers with JavaScript disabled to the origin page -->
                    <noscript><input type="hidden" name="redirect" value="<?php echo Yii::app()->createUrl("site/index"); ?>"></noscript>
                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                    <div class="row fileupload-buttonbar">
                        <div class="col-lg-7">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="btn btn-success fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Add files...</span>
                                <input type="file" name="files[]" multiple>
                            </span>
                            <button type="submit" class="btn btn-primary start">
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>Start upload</span>
                            </button>
                            <button type="reset" class="btn btn-warning cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>Cancel upload</span>
                            </button>
                            <button type="button" class="btn btn-danger delete">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Delete</span>
                            </button>
                            <input type="checkbox" class="toggle">
                            <!-- The global file processing state -->
                            <span class="fileupload-process"></span>
                        </div>
                        <!-- The global progress state -->
                        <div class="col-lg-5 fileupload-progress fade">
                            <!-- The global progress bar -->
                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                            </div>
                            <!-- The extended global progress state -->
                            <div class="progress-extended">&nbsp;</div>
                        </div>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                </form>
                <br>
                <!-- The blueimp Gallery widget -->
                <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                    <div class="slides"></div>
                    <h3 class="title"></h3>
                    <a class="prev">‹</a>
                    <a class="next">›</a>
                    <a class="close">×</a>
                    <a class="play-pause"></a>
                    <ol class="indicator"></ol>
                </div>
                <!-- The template to display files available for upload -->
                <script id="template-upload" type="text/x-tmpl">
                    {% for (var i=0, file; file=o.files[i]; i++) { %}
                    <tr class="template-upload fade">
                    <td>
                    <span class="preview"></span>
                    </td>
                    <td>
                    <p class="name">{%=file.name%}</p>
                    <strong class="error text-danger"></strong>
                    </td>
                    <td>
                    <p class="size">Processing...</p>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                    </td>
                    <td>
                    {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                    </button>
                    {% } %}
                    {% if (!i) { %}
                    <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                    </button>
                    {% } %}
                    </td>
                    </tr>
                    {% } %}
                </script>
                <!-- The template to display files available for download -->
                <script id="template-download" type="text/x-tmpl">
                    {% for (var i=0, file; file=o.files[i]; i++) { %}
                    <tr class="template-download fade">
                    <td>
                    <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
                    </span>
                    </td>
                    <td>
                    <p class="name">
                    {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    {% } else { %}
                    <span>{%=file.name%}</span>
                    {% } %}
                    </p>
                    {% if (file.error) { %}
                    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                    {% } %}
                    </td>
                    <td>
                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                    </td>
                    <td>
                    {% if (file.deleteUrl) { %}
                    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                    </button>
                    <input type="checkbox" name="delete" value="1" class="toggle">
                    {% } else { %}
                    <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                    </button>
                    {% } %}
                    </td>
                    </tr>
                    {% } %}
                </script>
                <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/file-upload/vendor/jquery.ui.widget.js"></script>
                <!-- The Templates plugin is included to render the upload/download listings -->
                <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
                <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
                <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
                <!-- The Canvas to Blob plugin is included for image resizing functionality -->
                <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
                <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
                <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                <!-- blueimp Gallery script -->
                <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
                <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/file-upload/jquery.iframe-transport.js"></script>
                <!-- The basic File Upload plugin -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/file-upload/jquery.fileupload.js"></script>
                <!-- The File Upload processing plugin -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/file-upload/jquery.fileupload-process.js"></script>
                <!-- The File Upload image preview & resize plugin -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/file-upload/jquery.fileupload-image.js"></script>
                <!-- The File Upload audio preview plugin -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/file-upload/jquery.fileupload-audio.js"></script>
                <!-- The File Upload video preview plugin -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/file-upload/jquery.fileupload-video.js"></script>
                <!-- The File Upload validation plugin -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/file-upload/jquery.fileupload-validate.js"></script>
                <!-- The File Upload user interface plugin -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/file-upload/jquery.fileupload-ui.js"></script>
                <!-- The main application script -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/file-upload/main.js"></script>
                <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
                <!--[if (gte IE 8)&(lt IE 10)]>
                <script src="js/cors/jquery.xdr-transport.js"></script>
                <![endif]-->
                
                <script type="text/javascript">
                    $(document).ready(function(){
                        
                    })
                </script>
                
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

var mapaCargado = false;
$("#tab-ubicacion").on('click', function() {
    if (!mapaCargado) {
        initWithDelay();
        mapaCargado = true;
    }
});

function initWithDelay()
{
    setTimeout(wrapperInit, 500); //wait ten seconds before continuing
}
;

function wrapperInit()
{
    initOpenStreetMapIngresoInmueble();
}
;

$(document).ready(function() {
    configurarFormularioSegunTipo();

    $("#inmueble-form").submit(function(event) {
        var latitud = $("#Inmueble_coord_latitud").val();
        var longitud = $("#Inmueble_coord_longitud").val();
        if (longitud !== "" && latitud !== "") {
            return;
        }
        alertify.error("Debe ingresar la ubicaci&oacute;n geogr&aacute;fica del inmueble");
        event.preventDefault();
    });

});

</script>

