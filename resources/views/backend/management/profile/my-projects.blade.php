@extends('backend.layout')

@section('header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">{{ __('bienvenido') }}</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-user"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">{{__('perfil')}} {{ __('management') }}</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text"></span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
        </div>
    </div>
@stop
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                @include('backend.management.partials.siderbar-profile')
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{ __('mis_proyectos') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <table class="table table-striped- table-bordered table-hover table-checkable"
                               id="table__profile_projects_management">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('artista') }}</th>
                                <th>{{ __('titulo') }}</th>
                                <th>{{ __('categoria') }}</th>
                                <th>{{ __('estado') }}</th>
                                <th>{{ __('acciones') }}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        var tipoProyecto = null;
        var table = null;
        const loadTable = function (){
            if (table !== null){
                table.destroy();
            }
            table = $('#table__profile_projects_management').DataTable({
                "processing": true,
                "serverSide": true,
                "data": null,
                "order": [[ 0, "desc" ]],
                "ajax": {
                    url: "{{route('datatables.projects.profile.manage')}}",
                    data: {
                        tipoProyecto: tipoProyecto,
                        id_user: {{ $user->id }}
                    }
                },
                "columns": [
                    {
                        "width": "1%",
                        data: 'id',
                        defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
                    },
                    {
                        data: 'artists.nickname',
                        defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>',
                        render : function (data, type, JsonResultRow, meta){
                            return JsonResultRow.artists[0].nickname;
                        }
                    },
                    {
                        data: 'title',
                        defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
                    },
                    {
                        data: 'category.category',
                        defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
                    },

                    {"width": "15%",
                        data: 'status',
                        render:function (data) {
                            let info = '<span class="m-badge m-badge--danger m-badge--wide">Hola</span>';
                            switch(parseInt(data)){
                                case 1:
                                    info = '<span class="m-badge m-badge--brand m-badge--wide" style="background-color:#C4C5D4 !important" >{{ __('revision') }}</span>';
                                    break;
                                case 2:
                                    info = '<span class="m-badge m-badge--brand m-badge--wide" style="background-color:#9C26EA !important;font-size:7px" >{{ __('pre_aprovado') }}</span>';
                                    break;
                                case 3:
                                    info = '<span class="m-badge  m-badge--success m-badge--wide">{{ __('aprovado2') }}</span>';
                                    break;
                                case 4:
                                    info = '<span class="m-badge  m-badge--info m-badge--wide">{{ __('publicado2') }}</span>';
                                    break;
                                case 5:
                                    info = '<span class="m-badge  m-badge--danger m-badge--wide">{{ __('rechazado') }}</span>';
                                    break;
                            }
                            return '<div class="text-center">'+info+'</div>';
                        }
                    },
                    {
                        render:function (data,type, JsonResultRow,meta) {
                            return '<div class="text-center"><a href="/dashboard/project/'+JsonResultRow.slug+'" class="btn m-btn--pill btn-secondary"><i class="fa fa-eye"></i></a></div>'
                        }
                    },
                ],
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
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
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        }
        $(".selectType").on('click', '.changeType', function(){
            let tipo = parseInt($(this).attr("data-type"));
            if (!(tipo >  0)){
                tipo = null;
            }
            tipoProyecto = tipo;
            loadTable();
        });
        loadTable();
    </script>
@endpush
