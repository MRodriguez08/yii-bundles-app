<?php ?>

<div class="row">
    <div class="col-lg-12">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?> <span class="glyphicon glyphicon-dashboard"></span>  Resumen<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?> 
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-home"></span>  Reporte de inmuebles
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            Seleccione el reporte
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a onclick="obtenerGraficaCantidadInmueblesPorTipo(backendConstants.GRAFICA_INMUEBLE_POR_TIPO)" href="#">Inmuebles por tipo</a>
                            </li>
                            <li><a onclick="obtenerGraficaCantidadInmueblesPorTipo(backendConstants.GRAFICA_INMUEBLE_POR_ESTADO);" href="#">Inmuebles por estado</a>
                            </li>
                            <li><a onclick="obtenerGraficaCantidadInmueblesPorTipo(backendConstants.GRAFICA_INMUEBLE_POR_BARRIO);" href="#">Inmuebles por barrio</a>
                            </li>                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div id="grafica-inmuebles" class="panel-body">


            </div>
        </div>
        <!-- /.panel -->
    </div>
    <div class="col-lg-6">
        <div onclick="window.location = '<?php echo Yii::app()->createUrl('emailNotificacion/admin'); ?>'" class="panel-clickleable chat-panel panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-envelope"></span>
                Notificaciones pendientes
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul id="contenedor-notificaciones" class="chat">

                </ul>
            </div>
            <!-- /.panel-footer -->
        </div>
    </div>
</div>

<script type="text/javascript">
        /*$(document).ready(function() {

            obtenerGraficaCantidadInmueblesPorTipo(backendConstants.GRAFICA_INMUEBLE_POR_TIPO);
            obtenerNotificacionesPendientes();

        });*/
</script>

