<?php
/* @var $this PropertyStateController */
/* @var $model PropertyState */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-retweet"></span> Informaci&oacute;n de estado de inmueble<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>

        <form role="form">
            <div class="form-group">
                <label for="inputname">name</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputname" value="<?php echo $model->name; ?>">
            </div>
            <div class="form-group">
                <label for="inputdescription">Descripci&oacute;n</label>
                <textarea disabled="true" type="text" class="form-control input-sm" id="inputdescription" ><?php echo $model->description; ?></textarea>
            </div>
            <a href="<?php echo Yii::app()->createUrl("propertystate/admin")?>">Volver</a>
        </form>
    </div>
    <div class="col-lg-8"></div>
</div>
