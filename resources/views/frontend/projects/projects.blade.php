@extends('frontend.layout')

@section('content')
    <!--=====================================
    JUMBOTROM
    ======================================-->
    <section class="xs-inner-welcome-section fundpress-inner-welcome-section fundpress-inner-bg-1 parallax-window"
             data-parallax="scroll"
             style=" background-image: url(/frontend/images/projects/projects_bagraound.jpg);background-position: center;background-attachment: fixed;background-repeat: no-repeat; background-size: cover;">
        <div class="xs-solid-overlay xs-bg-black"></div>
        <div class="container">
            <div class="fundpress-inner-welcome-content">
                @if( isset($category_name))
                    <h2 class="color-white">{{ $category_name->category }}</h2>
                @else
                    <h2 class="color-white">{{ __('proyectos') }}</h2>
                @endif
                <ul class="xs-breadcumb fundpress-breadcumb">
                    <li><a href="{{ route('projects') }}" class="color-white">{{ __('proyectos') }} /</a>{{ __('todos') }}</li>
                </ul>
            </div>
        </div>
    </section>

    <!--=====================================
    LISTA DE PROJECTOS
    ======================================-->
    <main class="xs-all-content-wrapper">
        <!-- blog post details -->
        <div class="xs-blog-details xs-content-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="xs-isotope-grid-wraper">
                            <div class="xs-col-3-isotope-grid">
                                @forelse($projects as $project)

                                    <div class="xs-col-3-isotope-grid-item comics crafts">
                                        <div class="fundpress-grid-item-content xs-mb-30">
                                            <div class="xs-item-header fundpress-item-header">
                                                <img src="{{ $project->pathAttachment() }}" alt="">
                                                <div class="xs-item-header-content">
                                                    <div class="xs-skill-bar">
                                                        <div class="xs-skill-track">
                                                            <p><span class="number-percentage-count number-percentage"
                                                                     data-value="100"
                                                                     data-animation-duration="3500">0</span>%</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .xs-item-header .fundpress-item-header END -->
                                            <div class="xs-item-content fundpress-item-content">
                                                <ul class="xs-simple-tag fundpress-simple-tag">
                                                    <li><a href="">{{ $project->category->category }}</a></li>
                                                </ul>
                                                <a href="{{ route('projects.show',$project->slug) }}"
                                                   class="xs-post-title color-navy-blue fundpress-post-title">{{ str_limit($project->title, 35) }}</a>
                                                <ul class="xs-list-with-content fundpress-list-item-content">
                                                    <li>$15,280<span>Pledged</span></li>
                                                    <li><span class="number-percentage-count number-percentage"
                                                              data-value="100" data-animation-duration="3500">0</span>%
                                                        <span>Funded</span></li>
                                                    <li>50<span>Days to go</span></li>
                                                </ul>
                                                <span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor"></span>
                                                <div class="row xs-margin-0">
                                                    <div class="full-round fundpress-avatar">
                                                        <img src="assets/images/avatar/avatar_1.jpg" alt="">
                                                    </div>
                                                    <div class="xs-avatar-title">
                                                        <a href="#"><span>By</span>Ema Watson</a>
                                                    </div>
                                                </div>
                                            </div><!-- .xs-item-content .fundpress-item-content END -->
                                        </div>
                                    </div>
                                @empty
                                    <h1>No hay proyectos</h1>
                                @endforelse
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
                    @include('frontend.partials.sidebar.sidebar_projects')

                </div>
            </div>
        </div>     <!-- End blog post details -->
    </main>
@stop