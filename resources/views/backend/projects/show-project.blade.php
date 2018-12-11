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
                                    {{ __('mis_proyectos') }}
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
                                    <h5 style="font-weight: bold">{{ __('categoria') }}:</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop