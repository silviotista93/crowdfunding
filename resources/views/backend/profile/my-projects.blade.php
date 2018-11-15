@extends('backend.layout')

@section('header')
    <div class="m-subheader ">
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
                            <span class="m-nav__link-text">{{__('perfil')}} {{ __('artista') }}</span>
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
    </div>
@stop
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                @include('backend.profile.partials.sidebar-profile')
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
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
                                role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab"
                                       href="#m_widget5_tab1_content" role="tab">
                                        {{ __('todos') }}
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content"
                                       role="tab">
                                        {{ __('revision') }}
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab3_content"
                                       role="tab">
                                        {{ __('publicados') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @include('backend.profile.partials.actions-perfil')
                    </div>
                    <div class="m-portlet__body">

                        <!--begin::Content-->
                        <div class="tab-content">
                            <!--=====================================
		                  TODOS LOS PROYECTOS
                            ======================================-->
                            <div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">

                                <!--begin::m-widget5-->
                                <div class="m-widget5">
                                    @forelse($artist->projects as $projects)
                                        @if($projects->status == 1)
                                            <span class="m-badge m-badge--metal m-badge--wide pull-right">{{ __('revision') }}</span>
                                        @elseif($projects->status == 2)
                                            <span class="m-badge m-badge--focus m-badge--wide pull-right">{{ __('pre_aprobado') }}</span>
                                        @elseif($projects->status == 3)
                                            <span class="m-badge m-badge--success m-badge--wide pull-right">{{ __('aprobado') }}</span>
                                        @elseif($projects->status == 4)
                                            <span class="m-badge m-badge--info m-badge--wide pull-right">{{ __('publicado') }}</span>
                                        @else
                                            <span class="m-badge m-badge--danger m-badge--wide pull-right">{{ __('rechazado') }}</span>
                                        @endif
                                        <div class="m-widget5__item">
                                            <div class="m-widget5__content">
                                                <div class="m-widget5__pic">
                                                    <img class="m-widget7__img" src="{{ $projects->pathAttachment() }}"
                                                         alt="">
                                                </div>
                                                <div class="m-widget5__section">
                                                    <h4 class="m-widget5__title">
                                                        {{ str_limit($projects->title,40) }}
                                                    </h4>
                                                    <span class="m-widget5__desc m--font-success"
                                                          style="font-size: 14px">
                                                    {{ $projects->category->category }}
                                                </span>
                                                    <div class="m-widget5__info">
                                                        <span class="m-widget5__author">{{ $projects->short_description }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="m-widget5__content">

                                                <div class="m-widget5__stats1">
                                                    <span class="m-widget5__number">${{ $projects->price }}</span><br>
                                                    <span class="m-widget5__sales">{{ __('meta') }}</span>
                                                </div>
                                                <div class="m-widget5__stats2">
                                                    <span class="m-widget5__number">$0</span><br>
                                                    <span class="m-widget5__votes">{{ __('fondos_recaudados') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h4 class="text-center">{{ __('no_hay_proyectos') }}</h4>
                                    @endforelse
                                </div>

                                <!--end::m-widget5-->
                            </div>
                            <!--=====================================
                           PROYECTOS  PENDIENTES
                           ======================================-->
                            <div class="tab-pane" id="m_widget5_tab2_content" aria-expanded="false">

                                <!--begin::m-widget5-->
                                <div class="m-widget5">
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                     src="../../assets/app/media/img//products/product11.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Branding Mockup
                                                </h4>
                                                <span class="m-widget5__desc">
																	Make Metronic Great Again.Lorem Ipsum Amet
																</span>
                                                <div class="m-widget5__info">
																	<span class="m-widget5__author">
																		Author:
																	</span>
                                                    <span class="m-widget5__info-author m--font-info">
																		Fly themes
																	</span>
                                                    <span class="m-widget5__info-label">
																		Released:
																	</span>
                                                    <span class="m-widget5__info-date m--font-info">
																		23.08.17
																	</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">24,583</span><br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">3809</span><br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                     src="../../assets/app/media/img//products/product6.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Great Logo Designn
                                                </h4>
                                                <span class="m-widget5__desc">
																	Make Metronic Great Again.Lorem Ipsum Amet
																</span>
                                                <div class="m-widget5__info">
																	<span class="m-widget5__author">
																		Author:
																	</span>
                                                    <span class="m-widget5__info-author m--font-info">
																		Fly themes
																	</span>
                                                    <span class="m-widget5__info-label">
																		Released:
																	</span>
                                                    <span class="m-widget5__info-date m--font-info">
																		23.08.17
																	</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">19,200</span><br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1046</span><br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                     src="../../assets/app/media/img//products/product10.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Awesome Mobile App
                                                </h4>
                                                <span class="m-widget5__desc">
																	Make Metronic Great Again.Lorem Ipsum Amet
																</span>
                                                <div class="m-widget5__info">
																	<span class="m-widget5__author">
																		Author:
																	</span>
                                                    <span class="m-widget5__info-author m--font-info">
																		Fly themes
																	</span>
                                                    <span class="m-widget5__info-label">
																		Released:
																	</span>
                                                    <span class="m-widget5__info-date m--font-info">
																		23.08.17
																	</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">10,054</span><br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1103</span><br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end::m-widget5-->
                            </div>
                            <!--=====================================
                           PROYECTOS PUBLICADOS
                           ======================================-->
                            <div class="tab-pane" id="m_widget5_tab3_content" aria-expanded="false">

                                <!--begin::m-widget5-->
                                <div class="m-widget5">
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                     src="../../assets/app/media/img//products/product10.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Branding Mockup
                                                </h4>
                                                <span class="m-widget5__desc">
																	Make Metronic Great Again.Lorem Ipsum Amet
																</span>
                                                <div class="m-widget5__info">
																	<span class="m-widget5__author">
																		Author:
																	</span>
                                                    <span class="m-widget5__info-author m--font-info">
																		Fly themes
																	</span>
                                                    <span class="m-widget5__info-label">
																		Released:
																	</span>
                                                    <span class="m-widget5__info-date m--font-info">
																		23.08.17
																	</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">10.054</span><br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1103</span><br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                     src="../../assets/app/media/img//products/product11.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Great Logo Designn
                                                </h4>
                                                <span class="m-widget5__desc">
																	Make Metronic Great Again.Lorem Ipsum Amet
																</span>
                                                <div class="m-widget5__info">
																	<span class="m-widget5__author">
																		Author:
																	</span>
                                                    <span class="m-widget5__info-author m--font-info">
																		Fly themes
																	</span>
                                                    <span class="m-widget5__info-label">
																		Released:
																	</span>
                                                    <span class="m-widget5__info-date m--font-info">
																		23.08.17
																	</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">24,583</span><br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">3809</span><br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                     src="../../assets/app/media/img//products/product6.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Awesome Mobile App
                                                </h4>
                                                <span class="m-widget5__desc">
																	Make Metronic Great Again.Lorem Ipsum Amet
																</span>
                                                <div class="m-widget5__info">
																	<span class="m-widget5__author">
																		Author:
																	</span>
                                                    <span class="m-widget5__info-author m--font-info">
																		Fly themes
																	</span>
                                                    <span class="m-widget5__info-label">
																		Released:
																	</span>
                                                    <span class="m-widget5__info-date m--font-info">
																		23.08.17
																	</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">19,200</span><br>
                                                <span class="m-widget5__sales">1046</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1046</span><br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end::m-widget5-->
                            </div>
                        </div>

                        <!--end::Content-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
