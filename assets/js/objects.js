/* tipoBien es un array con valores dentro de  {local, casa, apartamento} */
/* tipoTransaccion es un array con valores dentro de  {venta, alquiler} */
/* el campo filtroStr se busca por todos los campos strings */
/* el filtro cantidadBanios puede tenener los valores {1,2,3} (siendo 3, 3 o mas)*/
/* el filtro cantidadHabilitaciones puede tenener los valores {1,2,3,4} (siendo 4, 4 o mas)*/
/* el filtro barrios es un array con los ids de los barrios */

CONF = {
    backendIp: '/yii-bundles-app/index.php/',
    backendIpNoScript: '/yii-bundles-app/',
    mapIcon: '../backend/images/home-blue.png',
    mapCharged: false,
    searchResult: '',
    homePosition: [-34.808307, -56.221709]
};

//Default Values
filterSearch = {
    tipoBien: ["apartamento", "casa"],
    filtroStr: "",
    tipoTransaccion: ["alquiler", "venta"],
    cantidadBanios: 4,
    cantidadHabitaciones: 5,
    barrios: [1, 2, 3, 4, 5],
    precioDesde: 1600,
    precioHasta: 5000,
}

function BackendConstants() {
    this.GRAFICA_INMUEBLE_POR_TIPO = "inmueblesPorTipo";
    this.GRAFICA_INMUEBLE_POR_ESTADO = "inmueblesPorEstado";
    this.GRAFICA_INMUEBLE_POR_BARRIO = "inmueblesPorBarrio";
}

var backendConstants = new BackendConstants();
