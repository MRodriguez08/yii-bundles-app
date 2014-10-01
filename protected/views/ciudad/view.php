<?php
/* @var $this CiudadController */
/* @var $model Ciudad */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-map-marker"></span> Informaci&oacute;n de ciudad<?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>

        <form role="form">
            <div class="form-group">
                <label for="inputNombre">Nombre</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputNombre" value="<?php echo $model->nombre; ?>">
            </div>
            <div class="form-group">
                <label for="inputDepartamento">Departamento</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputDepartamento" value="<?php echo $model->departamento->nombre; ?>">
            </div>
            <a href="<?php echo Yii::app()->createUrl("ciudad/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
        </form>
    </div>
    <div class="col-lg-8"></div>
</div>
