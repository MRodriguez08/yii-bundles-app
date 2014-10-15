<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>



<div class="row">
    <div class="col-lg-4">
        <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-user"></span> Mi perfil<?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-group">
                <a href="<?php echo Yii::app()->createUrl("user/editMyProfile") ?>">
                    <button type="button" class="btn btn-default">Editar</button>
                </a>
                <a href="<?php echo Yii::app()->createUrl("user/changePassword") ?>">
                    <button type="button" class="btn btn-default">Cambiar contrase&ntilde;a</button>
                </a>
            </div>
            </div>
            <div class="col-lg-12">
                <img class="profile-photo" src="<?php echo Yii::app()->createUrl("file/profilePhoto") ?>" alt="img" />
            </div>
            <div class="col-lg-12">
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
                    <label for="inputname">Nombre</label>
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
</div>
<div class="col-lg-8"></div>
</div>