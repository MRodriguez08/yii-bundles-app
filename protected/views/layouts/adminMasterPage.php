<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/jquery1.11.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-inmobiliaria.css" media="screen, projection" />
      
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lib/alertify.core.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lib/alertify.bootstrap.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lib/bootstrap-combobox.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lib/bootstrap-datetimepicker.min.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/plataforma-inmobiliaria.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome/css/font-awesome.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme/sb-admin.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lib/calendar/calendar.min.css" />


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
                        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo Yii::app()->createUrl("site/index") ?>"><?php echo Yii::app()->name ?></a>
                            </div>
                            <!-- /.navbar-header -->

                            <ul class="nav navbar-top-links navbar-right">                               
                                <!-- /.dropdown -->
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <span class="glyphicon glyphicon-user"></span>  <?php echo Yii::app()->user->getNameAndRole(); ?> <i class="fa fa-caret-down"></i>  
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li>
                                            <a href="<?php echo Yii::app()->createUrl("user/myProfile") ?>"><span class="glyphicon glyphicon-user"></span> Mi perfil</a>
                                        </li>
                                        <li class="divider"></li>
                                        <a href="#"><i class="fa fa-bug"></i> Reportar error</a>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="<?php echo Yii::app()->createUrl("user/logout") ?>"><span class="glyphicon glyphicon-log-out"></span> Salir</a>
                                        </li>
                                    </ul>
                                    <!-- /.dropdown-user -->
                                </li>
                                <!-- /.dropdown -->
                            </ul>
                            <!-- /.navbar-top-links -->

                            <div class="navbar-default navbar-static-side" role="navigation">
                                <div class="sidebar-collapse">
                                    <ul class="nav" id="side-menu">
                                        <?php if (Yii::app()->user->hasRole(Constants::USER_ROLE_DIRECTOR)) { ?>
                                            <li class="
                                            <?php
                                            if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_AUDITORIA) == 0 || strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_CIUDADES) == 0 || strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_BARRIOS) == 0 || strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_DEPARTAMENTOS) == 0 || strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_TIPOS_NOTIFICACION) == 0 || strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_PARAMETROS) == 0 || strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_ESTADOS_INMUEBLES) == 0 || strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_ESTADOS_NOTIFICACION) == 0) {
                                                echo 'active';
                                            }
                                            ?>">
                                                <a href="#"><span class="glyphicon glyphicon-cog"></span> Configuraci&oacute;n<span class="fa arrow"></span></a>
                                                <ul class="nav nav-second-level">
                                                    <li class="<?php
                                                    if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_AUDITORIA) == 0) {
                                                        echo 'active';
                                                    }
                                                    ?>"><a href="<?php echo Yii::app()->createUrl('audit/admin'); ?>"><span class="glyphicon glyphicon-book"></span> <?php echo Yii::app()->params["auditFunctionalityLabel"] ?></a></li>
                                                    <li class="divider"></li>
                                                    <li class="<?php
                                                    if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_BARRIOS) == 0) {
                                                        echo 'active';
                                                    }
                                                    ?>"><a href="<?php echo Yii::app()->createUrl('neighbourhood/admin'); ?>"><span class="glyphicon glyphicon-map-marker"></span> <?php echo Yii::app()->params["neighbourhoodFunctionalityLabel"] ?></a></li>
                                                    <li class="<?php
                                                    if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_CIUDADES) == 0) {
                                                        echo 'active';
                                                    }
                                                    ?>"><a href="<?php echo Yii::app()->createUrl('city/admin'); ?>"><span class="glyphicon glyphicon-map-marker"></span> <?php echo Yii::app()->params["cityFunctionalityLabel"] ?></a></li>
                                                    <li class="<?php
                                                    if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_DEPARTAMENTOS) == 0) {
                                                        echo 'active';
                                                    }
                                                    ?>"><a href="<?php echo Yii::app()->createUrl('department/admin'); ?>"><span class="glyphicon glyphicon-map-marker"></span> <?php echo Yii::app()->params["departmentFunctionalityLabel"] ?></a></li>
                                                    <li class="divider"></li>
                                                    <li class="<?php
                                                    if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_ESTADOS_INMUEBLES) == 0) {
                                                        echo 'active';
                                                    }
                                                    ?>"><a href="<?php echo Yii::app()->createUrl('propertystate/admin'); ?>"><span class="glyphicon glyphicon-retweet"></span> <?php echo Yii::app()->params["propertyStateFunctionalityLabel"] ?></a></li>
                                                    <li class="<?php
                                                    if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_PARAMETROS) == 0) {
                                                        echo 'active';
                                                    }
                                                    ?>"><a href="<?php echo Yii::app()->createUrl('sysparam/admin'); ?>"><span class="glyphicon glyphicon-wrench"></span> <?php echo Yii::app()->params["sysparamFunctionalityLabel"] ?></a></li>
                                                    <li class="<?php
                                                    if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_TIPOS_NOTIFICACION) == 0) {
                                                        echo 'active';
                                                    }
                                                    ?>"><a href="<?php echo Yii::app()->createUrl('notificationtype/admin'); ?>"><span class="glyphicon glyphicon-comment"></span> <?php echo Yii::app()->params["labelFuncionalidadTiposNotificacion"] ?></a></li>
                                                    <li class="<?php
                                                    if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_ESTADOS_NOTIFICACION) == 0) {
                                                        echo 'active';
                                                    }
                                                    ?>"><a href="<?php echo Yii::app()->createUrl('notificationstate/admin'); ?>"><span class="glyphicon glyphicon-comment"></span> <?php echo Yii::app()->params["notificationStateFunctionalityLabel"] ?></a></li>
                                                </ul>
                                                <!-- /.nav-second-level -->
                                            </li>
                                        <?php } ?> 
                                        <?php if (Yii::app()->user->hasRole(Constants::USER_ROLE_DIRECTOR)) { ?>
                                            <li class="<?php
                                            if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_USUARIOS) == 0) {
                                                echo 'active';
                                            }
                                            ?>"><a href="<?php echo Yii::app()->createUrl('user/admin'); ?>"><span class="glyphicon glyphicon-user"></span> <?php echo Yii::app()->params["userFunctionalityLabel"] ?></a></li>
                                            <?php } ?>
                                            <?php if (Yii::app()->user->hasRole(Constants::USER_ROLE_DIRECTOR) || Yii::app()->user->hasRole(Constants::USER_ROLE_ADMINISTRATIVO)) { ?>
                                            <li class="<?php
                                            if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_CLIENTES) == 0) {
                                                echo 'active';
                                            }
                                            ?>"><a href="<?php echo Yii::app()->createUrl('customer/admin'); ?>" ><span class="glyphicon glyphicon-list"></span> <?php echo Yii::app()->params["clientFunctionalityLabel"] ?></a></li>
                                            <li class="<?php
                                            if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_INMUEBLES) == 0) {
                                                echo 'active';
                                            }
                                            ?>"><a href="#"><span class="glyphicon glyphicon-home"></span> <?php echo Yii::app()->params["propertyFunctionalityLabel"] ?></a></li>
                                            <li class="<?php
                                            if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_NOTIFICACIONES) == 0) {
                                                echo 'active';
                                            }
                                            ?>"><a href="<?php echo Yii::app()->createUrl('notification/admin'); ?>"><span class="glyphicon glyphicon-envelope"></span> <?php echo Yii::app()->params["notificationFunctionalityLabel"] ?></a></li>                        
                                            <li class="<?php
                                            if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_PORTADA) == 0) {
                                                echo 'active';
                                            }
                                            ?>"><a href="#"><span class="glyphicon glyphicon-th"></span> <?php echo Yii::app()->params["topPropertiesFunctionalityLabel"] ?></a></li>
                                            <?php } ?>
                                        <li class="<?php
                                        if (strcmp(Yii::app()->session[Constants::SESSION_CURRENT_TAB], Constants::ITEM_MENU_CALENDARIO) == 0) {
                                            echo 'active';
                                        }
                                        ?>"><a href="<?php echo Yii::app()->createUrl('calendar/admin'); ?>"><span class="glyphicon glyphicon-calendar"></span> <?php echo Yii::app()->params["calendarFunctionalityLabel"] ?></a></li>
                                    </ul>
                                    <!-- /#side-menu -->
                                </div>
                                <!-- /.sidebar-collapse -->
                            </div>
                            <!-- /.navbar-static-side -->
                        </nav>

                        <div id="page-wrapper">
                            <?php echo $content; ?>
                        </div>
                        <!-- /#page-wrapper -->





                        <script src="http://www.openlayers.org/api/OpenLayers.js"></script>     
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/underscore/underscore-min.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/bootstrap/bootstrap3.1.1.min.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/alertify.min.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/js-extend.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/moment.min.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/highcharts/highcharts.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/highcharts/exporting.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/bootstrap-datetimepicker.min.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/bootstrap-combobox.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/blockUI.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/notificacion/logica-notificacion.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/on-start.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/graficas.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/objects.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/LlamadasAjax.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/sb-admin.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/backend.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/metisMenu/jquery.metisMenu.js"></script>

                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/jstimezonedetect/jstz.min.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/calendar/language/es-ES.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/calendar/calendar.min.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lib/calendar/app.js"></script>

                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/bundles/calendar/presentation.js"></script>
                        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/bundles/calendar/ajaxcalls.js"></script>

                    </body>
                    </html>




