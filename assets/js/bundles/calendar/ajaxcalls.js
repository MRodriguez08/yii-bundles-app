function createNewEvent(title,body,start,end) {
  bloquearPantalla();
  return $.ajax({
      url: CONF['backendIp'] + 'event/new',
      type: 'POST',
      dataType: 'json',
      data : {
        title : title,
        body : body,
        start : start,
        end: end
      }
  })
  .done(function(msg) {
    console.log('new event id = ' + msg.message);
  })
  .fail(function(msg) {
    console.log(msg);
  })
  .always(function(msg) {
    desbloquearPantalla();
  });
}

function updateEvent(id,title,body,start,end) {
  bloquearPantalla();
  return $.ajax({
      url: CONF['backendIp'] + 'event/update',
      type: 'POST',
      dataType: 'json',
      data : {
        id : id,
        title : title,
        body : body,
        start : start,
        end: end
      }
  })
  .done(function(msg) {
    if (msg.result === "ok")
      alertify.success(msg.detalle);
    else if (msg.result === "falla")
      alertify.error(msg.detalle);
  })
  .fail(function(msg) {
    console.log(msg);
  })
  .always(function(msg) {
    desbloquearPantalla();
  });
}

function createNewEvent13(title,body,start,end) {
  jQuery.ajax({
            type: "POST",
            url: CONF['backendIp'] + 'event/new',
            data : JSON.stringify({
                title : title,
                body : body,
                start : start,
                end: end
              }),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async: false,
            success: function(response) {
                console.log('new event id = ' + msg.message);
            },
            error: function(msg) {
                console.log('all bad');
            }
        });

}