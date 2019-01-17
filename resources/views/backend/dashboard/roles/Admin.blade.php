@dd($last_revision)
<div class="m-content">
    <!--Begin::Section-->
    <div class="m-portlet ">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{ __('numero_proyectos_registrados') }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                {{ __('proyec_pre_aprobados') }}
                            </h4><br>
                            <span class="m-widget24__desc">
												</span>
                            <span class="m-widget24__stats m--font-brand">
                                                212
												</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Feedbacks-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                {{ __('publicados') }}
                            </h4><br>
                            <span class="m-widget24__desc">
												</span>
                            <span class="m-widget24__stats m--font-info">
                                231
												</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Orders-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                {{ __('rechazados') }}
                            </h4><br>
                            <span class="m-widget24__desc">
												</span>
                            <span class="m-widget24__stats m--font-danger">
                                621
												</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </div>
                    </div>
                    <!--end::New Orders-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Users-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                {{ __('aprovado') }}
                            </h4><br>
                            <span class="m-widget24__desc">
												</span>
                            <span class="m-widget24__stats m--font-success">
                                                732
												</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-success" role="progressbar" style="width: 90%;"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget24__change">

                            </span>
                            <span class="m-widget24__number">

                            </span>
                        </div>
                    </div>
                    <!--end::New Users-->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-8">
            <div class="m-portlet ">
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{ __('ultimos_proyectos') }}
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
                                role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab"
                                       href="#m_widget5_tab1_content" role="tab">
                                        {{ __('revision') }}
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content"
                                       role="tab">
                                        {{ __('proyec_pre_aprobados') }}
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab3_content"
                                       role="tab">
                                        {{ __('aprovado') }}
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab4_content"
                                       role="tab">
                                        {{ __('publicado') }}
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab4_content"
                                       role="tab">
                                        {{ __('rechazados') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">

            <!--begin:: Widgets/New Users-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                New Users
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget4_tab1_content" role="tab">
                                    Today
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab2_content" role="tab">
                                    Month
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget4_tab1_content">

                            <!--begin::Widget 14-->
                            <div class="m-widget4">

                                <!--begin::Widget 14 Item-->
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="../../assets/app/media/img/users/100_4.jpg" alt="">
                                    </div>
                                    <div class="m-widget4__info">
															<span class="m-widget4__title">
																Anna Strong
															</span><br>
                                        <span class="m-widget4__sub">
																Visual Designer,Google Inc
															</span>
                                    </div>
                                    <div class="m-widget4__ext">
                                        <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                    </div>
                                </div>

                                <!--end::Widget 14 Item-->

                                <!--begin::Widget 14 Item-->
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="../../assets/app/media/img/users/100_14.jpg" alt="">
                                    </div>
                                    <div class="m-widget4__info">
															<span class="m-widget4__title">
																Milano Esco
															</span><br>
                                        <span class="m-widget4__sub">
																Product Designer, Apple Inc
															</span>
                                    </div>
                                    <div class="m-widget4__ext">
                                        <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                    </div>
                                </div>

                                <!--end::Widget 14 Item-->

                                <!--begin::Widget 14 Item-->
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="../../assets/app/media/img/users/100_11.jpg" alt="">
                                    </div>
                                    <div class="m-widget4__info">
															<span class="m-widget4__title">
																Nick Bold
															</span><br>
                                        <span class="m-widget4__sub">
																Web Developer, Facebook Inc
															</span>
                                    </div>
                                    <div class="m-widget4__ext">
                                        <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                    </div>
                                </div>

                                <!--end::Widget 14 Item-->

                                <!--begin::Widget 14 Item-->
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="../../assets/app/media/img/users/100_1.jpg" alt="">
                                    </div>
                                    <div class="m-widget4__info">
															<span class="m-widget4__title">
																Wiltor Delton
															</span><br>
                                        <span class="m-widget4__sub">
																Project Manager, Amazon Inc
															</span>
                                    </div>
                                    <div class="m-widget4__ext">
                                        <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                    </div>
                                </div>

                                <!--end::Widget 14 Item-->

                                <!--begin::Widget 14 Item-->
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="../../assets/app/media/img/users/100_5.jpg" alt="">
                                    </div>
                                    <div class="m-widget4__info">
															<span class="m-widget4__title">
																Nick Stone
															</span><br>
                                        <span class="m-widget4__sub">
																Visual Designer, Github Inc
															</span>
                                    </div>
                                    <div class="m-widget4__ext">
                                        <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                    </div>
                                </div>

                                <!--end::Widget 14 Item-->
                            </div>

                            <!--end::Widget 14-->
                        </div>
                        <div class="tab-pane" id="m_widget4_tab2_content">

                            <!--begin::Widget 14-->
                            <div class="m-widget4">

                                <!--begin::Widget 14 Item-->
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="../../assets/app/media/img/users/100_2.jpg" alt="">
                                    </div>
                                    <div class="m-widget4__info">
															<span class="m-widget4__title">
																Kristika Bold
															</span><br>
                                        <span class="m-widget4__sub">
																Product Designer,Apple Inc
															</span>
                                    </div>
                                    <div class="m-widget4__ext">
                                        <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                    </div>
                                </div>

                                <!--end::Widget 14 Item-->

                                <!--begin::Widget 14 Item-->
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="../../assets/app/media/img/users/100_13.jpg" alt="">
                                    </div>
                                    <div class="m-widget4__info">
															<span class="m-widget4__title">
																Ron Silk
															</span><br>
                                        <span class="m-widget4__sub">
																Release Manager, Loop Inc
															</span>
                                    </div>
                                    <div class="m-widget4__ext">
                                        <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                    </div>
                                </div>

                                <!--end::Widget 14 Item-->

                                <!--begin::Widget 14 Item-->
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="../../assets/app/media/img/users/100_9.jpg" alt="">
                                    </div>
                                    <div class="m-widget4__info">
															<span class="m-widget4__title">
																Nick Bold
															</span><br>
                                        <span class="m-widget4__sub">
																Web Developer, Facebook Inc
															</span>
                                    </div>
                                    <div class="m-widget4__ext">
                                        <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                    </div>
                                </div>

                                <!--end::Widget 14 Item-->

                                <!--begin::Widget 14 Item-->
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="../../assets/app/media/img/users/100_2.jpg" alt="">
                                    </div>
                                    <div class="m-widget4__info">
															<span class="m-widget4__title">
																Wiltor Delton
															</span><br>
                                        <span class="m-widget4__sub">
																Project Manager, Amazon Inc
															</span>
                                    </div>
                                    <div class="m-widget4__ext">
                                        <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                    </div>
                                </div>

                                <!--end::Widget 14 Item-->

                                <!--end::Widget 14 Item-->

                                <!--begin::Widget 14 Item-->
                                <div class="m-widget4__item">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="../../assets/app/media/img/users/100_8.jpg" alt="">
                                    </div>
                                    <div class="m-widget4__info">
															<span class="m-widget4__title">
																Nick Bold
															</span><br>
                                        <span class="m-widget4__sub">
																Web Developer, Facebook Inc
															</span>
                                    </div>
                                    <div class="m-widget4__ext">
                                        <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                    </div>
                                </div>

                                <!--end::Widget 14 Item-->
                            </div>

                            <!--end::Widget 14-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/New Users-->
        </div>
    </div>
</div>
