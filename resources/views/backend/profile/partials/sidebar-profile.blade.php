<div class="m-portlet m-portlet--full-height  ">
    <div class="m-portlet__body">
        <div class="m-card-profile">
            <div class="m-card-profile__title m--hide">
                Your Profile
            </div>
            <div class="m-card-profile__pic">
                <div class="m-card-profile__pic-wrapper">
                    @if(Storage::disk('public')->exists('users/'.auth()->user()->picture))
                        <img src="{{ auth()->user()->pathAttachment() }}" alt=""/>
                    @else
                        <img src="{{ auth()->user()->picture }}" alt="">
                    @endif
                </div>
            </div>
            <div class="m-card-profile__details">
                <span class="m-card-profile__name">{{ auth()->user()->name }}</span>
                <a href="" class="m-card-profile__email m-link">{{ auth()->user()->email }}</a>
            </div>
            @if($artist->countries !== null)
            <div class="text-center" style="margin-top: 5px"><img src="{{ $artist->countries->flag }}"
                                                                  width="21" alt="" style="margin-top: -3px"></div>
            @endif

        </div>
        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
            <li class="m-nav__separator m-nav__separator--fit"></li>
            <li class="m-nav__section m--hide">
                <span class="m-nav__section-text">Section</span>
            </li>
            <li class="m-nav__item">
                <a href="{{ route('profile.artist') }}" class="m-nav__link active">
                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                    <span class="m-nav__link-title">
														<span class="m-nav__link-wrap">
															<span class="m-nav__link-text">{{ ( __('perfil')) }}</span>

														</span>
													</span>
                </a>
            </li>
            <li class="m-nav__item">
                <a href="{{ route('myprojects.artist') }}" class="m-nav__link">
                    <i class="m-nav__link-icon flaticon-share"></i>
                    <span class="m-nav__link-text">{{ __('mis_proyectos') }}</span>
                </a>
            </li>
            <li class="m-nav__item">
                <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                    <span class="m-nav__link-text">Messages</span>
                </a>
            </li>
            <li class="m-nav__item">
                <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                    <i class="m-nav__link-icon flaticon-graphic-2"></i>
                    <span class="m-nav__link-text">Sales</span>
                </a>
            </li>
            <li class="m-nav__item">
                <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                    <i class="m-nav__link-icon flaticon-time-3"></i>
                    <span class="m-nav__link-text">Events</span>
                </a>
            </li>
            <li class="m-nav__item">
                <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                    <span class="m-nav__link-text">Support</span>
                </a>
            </li>
        </ul>
        <div class="m-portlet__body-separator"></div>
        <div class="m-widget1 m-widget1--paddingless">
            <div class="m-widget1__item">
                <div class="row m-row--no-padding align-items-center">
                    <div class="col">
                        <h3 class="m-widget1__title">Member Profit</h3>
                        <span class="m-widget1__desc">Awerage Weekly Profit</span>
                    </div>
                    <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">+$17,800</span>
                    </div>
                </div>
            </div>
            <div class="m-widget1__item">
                <div class="row m-row--no-padding align-items-center">
                    <div class="col">
                        <h3 class="m-widget1__title">Orders</h3>
                        <span class="m-widget1__desc">Weekly Customer Orders</span>
                    </div>
                    <div class="col m--align-right">
                        <span class="m-widget1__number m--font-danger">+1,800</span>
                    </div>
                </div>
            </div>
            <div class="m-widget1__item">
                <div class="row m-row--no-padding align-items-center">
                    <div class="col">
                        <h3 class="m-widget1__title">Issue Reports</h3>
                        <span class="m-widget1__desc">System bugs and issues</span>
                    </div>
                    <div class="col m--align-right">
                        <span class="m-widget1__number m--font-success">-27,49%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>