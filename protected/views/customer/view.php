<?php
/* @var $this ClienteController */
/* @var $model Cliente */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-user"></span> Informaci&oacute;n de cliente<?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>

        <form role="form">
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputEmail" value="<?php echo $model->email; ?>">
            </div>
            <div class="form-group">
                <label for="inputname">name</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputname" value="<?php echo $model->name; ?>">
            </div>
            <div class="form-group">
                <label for="inputApellido">Apellido</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputApellido" value="<?php echo $model->surname; ?>">
            </div>
            <div class="form-group">
                <label for="inputDireccion">Direcci&oacute;n</label>
                <textarea disabled="true" type="text" class="form-control input-sm" id="inputDireccion" ><?php echo $model->streetaddress; ?></textarea>
            </div>
            <div class="form-group">
                <label for="inputComentarios">Comentarios</label>
                <textarea disabled="true" type="text" class="form-control input-sm" id="inputComentarios" ><?php echo $model->comments; ?></textarea>
            </div>
            <a href="<?php echo Yii::app()->createUrl("customer/admin") ?>"><?php echo Yii::app()->params["labelBotonVolver"] ?></a>
        </form>
    </div>
    <div class="col-lg-8"></div>
</div>