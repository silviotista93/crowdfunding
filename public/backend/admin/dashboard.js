let dataProyectosNuevos = {};

var proyectosNuevos = new Morris.Line({
    element: 'char_ultimos_proyectos',
    data: [],
    xkey: 'y',
    ykeys: ['a'],
    labels: ['Proyectos en revision']
});

function getDatos(){
    const url = getUrl("proyectosNuevos");
    const success = function (data){
        proyectosNuevos.setData(data);
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
});
