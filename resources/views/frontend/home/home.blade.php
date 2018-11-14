@extends('frontend.layout')
@push('css')
    <link rel="stylesheet" href="/frontend/css/project_home.css">
@endpush
@section('content')
    <!--=====================================
	SLIDER DE INICIIO
    ======================================-->
    <section class="xs-screen-height xs-welcome-section xs-bg fundpress-welcome-section">
        <div class="xs-banner-slider owl-carousel">
            @forelse($projects_slider as $project)
            <div class="xs-banner-slider-item" style="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="xs-welcome-content version-3">
                                <div class="xs-welcome-wraper">
                                    <h2>{{ $project->title }}</h2>
                                    <div class="xs-skill-bar-v2" data-percent="65%">
                                        <div class="xs-skill-track">
                                            <p><span class="number-percentage-count">65</span>%</p>
                                        </div>
                                    </div>
                                    <ul class="fundpress-welcome-list-content list-inline">
                                        <li>$45,280<span class="d-block">{{ __('prometido') }}</span></li>
                                        <li>$87,000<span class="d-block">{{ __('meta') }}</span></li>
                                        <li>119<span class="d-block">{{ __('patrocinadores') }}</span></li>
                                    </ul>
                                    <div class="xs-btn-wraper">
                                        <a href="{{ route('projects.show',$project->slug) }}" class="xs-btn navy-blue-btn round-btn">{{ __('ver_proyecto') }}</a>
                                    </div>
                                </div><!-- .xs-welcome-wraper END -->
                            </div><!-- .xs-welcome-content END -->
                        </div>
                        <div class="col-lg-6">
                            <div class="xs-welcome-content">
                                <div class="xs-welcome-wraper">
                                    {!! $project->iframe_video !!}
                                </div><!-- .xs-welcome-wraper END -->
                            </div><!-- .xs-welcome-content END -->
                        </div>
                    </div>
                </div>
            </div>
                @empty
                @endforelse
        </div>
    </section>
    <!--=====================================
    INFO PATROCINADORES Y ARTISTAS
    ======================================-->
    <section class="xs-full-width-section fundpress-full-width-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-6 xs-padding-0">
                    <div class="fundpress-full-width-wraper-v2"
                         style="background-image: url(/frontend/images/home/artist_info.jpg)">
                        <div class="fundpress-product-hover-content-v2">
                            <div class="fundpress-sub-title">
                                <h2>{{ __('artista') }}</h2>
                            </div>
                            <div class="fundpress-product-text-content">
                                <p>We recently we discovered a major problem – organizing accessories for these Apple
                                    devices while on the road or in our workspace was a major.</p>
                            </div>
                            <div class="xs-btn-wrapre">
                                <a href="#"
                                   class="xs-btn btn xs-box-shadow btn-primary btn-lg round-btn">{{ __('mas_informacion') }}</a>
                            </div>
                        </div><!-- .fundpress-product-hover-content-v2 END -->
                        <div class="xs-solid-overlay xs-bg-black"></div>
                    </div><!-- .fundpress-full-width-wraper-v2 END -->
                </div>
                <div class="col-md-12 col-lg-6 xs-padding-0">
                    <div class="fundpress-full-width-wraper-v2"
                         style="background-image: url(/frontend/images/home/backer_info.jpg)">
                        <div class="fundpress-product-hover-content-v2">
                            <div class="fundpress-sub-title">
                                <h2>{{ __('patrocinador') }}</h2>
                            </div>
                            <div class="fundpress-product-text-content">
                                <p>We recently we discovered a major problem – organizing accessories for these Apple
                                    devices while on the road or in our workspace was a major.</p>
                            </div>
                            <div class="xs-btn-wrapre">
                                <a href="#"
                                   class="xs-btn xs-box-shadow btn btn-primary btn-lg round-btn">{{ __('mas_informacion') }}</a>
                            </div>
                        </div><!-- .fundpress-product-hover-content-v2 END -->
                        <div class="xs-solid-overlay xs-bg-black"></div>
                    </div><!-- .fundpress-full-width-wraper-v2 END -->
                </div>
            </div>
        </div>
    </section>    <!-- End side by side product -->

    <!--=====================================
    PROYECTOS POR CATEGORIAS
    ======================================-->
    <section id="cause-matters" class="waypoint-tigger xs-section-padding">
        <div class="container">
            <div class="xs-section-heading row xs-margin-0">
                <div class="fundpress-heading-title xs-padding-0 col-md-9 col-xl-9">
                    <h2 class="color-navy-blue">Big of small your cause matters</h2>
                    <span class="xs-separetor dashed-separetor fundpress-separetor"></span>
                    <p>Fundpress site thoughtfully designed for real humans which means the best user experience for
                        your entire community of donors, fundraisers, customers, and staff.</p>
                </div><!-- .fundpress-heading-title .xs-col-9 END -->
                <div class="xs-btn-wraper xs-padding-0 col-xl-3 col-md-3 d-flex-center-end">
                    <a href="{{ route('projects') }}" class="xs-btn round-btn navy-blue-btn">{{ __('todos_proyectos') }}</a>
                </div><!-- .xs-btn-wraper .xs-col-3 .d-flex-center-end END -->
            </div><!-- .xs-section-heading .fundpress-section-heading .xs-spilit-container END -->
            <div class="xs-tab-wraper fundpress-tab-wraper">
                <div class="fundpress-tab-nav xs-tab-nav">
                    <ul class="nav nav-tabs" role="tablist" id="categoryProjects">
                        @foreach($categories as $categorie)
                            <li class="nav-item" data-category="{{$categorie->category}}" data-id="{{$categorie->id}}">
                                <a class="nav-link" href="#projectsView{{ $categorie->id }}" role="tab"
                                   data-toggle="tab">{{ $categorie->category }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content" id="dataCategory">
                    @foreach($categories as $categorie)
                        <div role="tabpanel" class="tab-pane fade in" id="projectsView{{$categorie->id}}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>    <!-- End cause matters -->

    <!-- square service -->
    <section class="xs-navy-blue-bg fundpress-square-service-section">
        <div class="container">
            <div class="fundpress-section-heading fundpress-heading-title fundpress-heading-title-v2 content-left">
                <h2 class="color-white">Asking for money is hard. FundPress makes it easier. </h2>
            </div><!-- .xs-heading-title .fundpress-heading-title-v2 .fundpress-heading-title END -->
            <div class="row">
                <div class="col-md-6 col-sm-12 col-lg-3">
                    <div class="fundpress-icon-with-square-service">
                        <img src="/images/icon-1.png" alt="">
                        <a href="#" class="color-white">Free & Simple Setup. </a>
                        <p>Start fundraising in minutes. No goal requirements, no deadlines. </p>
                    </div><!-- .fundpress-icon-with-square-service END -->
                </div>
                <div class="col-md-6 col-sm-12 col-lg-3">
                    <div class="fundpress-icon-with-square-service">
                        <img src="/images/icon-2.png" alt="">
                        <a href="#" class="color-white">Most Money Raised.</a>
                        <p>Join the millions who have raised more than $2 billion on FundPress.</p>
                    </div><!-- .fundpress-icon-with-square-service END -->
                </div>
                <div class="col-md-6 col-sm-12 col-lg-3">
                    <div class="fundpress-icon-with-square-service">
                        <img src="/images/icon-3.png" alt="">
                        <a href="#" class="color-white">Expert Advice, 24/7.</a>
                        <p>Our campaign coaches will answer your questions in 5 minutes, day or night.</p>
                    </div><!-- .fundpress-icon-with-square-service END -->
                </div>
                <div class="col-md-6 col-sm-12 col-lg-3">
                    <div class="fundpress-icon-with-square-service">
                        <img src="/images/icon-4.png" alt="">
                        <a href="#" class="color-white">Safety. Guaranteed.</a>
                        <p>The GoFundMe Guarantee protects your donations and supporters. </p>
                    </div><!-- .fundpress-icon-with-square-service END -->
                </div>
            </div>
        </div>
        <div class="xs-shape-background">
            <div class="xs-waves">
                <div class="xs-wave xs-wave_1"></div>
                <div class="xs-wave xs-wave_2"></div>
                <div class="xs-wave xs-wave_3"></div>
                <div class="xs-wave xs-wave_4"></div>
                <div class="xs-wave xs-wave_5"></div>
            </div>
        </div>
    </section>    <!-- End square service -->

    <!-- popular campaigns -->
    <section id="popular-campaigns" class="xs-gray-bg waypoint-tigger xs-section-padding">
        <div class="container">
            <div class="xs-section-heading row xs-margin-0">
                <div class="fundpress-heading-title xs-padding-0 col-xl-9 col-md-9">
                    <h2 class="color-navy-blue">Popular Campaigns</h2>
                    <span class="xs-separetor dashed-separetor fundpress-separetor"></span>
                    <p>FundPress has built a platform focused on aiding entrepreneurs, startups, and companies raise
                        capital from anyone.</p>
                </div><!-- .xs-heading-title .fundpress-heading-title .xs-col-9 END -->
                <div class="xs-btn-wraper xs-padding-0 col-xl-3 col-md-3 d-flex-center-end">
                    <a href="#" class="xs-btn round-btn navy-blue-btn">all Campaigns</a>
                </div><!-- .xs-btn-wraper .xs-col-3 .d-flex-center-end END -->
            </div><!-- .xs-section-heading .fundpress-section-heading .xs-spilit-container END -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="xs-box-shadow fundpress-popular-item xs-bg-white">
                        <div class="fundpress-item-header">
                            <img src="/images/campaigns/campaigns-1.jpg" alt="">
                            <div class="xs-item-header-content">
                                <div class="xs-skill-bar">
                                    <div class="xs-skill-track">
                                        <p><span class="number-percentage-count number-percentage" data-value="90"
                                                 data-animation-duration="3500">0</span>%</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .xs-item-header .fundpress-item-header END -->
                        <div class="fundpress-item-content xs-content-padding bg-color-white">
                            <ul class="xs-simple-tag fundpress-simple-tag">
                                <li><a href="">Technology</a></li>
                            </ul>
                            <a href="#" class="d-block color-navy-blue fundpress-post-title">Splash Drone 3 a Fully
                                Waterproof Drone that floats</a>
                            <ul class="xs-list-with-content fundpress-list-item-content">
                                <li>$67,000<span>Pledged</span></li>
                                <li><span class="number-percentage-count number-percentage" data-value="90"
                                          data-animation-duration="3500">0</span>% <span>Funded</span></li>
                                <li>3<span>Days to go</span></li>
                            </ul>
                            <span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor"></span>
                            <div class="row xs-margin-0">
                                <div class="full-round fundpress-avatar">
                                    <img src="/images/avatar/avatar_1.jpg" alt="">
                                </div>
                                <div class="xs-avatar-title">
                                    <a href="#"><span>By</span>Ema Watson</a>
                                </div>
                            </div>
                        </div><!-- .fundpress-item-content END -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="xs-box-shadow fundpress-popular-item xs-bg-white">
                        <div class="fundpress-item-header">
                            <img src="/images/campaigns/campaigns-2.jpg" alt="">
                            <div class="xs-item-header-content">
                                <div class="xs-skill-bar">
                                    <div class="xs-skill-track">
                                        <p><span class="number-percentage-count number-percentage" data-value="59"
                                                 data-animation-duration="3500">0</span>%</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .xs-item-header .fundpress-item-header END -->
                        <div class="fundpress-item-content xs-content-padding bg-color-white">
                            <ul class="xs-simple-tag fundpress-simple-tag">
                                <li><a href="">Charity</a></li>
                            </ul>
                            <a href="#" class="d-block color-navy-blue fundpress-post-title">The Read Read: Braille
                                Literacy Tool for the Blind</a>
                            <ul class="xs-list-with-content fundpress-list-item-content">
                                <li>$33,600<span>Pledged</span></li>
                                <li><span class="number-percentage-count number-percentage" data-value="59"
                                          data-animation-duration="3500">0</span>% <span>Funded</span></li>
                                <li>10<span>Days to go</span></li>
                            </ul>
                            <span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor"></span>
                            <div class="row xs-margin-0">
                                <div class="full-round fundpress-avatar">
                                    <img src="/images/avatar/avatar_2.jpg" alt="">
                                </div>
                                <div class="xs-avatar-title">
                                    <a href="#"><span>By</span>Kene Williamson</a>
                                </div>
                            </div>
                        </div><!-- .fundpress-item-content END -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="xs-box-shadow fundpress-popular-item xs-bg-white">
                        <div class="fundpress-item-header">
                            <img src="/images/campaigns/campaigns-3.jpg" alt="">
                            <div class="xs-item-header-content">
                                <div class="xs-skill-bar">
                                    <div class="xs-skill-track">
                                        <p><span class="number-percentage-count number-percentage" data-value="35"
                                                 data-animation-duration="3500">0</span>%</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .xs-item-header .fundpress-item-header END -->
                        <div class="fundpress-item-content xs-content-padding bg-color-white">
                            <ul class="xs-simple-tag fundpress-simple-tag">
                                <li><a href="">Funding</a></li>
                                <li><a href="">Charity</a></li>
                            </ul>
                            <a href="#" class="d-block color-navy-blue fundpress-post-title">BuildOne: $99 3D Printer w/
                                WiFi and Auto Bed Leveling!</a>
                            <ul class="xs-list-with-content fundpress-list-item-content">
                                <li>$12,760<span>Pledged</span></li>
                                <li><span class="number-percentage-count number-percentage" data-value="35"
                                          data-animation-duration="3500">0</span>% <span>Funded</span></li>
                                <li>66<span>Days to go</span></li>
                            </ul>
                            <span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor"></span>
                            <div class="row xs-margin-0">
                                <div class="full-round fundpress-avatar">
                                    <img src="/images/avatar/avatar_3.jpg" alt="">
                                </div>
                                <div class="xs-avatar-title">
                                    <a href="#"><span>By</span>Leo Baddabes</a>
                                </div>
                            </div>
                        </div><!-- .fundpress-item-content END -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="xs-box-shadow fundpress-popular-item xs-bg-white">
                        <div class="fundpress-item-header">
                            <img src="/images/campaigns/campaigns-4.jpg" alt="">
                            <div class="xs-item-header-content">
                                <div class="xs-skill-bar">
                                    <div class="xs-skill-track">
                                        <p><span class="number-percentage-count number-percentage" data-value="85"
                                                 data-animation-duration="3500">0</span>%</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .xs-item-header .fundpress-item-header END -->
                        <div class="fundpress-item-content xs-content-padding bg-color-white">
                            <ul class="xs-simple-tag fundpress-simple-tag">
                                <li><a href="">Games</a></li>
                                <li><a href="">Technology</a></li>
                            </ul>
                            <a href="#" class="d-block color-navy-blue fundpress-post-title">DACBerry PRO – Professional
                                Soundcard for Raspberry Pi</a>
                            <ul class="xs-list-with-content fundpress-list-item-content">
                                <li>$99,980<span>Pledged</span></li>
                                <li><span class="number-percentage-count number-percentage" data-value="85"
                                          data-animation-duration="3500">0</span>% <span>Funded</span></li>
                                <li>2<span>Days to go</span></li>
                            </ul>
                            <span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor"></span>
                            <div class="row xs-margin-0">
                                <div class="full-round fundpress-avatar">
                                    <img src="/images/avatar/avatar_4.jpg" alt="">
                                </div>
                                <div class="xs-avatar-title">
                                    <a href="#"><span>By</span>Jhung Li</a>
                                </div>
                            </div>
                        </div><!-- .fundpress-item-content END -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="xs-box-shadow fundpress-popular-item xs-bg-white">
                        <div class="fundpress-item-header">
                            <img src="/images/campaigns/campaigns-5.jpg" alt="">
                            <div class="xs-item-header-content">
                                <div class="xs-skill-bar">
                                    <div class="xs-skill-track">
                                        <p><span class="number-percentage-count number-percentage" data-value="74"
                                                 data-animation-duration="3500">0</span>%</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .xs-item-header .fundpress-item-header END -->
                        <div class="fundpress-item-content xs-content-padding bg-color-white">
                            <ul class="xs-simple-tag fundpress-simple-tag">
                                <li><a href="">Charity</a></li>
                            </ul>
                            <a href="#" class="d-block color-navy-blue fundpress-post-title">BIKI: First Bionic Wireless
                                Under water Fish Drone</a>
                            <ul class="xs-list-with-content fundpress-list-item-content">
                                <li>$40,000<span>Pledged</span></li>
                                <li><span class="number-percentage-count number-percentage" data-value="74"
                                          data-animation-duration="3500">0</span>% <span>Funded</span></li>
                                <li>70<span>Days to go</span></li>
                            </ul>
                            <span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor"></span>
                            <div class="row xs-margin-0">
                                <div class="full-round fundpress-avatar">
                                    <img src="/images/avatar/avatar_5.jpg" alt="">
                                </div>
                                <div class="xs-avatar-title">
                                    <a href="#"><span>By</span>Chirstina Perry</a>
                                </div>
                            </div>
                        </div><!-- .fundpress-item-content END -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="xs-box-shadow fundpress-popular-item xs-bg-white">
                        <div class="fundpress-item-header">
                            <img src="/images/campaigns/campaigns-6.jpg" alt="">
                            <div class="xs-item-header-content">
                                <div class="xs-skill-bar">
                                    <div class="xs-skill-track">
                                        <p><span class="number-percentage-count number-percentage" data-value="90"
                                                 data-animation-duration="3500">0</span>%</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .xs-item-header .fundpress-item-header END -->
                        <div class="fundpress-item-content xs-content-padding bg-color-white">
                            <ul class="xs-simple-tag fundpress-simple-tag">
                                <li><a href="">Charity</a></li>
                            </ul>
                            <a href="#" class="d-block color-navy-blue fundpress-post-title">Brilliant After All, A New
                                Album by Rebecca: Help poor people</a>
                            <ul class="xs-list-with-content fundpress-list-item-content">
                                <li>$98,900<span>Pledged</span></li>
                                <li><span class="number-percentage-count number-percentage" data-value="85"
                                          data-animation-duration="3500">0</span>% <span>Funded</span></li>
                                <li>2<span>Days to go</span></li>
                            </ul>
                            <span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor"></span>
                            <div class="row xs-margin-0">
                                <div class="full-round fundpress-avatar">
                                    <img src="/images/avatar/avatar_6.jpg" alt="">
                                </div>
                                <div class="xs-avatar-title">
                                    <a href="#"><span>By</span>Prekina William</a>
                                </div>
                            </div>
                        </div><!-- .fundpress-item-content END -->
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- End popular campaigns -->


    <section class="xs-bg fundpress-event-section xs-section-padding"
             style="background-image: url(/images/icons-background-1.png);">
        <div class="container">
            <div class="xs-section-heading row xs-margin-0">
                <div class="fundpress-heading-title xs-padding-0 col-md-9 col-xl-9">
                    <h2 class="color-navy-blue">You can join in Special Events</h2>
                    <span class="xs-separetor dashed-separetor fundpress-separetor"></span>
                    <p>This equity FundPress platform allows businesses to sell shares in their company to accredited
                        investors.</p>
                </div><!-- .xs-heading-title .fundpress-heading-title .xs-col-9 END -->
                <div class="xs-btn-wraper xs-padding-0 col-md-3 col-xl-3 d-flex-center-end">
                    <a href="events.html" class="xs-btn round-btn navy-blue-btn">Events</a>
                </div><!-- .xs-btn-wraper .d-flex-center-end .xs-col-3 END -->
            </div><!-- .xs-section-heading .fundpress-section-heading .xs-spilit-container END -->
            <div class="fundpress-event-wraper">
                <div class="fundpress-single-event-wraper row">
                    <div class="col-md-3">
                        <div class="fundpress-event-image">
                            <img src="/images/event/event-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 fundpress-event-details">
                        <h3 class="color-white xs-post-title fundpress-post-title">Using HRV and CorSense to Otimize
                            Training.</h3>
                        <p>In a time of overwhelming emotions, sadness, and pain, the last thing the families need to be
                            worrying obligations associated with this tragic.</p>
                        <div class="countdown-container xs-countdown-timer" data-countdown="2019/01/01"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="fundpress-btn-wraper">
                            <a href="#" class="xs-btn round-btn green-btn">subscribe</a>
                        </div>
                    </div>
                </div><!-- .fundpress-single-event-wraper END -->
                <div class="fundpress-single-event-wraper row">
                    <div class="col-md-3">
                        <div class="fundpress-event-image">
                            <img src="/images/event/event-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 fundpress-event-details">
                        <h3 class="color-white xs-post-title fundpress-post-title">Otimize Training & Recovery Using
                            HRV</h3>
                        <p>In a time of overwhelming emotions, sadness, and pain, the last thing the families need to be
                            worrying obligations associated with this tragic.</p>
                        <div class="countdown-container xs-countdown-timer" data-countdown="2020/01/01"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="fundpress-btn-wraper">
                            <a href="#" class="xs-btn round-btn green-btn">subscribe</a>
                        </div>
                    </div>
                </div><!-- .fundpress-single-event-wraper END -->
            </div>
        </div>
    </section>    <!-- End event section -->

    <!-- journal section -->
    <section class="xs-gray-bg fundpress-journal-section xs-section-padding">
        <div class="container">
            <div class="xs-section-heading row xs-margin-0">
                <div class="fundpress-heading-title xs-padding-0 col-md-9 col-xl-9">
                    <h2 class="color-navy-blue">From the Journal</h2>
                    <span class="xs-separetor dashed-separetor fundpress-separetor"></span>
                    <p>It allows you to gather monthly subscriptions from fans to help fund your creative projects. They
                        also encourage their users to offer rewards to fans as a way to repay them for their
                        support.</p>
                </div><!-- .xs-heading-title .fundpress-heading-title .xs-col-9 END -->
                <div class="xs-btn-wraper xs-padding-0 col-xl-3 col-md-3 d-flex-center-end">
                    <a href="news-feed.html" class="xs-btn round-btn navy-blue-btn">Blog</a>
                </div><!-- .xs-btn-wraper .d-flex-center-end .xs-col-3 END -->
            </div><!-- .xs-section-heading .fundpress-section-heading .xs-spilit-container END -->
            <div class="row">
                <div class="col-md-6 col-sm-12 col-lg-4">
                    <div class="fundpress-grid-item-content xs-box-shadow fundpress-from-journal">
                        <div class="xs-item-header fundpress-item-header entry-thumbnail">
                            <img src="/images/journal/journal-1.jpg" alt="">
                            <div class="xs-item-header-content">
                                <a href="#" class="full-round icon-identify-btn green-btn"><i
                                            class="fa fa-play"></i></a>
                            </div>
                        </div><!-- .xs-item-header .fundpress-item-header END -->
                        <div class="fundpress-item-content xs-content-padding bg-color-white">
                            <div class="entry-header xs-mb-30">
                                <div class="post-author">
                                    <ul class="xs-simple-tag xs-simple-tag-v2 fundpress-simple-tag author-links">
                                        <li><span>By</span><a href="#" rel="author">Rose</a></li>
                                    </ul>
                                </div>
                                <h4 class="entry-title">
                                    <a href="#" class="xs-mb-0 xs-post-title color-navy-blue fundpress-post-title">Professional
                                        Soundcard</a>
                                </h4>
                                <p>Founded by berlin’s clubcommissioner alongside amsterdam’s with nightori mayor, the
                                    creative footprint.</p>
                            </div>

                            <span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor xs-mb-20"></span>

                            <div class="entry-content xs-spilit-container xs-footer-content">
                                <div class="xs-col-6 text-left">
								<span class="date">
									<a href="" title="" rel="bookmark">
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<span class="entry-date xs-entry-date">March 15, 2018</span>
									</a>
								</span>
                                </div>
                                <div class="xs-col-6 text-right">
								<span class="categories-links">
									<a href="#"
                                                class="xs-blog-meta-tag green-bg bold color-white xs-border-radius"
                                                rel="category tag">Project</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-4">
                    <div class="fundpress-grid-item-content xs-box-shadow fundpress-from-journal">
                        <div class="xs-item-header fundpress-item-header entry-thumbnail">
                            <img src="/images/journal/journal-2.jpg" alt="">
                            <div class="xs-item-header-content">
                                <a href="#" class="full-round icon-identify-btn green-btn"><i
                                            class="fa fa-image"></i></a>
                            </div>
                        </div><!-- .xs-item-header .fundpress-item-header END -->
                        <div class="fundpress-item-content xs-content-padding bg-color-white">
                            <div class="entry-header xs-mb-30">
                                <div class="post-author">
                                    <ul class="xs-simple-tag xs-simple-tag-v2 fundpress-simple-tag author-links">
                                        <li><span>By</span><a href="#" rel="author">Rose</a></li>
                                    </ul>
                                </div>
                                <h4 class="entry-title">
                                    <a href="#" class="xs-mb-0 xs-post-title color-navy-blue fundpress-post-title">A New
                                        Album by Rebecca</a>
                                </h4>
                                <p>Founded by berlin’s clubcommissioner alongside amsterdam’s with nightori mayor, the
                                    creative footprint.</p>
                            </div>

                            <span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor xs-mb-20"></span>

                            <div class="entry-content xs-spilit-container xs-footer-content">
                                <div class="xs-col-6 text-left">
								<span class="date">
									<a href="" title="" rel="bookmark">
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<span class="entry-date xs-entry-date">March 15, 2018</span>
									</a>
								</span>
                                </div>
                                <div class="xs-col-6 text-right">
								<span class="categories-links">
									<a href="#"
                                                class="xs-blog-meta-tag green-bg bold color-white xs-border-radius"
                                                rel="category tag">Adoption</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-4">
                    <div class="fundpress-grid-item-content xs-box-shadow fundpress-from-journal">
                        <div class="xs-item-header fundpress-item-header entry-thumbnail">
                            <img src="/images/journal/journal-3.jpg" alt="">
                            <div class="xs-item-header-content">
                                <a href="#" class="full-round icon-identify-btn green-btn"><i
                                            class="fa fa-video-camera"></i></a>
                            </div>
                        </div><!-- .xs-item-header .fundpress-item-header END -->
                        <div class="fundpress-item-content xs-content-padding bg-color-white">
                            <div class="entry-header xs-mb-30">
                                <div class="post-author">
                                    <ul class="xs-simple-tag xs-simple-tag-v2 fundpress-simple-tag author-links">
                                        <li><span>By</span><a href="#" rel="author">Rose</a></li>
                                    </ul>
                                </div>
                                <h4 class="entry-title">
                                    <a href="#" class="xs-mb-0 xs-post-title color-navy-blue fundpress-post-title">First
                                        Bionic Wireless</a>
                                </h4>
                                <p>Founded by berlin’s clubcommissioner alongside amsterdam’s with nightori mayor, the
                                    creative footprint.</p>
                            </div>

                            <span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor xs-mb-20"></span>

                            <div class="entry-content xs-spilit-container xs-footer-content">
                                <div class="xs-col-6 text-left">
								<span class="date">
									<a href="" title="" rel="bookmark">
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<span class="entry-date xs-entry-date">March 15, 2018</span>
									</a>
								</span>
                                </div>
                                <div class="xs-col-6 text-right">
								<span class="categories-links">
									<a href="#"
                                                class="xs-blog-meta-tag green-bg bold color-white xs-border-radius"
                                                rel="category tag">Film</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- End journal section -->

    <!-- sponsor section -->
    <section class="xs-bg xs-section-padding fundpress-sponsor-section"
             style="background-image: url(/images/background/sponsor_section_bg.jpg);">
        <div class="xs-solid-overlay xs-bg-white"></div>
        <div class="container fundpress-partners-wraper">
            <div class="fundpress-heading-title">
                <h2 class="color-navy-blue xs-mb-0">Trusted by the biggest nonprofits, companies in the world.</h2>
            </div><!-- .xs-heading-title .fundpress-heading-title END -->
            <div class="content-center">
                <ul class="fundpress-partners">
                    <li><a href="#" class="full-round fundpress-single-partner"><img src="/images/partner/partner-1.png"
                                                                                     alt=""></a></li>
                    <li><a href="#" class="full-round fundpress-single-partner"><img src="/images/partner/partner-2.png"
                                                                                     alt=""></a></li>
                    <li><a href="#" class="full-round fundpress-single-partner"><img src="/images/partner/partner-3.png"
                                                                                     alt=""></a></li>
                    <li><a href="#" class="full-round fundpress-single-partner"><img src="/images/partner/partner-4.png"
                                                                                     alt=""></a></li>
                </ul><!-- .fundpress-partners END -->
            </div>
            <div class="content-center">
                <ul class="fundpress-partners">
                    <li><a href="#" class="full-round fundpress-single-partner"><img src="/images/partner/partner-5.png"
                                                                                     alt=""></a></li>
                    <li><a href="#" class="full-round fundpress-single-partner"><img src="/images/partner/partner-6.png"
                                                                                     alt=""></a></li>
                    <li><a href="#" class="full-round fundpress-single-partner"><img src="/images/partner/partner-7.png"
                                                                                     alt=""></a></li>
                    <li><a href="#" class="full-round fundpress-single-partner"><img src="/images/partner/partner-8.png"
                                                                                     alt=""></a></li>
                    <li><a href="#" class="full-round fundpress-single-partner"><img src="/images/partner/partner-9.png"
                                                                                     alt=""></a></li>
                </ul><!-- .fundpress-partners END -->
            </div>
        </div>
    </section>    <!-- End sponsor section -->
@stop

@push('js')
    <script src="/js/libs/moment-with-locales.min.js"></script>
    <script src="/frontend/js/projects_home.js"></script>
@endpush