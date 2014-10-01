<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-inmobiliaria.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lib/alertify.core.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lib/alertify.bootstrap.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lib/bootstrap-combobox.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lib/bootstrap-datetimepicker.min.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome/css/font-awesome.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme/sb-admin.css" />

        <!-- blueimp Gallery styles -->
        <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fileupload.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fileupload-ui.css">
        <!-- CSS adjustments for browsers with JavaScript disabled -->
        <noscript><link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fileupload-noscript.css"></noscript>
        <noscript><link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fileupload-ui-noscript.css"></noscript>


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo Yii::app()->createUrl('inmueble/admin'); ?>">Inmobiliaria</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php if (Yii::app()->user->hasRole(Constantes::USER_ROLE_DIRECTOR)){ ?>
                        <li class="dropdown <?php if (strcmp(Yii::app()->session[Constantes::SESSION_CURRENT_TAB], Constantes::ITEM_MENU_CONFIGURACION) == 0){  echo 'active'; }  ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuracion<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo Yii::app()->createUrl('auditoria/admin'); ?>">Auditor&iacute;a</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo Yii::app()->createUrl('barrio/admin'); ?>">Gesti&oacute;n de barrios</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('ciudad/admin'); ?>">Gesti&oacute;n de ciudades</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('departamento/admin'); ?>">Gesti&oacute;n de departamentos</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo Yii::app()->createUrl('estadoInmueble/admin'); ?>">Estados de Inmuebles</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('parametro/admin'); ?>">P&aacute;rametros</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('tipoNotificacion/admin'); ?>">Tipos de notificaci&oacute;n</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if (Yii::app()->user->hasRole(Constantes::USER_ROLE_DIRECTOR)){ ?>
                            <li class="<?php if (strcmp(Yii::app()->session[Constantes::SESSION_CURRENT_TAB], Constantes::ITEM_MENU_USUARIOS) == 0){  echo 'active'; }  ?>"><a href="<?php echo Yii::app()->createUrl('usuario/admin'); ?>">Usuarios</a></li>
                        <?php } ?>
                        <?php if (Yii::app()->user->hasRole(Constantes::USER_ROLE_DIRECTOR) || Yii::app()->user->hasRole(Constantes::USER_ROLE_ADMINISTRATIVO)){ ?>
                            <li class="<?php if (strcmp(Yii::app()->session[Constantes::SESSION_CURRENT_TAB], Constantes::ITEM_MENU_CLIENTES) == 0){  echo 'active'; }  ?>"><a href="<?php echo Yii::app()->createUrl('cliente/admin'); ?>" >Clientes</a></li>
                            <li class="<?php if (strcmp(Yii::app()->session[Constantes::SESSION_CURRENT_TAB], Constantes::ITEM_MENU_INMUEBLES) == 0){  echo 'active'; }  ?>"><a href="<?php echo Yii::app()->createUrl('inmueble/admin'); ?>">Inmuebles</a></li>
                            <li class="<?php if (strcmp(Yii::app()->session[Constantes::SESSION_CURRENT_TAB], Constantes::ITEM_MENU_NOTIFICACIONES) == 0){  echo 'active'; }  ?>"><a href="<?php echo Yii::app()->createUrl('emailNotificacion/admin'); ?>">Notificaciones</a></li>
                            <li class="<?php if (strcmp(Yii::app()->session[Constantes::SESSION_CURRENT_TAB], Constantes::ITEM_MENU_PORTADA) == 0){  echo 'active'; }  ?>"><a href="<?php echo Yii::app()->createUrl('portada/admin'); ?>">Portada</a></li>
                        <?php } ?>
                        <li class="<?php if (strcmp(Yii::app()->session[Constantes::SESSION_CURRENT_TAB], Constantes::ITEM_MENU_CALENDARIO) == 0){  echo 'active'; }  ?>"><a href="<?php echo Yii::app()->createUrl('evento/admin'); ?>">Calendario</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><span><?php echo Yii::app()->user->getNameAndRole() ?></span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo Yii::app()->createUrl("usuario/logout")?>">salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
        <?php echo $content; ?>



        <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/jquery1.11.0.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/bootstrap3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/alertify.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/js-extend.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/open-street-map.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/bootstrap-combobox.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/blockUI.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/inmueble/logica-inmueble.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/on-start.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/objets.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/LlamadasAjax.js"></script>

    </body>
</html>




