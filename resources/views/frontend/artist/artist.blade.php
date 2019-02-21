@extends('frontend.layout')

@section('content')
    <section class="xs-inner-welcome-section fundpress-inner-welcome-section fundpress-inner-bg-1 parallax-window" data-parallax="scroll" data-image-src="assets/images/background/blog-with-sidebar-bg.jpg">
        <div class="xs-solid-overlay xs-bg-black"></div>
        <div class="container">
            <div class="fundpress-inner-welcome-content">
                <h2 class="color-white">{{__('artista')}}</h2>
            </div>
        </div>
    </section>
    <!--breadcumb end here--><!-- End welcome section -->

    <main class="xs-all-content-wrapper" style="margin-bottom: 520px; z-index: 100; position: relative; background-color: rgb(255, 255, 255);">
        <!-- blog post details -->
        <div class="xs-blog-details xs-content-section-padding">
            <div class="container">
                <div class="row">
                     {{-- paso 1 --}}
                    <div class="col-md-12 col-lg-8">
                        <div class="xs-blog-details-wraper">
                            <article class="post format-standard hentry post xs-post-format-standard xs-style-border">
                                <div class="post-body xs-content-padding">
                                    <div class="entry-header row xs-mb-30">
                                        <div class="col-md-2 xs-padding-0">
                                            <div class="post-meta">
                                                <div class="xs-post-meta-date xs-mb-30">
                                                    <span class="post-meta-date xs-navy-blue-bg color-white xs-border-radius"><b>1</b></span>
                                                </div>


                                            </div>
                                        </div><!-- .xs-entry-header-date END -->
                                        <div class="col-md-10 xs-padding-0">
                                            <div class="xs-entry-content entry-content xs-font-alt">
                                                <p class="xs-mb-0" style="text-align: justify">Antes de nada, debes tener muy claro qué es esto del crowdfunding. La financiación colectiva funciona de una determinada manera y muy posiblemente sea factible para tu proyecto, pero no olvides repasar todos sus tips y cerciorarte de que puedes triunfar con este sistema. Así ¿qué es eso del crowdfunding?
                                                    Crowdfunding es el término inglés para referirse a financiación colectiva, es decir, a un grupo de personas apoyando económicamente un proyecto, ni más ni menos. Este sistema trata de ayudar a los artistas desde esta comunidad, ofrecerle herramientas para llegar a ella y que los sueños se puedan hacer realidad. Repasa todos los tips de información que te iremos ofreciendo en la plataforma cuando vayas a crear un nuevo proyecto y cuenta con nosotros para ayudarte en lo que necesites.
                                                   Este es un sistema de financiación que pone en contacto a personas que tienen proyectos con personas que están dispuestas a financiarlos a través de pequeñas y medianas aportaciones. A cambio, el creador entrega a sus mecenas una recompensa concreta.
                                                   
                                                   No te preocupes, sabemos que la primera vez no es nada fácil, por eso a lo largo del proceso de creación y desarrollo de la campaña, el equipo de Apuesto por ti  vamos a estar a tu lado para resolver todas tus dudas, puedes contactarnos en cualquier momento a través de este formulario.
                                                   </p>
                                            </div><!-- .xs-entry-content END -->
                                        </div><!-- .xs-entry-header-content END -->
                                    </div><!-- header end -->

                                </div><!-- post-body end -->
                            </article>
                        </div>
                    </div>
                    {{-- paso 2 --}}

                    <div class="col-md-12 col-lg-8">
                        <div class="xs-blog-details-wraper">
                            <article class="post format-standard hentry post xs-post-format-standard xs-style-border">
                                <div class="post-body xs-content-padding">
                                    <div class="entry-header row xs-mb-30">
                                        <div class="col-md-2 xs-padding-0">
                                            <div class="post-meta">
                                                <div class="xs-post-meta-date xs-mb-30">
                                                    <span class="post-meta-date xs-navy-blue-bg color-white xs-border-radius"><b>2</b></span>
                                                </div>


                                            </div>
                                        </div><!-- .xs-entry-header-date END -->
                                        <div class="col-md-10 xs-padding-0">
                                            <div class="xs-entry-content entry-content xs-font-alt">
                                                <p class="xs-mb-0" style="text-align: justify">
                                                        Lo primero que debes tener entre manos es un proyecto, 
                                                        una idea. si tienes un video mejor que mejor, es imprescindible, 
                                                        y te allanará mucho el camino. En Apuesto por ti admitimos proyectos de música o comedia, 
                                                        estamos abiertos a la creatividad en todas sus facetas,
                                                         pero tu idea debe ser llamativa para la comunidad, esto hará que se alienten a darte apoyo.
                                                   </p>
                                            </div><!-- .xs-entry-content END -->
                                        </div><!-- .xs-entry-header-content END -->
                                    </div><!-- header end -->

                                </div><!-- post-body end -->
                            </article>
                        </div>
                    </div>

                        @include('frontend.artist.partials.sidebar-artist')
                </div>
            </div>
        </div>	<!-- End blog post details -->
    </main>


@stop
