@extends('backend.layout')

@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                @if(Storage::disk('public')->exists('projects/'.$project->project_picture))
                    <img width="100%" height="80%" src="{{ auth()->user()->pathAttachment() }}" alt=""/>
                @else
                    <img class="" width="100%" src="{{ $project->project_picture }}"
                         alt="">
                @endif
            </div>
            <div class="col-xs-8 col-lg-7">
                <h3 style="font-weight: bold;">{{ $project->title }}</h3>
                <p style="text-align: justify">{{ $project->short_description }}</p>
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
                                    {!! $project->iframe_video !!}
                                </div>
                                <div class="col-xs-4 col-lg-3">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('rating.projects')
    <script>
        jQuery(document).ready(function () {
            const ratingSelector = jQuery('#list_rating');
            ratingSelector.find('li').on('click',function () {
                const number = $(this).data('number');
                $('#rating_form').find('input[name=rating_input]').val(number);
                ratingSelector.find('li i').removeClass('yellow-rating').each(function (index) {
                    if((index + 1) <= number){
                        $(this).addClass('yellow-rating');
                    }
                })
            })
        })
    </script>
@endsection