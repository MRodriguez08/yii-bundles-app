<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Constantes
 *
 * @author ubuntu
 */
class Constantes {
    
    
    const PARAMETRO_RUTA_BASE = "directorioBaseImagenes";
    const PARAMETRO_CANTIDAD_BIENES_PORTADA = "cantidadBienesPortada";
    const PARAMETRO_EMAIL_ADMINISTRADOR = "emailAdminitrador";
    const PARAMETRO_DESV_LATITUD = "desviacionLatitud";
    const PARAMETRO_DESV_LONGITUD = "desviacionLongitud";
    const PARAMETRO_CONTRASENIA_REINICIO = "contraseniaReinicio";
    
    const TIPO_PARAMETRO_STRING = "string";
    const TIPO_PARAMETRO_INTEGER = "integer";
    
    const SESSION_CURRENT_TAB = 'sess_curr_tab';
    
    const DATETIME_STRING_FORMAT = 'Y-m-d H:i:s';
    
    const ESTADO_NOTIFICACION_PENDIENTE = "pendiente";
    const ESTADO_NOTIFICACION_RESUELTA = "resulta";
    
    /* OPERACIONES DE AUDITORIA */
    const AUDITORIA_OPERACION_ALTA = "alta";
    const AUDITORIA_OPERACION_BAJA = "baja";
    const AUDITORIA_OPERACION_MODIFICACION = "modificacion";
    const AUDITORIA_OPERACION_CAMBIAR_CONTRASENIA = "cambio contrasenia";
    const AUDITORIA_OPERACION_ELIMINACION = "eliminacion";
    const AUDITORIA_OPERACION_LOGIN = "login";
    const AUDITORIA_OPERACION_LOGOUT = "logout";
    
    /* OBJETOS DE AUDITORIA */
    const AUDITORIA_OBJETO_USUARIO = "usuario";
    const AUDITORIA_OBJETO_INMUEBLE = "inmueble";
    const AUDITORIA_OBJETO_PARAMETRO = "parametro";
    const AUDITORIA_OBJETO_EVENTO = "evento";
    const AUDITORIA_OBJETO_BARRIO = "barrio";
    const AUDITORIA_OBJETO_CIUDAD = "ciudad";
    const AUDITORIA_OBJETO_CLIENTE = "cliente";
    const AUDITORIA_OBJETO_DEPARTAMENTO = "departamento";
    const AUDITORIA_OBJETO_ESTADO_INMUEBLE = "estado inmueble";
    const AUDITORIA_OBJETO_TIPO_NOTIFICACION = "tipo notificacion";
    const AUDITORIA_OBJETO_PORTADA = "portada";
    
    const OPERACION_PUBLICACION_ALQUILER = "alquiler";
    const OPERACION_PUBLICACION_VENTA = "venta";
    
    const ITEM_MENU_CONFIGURACION = "configuracion";
    const ITEM_MENU_USUARIOS = "usuarios";
    const ITEM_MENU_INMUEBLES = "inmuebles";
    const ITEM_MENU_NOTIFICACIONES = "notificaciones";
    const ITEM_MENU_CALENDARIO = "calendario";
    const ITEM_MENU_CLIENTES = "clientes";
    const ITEM_MENU_PORTADA = "portada";
    const ITEM_MENU_HOME = "home";
    const ITEM_MENU_AUDITORIA = "auditoria";
    const ITEM_MENU_BARRIOS = "barrios";
    const ITEM_MENU_CIUDADES = "ciudades";
    const ITEM_MENU_DEPARTAMENTOS = "departamentos";
    const ITEM_MENU_PARAMETROS = "parametros";
    const ITEM_MENU_TIPOS_NOTIFICACION = "tipos_notificacion";
    const ITEM_MENU_ESTADOS_INMUEBLES = "estados_inmuebles";
    
    const USER_ROLE_ADMINISTRATIVO = "administrativo";
    const USER_ROLE_DIRECTOR = "director";
    const USER_ROLE_AGENTE = "agente";
    
    const RESULTADO_OPERACION_EXITO = "exito";
    const RESULTADO_OPERACION_FALLA = "falla";
    
    const TIPO_INMUEBLE_APARTAMENTO = "apartamento";
    const TIPO_INMUEBLE_CASA = "casa";
    const TIPO_INMUEBLE_LOCAL = "local";
    
}

