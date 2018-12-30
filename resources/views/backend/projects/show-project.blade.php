@extends('backend.layout')

@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                @if(Storage::disk('public')->exists('projects/'.$project->project_picture))
                    <img width="100%" height="80%" src="{{ $project->pathAttachment() }}" alt=""/>
                @else
                    <img class="" width="100%" src="{{ $project->project_picture }}"
                         alt="">
                @endif
            </div>
            <div class="col-xs-8 col-lg-7">
                <h3 style="font-weight: bold;">{{ $project->title }}</h3>
                <a data-toggle="modal" data-target="#m_modal_1" class="m-link m--font-success m--font-bolder"
                   style="padding-bottom: 5px;cursor: pointer">by {{ $artist->artists[0]->nickname }} [{{__('ver_mas')}}]</a>
                <div class="m-scrollable" data-scrollable="true" style="height: 170px">
                    <p style="text-align: justify" >{{ $project->short_description }}</p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{ __('mas_informacion') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-section">
                            <div class="row">
                                <div class="col-xs-4 col-lg-8">
                                    <iframe width="560" height="315"
                                            id="videoYoutube"
                                            src="https://www.youtube.com/embed/{{$project->iframe_video}}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <div class="form-group">
                                        <h5 style="font-weight: bold">{{ __('estado') }}:</h5>
                                    </div>
                                    <div class="form-group">
                                        @if($project->status == 1)
                                            <span class="m-badge m-badge--metal m-badge--wide m-badge--rounded">{{ __('revision') }}</span>
                                        @elseif($project->status == 2)
                                            <span class="m-badge m-badge--brand m-badge--wide m-badge--rounded"
                                                  style="background-color: #9816f4 !important;">{{ __('pre_aprobado') }}</span>
                                        @elseif($project->status == 3)
                                            <span class="m-badge m-badge--success m-badge--wide m-badge--rounded">{{ __('aprobado') }}</span>
                                        @elseif($project->status == 4)
                                            <span class="m-badge m-badge--info m-badge--wide m-badge--rounded">{{ __('publicado') }}</span>
                                        @else
                                            <span class="m-badge m-badge--danger m-badge--wide m-badge--rounded">{{ __('rechazado') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <h5 style="font-weight: bold">{{ __('genero') }}:</h5>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-secondary btn-md">{{ $project->category->category }}</button>
                                    </div>
                                    <div class="form-group">
                                        <h5 style="font-weight: bold">{{ __('costo_proyecto') }}:</h5>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="m--font-success" style="font-weight: bold">
                                            ${{ $project->price }}</h4>
                                    </div>

                                    <!-- ------------------------- ACCIONES SEGUN LOS ROLES----------------------------- -->

                                @include('backend.partials.rating.' .\App\User::rating_proyect())

                                <!-- ------------------------- CALIFICACION DEL PROYECTO CUANDO ESTA PUBLICADO Y APROBADO----------------------------- -->
                                    @if($project->status == 3 || $project->status == 4 )
                                        <div class="form-group">
                                            <h5 style="font-weight: bold">{{ __('valoracion') }}:</h5>
                                        </div>

                                        <div class="form-group">
                                            <ul id="list_rating_project" class="list-inline" style="font-size: 20px">
                                                <li class="list-inline-item star"><i
                                                            class="fa fa-star fa-1x{{ $project->rating >= 1 ? ' yellow-rating' : '' }}"></i>
                                                </li>
                                                <li class="list-inline-item star"><i
                                                            class="fa fa-star fa-1x{{ $project->rating >= 2 ? ' yellow-rating' : '' }}"></i>
                                                </li>
                                                <li class="list-inline-item star"><i
                                                            class="fa fa-star fa-1x{{ $project->rating >= 3 ? ' yellow-rating' : '' }}"></i>
                                                </li>
                                                <li class="list-inline-item star"><i
                                                            class="fa fa-star fa-1x{{ $project->rating >= 4 ? ' yellow-rating' : '' }}"></i>
                                                </li>
                                                <li class="list-inline-item star"><i
                                                            class="fa fa-star fa-1x{{ $project->rating >= 5 ? ' yellow-rating' : '' }}"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(\App\User::rating_proyect())
                            <div id="show_assign_list_management" style="display: none">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                                {{ __('lista_managements') }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-section">
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-4 col-lg-12">
                                            <div class="box-body table-responsive text-center">
                                                <table class="table table-striped- table-bordered table-hover"
                                                       id="table_assign_management">
                                                    <thead>
                                                    <tr>
                                                        <th>Management</th>
                                                        <th>{{ __('nombre') }}</th>
                                                        <th>{{ __('compañia') }}</th>
                                                        <th>{{ __('email') }}</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



    <style>
        .swal2-popup .swal2-file:focus,
        .swal2-popup .swal2-input:focus,
        .swal2-popup .swal2-textarea:focus {
            border-color: #716aca;
        }
    </style>

    <!--=====================================
        MODAL INFORMACION DEL ARTISTA
    ======================================-->
    <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('informacion_artista') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="m-portlet m-portlet--full-height  ">
                                <div class="m-portlet__body">
                                    <div class="m-card-profile">
                                        <div class="m-card-profile__title m--hide">
                                            Your Profile
                                        </div>
                                        <div class="m-card-profile__pic">
                                            <div class="m-card-profile__pic-wrapper">
                                                @if(Storage::disk('public')->exists('users/'.$artist->artists[0]->users->picture))
                                                    <img src="{{ $artist->artists[0]->users->pathAttachment()}}"
                                                         alt=""/>
                                                @else
                                                    <img src="{{ $artist->artists[0]->users->picture }}" alt="">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="m-card-profile__details">
                                            <span class="m-card-profile__name">{{ $artist->artists[0]->nickname }}</span>

                                            <a href="" class="m-card-profile__email m-link"
                                               style="margin-left: -15px; width: 80%; word-wrap: break-word;">{{ $artist->artists[0]->users->email }}</a>

                                        </div>
                                        @if($country->flag !== null)
                                            <div  class="text-center" style="margin-top: 5px"><img data-toggle="tooltip" title="{{ $country->country }}"
                                                        src="{{ $country->flag }}"
                                                        width="21" alt="" style="margin-top: 6px;margin-left: -10px">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-5">
                            <div class="m-portlet">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                               {{ __('biografia') }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <div class="m-scrollable" data-scrollable="true" style="height: 200px">
                                        <p>{{ $artist->artists[0]->biography }}</p>
                                    </div>
                                </div>
                                <div class="m-portlet__foot">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12">
                                            <a href="" data-toggle="tooltip" title="{{__('no_registrado')}}!" class="p-2 pull-right" style="color: #dd4b39">
                                                <i class="fab fa-google-plus-g fa-2x"></i>
                                            </a>
                                            <a href="" class="p-2 pull-right" style="color: #bb0000">
                                                <i class="fab fa-youtube fa-2x"></i>
                                            </a>
                                            <a href="" class="p-2 pull-right">
                                                <i class="fab fa-instagram fa-2x" style="color: #c13584"></i>
                                            </a>
                                            <a href="" class="p-2 pull-right" style="color: #3b5998">
                                                <i class="fab fa-facebook-square fa-2x"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('rating.projects')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });

        jQuery(document).ready(function () {
            const ratingSelector = jQuery('#list_rating');
            ratingSelector.find('li').on('click', function () {
                const number = $(this).data('number');
                $('#rating_form').find('input[name=rating_input]').val(number);
                ratingSelector.find('li i').removeClass('yellow-rating').each(function (index) {
                    if ((index + 1) <= number) {
                        $(this).addClass('yellow-rating');
                    }
                })
            });


            $("#btnEnviarReview").click(function (e) {
                e.preventDefault();
                let textarea = null;
                swal({
                    title: '{{ __('comment_review_manager') }}',
                    input: 'textarea',
                    inputPlaceholder: '{{ __('tu_mensaje') }}',
                    inputClass: "form-control m-input",
                    confirmButtonText: '{{ __('calificar') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonClass: 'btn btn-warning'

                }).then(function (result) {
                    console.log(result);
                    if (result.value === "" || result.value) {
                        $("#txtComentManager").val(result.value);
                        let form = $("#rating_form");
                        let url = form.attr("action");
                        let data = form.serialize();
                        $.post(url, data, function (e) {
                            if (e) {
                                swal("Good job!", "You clicked the button!", "success")
                                    .then(function () {
                                        window.location.reload();
                                    });

                            }
                        });
                    }
                });
                textarea = $("textarea.form-control.m-input");
                textarea.removeClass("swal2-textare").attr("rows", '5');
            });
        });
        $('#table_assign_management').DataTable({
            "processing": true,
            "serverSide": true,
            "data": null,
            "ajax": {
                url: "{{ route('assign.managements') }}",
                data: {
                    id_project: {{ $project->id }}
                }
            },
            "columns": [
                {
                    render: function (data, type, JsonResultRow, meta) {
                        return '<img src="' + JsonResultRow.users.picture + '" width="60px" style="border-radius: 100%;margin-right: auto;margin-left: auto;display: block"/>';
                    }
                },
                {
                    data: 'users.name',
                    defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
                },
                {
                    data: 'company',
                    defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
                },
                {
                    data: 'users.email',
                    defaultContent: '<span class="label label-danger text-center">Ningún valor por defecto</span>'
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