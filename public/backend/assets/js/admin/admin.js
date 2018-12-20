$("#cancelar_abono").click(function(){


    $('#realizar-abono').hide('blind');


});

$("#mostrar_managements_asignados").click(function(){

    $('#historial_abonos').show('fold');
    $('html,body').animate({
            scrollTop: $('#historial_abonos').offset().top},
        'slow');

});

$("#ocultar_historial").click(function(){


    $('#historial_abonos').hide('blind');

});