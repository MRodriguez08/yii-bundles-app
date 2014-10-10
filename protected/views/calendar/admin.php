<?php
/* @var $this TipoNotificacionController */
/* @var $model TipoNotificacion */
?>

<div class="row">
    <div class="col-lg-12">
        <div class="row top-admin-row">
            <div class="col-lg-12">
                <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-calendar"></span> <?php echo Yii::app()->params["calendarFunctionalityLabel"] ?><?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo Yii::app()->createUrl("site/index") ?>">Inicio</a></li>
                    <li class="active"><?php echo Yii::app()->params["calendarFunctionalityLabel"] ?></li>
                </ol>               
            </div>            
        </div>
        <div class="row">
            <input type="checkbox" value="#events-modal" id="events-in-modal"> Open events in modal window
            <div class="pull-right form-inline">
                <div class="btn-group">
                    <button class="btn btn-sm btn-primary" data-calendar-nav="prev"><< Anterior</button>
                    <button class="btn btn-sm btn-default" data-calendar-nav="today">Hoy</button>
                    <button class="btn btn-sm btn-primary" data-calendar-nav="next">Siguiente >></button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-sm btn-warning" data-calendar-view="year">A&ntilde;o</button>
                    <button class="btn btn-sm btn-warning active" data-calendar-view="month">Mes</button>
                    <button class="btn btn-sm btn-warning" data-calendar-view="week">Semana</button>
                    <button class="btn btn-sm btn-warning" data-calendar-view="day">D&iacute;a</button>
                </div>
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#newEventModal">Nuevo evento</button>
            </div>
            <div class="col-lg-12"> 

                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Evento</h3>
            </div>
            <div class="modal-body" style="height: 400px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="newEventModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Nuevo evento</h4>
            </div>            
            <div class="modal-body">
                <div id="event-error-panel" class="hidden alert alert-danger" role="alert">
                    <a href="#" class="alert-link">faltan datos necesarios</a>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputTitle">Titulo</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="">
                </div>
                <div  class="form-group">
                    <label class="control-label" for="inputFrom">Desde</label>  
                    <div class="input-group date">                                     
                        <input id="inputFrom" type="text" class="date form-control input-sm" data-date-format="<?php echo Yii::app()->params["inputDataDateFormat"]; ?>" >
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputTo">Desde</label>                   
                    <div class="input-group date">                     
                        <input id="inputTo" type="text" class="date form-control input-sm" data-date-format="<?php echo Yii::app()->params["inputDataDateFormat"]; ?>" >
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputDescription">Descripcion</label>
                    <textarea class="form-control" id="inputDescription" placeholder=""></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="createNewEvent()" >Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->