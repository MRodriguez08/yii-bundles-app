<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Desktop',
    'defaultController' => 'site/index',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        
        /* user bundle*/
        'application.models.user.*',
        
        /* audit bundle */
        'application.models.audit.*',
        
        
        /* system parameters bundle */
        'application.models.sysparam.*',
        
        /* calendar bundle */
        'application.models.calendar.*',
        
        /* customers bundle */
        'application.models.customer.*',
                
        'application.models.property.*',
        
        
        /* departments bundle */
        'application.models.department.*',
        
        
        /* city bundle */
        'application.models.city.*',
        
        
        /* neighbourhood bundle */
        'application.models.neighbourhood.*',
        
        /* notifications bundle */
        'application.models.notification.*',
        
        
        /* components */
        'application.components.*',
        
        /* components */
        'ext.*',

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
            'loginUrl' => array('user/login'),
            'allowAutoLogin' => true,
            
        ),
        // uncomment the following to enable URLs in path-format
        'defaultController' => 'site',
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(

                'sysparam/admin' => 'sysparam/admin',
                'user/admin' => 'user/admin',
                
                /* calendar bundle */
                'events' => 'calendar/getAllEvents',
                'event/new' => 'calendar/createEvent',
                'event/update' => 'calendar/updateEvent',
                'event/<id:\d+>' => 'calendar/view',      
                
                'image/<id:.*\S.*>' => 'file/display',
                'propertyImage' => 'file/displayPropertyImage',
                
                
                'rwsinmueble/<data:.*\S*>' => 'rwsinmueble/processRequest',                
                'rwsinmueble' => 'rwsinmueble/processRequest',
                'rwsnotification/\w+' => 'rwsnotification/processRequest',
                'rwsnotification' => 'rwsnotification/processRequest',
                
                'emailNotificacion/createClient' => 'emailNotificacion/createClient',
                
                'sysparam/<action:\w+>/<id:\w+>' => 'sysparam/<action>',
                'evento/<action:\w+>/<id:\w+>' => 'evento/<action>',
                'user/<action:\w+>/<id:\w+>' => 'user/<action>',
                
                '<controller:\w+>/<id:\d+>' => '<controller>/view',                
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',  
                

            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yii-bundles-app',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'ms_admin',
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
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error',
                    'categories'=>'system.*',
                ),
                array(
                    'class'=>'ext.DBLog',
                    //'autoCreateLogTable'=>false,
                    'logTableName' => 'error_log', 
                    'connectionID'=>'db',
                    'categories'=>'application.*',
                    'enabled'=>true,
                    'levels'=>'error',//You can replace trace,info,warning,error
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    "params" => include(dirname(__FILE__) . "/parameters.php" ), //<� here is our file
);
