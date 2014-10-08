<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>



<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-user"></span> Mi perfil<?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>
        <div class="row">
            <div class="btn-group">
                <a href="<?php echo Yii::app()->createUrl("usuario/editarMiPerfil") ?>">
                    <button type="button" class="btn btn-default">Editar</button>
                </a>
                <a href="<?php echo Yii::app()->createUrl("usuario/changePassword") ?>">
                    <button type="button" class="btn btn-default">Cambiar contrase&ntilde;a</button>
                </a>
            </div>
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
                <a href="<?php echo Yii::app()->createUrl("user/admin"); ?>">Volver</a>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-8"></div>
</div>