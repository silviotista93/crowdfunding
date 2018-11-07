<header class="{{request()->is('/') ? 'xs-header-height xs-menu-style-transparent xs-menu-style-border fundpress-header-main-version color-navy-blue' : 'fundpress-header-inner-version fundpress-header-main-version xs-menu-item-border-color-green'}}">
    <div class="container">
        <nav class="xs-menus fundpress-menu">
            <div class="nav-header">
                <div class="nav-toggle"></div>
                <a class="nav-brand nav-logo" href="index.html">
                    <img src="/images/logo.png" alt="">
                </a>
            </div><!-- . END -->
            <div class="nav-menus-wrapper">
                <div class="xs-logo-wraper">
                    <a class="nav-brand xs-logo fundpress-logo-v1" href="index.html">
                        <img src="/images/logo.png" alt="">
                    </a>
                </div>
                <ul class="nav-menu">
                    <li><a href="">Home</a>
                        <ul class="nav-dropdown">
                            <li><a href="index.html">home version 1</a></li>
                            <li><a href="index-v2.html">home version 2</a></li>
                            <li><a href="index-v3.html">home version 3</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">about</a></li>
                    <li><a href="#">Blog</a>
                        <ul class="nav-dropdown">
                            <li><a href="news-feed.html ">blog version 1</a></li>
                            <li><a href="news-feed-v2.html ">blog version 2</a></li>
                            <li><a href="news-feed-v3.html">blog version 3</a></li>
                            <li><a href="blog-single.html">blog details </a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">contact</a></li>
                    <li><a href="#">pages</a>
                        <ul class="nav-dropdown">
                            <li><a href="team-member-details.html ">team details</a></li>
                            <li><a href="progress.html ">progress</a></li>
                            <li><a href="progress-successful.html">progress successful</a></li>
                            <li><a href="progress-explore.html">progress explore</a></li>
                            <li><a href="events.html">events</a></li>
                            <li><a href="faq.html">faq</a></li>
                            <li><a href="fund-details.html ">fund-details</a></li>
                            <li><a href="we-do.html">we do</a></li>
                            <li><a href="portfolio.html">portfolio</a></li>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="single-shop.html">single Shop</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="xs-navs-button">
                    <ul class="xs-icon-with-text fundpress-icon-menu">
                        <li><a href=""data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-unlock-alt color-green"></i>{{ __('muestra_tu_talento') }}</a></li>
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __("select_language") }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                <a class="dropdown-item inline"  href="{{ route('set_language', ['es']) }}" {{request()->is('/') ? 'style=color:#031F53' : 'style=color:#031F53' }}><img class="inline" src="/frontend/images/flags/es_flags.png" alt=""> {{ __('language_spanish') }}</a>
                                <a class="dropdown-item" href="{{ route('set_language', ['en']) }}" {{request()->is('/') ? 'style=color:#031F53' : 'style=color:#031F53' }}><img class="inline" src="/frontend/images/flags/usa_flags.png" alt=""> {{ __('language_english') }}</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div><!-- .nav-menus-wrapper END -->
        </nav><!-- .xs-menus .fundpress-menu END -->
    </div>
</header>
@section('select_lang')
    <script>
        $(function(){
            $('.select_lang').selectpicker();
        });
    </script>
@endsection