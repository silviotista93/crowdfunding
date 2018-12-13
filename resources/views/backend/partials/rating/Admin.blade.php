<!-- Acciones para el Admin -->
<div class="form-group">
    <h5 style="font-weight: bold">{{ __('asignar_proyecto') }}:</h5>
</div>
<div class="form-group">
    <button type="button" data-toggle="modal" data-target="#list_modal_manage" class="btn btn-info m-btn m-btn--icon">
        <span>
            <i class="la la-user"></i>
            <span>{{ __('buscar') }}</span>
        </span>
    </button>

</div>


<!-- MODAL, BUSCAR MANAGEMENT-->
<div class="modal fade" id="list_modal_manage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('management') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_managements">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>{{ __('management') }}</th>
                        <th>Email</th>
                        <th>{{ __('intereses') }}</th>

                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

@section('table.admin.management')
    <script>
        var DatatablesBasicBasic = function() {

            var initTable1 = function() {
                var table = $('#m_table_managements');

                // begin first table
                table.DataTable({
                    responsive: true,

                    //== DOM Layout settings
                    dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

                    lengthMenu: [5, 10, 25, 50],

                    pageLength: 5,



                    //== Order settings
                    order: [[1, 'asc']],

                    headerCallback: function(thead, data, start, end, display) {
                        thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                        <input type="checkbox" value="" class="m-group-checkable">
                        <span></span>
                    </label>`;
                    },
                    searching: true,
                    processing: true,
                    serverSide: true,
                    data: null,
                    ajax: "{{route('datatables.management.admin')}}",
                    columns: [
                        {
                            targets: 0,
                            width: '30px',
                            className: 'dt-right',
                            orderable: false,
                            render: function(data, type, full, meta) {
                                return `
                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                            <input type="checkbox" value="" class="m-checkable">
                            <span></span>
                        </label>`;
                            },
                        },
                        {
                            data: 'users.name',
                            defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
                        },
                        {
                            render:function (data,type, JsonResultRow,meta) {
                                return '<a class="m-link--primary" href="mailto:' + JsonResultRow.users.email + '">' + JsonResultRow.users.email + '</a>'

                            }
                        },
                        {
                            data: 'categories.category',
                            defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
                        },

                    ],
                    "language": {
                        "sProcessing": "{{__('procesando')}}",
                        "sLengthMenu": " _MENU_ {{__('registros')}}",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "{{__('mostrando_registros')}} _START_ {{__('from')}} _END_ {{__('total_de')}} _TOTAL_ {{__('registros')}}",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "{{__('siguiente')}}",
                            "sPrevious": "{{__('anterior') }}"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                });

                table.on('change', '.m-group-checkable', function() {
                    var set = $(this).closest('table').find('td:first-child .m-checkable');
                    var checked = $(this).is(':checked');

                    $(set).each(function() {
                        if (checked) {
                            $(this).prop('checked', true);
                            $(this).closest('tr').addClass('active');
                        }
                        else {
                            $(this).prop('checked', false);
                            $(this).closest('tr').removeClass('active');
                        }
                    });
                });

                table.on('change', 'tbody tr .m-checkbox', function() {
                    $(this).parents('tr').toggleClass('active');
                });
            };

            return {

                //main function to initiate the module
                init: function() {
                    initTable1();
                },

            };

        }();

        jQuery(document).ready(function() {
            DatatablesBasicBasic.init();
        });
    </script>
@endsection