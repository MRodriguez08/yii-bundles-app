<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
?>

<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-user"></span> Informaci&oacute;n de usuario<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>

        <form role="form">
            <div class="form-group">
                <label for="inputUsuario">Usuario</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputUsuario" value="<?php echo $model->nick; ?>">
            </div>
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
                <label for="inputRol">Rol</label>
                <input disabled="true" type="text" class="form-control input-sm" id="inputApellido" value="<?php echo $model->role; ?>">
            </div>
            <a href="<?php echo Yii::app()->createUrl("user/admin"); ?>">Volver</a>
        </form>
    </div>
    <div class="col-lg-8"></div>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/open-street-map_ver.js"></script>
</div>