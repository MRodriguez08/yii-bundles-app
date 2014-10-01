function initOpenStreetMapVerInmueble() {
    var map = new OpenLayers.Map('mapa-ubicacion', { controls: [
            new OpenLayers.Control.Navigation(),
            new OpenLayers.Control.PanZoomBar()
    ] });
    layerOSM = new OpenLayers.Layer.OSM();
    epsg4326 = new OpenLayers.Projection("EPSG:4326");
    epsg900913 = new OpenLayers.Projection("EPSG:900913");
    lon = $("#Inmueble_coord_longitud").val();
    lat = $("#Inmueble_coord_latitud").val();
    position = new OpenLayers.LonLat(lon, lat);
    positionOL = position.transform(epsg4326, epsg900913);
    zoom = 14;

    map.addLayer(layerOSM);
    map.setCenter(positionOL, zoom);

    layerMarkers = new OpenLayers.Layer.Markers("Markers");
    map.addLayer(layerMarkers);

    var marker = new OpenLayers.Marker(positionOL);
    var popup = popup = new OpenLayers.Popup("Inmobiliaria",
            position,
            new OpenLayers.Size(200, 200),
            "Longitud: " + lon + "\n" + "Latitud: " + lat,
            false);
    popup.setOpacity(0.8);
    size = new OpenLayers.Size(21, 25);
    offset = new OpenLayers.Pixel(-(size.w / 2), -size.h);
    icon = new OpenLayers.Icon('http://maps.google.com/mapfiles/ms/micons/realestate.png', size, offset);
    marker.icon.url = icon.url;
    layerMarkers.addMarker(marker);
    map.addPopup(popup);
    popup.hide();
    $(document).ready(function() {

        map.events.register('click', map, MapClick);
        marker.events.register('click', marker, MarkerClick);
        popup.events.register('click', popup, PopupClick);

        function MapClick(e)
        {
            if (popup.visible())
                popup.hide();
        }
        
        function MarkerClick(e) {
            if (popup.visible())
                popup.hide();
            else
                popup.show();
        }

        function PopupClick(e) {
            this.hide();
        }
    });
}

