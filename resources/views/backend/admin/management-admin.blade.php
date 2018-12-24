@extends('backend.layout')
<!--=====================================
   HEADER
======================================-->
@section('header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Managements</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon flaticon-users"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">{{ __('Managements') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <a id="modalAddManager" data-toggle="modal" data-target="#modal_add_management"
               class="btn btn-secondary m-btn m-btn--icon m-btn--pill" style="cursor: pointer">
                <span>
                    <i class="fa flaticon-plus"></i>
                    <span>{{ __('nuevo_management') }}</span>
                </span>
            </a>
        </div>
    </div>
@stop
<!--=====================================
CONTENIDO DEL MODULO PROYECTOS ADMIN
======================================-->
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                    <div class="m-portlet__body">
                        <div class="m-widget19">
                            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides"
                                 style="min-height-: 100px">
                                <img src="/backend/assets/app/media/img//managements/fondo-managements.jpg" alt=""
                                     style="height: 230px;object-fit: cover;">
                                <h3 class="m-widget19__title m--font-light">
                                    Managements
                                </h3>
                                <div class="m-widget19__shadow">
                                </div>
                            </div>
                            <div class="form-group">

                            </div>
                            <div class="row p-3">
                                @forelse($managements as $management)
                                    <div class="col-lg-4">
                                        <div class="m-portlet m-portlet--full-height  ">
                                            <div class="m-portlet__body">
                                                <div class="m-card-profile">
                                                    <div class="m-card-profile__title m--hide">
                                                        Your Profile
                                                    </div>
                                                    <div class="m-card-profile__pic">
                                                        <div class="m-card-profile__pic-wrapper">
                                                            @if(Storage::disk('public')->exists('users/'.$management->users->picture))
                                                                <img src="{{ $management->users->pathAttachment()}}"
                                                                     alt=""/>
                                                            @else
                                                                <img src="{{ $management->users->picture }}" alt="">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="m-card-profile__details">
                                                        <span class="m-card-profile__name">{{ $management->users->name }}</span>

                                                        <a href="" class="m-card-profile__email m-link"
                                                           style="margin-left: -15px">{{ $management->users->email  }}</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h4 class="text-center">{{ __('no_hay_registros') }}</h4>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====================================
	MODAL AGREGAR NUEVO MANAGEMENT
    ======================================-->
    <div class="modal fade" id="modal_add_management" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('agregar_management') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('add.management.admin') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group m-form__group {{$errors->has('country_id')? 'has-danger':''}}">
                            <label for="m_select2_add_management">{{ __('pais') }}</label>
                            <select name="country_id" class="form-control m-bootstrap-select m_selectpicker required">
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country }}</option>
                                @endforeach
                                {!! $errors->first('country_id','<div class="form-control-feedback">*:message</div>')!!}
                            </select>
                        </div>
                        <div class="form-group m-form__group {{$errors->has('name')? 'has-danger':''}}">
                            <label for="exampleInputEmail1">{{ __('nombre') }}</label>
                            <input type="text" class="form-control m-input" id="" name="name"
                                   aria-describedby="emailHelp" placeholder="Enter {{ __('nombre') }}">
                            {!! $errors->first('name','<div class="form-control-feedback">*:message</div>')!!}
                            <span class="m-form__help">We'll never share your email with anyone else.</span>
                        </div>
                        <div class="form-group m-form__group {{$errors->has('last_name')? 'has-danger':''}}">
                            <label for="exampleInputEmail1">{{ __('apellidos') }}</label>
                            <input type="text" name="last_name" class="form-control m-input" id=""
                                   aria-describedby="emailHelp" placeholder="Enter {{ __('apellidos') }}">
                            {!! $errors->first('last_name','<div class="form-control-feedback">*:message</div>')!!}
                            <span class="m-form__help">We'll never share your email with anyone else.</span>
                        </div>
                        <div class="form-group m-form__group {{$errors->has('email')? 'has-danger':''}}">
                            <label for="exampleInputEmail1">{{ __('email') }}</label>
                            <input type="email" name="email" class="form-control m-input" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Enter {{ __('email') }}">
                            {!! $errors->first('email','<div class="form-control-feedback">*:message</div>')!!}
                            <span class="m-form__help">We'll never share your email with anyone else.</span>
                        </div>
                        <div class="form-group m-form__group {{$errors->has('email')? 'has-danger':''}}">
                            <label for="exampleInputEmail1">{{ __('email') }}</label>
                            <select class="form-control m-select2" id="m_select2_11_tipo" multiple name="param">
                                <option></option>
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
@push('js')
    <script>
        var select = false;
        const startSelectTag = function (){
            setTimeout(function (){
                $('#m_select2_11_tipo').select2({
                    placeholder: "Add a tag",
                    tags: true
                });
            },500);
        };
        @if (count($errors) > 0)
        $('#modal_add_management').modal('show');
        startSelectTag();
        @endif
        $('#modalAddManager').click(function () {
            if (select){
                return;
            }
            select = true;
            startSelectTag();

        });
    </script>
@endpush
