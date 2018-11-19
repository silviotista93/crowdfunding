@extends('backend.layout')

@section('header')
    {{--@if($errors->any())

        <ul class="list-group">

            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> {{$error}}
                </div>
            @endforeach

        </ul>

    @endif--}}
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{ __('perfil') }}</h3>
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

@stop
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                @include('backend.profile.partials.sidebar-profile')
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary"
                                role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab"
                                       href="#m_user_profile_tab_1" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        {{ __('actualizar_perfil') }}
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2"
                                       role="tab">
                                        {{ __('mensajes') }}
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3"
                                       role="tab">
                                        {{ __('configuracion') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @include('backend.profile.partials.actions-perfil')
                    </div>
                    <div class="tab-content">
                        <!--=====================================
		               ACTUALIZAR PERFIL DEL USUARIO
                        ======================================-->
                        <div class="tab-pane active" id="m_user_profile_tab_1">
                            <form method="post" action="{{ route('update.profile.artist',auth()->user()->id) }}"
                                  class="m-form m-form--fit m-form--label-align-right">
                                @csrf {{method_field('PUT')}}
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">1. Info {{ __('artista') }}</h3>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row {{$errors->has('nickname')? 'has-danger':''}}">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">{{ __('nombre_artistico') }}</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="nickname"
                                                   value="{{ old('nickname', $artist->nickname) }}">
                                            {!! $errors->first('nickname','<div class="form-control-feedback">*:message</div>')!!}
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row {{$errors->has('biography')? 'has-danger':''}}">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">{{ __('biografia') }}</label>
                                        <div class="col-7">
                                            <textarea class="form-control m-input m-input--solid" id="exampleTextarea"
                                                      name="biography"
                                                      rows="9">{{ old('biography',$artist->biography) }}</textarea>
                                            {!! $errors->first('biography','<div class="form-control-feedback">*:message</div>')!!}
                                            <span class="m-form__help">{{ __('sugerencia_biografia') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row {{$errors->has('level_id')? 'has-danger':''}}">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">{{ __('level') }}</label>
                                        <div class="col-7">
                                            <select name="level_id"
                                                    class="form-control m-bootstrap-select m_selectpicker">
                                                @foreach($levels as $level)
                                                    <option value="{{$level->id}}" {{ old('level_id',$artist->level_id) == $level->id ? 'selected':''}}>{{ $level->level }}</option>
                                                @endforeach
                                                {!! $errors->first('level_id','<div class="form-control-feedback">*:message</div>')!!}
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row {{$errors->has('country_id')? 'has-danger':''}}">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">{{ __('pais') }}</label>
                                        <div class="col-7">
                                            <select class="form-control m-select2" id="m_select2_1" name="country_id">
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}" {{ old('country_id',$artist->country_id) == $country->id ? 'selected':''}}>{{ $country->country }}</option>
                                                @endforeach
                                                {!! $errors->first('country_id','<div class="form-control-feedback">*:message</div>')!!}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                    <div class="form-group m-form__group row ">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">2. {{ __('personal') }}</h3>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row {{$errors->has('phone_1')? 'has-danger':''}}">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">{{ __('numero_celular') }}</label>
                                        <div class="col-7">
                                            <input type='text' class="form-control" id="m_inputmask_3" name="phone_1"
                                                   value="{{ old('phone_1',$artist->users->phone_1 )}}"
                                                   data-inputmask='"mask": "(999) 999-9999999"'/>
                                            {!! $errors->first('phone_1','<div class="form-control-feedback">*:message</div>')!!}
                                            <span class="m-form__help">{{ __('indicativo_pais')  }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">{{ __('numero_celular') }} 2</label>
                                        <div class="col-7">
                                            <input type='text' class="form-control" id="m_inputmask_opcional"
                                                   name="phone_2" value="{{ old('phone_2',$artist->users->phone_2 ) }}"
                                                   data-inputmask='"mask": "(999) 999-9999999"'/>
                                            <span class="m-form__help">{{ __('telefono_opcional')  }}</span>
                                        </div>
                                    </div>

                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">3. {{ __('redes_sociales') }}</h3>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            <i class="fab fa-facebook-square fa-2x" style="color: #3b5999"></i>
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" name="facebook" type="text"
                                                   value="{{ old('facebook',$artist->facebook) }}">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            <i class="fab fa-google-plus-g fa-2x"
                                               style="color: #dd4b39;margin-right: -8px;"></i>
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" name="google" type="text"
                                                   value="{{ old('google',$artist->google) }}">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            <i class="fab fa-instagram fa-2x" style="color: #e4405f"></i>
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" name="instagram" type="text"
                                                   value="{{ old('instagram',$artist->instagram) }}">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            <i class="fab fa-youtube fa-2x"
                                               style="color: #cd201f; margin-right: -3px;"></i>
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" name="youtube" type="text"
                                                   value="{{ old('youtube',$artist->youtube) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-7 text-center">
                                                <button type="submit"
                                                        class="btn btn-accent m-btn m-btn--air m-btn--custom">{{ __('guardar_cambios') }}</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--=====================================
		               MENSAJES
                        ======================================-->
                        <div class="tab-pane " id="m_user_profile_tab_2">
                            <div class="m-portlet__body">
                                <div class="m-widget3">
                                    <div class="m-widget3__item">
                                        <div class="m-widget3__header">
                                            <div class="m-widget3__user-img">
                                                <img class="m-widget3__img"
                                                     src="../../assets/app/media/img/users/user1.jpg"
                                                     alt="">
                                            </div>
                                            <div class="m-widget3__info">
														<span class="m-widget3__username">
															Melania Trump
														</span><br>
                                                <span class="m-widget3__time">
															2 day ago
														</span>
                                            </div>
                                            <span class="m-widget3__status m--font-info">
														Pending
													</span>
                                        </div>
                                        <div class="m-widget3__body">
                                            <p class="m-widget3__text">
                                                Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy
                                                nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="m-widget3__item">
                                        <div class="m-widget3__header">
                                            <div class="m-widget3__user-img">
                                                <img class="m-widget3__img"
                                                     src="../../assets/app/media/img/users/user4.jpg"
                                                     alt="">
                                            </div>
                                            <div class="m-widget3__info">
														<span class="m-widget3__username">
															Lebron King James
														</span><br>
                                                <span class="m-widget3__time">
															1 day ago
														</span>
                                            </div>
                                            <span class="m-widget3__status m--font-brand">
														Open
													</span>
                                        </div>
                                        <div class="m-widget3__body">
                                            <p class="m-widget3__text">
                                                Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy
                                                nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut
                                                wisi
                                                enim ad minim veniam,quis nostrud exerci tation ullamcorper.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="m-widget3__item">
                                        <div class="m-widget3__header">
                                            <div class="m-widget3__user-img">
                                                <img class="m-widget3__img"
                                                     src="../../assets/app/media/img/users/user5.jpg"
                                                     alt="">
                                            </div>
                                            <div class="m-widget3__info">
														<span class="m-widget3__username">
															Deb Gibson
														</span><br>
                                                <span class="m-widget3__time">
															3 weeks ago
														</span>
                                            </div>
                                            <span class="m-widget3__status m--font-success">
														Closed
													</span>
                                        </div>
                                        <div class="m-widget3__body">
                                            <p class="m-widget3__text">
                                                Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy
                                                nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--=====================================
		               CONFIGURACIONES
                        ======================================-->
                        <div class="tab-pane " id="m_user_profile_tab_3">
                            <div class="m-portlet__body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="m-section">
                                            <!--=====================================
		                                  CONFIGURACIONES PARA EL BACKER
                                            ======================================-->
                                            <span class="m-section__sub">
												{{ __('patrocinador') }}
											</span>
                                            <div class="m-section__content">
                                                <div class="m-demo" data-code-preview="true" data-code-html="true"
                                                     data-code-js="false">
                                                    <div class="m-demo__preview">

                                                        <!--begin::Form-->
                                                        <form class="m-form">
                                                            <div class="m-form__group form-group row">
                                                                <label class="col-12 col-form-label">{{ __('mostrar_patrocinador') }}</label>
                                                                <div class="col-12">
                                                                    <span class="m-switch m-switch--icon">
                                                                        <label>
                                                                            <input type="checkbox" checked="checked"
                                                                                   name="">
                                                                            <span></span>
                                                                        </label>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <!--end::Form-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="m-section">
                                            <!--=====================================
                                           CONFIGURACIONES PARA EL PERFIL DE USUARIO
                                           ======================================-->
                                            <span class="m-section__sub">
												{{ __('perfil') }}
                                            </span>

                                            <div class="m-section__content">
                                                <div class="m-demo" data-code-preview="true" data-code-html="true"
                                                     data-code-js="false">
                                                    <div class="m-demo__preview">
                                                        <!-- CAMBIAR LA CONTRASEÑA DEL USUARIO, PERO PRIMERO SE VALIDA SI EL USUARIO ES NO ES DE ALGUNA RED SOCIAL -->
                                                        @if(!$artist->users->socialAcounts)
                                                            <form method="post" action="{{ route('update.password.artist',auth()->user()->id) }}">
                                                                @csrf {{ method_field('PUT') }}
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group m-form__group {{$errors->has('password')? 'has-danger':''}}">
                                                                            <label for="exampleInputPassword1">{{ __('actualizar_contraseña') }}</label>
                                                                            <input type="password" name="password"
                                                                                   class="form-control m-input"
                                                                                   id="exampleInputPassword1"
                                                                                   placeholder="{{ __('actualizar_contraseña') }}">
                                                                            {!! $errors->first('password','<div class="form-control-feedback">*:message</div>')!!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group m-form__group {{$errors->has('password_confirmation')? 'has-danger':''}}">
                                                                            <label for="exampleInputPassword1">{{ __('confirmar_contraseña') }}</label>
                                                                            <input type="password"
                                                                                   name="password_confirmation"
                                                                                   class="form-control m-input"
                                                                                   id="exampleInputPassword1"
                                                                                   placeholder="{{ __('confirmar_contraseña') }}">
                                                                            {!! $errors->first('password_confirmation','<div class="form-control-feedback">*:message</div>')!!}
                                                                        </div>
                                                                        <button type="submit" class="btn btn-outline-success btn-sm m-btn m-btn--custom pull-right">{{ __('actualizar') }}</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @endif
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group m-form__group">
                                                                    <label for="">Imagén de Perfil</label>
                                                                    <div class="m-dropzone dropzone m-dropzone--success" action="inc/api/dropzone/upload.php" id="m-dropzone-three">
                                                                        <div class="m-dropzone__msg dz-message needsclick">
                                                                            <h3 class="m-dropzone__msg-title">{{ __('actualizar_foto_perfil') }}</h3>
                                                                            <span class="m-dropzone__msg-desc">{{ __('arrastra_click_subir') }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('dropzonePhotoArtist')
    <script>
        new Dropzone('.dropzone', {
            url: '{{ route('profile.photo.artist') }}',
            acceptedFiles: 'image/*',
            maxFiles: 1,
            paramName: 'photo',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (file, response) {

                $('#inputImagenesPostPlan').val(response);
                location.reload();
            }

        });

        Dropzone.autoDiscover = false;
    </script>
@endsection
