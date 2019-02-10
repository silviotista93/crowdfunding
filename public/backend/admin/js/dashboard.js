var dataProyectosNuevos = {};

var proyectosNuevos = new Morris.Line({
    element: 'char_ultimos_proyectos',
    data: [],
    xkey: 'y',
    ykeys: ['a'],
    labels: [getText("proyectosRevision")]
});


function getNewData(fechaInicio, fechaFin, label){
	dataProyectosNuevos.fechaInicio = fechaInicio.format("YYYY/MM/DD");
	dataProyectosNuevos.fechaFin = fechaFin.format("YYYY/MM/DD");
	getDatos();
}

function initDateTime(){
    let nameDate = "date_chart_new_projects";
    let date = initDateRange(nameDate, getNewData);
    dataProyectosNuevos.fechaInicio = date.start.format("YYYY/MM/DD");
    dataProyectosNuevos.fechaFin = date.end.format("YYYY/MM/DD");
}

function getDatos(){
    const url = getUrl("proyectosNuevos");
    const success = function (data){
        if (data && data.length > 0){
            proyectosNuevos.setData(data);
            contenedorProyectos.classList.remove("empty");
        }else{
            contenedorProyectos.classList.add("empty");
        }
    }
    ajax(
        url,
        dataProyectosNuevos,
        success,
        "post",
        null,
        false
    );
}

$(function (){
    initDateTime();
    getDatos();
});
