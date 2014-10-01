function loadNotificacionesOnIndex(ns){
    var contenedor = $("#contenedor-notificaciones");
    contenedor.empty();

    for (var idx = 0; idx < ns.length; idx++){
        var li = document.createElement("li");        
        var span = document.createElement("span");
        var img = document.createElement("img");
        img.setAttribute("class", "img-circle");
        img.setAttribute("src", CONF["backendIpNoScript"] + "images/iconoemail.jpg");
        var div1 = document.createElement("div");
        div1.setAttribute("class", "chat-body clearfix");
        var div2 = document.createElement("div");
        div2.setAttribute("class", "header");
        var strong = document.createElement("strong");
        var strong = document.createElement("strong");
        strong.appendChild(document.createTextNode(ns[idx].nombre_cliente));
        var small = document.createElement("small");
        var i = document.createElement("i");
        i.setAttribute("class", "fa fa-clock-o fa-fw");
        var p = document.createElement("p");
        p.appendChild(document.createTextNode(ns[idx].mensaje));

        span.appendChild(img);
        li.appendChild(span);
        li.appendChild(div1);
        div1.appendChild(div2);
        div1.appendChild(p);

        small.appendChild(i);
        small.appendChild(document.createTextNode(ns[idx].fecha_hora_envio));
        if (idx % 2 == 0){
            li.setAttribute("class", "left clearfix");
            span.setAttribute("class", "chat-img pull-left");
            div2.appendChild(strong);
            div2.appendChild(small);

            small.setAttribute("class", "pull-right text-muted");
            strong.setAttribute("class", "primary-font");
        } else {
            li.setAttribute("class", "right clearfix");
            span.setAttribute("class", "chat-img pull-right");
            div2.appendChild(small);
            div2.appendChild(strong);
            small.setAttribute("class", "text-muted");
            strong.setAttribute("class", "pull-right  primary-font");
        }

        contenedor.append(li);
    }

}
/*
<li class="left clearfix">
    <span class="chat-img pull-left">
        <img src="../backend/images/iconoemail.jpg" alt="User Avatar" class="img-circle">
    </span>
    <div class="chat-body clearfix">
        <div class="header">
            <strong class="primary-font">Jack Sparrow</strong>
            <small class="pull-right text-muted">
                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
            </small>
        </div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
        </p>
    </div>
</li>


<li class="left clearfix">
    <span class="chat-img pull-left">
        <img class="img-circle" src="../backend/images/iconoemail.jpg">
    </span>
    <div class="chat-body clearfix">
        <div class="header">
            <strong class="primary-font">null</strong>
            <small class="text-muted">
                <i class="fa fa-clock-o fa-fw"></i>16-06-2014
            </small>
        </div>
        <p>null</p>
    </div>
</li>
 */
