let dataProyectosNuevos = {};

var proyectosNuevos = new Morris.Line({
    element: 'char_ultimos_proyectos',
    data: [],
    xkey: 'y',
    ykeys: ['a'],
    labels: [getText("proyectosRevision")]
});

const getDate = function (type){
    let data = null;
    switch(type){
        case "hoy":
            data = [moment(), moment()]
            break;
        case "ayer":
            data = [moment().subtract(1, 'days'), moment().subtract(1, 'days')];
            break;
        case "siete":
            data = [moment().subtract(6, 'days'), moment()];
            break;
        case "treinta":
            data = [moment().subtract(29, 'days'), moment()];
            break;
        case "mes":
            data = [moment().startOf('month'), moment().endOf('month')];
            break;
        case "ultimomes":
            data = [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')];
            break;
    }
    return data;
}

function initDateTime(){
    let nameDate = "date_chart_new_projects";
    //let antiguo = getDatePrev(setStorage(nameDate));
    let start = moment().subtract(29, 'days');
    let end = moment();

    $('#'+nameDate).daterangepicker({
        buttonClasses: 'm-btn btn',
        applyClass: 'btn-primary',
        cancelClass: 'btn-secondary',
        startDate: start,
        endDate: end,
        ranges: {
           'Today': getDate("hoy"),
           'Yesterday': getDate("ayer"),
           'Last 7 Days': getDate("siete"),
           'Last 30 Days': getDate("treinta"),
           'This Month': getDate("mes"),
           'Last Month': getDate("ultimomes")
        },
        locale: {
            cancelLabel: 'Limpiar',
            applyClass: "Aplicar"
        }
    }, function(start, end, label) {
        setStorage(nameDate, label);
        $('#'+nameDate+' .form-control').val( start.format('MM/DD/YYYY') + ' / ' + end.format('MM/DD/YYYY'));
    });
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
