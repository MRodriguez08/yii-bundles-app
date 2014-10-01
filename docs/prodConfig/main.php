<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Inmobiliaria Rias Altas',
    'defaultController' => 'site/index',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.models.parametro.*',
        'application.models.usuario.*',
        'application.models.evento.*',
        'application.models.auditoria.*',
        'application.models.cliente.*',
        'application.models.inmueble.*',
        'application.models.departamento.*',
        'application.models.ciudad.*',
        'application.models.barrio.*',
        'application.models.notificacion.*',
        'application.models.estadoNotificacion.*',
        'application.components.*',
        
        'application.extensions.XTChilen.*',
    ),
    'aliases' => array(
        
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'yiiesunacaca',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    'homeUrl' => array('site/index'),
    // application components
    'components' => array(
        'user' => array(
            'class' => 'WebUser',
            'loginUrl' => array('usuario/login'),
            'allowAutoLogin' => true,
            
        ),
        // uncomment the following to enable URLs in path-format
        'defaultController' => 'usuario',
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(

                'parametro/admin' => 'parametro/admin',
                'usuario/admin' => 'usuario/admin',
                
                'evento/admin' => 'evento/admin',
                
                'image/<id:.*\S.*>' => 'file/display',
                'propertyImage' => 'file/displayPropertyImage',
                
                
                'rwsinmueble/<data:.*\S*>' => 'rwsinmueble/processRequest',                
                'rwsinmueble' => 'rwsinmueble/processRequest',
                'rwsnotificacion/\w+' => 'rwsnotificacion/processRequest',
                'rwsnotificacion' => 'rwsnotificacion/processRequest',
                
                'emailNotificacion/createClient' => 'emailNotificacion/createClient',
                
                'parametro/<action:\w+>/<id:\w+>' => 'parametro/<action>',
                'evento/<action:\w+>/<id:\w+>' => 'evento/<action>',
                'usuario/<action:\w+>/<id:\w+>' => 'usuario/<action>',
                
                '<controller:\w+>/<id:\d+>' => '<controller>/view',                
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',  
                

            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=tinydevelop.ipagemysql.com;dbname=pi_testing2014',
            'emulatePrepare' => true,
            'username' => 'pi_testing2014',
            'password' => 'Desarrollo.2014',
            'charset' => 'utf8',
        ),
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    "params" => include(dirname(__FILE__) . "/parameters.php" ), //<� here is our file
);