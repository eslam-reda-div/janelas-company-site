<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="/stylesheet/style.css" />
    <link rel="stylesheet" type="text/css" href="/stylesheet/shortcodes.css" />
    <link rel="stylesheet" type="text/css" href="/stylesheet/color.css" />
    <!-- Animation -->
    <link rel="stylesheet" type="text/css" href="/stylesheet/animate.css" />

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="/stylesheet/responsive.css" />

    <link rel="stylesheet" href="/stylesheet/all.min.css" />
    <!-- Favicon and touch icons  -->
    @if(App::isLocale('ar'))
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
        <style>
            * {font-family: "Noto Kufi Arabic", sans-serif !important;}
        </style>
    @endif

    <title>{{ app(App\Settings\SiteSetting::class)->title }} - Services</title>
    <link rel="shortcut icon" href="{{ URL::asset('storage/' . app(App\Settings\SiteSetting::class)->fave_icon) }}" type="image/x-icon">

    <style>
        :root{
            --my-first: {{ app(App\Settings\SiteSetting::class)->color }} !important;
            --my-two: {{ app(App\Settings\SiteSetting::class)->secondary_color }} !important;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
<div class="animsition boxed blog">
    <header id="header" class="header">
        <div class="topbar clearfix" id="topbar">
            <div class="container">
                <div class="tf-topbar">
                    <ul class="top-content">
                        <li class="adress">
                            <a href="#" ><i class="icon-iconmap"></i> {{ app(App\Settings\SiteSetting::class)->location[0]['address'] }}</a >
                        </li>
                        <li class="email">
                            <a href="mailto:{{ app(App\Settings\SiteSetting::class)->email[0]['email'] }}"><i class="icon-iconmail"></i> {{ app(App\Settings\SiteSetting::class)->email[0]['email'] }}</a>
                        </li>
                    </ul>
                    <div class="topbar-socials">
                        <span class="icons">
                            @foreach(app(App\Settings\SiteSetting::class)->social as $social)
                                <a href="{{ $social['link'] }}" target="_blank">
                                    <img loading="lazy" width="20" src="{{ URL::asset('storage/' . $social['icon']) }}" alt="images" />
                                </a>
                            @endforeach
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-top clearfix">
            <div class="container container-fixel">
                <div class="logo bg-white" style="display: flex;align-items: center;">
                    <a href="{{ route('home') }}">
                        <img loading="lazy" src="{{ URL::asset('storage/' . app(App\Settings\SiteSetting::class)->logo) }}" alt="images" />
                    </a>
                </div>
                <!-- logo -->
                <div class="content-wrap clearfix">
                    <div class="nav-wrap">
                        <div class="btn-menu">
                            <span></span>
                        </div>
                        <nav id="mainnav" class="mainnav">
                            <ul class="menu">
                                <li><a href="{{ route('home') }}">{{ __('home') }}</a></li>
                                <li><a href="{{ route('services') }}">{{ __('services') }}</a></li>
                                <li><a href="{{ route('materials') }}">{{ __('materials') }}</a></li>
                                <li><a href="{{ route('gallery') }}">{{ __('gallery') }}</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">{{ __('pages') }}</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('blog') }}">{{ __('blog') }}</a></li>
                                        <li><a href="{{ route('case-study') }}">{{ __('case-study') }}</a></li>
                                        {{--                                        @foreach(\App\Models\CustomPage::all() as $page)--}}
                                        {{--                                            <li><a href="{{ route('pages', $page->id) }}">{{ App::isLocale('ar') ? $page->title_ar : $page->title_en }}</a></li>--}}
                                        {{--                                        @endforeach--}}
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact') }}">{{ __('contact') }}</a></li>
                            </ul>
                            <!-- /.menu -->
                        </nav>
                        <!-- /#mainnav -->
                        <div class="flat-show-search" style="right: 47px;">
                            <div class="show-search hide-small">
                                <a href="#">
                                    <svg style="width: 50px;margin-top: 2px;height: 47px;" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6921 5H9.30807C8.15914 5.00635 7.0598 5.46885 6.25189 6.28576C5.44398 7.10268 4.99368 8.20708 5.00007 9.356V14.644C4.99368 15.7929 5.44398 16.8973 6.25189 17.7142C7.0598 18.5311 8.15914 18.9937 9.30807 19H14.6921C15.841 18.9937 16.9403 18.5311 17.7482 17.7142C18.5562 16.8973 19.0064 15.7929 19.0001 14.644V9.356C19.0064 8.20708 18.5562 7.10268 17.7482 6.28576C16.9403 5.46885 15.841 5.00635 14.6921 5Z" stroke="{{ app(App\Settings\SiteSetting::class)->color }}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.00012 9C7.58591 9 7.25012 9.33579 7.25012 9.75C7.25012 10.1642 7.58591 10.5 8.00012 10.5V9ZM12.0001 10.5C12.4143 10.5 12.7501 10.1642 12.7501 9.75C12.7501 9.33579 12.4143 9 12.0001 9V10.5ZM11.2501 9.75C11.2501 10.1642 11.5859 10.5 12.0001 10.5C12.4143 10.5 12.7501 10.1642 12.7501 9.75H11.2501ZM12.7501 8C12.7501 7.58579 12.4143 7.25 12.0001 7.25C11.5859 7.25 11.2501 7.58579 11.2501 8H12.7501ZM12.0001 9C11.5859 9 11.2501 9.33579 11.2501 9.75C11.2501 10.1642 11.5859 10.5 12.0001 10.5V9ZM15.5001 10.5C15.9143 10.5 16.2501 10.1642 16.2501 9.75C16.2501 9.33579 15.9143 9 15.5001 9V10.5ZM15.5001 9C15.0859 9 14.7501 9.33579 14.7501 9.75C14.7501 10.1642 15.0859 10.5 15.5001 10.5V9ZM16.0001 10.5C16.4143 10.5 16.7501 10.1642 16.7501 9.75C16.7501 9.33579 16.4143 9 16.0001 9V10.5ZM16.1138 10.1811C16.3519 9.84222 16.2702 9.37443 15.9313 9.13631C15.5923 8.8982 15.1246 8.97992 14.8864 9.31885L16.1138 10.1811ZM11.2737 13.2783C10.9579 13.5464 10.9193 14.0197 11.1874 14.3354C11.4555 14.6512 11.9288 14.6898 12.2445 14.4217L11.2737 13.2783ZM9.29973 14.9003C8.96852 15.149 8.90167 15.6192 9.15041 15.9504C9.39916 16.2816 9.8693 16.3485 10.2005 16.0997L9.29973 14.9003ZM12.2569 14.407C12.5667 14.1321 12.595 13.6581 12.3201 13.3483C12.0453 13.0384 11.5712 13.0101 11.2614 13.285L12.2569 14.407ZM11.1691 14.3091C11.4249 14.6349 11.8963 14.6917 12.2222 14.436C12.548 14.1802 12.6048 13.7088 12.3491 13.3829L11.1691 14.3091ZM11.186 11.4467C11.0185 11.0678 10.5756 10.8966 10.1968 11.0641C9.81796 11.2316 9.64667 11.6745 9.8142 12.0533L11.186 11.4467ZM12.3609 13.4024C12.1137 13.07 11.6439 13.001 11.3115 13.2482C10.9792 13.4954 10.9101 13.9652 11.1573 14.2976L12.3609 13.4024ZM13.8953 16.6608C14.2602 16.8567 14.7149 16.7198 14.9109 16.3548C15.1068 15.9899 14.9699 15.5352 14.605 15.3392L13.8953 16.6608ZM8.00012 10.5H12.0001V9H8.00012V10.5ZM12.7501 9.75V8H11.2501V9.75H12.7501ZM12.0001 10.5H15.5001V9H12.0001V10.5ZM15.5001 10.5H16.0001V9H15.5001V10.5ZM14.8864 9.31885C13.8552 10.7867 12.6412 12.1172 11.2737 13.2783L12.2445 14.4217C13.7091 13.1782 15.0093 11.7532 16.1138 10.1811L14.8864 9.31885ZM10.2005 16.0997C10.7113 15.7161 11.4531 15.1201 12.2569 14.407L11.2614 13.285C10.4871 13.9719 9.77692 14.5419 9.29973 14.9003L10.2005 16.0997ZM12.3491 13.3829C11.8824 12.7884 11.4917 12.1379 11.186 11.4467L9.8142 12.0533C10.1703 12.8586 10.6255 13.6164 11.1691 14.3091L12.3491 13.3829ZM11.1573 14.2976C11.8855 15.2767 12.8203 16.0835 13.8953 16.6608L14.605 15.3392C13.7239 14.8661 12.9578 14.2048 12.3609 13.4024L11.1573 14.2976Z" fill="{{ app(App\Settings\SiteSetting::class)->color }}"/>
                                    </svg>
                                </a>                            </div>
                            <div class="top-search">
                                <form action="#" id="searchform-all" method="get">
                                    <div>
                                        <div id="s" class="sss" style="display: flex;justify-content: space-around;align-items: center;width: 150px;float: right;flex-direction: column;padding-top: 15px;padding-bottom: 15px;font-size: 20px;font-weight: bold;gap: 6px;height: 129px;">
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}" >
                                                    {{ $properties['native'] }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- /.top-search -->
                        </div>
                    </div>

                    <!-- /.nav-wrap -->
                    <div class="flat-appointment">
                        <a href="{{ LaravelLocalization::getLocalizedURL(App::isLocale('ar') ? 'en' : 'ar') }}" class="themesflat-button btn-style-one">
                            <span class="btn-title">
                                {{ App::isLocale('ar') ? __('switch-to-english')  : __('switch-to-arabic') }}
                            </span>
                        </a>
                    </div>


                </div>
                <!-- content-wrap -->
            </div>
            <!-- /.header-wrap -->
        </div>
        <!-- /.container -->
    </header>
    <!-- /header -->
    <div class="page-title page-title-inner padding-bottom9" style="background-image: url('{{ URL::asset('storage/' . app(App\Settings\SiteSetting::class)->pages_header_image) }}')">
        <div class="overlay-page-tile"></div>
        <div class="page-title-content">
            <div class="container">
                <div class="blog-title color-white">
                    <h2>{{ __('services') }}</h2>
                    <span><a href="{{ route('home') }}" style="{{ App::isLocale('ar') ? 'direction: ltr;margin-left: 10px;' : '' }}" class="hv-color-st1 color-white"> {{ __('home') }} </a>{{ __('services') }}</span>
                </div>
            </div>
        </div>
    </div><!-- Page-title -->


    <!-- What we do -->
    <section class="what-we-do-service bg-white" id="what-we-do-service">
        <div class="themesflat-spacer clearfix" data-desktop="120" data-mobile="60" data-smobile="60" ></div>
        <div class="container">
            <div class="row">
                <div class="what-we-do-style what-we-do-style2">
                    <div class="content-style2 clearfix {{ App::isLocale('ar') ? 'serice-test' : '' }}">
                        <div class="content-service-title">
                            <div class="title-section wow fadeInDown">
                                <div class="sub-title" style="letter-spacing: 0px !important;">{{ __('what-we-do') }}</div>
                                <div class="flat-title">{{ __('services-for-you') }}</div>
                            </div>
                        </div>
                        <div class="content-service">
                            <p class="content-p color-style1">
                                {!! App::isLocale('ar') ? app(App\Settings\SiteSetting::class)->services_paragraph_ar : app(App\Settings\SiteSetting::class)->services_paragraph_en !!}
                            </p>
                        </div>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="43" data-mobile="43" data-smobile="43" ></div>

                    @foreach(\App\Models\Services::where('is_published', 1)->orderByDesc('id')->get() as $value => $service)
                        <div class="image-box"  style="{{ App::isLocale('ar') ? 'float: right;' : '' }}">
                            <div class="image">
                                <img loading="lazy" src="{{ URL::asset('storage/' . $service->image) }}" alt="">
                            </div>
                            <span class="number">
                                        {{ $value > 8 ? $value + 1 : '0' . ($value + 1) }}
                                    </span>
                            <div class="icon-window">
                                <img loading="lazy" src="{{ URL::asset('storage/' . $service->icon) }}" style="max-width: 80%;max-height: 64px;" alt="images">
                            </div>
                            <div class="title-imagebox" style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }}">
                                <h4>
                                    <a href="{{ route('services-details', $service->id) }}">{{ App::isLocale('ar') ? $service->title_ar : $service->title_en }}</a>
                                </h4>
                            </div>
                            <div class="content-imagebox" style="{{ App::isLocale('ar') ? 'direction: rtl;text-align-last: right;' : '' }}">
                                <p style="{{ App::isLocale('ar') ? 'text-align: right;' : '' }}">
                                    {!! App::isLocale('ar') ? $service->small_description_ar : $service->small_description_en !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- container -->
        <div class="themesflat-spacer clearfix" data-desktop="89" data-mobile="60" data-smobile="50"></div>
    </section>

    <footer id="footer" class="footer" style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }}background-image: url('{{ URL::asset('storage/' . app(App\Settings\SiteSetting::class)->footer_image) }}')">
        <div class="overlay-ft"></div>
        <div class="themesflat-spacer clearfix" data-desktop="71" data-mobile="40" data-smobile="30"></div>
        <div class="container">
            <div class="row">
                <div class="footer-widget clearfix">

                    <div class="col-sm-3 no-padding-right clearfix">
                        <div class="logo clearfix">
                            <a href="{{ route('home') }}">
                                <img loading="lazy" style="height: 70px !important;max-width: 250px" src="{{ URL::asset('storage/' . app(App\Settings\SiteSetting::class)->footer_logo) }}" alt="logo">
                            </a>
                        </div>
                        <p>
                            {!!  App::isLocale('ar') ? app(App\Settings\SiteSetting::class)->footer_text_ar : app(App\Settings\SiteSetting::class)->footer_text_en !!}
                        </p>
                        <div class="topbar-socials">
                            @foreach(app(App\Settings\SiteSetting::class)->social as $social)
                                <a href="{{ $social['link'] }}" target="_blank">
                                    <img loading="lazy" style="width: 26px;height: 26px;position: relative;top: -2px;" src="{{ URL::asset('storage/' . $social['icon']) }}" alt="images" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-3 footer-widget-style1">
                        <div class="footer-contact">
                            <div class="title-ft">{{ __('contact') }}</div>


                            <div class="tf-info call-us">
                                <i class="icon-call-us margintop-3"></i>
                                <div class="content-call-us">
                                    @foreach(app(App\Settings\SiteSetting::class)->location as $location)
                                        <div class="text"><span>{{ $location['address'] }}</span></div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tf-info mail">
                                <i class="icon-mail"></i>
                                <div class="content-mail">
                                    @foreach(app(App\Settings\SiteSetting::class)->email as $email)
                                        <div class="text"><span><a href="mailto:{{ $email['email'] }}">{{ $email['email'] }}</a></span></div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tf-info phone">
                                <i class="icon-phone"></i>
                                <div class="content-phone">
                                    @foreach(app(App\Settings\SiteSetting::class)->phone as $phone)
                                        <div class="text"><span><a href="tel:{{ $phone['phone'] }}">{{ $phone['phone'] }}</a></span></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 footer-widget-style1">
                        <div class="link">
                            <div class="title-ft">{{ __('useful-links') }}</div>
                            <ul>
                                <li><a href="{{ route('home') }}">{{ __('home') }}</a></li>
                                <li><a href="{{ route('services') }}">{{ __('services') }}</a></li>
                                <li><a href="{{ route('blog') }}">{{ __('blog') }}</a></li>
                                <li><a href="{{ route('case-study') }}">{{ __('case-study') }}</a></li>
                                <li><a href="{{ route('materials') }}">{{ __('materials') }}</a></li>
                                <li><a href="{{ route('gallery') }}">{{ __('gallery') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 footer-widget-style1">
                        <div class="subscribe">
                            <div class="title-ft">{{ __('subscribe') }}</div>
                            <form action="{{ route('new-sub') }}" method="post" class="form-email">
                                @csrf
                                <input type="text" class="email-here" name="email" placeholder="{{ __('email') }}" required />
                                <button class="font-style border-corner themesflat-button-style2 btn-style-4">
                                    <span class="btn-title">{{ __('subscribe') }}</span>
                                </button>
                            </form>
                            <p>
                                @if(session()->has('newSub'))
                                    {{ __('newSub') }}
                                @else
                                    {{ __('get-the-latest-updates-via-email.-any-time-you-may-unsubscribe') }}
                                @endif
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div id="botom">
                <div class="bottom-wrap text-center">
                    <div id="copyright">
                        <a href="https://www.facebook.com/eslam.reda.profile/" target="_blank"><span>© Developed by Eslam reda</span></a> <span class="color-botom">2024 | All Rights
                                Reserved</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="button-go-top">
    <a href="#" title="" class="go-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- Javascript -->

<script src="/javascript/jquery.min.js"></script>
<script src="/javascript/plugins.js"></script>
<script type="text/javascript" src="/javascript/bootstrap.min.js"></script>
<script src="/javascript/parallax.js"></script>
<script type="text/javascript" src="/javascript/jquery.easing.js"></script>
<script type="text/javascript" src="/javascript/jquery.cookie.js"></script>
<script type="text/javascript" src="/javascript/waypoints.min.js"></script>
<script type="text/javascript" src="/javascript/main.js"></script>
<script type="text/javascript" src="/javascript/animsition.js"></script>
<script type="text/javascript" src="/javascript/wow.min.js"></script>
</body>

<!-- Mirrored from themesflat.co/html/janelas/service.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2024 15:04:21 GMT -->
</html>
