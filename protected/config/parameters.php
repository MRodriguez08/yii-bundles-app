<?php

return array(
    
    'debugMode' => YII_DEBUG,
    //'debugMode' => true,

    /* buttons labels (grid and non grid button */
    "showFiltersLabel" => "B&uacute;squeda avanzada",
    "filterButtonLabel" => "<span class='glyphicon glyphicon-filter'></span>Filtrar",
    "goBackButtonLabel" => "Volver",
    "createButtonLabel" => "Crear",
    "createButtonLabel" => "Guardar",
    "confirmButtonLabel" => "Confirmar",
    "editGridButtonLabel" => '<i class="fa fa-edit"></i>',
    "disabledEditGridButtonLabel" => '<span class="glyphicon glyphicon-ban-circle"></span>',
    "viewGridButtonLabel" => '<i class="fa fa-search"></i>',
    "deleteGridButtonLabel" => '<span class="glyphicon glyphicon-remove"></span>',
    "resolveGridButtonLabel" => '<span class="glyphicon glyphicon-check"></span>',
    "lockUserGridButton" => '<i title=\'bloquear\' class="fa fa-lock"></i>',
    "unlockUserGridButton" => '<i title=\'desbloquear\' class="fa fa-unlock"></i>',
    "resetPasswordButtonLabel" => '<i title=\'reinicializar contrase&ntilde;a\' class="fa fa-key"></i>',

    "emptyTableLabel" => 'Sin resultados encontrados',
    "tablePagingLabel" => '',
    "prevPageLabel" => '&lt;',
    "nextPageLabel" => '&gt;',

    "uiHeadersWrapperOMarkup" => '<h3 class="page-header">',
    "uiHeadersWrapperCMarkup" => '</h3>',
    "gridViewStyleSheet" => '../../css/gridViewStyle/gridView.css',

    "auditFunctionalityLabel" => "Consulta de auditoria",
    "neighbourhoodFunctionalityLabel" => "Gesti&oacute;n de barrios",
    "cityFunctionalityLabel" => "Gesti&oacute;n de ciudades",
    "departmentFunctionalityLabel" => "Gesti&oacute;n de departamentos",
    "sysparamFunctionalityLabel" => "Par&aacute;metros",
    "propertyStateFunctionalityLabel" => "Estados de inmuebles",
    "labelFuncionalidadTiposNotificacion" => "Tipos de notificaci&oacute;n",
    "userFunctionalityLabel" => "Usuarios",
    "clientFunctionalityLabel" => "Clientes",
    "propertyFunctionalityLabel" => "Inmuebles",
    "notificationFunctionalityLabel" => "Notificaciones",
    "topPropertiesFunctionalityLabel" => "Portada",
    "calendarFunctionalityLabel" => "Mis eventos",
    "notificationStateFunctionalityLabel" => "Estados de notificaci&oacute;n",

    "emptyComboBoxLabel" => "Todos",

    "emptyValueErrorMessage" => "campo obligatorio",
    "templateDuplicatedValueErrorMessage" => " {attribute} ya utilizado",
    "formHasErrorPanel" => "<div class=\"alert alert-danger\" role=\"alert\"><b>Hay errores en los datos. Por favor verifiquelos</b></div>",
    "invalidEmailFormatMessage" => "formato de email inv&aacute;lido. ej: jperez@gmail.com",
    "userPhotoFileSizeExceeded" => "La imagen demaciada grande.",
    
    
    /**
     * Valid options
     *      - 'in' for panel visible
     *      - '' for hidden panel
     */
    "filterPanelInitialState" => "in",

    "dateTimeDisplayFormat" => 'd/m/Y H:i',
    "altDateTimeDisplayFormat" => 'd/m/Y g:i A',

    /* input type date string format*/
    "inputDataDateFormat" => 'DD/MM/YYYY HH:mm',


    /* mysql datetime string format */
    "mysqlDateTimeStringFormat" => 'Y-m-d H:i',
    
    
    /* application error messages */
    "invalidAuthenticationInfo" => 'Usuario o contrase&ntilde;a inv&aacute;lidos / usuario deshabilitado',
    
    /* http status messages */
    "httpErrorCode404Message" => 'The requested page does not exist.',
    "httpErrorCode500Message" => 'Internal server error!! please contant the system administrator or report the bug. Thanks!!',
    
    "maxUserPhotoSize" => 1048576,
    
    "styles" => include(dirname(__FILE__) . "/styles.php" ),
    "scripts" => include(dirname(__FILE__) . "/scripts.php" ),    
    
);
