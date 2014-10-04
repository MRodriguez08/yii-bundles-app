// Llamadas Ajax
//GET___________GET_____________GET

  function notificacionCrearNuevoCliente() {
    bloquearPantalla();
    $.ajax({
        url: CONF['backendIp'] + 'emailNotificacion/createClient',
        type: 'POST',
        dataType: 'json',
        data : {
          emailCliente : $("#EmailNotificacion_emailCliente").val(),
          nameCliente : $("#EmailNotificacion_nameCliente").val()
        }
    })
    .done(function(msg) {
      if (msg.resultado === "ok")
        alertify.success(msg.detalle);
      else if (msg.resultado === "falla")
        alertify.error(msg.detalle);
    })
    .fail(function(msg) {
            console.log(msg);
    })
    .always(function(msg) {
      desbloquearPantalla();
    });
  }

function obtenerNotificacionesPendientes(){
    bloquearPantalla();
    $.ajax({
        url: CONF['backendIp'] + 'emailNotificacion/getNotificacionesPendientes',
        type: 'GET',
        dataType: 'json'
    })
    .done(function(msg) {
        loadNotificacionesOnIndex(msg);
    })
    .fail(function(msg) {
        console.log(msg);
    })
    .always(function(msg) {
        desbloquearPantalla();
    });
}

function obtenerGraficaCantidadInmueblesPorTipo(grafica){
    bloquearPantalla();
    $.ajax({
        url: CONF['backendIp'] + 'inmueble/' + grafica,
        type: 'GET',
        dataType: 'json'
    })
    .done(function(msg) {
        loadGraficaInmuebles('grafica-inmuebles',msg);
    })
    .fail(function(msg) {
        console.log(msg);
    })
    .always(function(msg) {
        desbloquearPantalla();
    });
}
