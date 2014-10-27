function ajaxCreateNewEvent(title, body, start, end) {
    bloquearPantalla();
    return $.ajax({
        url: CONF['backendIp'] + 'event/new',
        type: 'POST',
        dataType: 'json',
        data: {
            title: title,
            body: body,
            start: start,
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

function updateEvent(id, title, body, start, end) {
    bloquearPantalla();
    return $.ajax({
        url: CONF['backendIp'] + 'event/update',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            title: title,
            body: body,
            start: start,
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

