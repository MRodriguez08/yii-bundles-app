<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-map-marker"></span> Informaci&oacute;n de departamento<?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>

        <form role="form">
            <div class="form-group">
                <label for="inputNombre">Nombre</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputNombre" value="<?php echo $model->nombre; ?>">
            </div>
            <a href="<?php echo Yii::app()->createUrl("departamento/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
        </form>
    </div>
    <div class="col-lg-8"></div>
</div>
