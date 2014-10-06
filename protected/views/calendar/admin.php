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

                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>