<?php
/* @var $this TipoNotificacionController */
/* @var $model TipoNotificacion */
?>

<div class="row">
    <div class="col-lg-12">
        <div class="row top-admin-row">
            <div class="col-lg-12">
                <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-calendar"></span> <?php echo Yii::app()->params["labelFuncionalidadCalendario"] ?><?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo Yii::app()->createUrl("site/index") ?>">Inicio</a></li>
                    <li class="active"><?php echo Yii::app()->params["labelFuncionalidadCalendario"] ?></li>
                </ol>               
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-12">

                <link rel='stylesheet' type='text/css' href='<?php echo Yii::app()->request->baseUrl; ?>/css/calendar/reset.css' />
                <link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css' />
                <link rel='stylesheet' type='text/css' href='<?php echo Yii::app()->request->baseUrl; ?>/css/calendar/jquery.weekcalendar.css' />
                
                <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script>
                <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js'></script>
                <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/calendar/jquery.weekcalendar.js'></script>
                <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/calendar/demo.js'></script>
                
                <div id='calendar'>
                    
                </div>
                <div style="display: none;" id="event_edit_container">
                    <form>
                        <input type="hidden" />
                        <ul>
                            <li>
                                <span>Date: </span><span class="date_holder"></span> 
                            </li>
                            <li>
                                <label for="start">Start Time: </label>
                                <select name="start">
                                    <option value="">Select Start Time</option>
                                </select>
                            </li>
                            <li>
                                <label for="end">End Time: </label>
                                <select name="end">
                                    <option value="">Select End Time</option>
                                </select>
                            </li>
                            <li>
                                <label for="title">Title: </label>
                                <input id="inputTitle" type="text" name="title" />
                            </li>
                            <li>
                                <label for="body">Body: </label>
                                <textarea name="body"></textarea>
                            </li>
                        </ul>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>