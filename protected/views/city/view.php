<?php
/* @var $this CiudadController */
/* @var $model Ciudad */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-map-marker"></span> Informaci&oacute;n de ciudad<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>

        <form role="form">
            <div class="form-group">
                <label for="inputname">name</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputname" value="<?php echo $model->name; ?>">
            </div>
            <div class="form-group">
                <label for="inputDepartamento">Departamento</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputDepartamento" value="<?php echo $model->department->name; ?>">
            </div>
            <a href="<?php echo Yii::app()->createUrl("city/admin") ?>"><?php echo Yii::app()->params["goBackButtonLabel"] ?></a>
        </form>
    </div>
    <div class="col-lg-8"></div>
</div>
