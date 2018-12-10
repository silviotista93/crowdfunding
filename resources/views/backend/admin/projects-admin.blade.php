@extends('backend.layout')
<!--=====================================
   HEADER
======================================-->
@section('header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">{{ __('proyectos') }}</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon flaticon-share"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">{{ __('proyectos') }}</span>
                    </a>
                </li>

                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text"></span>
                    </a>
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">{{ __('todos') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                 m-dropdown-toggle="hover" aria-expanded="true">
                <a href="#"
                   class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                    <i class="la la-plus m--hide"></i>
                    <i class="la la-ellipsis-h"></i>
                </a>
                <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                    <div class="m-dropdown__inner">
                        <div class="m-dropdown__body">
                            <div class="m-dropdown__content">
                                <ul class="m-nav">
                                    <li class="m-nav__section m-nav__section--first m--hide">
                                        <span class="m-nav__section-text">Quick Actions</span>
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="" class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-share"></i>
                                            <span class="m-nav__link-text">Activity</span>
                                        </a>
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="" class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                            <span class="m-nav__link-text">Messages</span>
                                        </a>
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="" class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-info"></i>
                                            <span class="m-nav__link-text">FAQ</span>
                                        </a>
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="" class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                            <span class="m-nav__link-text">Support</span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator m-nav__separator--fit">
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<!--=====================================
CONTENIDO DEL MODULO PROYECTOS ADMIN
======================================-->
@section('content')
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Complex Headers
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">

                        <li class="m-portlet__nav-item"></li>
                        <div class="m-dropdown m-dropdown--inline  m-dropdown--arrow m-dropdown--align-right"
                             m-dropdown-toggle="hover">
                            <a href="#" class="m-dropdown__toggle btn btn-warning dropdown-toggle">
                                {{ __('estado') }}
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__section m-nav__section--first">
                                                    <span class="m-nav__section-text">{{ __('selecciona') }}</span>
                                                </li>
                                                <li class="m-nav__item text-center">
                                                    <a href="#" class="btn btn-outline-metal m-btn m-btn--pill m-btn--wide btn-sm">{{ __('revision') }}</a>
                                                </li>
                                                <li class="m-nav__item text-center">
                                                    <a href="#" class="btn btn-outline-brand m-btn m-btn--pill m-btn--wide btn-sm">{{ __('pre_aprovado') }}</a>

                                                </li>
                                                <li class="m-nav__item text-center">
                                                    <a href="#" class="btn btn-outline-success m-btn m-btn--pill m-btn--wide btn-sm">{{ __('aprovado') }}</a>
                                                </li>
                                                <li class="m-nav__item text-center">
                                                    <a href="#" class="btn btn-outline-info m-btn m-btn--pill m-btn--wide btn-sm">{{ __('publicado') }}</a>
                                                </li>
                                                <li class="m-nav__item text-center">
                                                    <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">{{ __('rechazados') }}</a>
                                                </li>
                                                <li class="m-nav__separator m-nav__separator--fit">
                                                </li>
                                                 <li class="m-nav__item">
                                                     <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-block">{{ __('todos') }}</a>
                                                 </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable"
                       id="table_projects_admin">
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
@stop

@section('table.admin.projects')
    <script src="/backend/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <script src="/backend/assets/demo/custom/crud/datatables/basic/headers.js" type="text/javascript"></script>


    <script>
        $('#table_projects_admin').DataTable({
            "processing": true,
            "serverSide": true,
            "data": null,
            "ajax": "{{route('datatables.projects.admin')}}",
            "columns": [
                {
                    "width": "1%",
                    data: 'id',
                    defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
                },
                {
                    data: 'artists.nickname',
                    defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
                },
                {
                    data: 'title',
                    defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
                },
                {
                    data: 'category.category',
                    defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
                },

                {
                    render:function (data,type, JsonResultRow,meta) {
                        return '<span class="m-badge m-badge--danger m-badge--wide">Hola</span>'

                    }
                },
                {
                    render:function (data,type, JsonResultRow,meta) {
                        return '<div class="text-center"><a href="" class="btn m-btn--pill btn-secondary"><i class="fa fa-eye"></i></a></div>'

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
    </script>

@endsection