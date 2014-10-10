    <?php
/* @var $this BarrioController */
/* @var $model Barrio */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-map-marker"></span> Informaci&oacute;n de barrio<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>

        <form role="form">
            <div class="form-group">
                <label for="inputname">name</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputname" value="<?php echo $model->name; ?>">
            </div>
            <div class="form-group">
                <label for="inputCiudad">Ciudad</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputCiudad" value="<?php echo $model->city->name; ?>">
            </div>
            <a href="<?php echo Yii::app()->createUrl("neighbourhood/admin") ?>"><?php echo Yii::app()->params["goBackButtonLabel"] ?></a>
        </form>
    </div>
    <div class="col-lg-8"></div>
</div>

