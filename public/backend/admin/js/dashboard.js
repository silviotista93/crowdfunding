let dataProyectosNuevos = {};

var proyectosNuevos = new Morris.Line({
    element: 'char_ultimos_proyectos',
    data: [],
    xkey: 'y',
    ykeys: ['a'],
    labels: [getText("proyectosRevision")]
});


function getNewData(fechaInicio, fechaFin){
	dataProyectosNuevos.fechaInicio = fechaInicio;
	dataProyectosNuevos.fechaFin = fechaFin;
	getDatos();
}

function initDateTime(){
    let nameDate = "date_chart_new_projects";
    initDateRange(nameDate, getNewData);
}

function getDatos(){
    const url = getUrl("proyectosNuevos");
    const success = function (data){
        if (data && data[0].y){
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
    getDatos();
    initDateTime();
});
