
var proyectosNuevos = new Morris.Line({

    element: 'char_ultimos_proyectos',

    data: [{
            y: '2006',
            a: 100
        },
        {
            y: '2007',
            a: 75
        },{
            y: '2008',
            a: 100
        },
        {
            y: '2009',
            a: 80
        }
    ],
    xkey: 'y',
    ykeys: ['a'],

    labels: ['Proyectos en revision']
});

proyectosNuevos.redraw();
