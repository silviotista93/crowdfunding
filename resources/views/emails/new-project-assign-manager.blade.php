@component('mail::message')
# {{ __("¡Un nuevo proyecto se te ha sido asignado!") }}
<img class="img-responsive" width="90" src="{{ $img_artist->pathAttachment() }}" alt="{{ $project->title }}">
{{ __("El artista :artist desea que conozcas su proyecto: ", ['artist' => $artist->nickname]) }}
## {{ __(":project ", ['artist' => $artist, 'project' => $project->title]) }}
<img class="img-responsive" src="{{ url($project->project_picture) }}" alt="{{ $project->title }}">
@component('mail::button', ['url' => route('show.backend.project', $project->slug)])
{{ __('Ir al proyecto') }}
@endcomponent
{{ __("Recuerda valorar este proyecto antes de :end_time para tener en cuenta tu valoracion y opinión.", ['end_time' => $end_time->end_time->toFormattedDateString()]) }}<br><br>
{{ __('Gracias') }},<br>
{{ config('app.name') }}
@endcomponent