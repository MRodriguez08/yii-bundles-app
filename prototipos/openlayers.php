<!DOCTYPE HTML>
<html>
    <head>
        <title>OpenLayers</title>
        <style type="text/css">
            html, body, #basicMap {
                width: 100%;
                height: 100%;
                margin: 0;
            }
        </style>
        <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
        <script src="../public/javascript/libs/jquery1.11.0.min.js"></script>
        <script>
            function init() {
                var map = new OpenLayers.Map('basicMap', {
                    controls: [
                        new OpenLayers.Control.Navigation(),
                        new OpenLayers.Control.PanZoomBar(),
                        new OpenLayers.Control.LayerSwitcher({'ascending': false}),
                        new OpenLayers.Control.Permalink(),
                        new OpenLayers.Control.ScaleLine(),
                        new OpenLayers.Control.Permalink('permalink'),
                        new OpenLayers.Control.MousePosition(),
                        new OpenLayers.Control.OverviewMap(),
                        new OpenLayers.Control.KeyboardDefaults()
                    ]
                });
                layerOSM = new OpenLayers.Layer.OSM();
                //OpenLayers ships with the ability to transform coordinates between 
                //geographic (EPSG:4326) and web or spherical mercator (EPSG:900913 et al.)
                epsg4326 = new OpenLayers.Projection("EPSG:4326");
                epsg900913 = new OpenLayers.Projection("EPSG:900913");
                position = new OpenLayers.LonLat(-56.165025, -34.905808).transform(epsg4326, epsg900913);
                zoom = 14;

                map.addLayer(layerOSM);
                map.setCenter(position, zoom);

                layerMarkers = new OpenLayers.Layer.Markers("Markers");
                map.addLayer(layerMarkers);

                var marker = new OpenLayers.Marker(position);
                var popup = popup = new OpenLayers.Popup("Inmobiliaria",
                        position,
                        new OpenLayers.Size(200, 200),
                        "Longitud: "+position.lon+"\n"+"Latitud: "+position.lat,
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
                        lonlat = map.getLonLatFromViewPortPx(e.xy);

                        opx = map.getLayerPxFromViewPortPx(e.xy);

                        marker.moveTo(opx);
                        popup.moveTo(opx);
                        popup.setContentHTML("Longitud: "+lonlat.lon+"\n"+"Latitud: "+lonlat.lat);
                        if (popup.visible())
                            popup.hide();
                    }

                    function MarkerClick(e) {
                        if (popup.visible())
                            popup.hide();
                        else popup.show();
                    }

                    function PopupClick(e) {
                        this.hide();
                    }
                });
            }
        </script>
    </head>
    <body onload="init();">
        <div id="basicMap"></div>
    </body>
</html>
