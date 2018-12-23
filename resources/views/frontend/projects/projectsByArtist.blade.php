@extends('frontend.layout')

@section('content')

{{-- @if(Storage::disk('public')->exists('users/'.auth()->user()->picture))
<img src="{{ auth()->user()->pathAttachment()}}"
class="m--img-rounded m--marginless" alt=""/>
@else
<img src="{{ auth()->user()->picture}}" class="m--img-rounded m--marginless"
alt=""/>

@endif --}}

{{-- _______________________________
     nombre del artista y generos 
     _______________________________ --}}
     <section class="xs-inner-welcome-section fundpress-inner-welcome-section fundpress-inner-bg-1 parallax-window"
     data-parallax="scroll"
     style=" background-image: url(/frontend/images/projects/background_perfil.jpg);background-position: center;background-attachment: fixed;background-repeat: no-repeat; background-size: cover;">
     <div class="xs-solid-overlay xs-bg-black"></div>
     <div class="container">
        <div class="fundpress-inner-welcome-content">

            <h2 class="color-white">{{ $artist->nickname }}</h2>           
            <ul class="xs-breadcumb fundpress-breadcumb">
                <li> <img src="{{ $artist->countries->flag }}" width="21"> {{ $artist->countries->country }}> </li>
            </ul>
        </div>
    </div>
    
    
</section>
<div style="position: relative; margin: auto;margin-top: -7%;border-radius: 100px;width: 200px;height: 200px;border: 4px solid; border-color:#191818; z-index: 1000; ">
    <img src="/frontend/images/projects/background_perfil.jpg" style="height: 100%; width: 100%;border-radius: inherit;">
</div>

<!--breadcumb end here--><!-- End welcome section -->

<div style="margin-top: 16px; margin-left: 41%;">
  <div class="xs-single-sidebar xs-mb-50">
    <div class="xs-spilit-container">            
        <div class="xs-social-list-wraper">
            <ul class="xs-social-list xs-social-list-v3 fundpress-social-list">
                <li><a {{ $artist->facebook ? "href=".$artist->facebook:''  }}  target="_blank" class="color-facebook xs-box-shadow full-round"><i class="fa fa-facebook" style="color: white"></i></a></li>
                <li><a {{ $artist->wesite_url ? "href=".$artist->website_url:''  }}  target="_blank" class="xs-box-shadow color-google-plus full-round"><i class="fa fa-google-plus" style="color: white"></i></a></li>
                <li><a {{ $artist->instagram ? "href=".$artist->instagram:''  }}  target="_blank" class="xs-box-shadow color-twitter full-round"><i class="fa fa-instagram" style="color: white"></i></a></li>
                <li><a {{ $artist->youtube ? "href=".$artist->youtube:''  }} target="_blank" class="xs-box-shadow color-youtube full-round" style="background-color: #c4302b !important;"><i class="fa fa-youtube" style="color: white"></i></a></li>
            </ul>
        </div>
    </div><!-- xs buttons and social list -->
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="xs-welcome-content">
                <div class="xs-welcome-wraper">
                    <iframe width="560" height="315" 
                    id="videoYoutube"
                    src="https://www.youtube.com/embed/{{$projects[0]->iframe_video}}"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div><!-- .xs-welcome-wraper END -->
        </div><!-- .xs-welcome-content END -->
    </div>
    <div class="col-lg-5 offset-1">
        <div class="xs-welcome-content version-3">
            <div class="xs-welcome-wraper">
                <h3>Sobre mi</h3>
                <p align="justify" style="width: 410px; margin: auto;">
                    {{ $artist->biography }}
                </p>



            </div><!-- .xs-welcome-wraper END -->
        </div><!-- .xs-welcome-content END -->
    </div>
</div>
</div>
<!-- fin biografia-->

<main class="xs-all-content-wrapper">
    <!-- fund details -->
    <section class="xs-content-section-padding xs-fund-details fundpress-fund-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-7">
                    <div class="xs-sync-slider-wraper xs-mb-50">


                        <div class="owl-carousel xs-sync-slider-thumb">
                          {{--   @foreach($project->images as $image) --}}
                          <div class="xs-sync-slider-thumb-content">
                            <img src="{{-- {{ $image->pathAttachment() }} --}}" width="10" alt="" style="height: 74px">
                        </div>
                        {{--   @endforeach --}}
                        <div class="xs-sync-slider-thumb-content">
                            <img src="/frontend//images/fondo_youtube.png" alt="">
                            <div class="xs-sync-slider icon-position-center">
                                <a href=""
                                class="full-round icon-identify-btn blue-btn opacity-btn xs-box-shadow"><i
                                class="fa fa-play"></i></a>
                            </div>
                        </div>

                    </div><!-- xs-sync-slider-thumb -->
                </div><!-- xs-sync-slider-wraper -->

            </div>

        </div>
    </div>
</section>     <!-- End fund details -->

<!-- popular campaigns -->
<section class="waypoint-tigger xs-gray-bg xs-section-padding">
    <div class="container">
   
        <div class="row">
             <main class="xs-all-content-wrapper">
        <!-- blog post details -->
        <div class="xs-blog-details xs-content-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="xs-isotope-grid-wraper">
                            <div class="xs-col-3-isotope-grid" id="projectContainer">
                            </div>
                        </div>
                            <!--=====================================
                             PAGINACIÓN
                             ======================================-->
                              {{ $projects->links() }}

                         </div>


                        <!--=====================================
                        SIDEBAR PROJECTS LATERAL
                        ======================================-->
                        {{-- @include('frontend.partials.sidebar.sidebar_projects') --}}

                    </div>
                </div>
            </div>
        </main>    
           
        </div>
    </div>
</section>     <!-- End popular campaigns -->
</main>
@stop

@push('js')
<script>
    const artist = {!! json_encode($artist) !!};
    const projects = {!! json_encode($projects)!!};
    fnRenderView = function () {
        startCard();
    }
</script>
 <script>         
         const rutaPro = "{{route('projects.artist',"")}}"; 

     </script> 
<script src="/frontend/js/detail.js"></script>   
 <script src="/js/libs/moment-with-locales.min.js"></script>
 <script src="/frontend/js/card_project.js"></script>
 <script src="/frontend/js/projects.js"></script>  

{{-- <script src="/frontend/js/detail.js"></script>    --}}
@endpush