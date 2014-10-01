<?php
/* @var $this EstadoInmuebleController */
/* @var $model EstadoInmueble */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-retweet"></span> Informaci&oacute;n de estado de inmueble<?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>

        <form role="form">
            <div class="form-group">
                <label for="inputNombre">Nombre</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputNombre" value="<?php echo $model->nombre; ?>">
            </div>
            <div class="form-group">
                <label for="inputDescripcion">Descripci&oacute;n</label>
                <textarea disabled="true" type="text" class="form-control input-sm" id="inputDescripcion" ><?php echo $model->descripcion; ?></textarea>
            </div>
            <a href="<?php echo Yii::app()->createUrl("estadoInmueble/admin")?>">Volver</a>
        </form>
    </div>
    <div class="col-lg-8"></div>
</div>
