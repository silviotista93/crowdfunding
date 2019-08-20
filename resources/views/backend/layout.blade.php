<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{session("applocale")}}">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>{{config('app.name')}} | {{ auth()->user()->name }}</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="/backend/vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="/backend/vendors/tether/dist/css/tether.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="/backend/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="/backend/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="/backend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet"
          type="text/css"/>
    <link href="/backend/vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="/backend/build/css/intlTelInput.css">
    <link rel="stylesheet" href="/backend/build/css/demo.css">
    <link href="/backend/vendors/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/select2/dist/css/select2.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/summernote/dist/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/animate.css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/toastr/build/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/morris.js/morris.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/vendors/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css"/>

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles -->
    <link href="/backend/assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/assets/css/backend.css" rel="stylesheet" type="text/css"/>

    <!--RTL version:<link href="assets/demo/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->

    <!--begin::Page Vendors Styles -->
    <link href="/backend/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/backend/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />


    <!--RTL version:<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Page Vendors Styles -->
    {{--<link rel="shortcut icon" href="/backend/assets/demo/media/img/logo/favicon.ico"/>--}}
    @stack('css')
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default m-brand--minimize m-aside-left--minimize">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- BEGIN: Header -->
    <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">

                <!-- BEGIN: Brand -->
                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="index.html" class="m-brand__logo-wrapper">
                                {{--<h4 style="color: white">{{ config('app.name') }}</h4>--}}
                                <h4 style="color: white;width: 170px;">Apuesto por ti</h4>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">

                            <!-- BEGIN: Left Aside Minimize Toggle -->
                            <a href="javascript:;" id="m_aside_left_minimize_toggle"
                               class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block m-brand__toggler--active">
                                <span></span>
                            </a>

                            <!-- END -->

                            <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                               class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block m-brand__toggler--active">
                                <span></span>
                            </a>

                            <!-- END -->

                            <!-- BEGIN: Responsive Header Menu Toggler -->
                            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>

                            <!-- END -->

                            <!-- BEGIN: Topbar Toggler -->
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>

                            <!-- BEGIN: Topbar Toggler -->
                        </div>
                    </div>
                </div>

                <!-- END: Brand -->
                @include('backend.partials.navigation')
            </div>
        </div>
    </header>

    <!-- END: Header -->

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
                    class="la la-close"></i></button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

            <!--=====================================
		  NAVEGACION
            ======================================-->
            @include('backend.partials.menu_navigation')

        </div>
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <div class="m-subheader ">
                @if($errors->any())

                    <ul class="list-group">

                        @foreach($errors->all() as $error)
                            <div class="container">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Oh!</strong> {{$error}}
                                </div>
                            </div>

                        @endforeach

                    </ul>

                @endif
                @if(session()->has('eliminar'))
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            <strong>Oh!</strong> {{session('eliminar')}}
                        </div>
                    </div>

                @endif
                @yield('header')
            </div>
            @yield('content')
        </div>
    </div>
    <!-- end:: Body -->

    <!-- begin::Footer -->
    <footer class="m-grid__item		m-footer ">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2019 &copy; Crowdfunding  by <a href="" class="m-link">Crowdfunding</a>
							</span>
                </div>
                <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                    <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">{{ __('nosotros') }}</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">{{ __('privacidad') }}</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">{{ __('documentacion') }}</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">{{ __('ayuda') }}</span>
                            </a>
                        </li>
                        <li class="m-nav__item m-nav__item">
                            <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="{{ __('soporte') }}"
                               data-placement="left">
                                <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- end::Footer -->
</div>

<!-- end:: Page -->

<!-- begin::Quick Sidebar -->
<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
    <div class="m-quick-sidebar__content m--hide">
        <span id="m_quick_sidebar_close" class="m-quick-sidebar__close"><i class="la la-close"></i></span>
        <ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger"
                   role="tab">Messages</a>
            </li>
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_settings" role="tab">Settings</a>
            </li>
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_logs" role="tab">Logs</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                    <div class="m-messenger__messages m-scrollable">
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--in">
                                <div class="m-messenger__message-pic">
                                    <img src="/backend/assets/app/media/img//users/user3.jpg" alt=""/>
                                </div>
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-username">
                                            Megan wrote
                                        </div>
                                        <div class="m-messenger__message-text">
                                            Hi Bob. What time will be the meeting ?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--out">
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-text">
                                            Hi Megan. It's at 2.30PM
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--in">
                                <div class="m-messenger__message-pic">
                                    <img src="/backend/assets/app/media/img//users/user3.jpg" alt=""/>
                                </div>
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-username">
                                            Megan wrote
                                        </div>
                                        <div class="m-messenger__message-text">
                                            Will the development team be joining ?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--out">
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-text">
                                            Yes sure. I invited them as well
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__datetime">2:30PM</div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--in">
                                <div class="m-messenger__message-pic">
                                    <img src="/backend/assets/app/media/img//users/user3.jpg" alt=""/>
                                </div>
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-username">
                                            Megan wrote
                                        </div>
                                        <div class="m-messenger__message-text">
                                            Noted. For the Coca-Cola Mobile App project as well ?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--out">
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-text">
                                            Yes, sure.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--out">
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-text">
                                            Please also prepare the quotation for the Loop CRM project as well.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__datetime">3:15PM</div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--in">
                                <div class="m-messenger__message-no-pic m--bg-fill-danger">
                                    <span>M</span>
                                </div>
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-username">
                                            Megan wrote
                                        </div>
                                        <div class="m-messenger__message-text">
                                            Noted. I will prepare it.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--out">
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-text">
                                            Thanks Megan. I will see you later.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--in">
                                <div class="m-messenger__message-pic">
                                    <img src="/backend/assets/app/media/img//users/user3.jpg" alt=""/>
                                </div>
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-username">
                                            Megan wrote
                                        </div>
                                        <div class="m-messenger__message-text">
                                            Sure. See you in the meeting soon.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-messenger__seperator"></div>
                    <div class="m-messenger__form">
                        <div class="m-messenger__form-controls">
                            <input type="text" name="" placeholder="Type here..." class="m-messenger__form-input">
                        </div>
                        <div class="m-messenger__form-tools">
                            <a href="" class="m-messenger__form-attachment">
                                <i class="la la-paperclip"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="m_quick_sidebar_tabs_settings" role="tabpanel">
                <div class="m-list-settings m-scrollable">
                    <div class="m-list-settings__group">
                        <div class="m-list-settings__heading">General Settings</div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Email Notifications</span>
                            <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Site Tracking</span>
                            <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">SMS Alerts</span>
                            <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Backup Storage</span>
                            <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Audit Logs</span>
                            <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
                        </div>
                    </div>
                    <div class="m-list-settings__group">
                        <div class="m-list-settings__heading">System Settings</div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">System Logs</span>
                            <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Error Reporting</span>
                            <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Applications Logs</span>
                            <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Backup Servers</span>
                            <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Audit Logs</span>
                            <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="m_quick_sidebar_tabs_logs" role="tabpanel">
                <div class="m-list-timeline m-scrollable">
                    <div class="m-list-timeline__group">
                        <div class="m-list-timeline__heading">
                            System Logs
                        </div>
                        <div class="m-list-timeline__items">
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">12 new users registered <span
                                            class="m-badge m-badge--warning m-badge--wide">important</span></a>
                                <span class="m-list-timeline__time">Just now</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">System shutdown</a>
                                <span class="m-list-timeline__time">11 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                <a href="" class="m-list-timeline__text">New invoice received</a>
                                <span class="m-list-timeline__time">20 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                <a href="" class="m-list-timeline__text">Database overloaded 89% <span
                                            class="m-badge m-badge--success m-badge--wide">resolved</span></a>
                                <span class="m-list-timeline__time">1 hr</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">System error</a>
                                <span class="m-list-timeline__time">2 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">Production server down <span
                                            class="m-badge m-badge--danger m-badge--wide">pending</span></a>
                                <span class="m-list-timeline__time">3 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">Production server up</a>
                                <span class="m-list-timeline__time">5 hrs</span>
                            </div>
                        </div>
                    </div>
                    <div class="m-list-timeline__group">
                        <div class="m-list-timeline__heading">
                            Applications Logs
                        </div>
                        <div class="m-list-timeline__items">
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">New order received <span
                                            class="m-badge m-badge--info m-badge--wide">urgent</span></a>
                                <span class="m-list-timeline__time">7 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">12 new users registered</a>
                                <span class="m-list-timeline__time">Just now</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">System shutdown</a>
                                <span class="m-list-timeline__time">11 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                <a href="" class="m-list-timeline__text">New invoices received</a>
                                <span class="m-list-timeline__time">20 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                <a href="" class="m-list-timeline__text">Database overloaded 89%</a>
                                <span class="m-list-timeline__time">1 hr</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">System error <span
                                            class="m-badge m-badge--info m-badge--wide">pending</span></a>
                                <span class="m-list-timeline__time">2 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">Production server down</a>
                                <span class="m-list-timeline__time">3 hrs</span>
                            </div>
                        </div>
                    </div>
                    <div class="m-list-timeline__group">
                        <div class="m-list-timeline__heading">
                            Server Logs
                        </div>
                        <div class="m-list-timeline__items">
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">Production server up</a>
                                <span class="m-list-timeline__time">5 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">New order received</a>
                                <span class="m-list-timeline__time">7 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">12 new users registered</a>
                                <span class="m-list-timeline__time">Just now</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">System shutdown</a>
                                <span class="m-list-timeline__time">11 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                <a href="" class="m-list-timeline__text">New invoice received</a>
                                <span class="m-list-timeline__time">20 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                <a href="" class="m-list-timeline__text">Database overloaded 89%</a>
                                <span class="m-list-timeline__time">1 hr</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">System error</a>
                                <span class="m-list-timeline__time">2 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">Production server down</a>
                                <span class="m-list-timeline__time">3 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">Production server up</a>
                                <span class="m-list-timeline__time">5 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">New order received</a>
                                <span class="m-list-timeline__time">1117 hrs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end::Quick Sidebar -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<!-- end::Scroll Top -->

<!-- begin::Quick Nav -->
<ul class="m-nav-sticky" style="margin-top: 30px;">
    {{--<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes"
           target="_blank"><i class="la la-cart-arrow-down"></i></a>
    </li>--}}
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="{{ __('documentacion') }}" data-placement="left">
        <a href="" target="_blank"><i class="la la-code-fork"></i></a>
    </li>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="{{ __('soporte') }}" data-placement="left">
        <a href="" target="_blank"><i class="la la-life-ring"></i></a>
    </li>
</ul>

<!-- begin::Quick Nav -->
<script src="/js/common.js"></script>
<script>
const lang = "{{ session("applocale") }}";
</script>
<!--begin:: Global Mandatory Vendors -->
<meta name="_token" content="{!! csrf_token() !!}"/>
<script src="/backend/vendors/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="/backend/vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="/backend//vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/backend/vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="/js/libs/moment-with-locales.min.js" type="text/javascript"></script>
<script src="/backend/vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="/backend/vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="/backend/vendors/wnumb/wNumb.js" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="/backend/vendors/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="/backend/vendors/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="/backend/vendors/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="/backend/vendors/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="/backend/vendors/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="/backend/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/backend/vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js"
        type="text/javascript"></script>
<script src="/backend/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"
        type="text/javascript"></script>
<script src="/backend/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="/backend/vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js"
        type="text/javascript"></script>
<script src="/backend/vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="/backend/vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js"
        type="text/javascript"></script>
<script src="/backend/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="/backend/vendors/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="/backend/vendors/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="/backend/vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js"
        type="text/javascript"></script>
<script src="/backend/vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js"
        type="text/javascript"></script>
<script src="/backend/vendors/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="/backend/vendors/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="/backend/vendors/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="/backend/vendors/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="/backend/vendors/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="/backend/vendors/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="/backend/vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="/backend/vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js" type="text/javascript"></script>
<script src="/backend/vendors/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="/backend/vendors/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="/backend/vendors/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="/backend/vendors/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="/backend/vendors/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="/backend/vendors/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="/backend/vendors/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="/backend/vendors/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="/backend/vendors/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="/backend/vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js"
        type="text/javascript"></script>
<script src="/backend/vendors/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="/backend/vendors/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="/backend/vendors/js/framework/components/plugins/forms/jquery-validation.init.js"
        type="text/javascript"></script>
<script src="/backend/vendors/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="/backend/vendors/js/framework/components/plugins/base/bootstrap-notify.init.js"
        type="text/javascript"></script>
<script src="/backend/vendors/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="/backend/vendors/jstree/dist/jstree.js" type="text/javascript"></script>
<script src="/backend/vendors/raphael/raphael.js" type="text/javascript"></script>
<script src="/backend/vendors/morris.js/morris.js" type="text/javascript"></script>
<script src="/backend/vendors/chartist/dist/chartist.js" type="text/javascript"></script>
<script src="/backend/vendors/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="/backend/vendors/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>
<script src="/backend/vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js"
        type="text/javascript"></script>
<script src="/backend/vendors/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="/backend/vendors/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="/backend/vendors/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="/backend/vendors/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="/backend/vendors/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="/backend//vendors/js/framework/components/plugins/base/sweetalert2.init.js"
        type="text/javascript"></script>

<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle -->
<script src="/backend/assets/demo/base/scripts.bundle.js" type="text/javascript"></script>
<script src="/backend/assets/demo/custom/crud/forms/widgets/select2.js" type="text/javascript"></script>
<script src="/backend/assets/demo/custom/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
<script src="/backend/assets/demo/custom/crud/forms/widgets/input-mask.js" type="text/javascript"></script>
<script src="/backend/assets/demo/custom/components/base/sweetalert2.js" type="text/javascript"></script>
<script src="/backend/assets/demo/custom/crud/wizard/wizard.js" type="text/javascript"></script>
<script src="/backend/assets/js/jqueryNumber.js" type="text/javascript"></script>
<script src="/backend/assets/js/admin/admin.js" type="text/javascript"></script>
<script src="/backend/build/js/intlTelInput.js"></script>


<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
<script src="/backend/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<script src="/backend/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="/backend/assets/demo/custom/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>


<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src="/backend/assets/app/js/dashboard.js" type="text/javascript"></script>
<script>
    moment.locale(lang);
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':  "{{ csrf_token() }}"
        }
    });

    $(document).ready(function() {
        if (lang!=="es"){
            return;
        }
        jQuery.extend(jQuery.validator.messages, {
            required: "Este campo es obligatorio.",
            remote: "Por favor, rellena este campo.",
            email: "Por favor, escribe una dirección de correo válida",
            url: "Por favor, escribe una URL válida.",
            date: "Por favor, escribe una fecha válida.",
            dateISO: "Por favor, escribe una fecha (ISO) válida.",
            number: "Por favor, escribe un número entero válido.",
            digits: "Por favor, escribe sólo dígitos.",
            creditcard: "Por favor, escribe un número de tarjeta válido.",
            equalTo: "Por favor, escribe el mismo valor de nuevo.",
            accept: "Por favor, escribe un valor con una extensión aceptada.",
            maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
            minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
            rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
            range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
            max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
            min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
        });
    });
</script>
<!--end::Page Scripts -->
@include('sweet::alert')
@section('dropzonePhotoArtist')
@show
@section('js.add-project')
@show
@section('table.admin.projects')
@show
@section('rating.projects')
@show
@section('table.admin.management')
@show
@stack('js')

<script src="/backend/build/js/changeInputPhone.js"></script>
</body>

<!-- end::Body -->
</html>
