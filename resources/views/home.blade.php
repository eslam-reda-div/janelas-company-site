<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="themsflat.com" />
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="/stylesheet/style.css" />
    <link rel="stylesheet" type="text/css" href="/stylesheet/shortcodes.css" />
    <link rel="stylesheet" type="text/css" href="/stylesheet/color.css" />
    <!-- Animation -->
    <link rel="stylesheet" type="text/css" href="/stylesheet/animate.css" />

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="/stylesheet/responsive.css" />

    <!-- <link rel="stylesheet" href="revolution/css/settings.css"> -->

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

    <title>{{ app(App\Settings\SiteSetting::class)->title }} - Home</title>
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

<body class="counter-scroll header_sticky_style2">
<div class="animsition boxed blog">
    <div class="top-bar-style2 clearfix">
        <div class="container-fluid">
            <ul class="top-content">
                <li class="adress">
                    <a href="#"><i class="icon-iconmap" style="{{ App::isLocale('ar') ? 'margin-top: 4px;' : '' }}"></i> {{ app(App\Settings\SiteSetting::class)->location[0]['address'] }}</a>
                </li>
                <li class="email"><i class="icon-iconmail"></i> <a href="mailto:{{ app(App\Settings\SiteSetting::class)->email[0]['email'] }}">{{ app(App\Settings\SiteSetting::class)->email[0]['email'] }}</a></li>
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
    <header class="header-style2 bg-color-style2 bg-color" id="header">
        <div class="container-fluid container-fixel">
            <div  class="flex-header d-lg-flex {{ App::isLocale('ar') ? 'ar-nav' : '' }}" style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }} justify-content: space-between !important;">
                <div class="logo logo-style2">
                    <a href="{{ route('home') }}">
                        <img loading="lazy" style="height: 70px !important;max-width: 100%" src="{{ URL::asset('storage/' . app(App\Settings\SiteSetting::class)->logo) }}" alt="logo">
                    </a>
                </div>
                <div class="content-menu d-lg-flex" style="{{ App::isLocale('ar') ? 'justify-content: space-between;' : '' }}">
                    <div class="nav-wrap">
                        <div class="btn-menu">
                            <span></span>
                        </div>
                        <nav id="mainnav" class="mainnav fixed-mainnav">
                            <ul class="menu menustyle2">
                                <li><a href="{{ route('home') }}">{{ __('home') }}</a></li>
                                <li><a href="{{ route('services') }}">{{ __('services') }}</a></li>
                                <li><a href="{{ route('blog') }}">{{ __('blog') }}</a></li>
                                <li><a href="{{ route('case-study') }}">{{ __('case-study') }}</a></li>
                                <li><a href="{{ route('materials') }}">{{ __('materials') }}</a></li>
                                <li><a href="{{ route('gallery') }}">{{ __('gallery') }}</a>
                                </li>
{{--                                @if(\App\Models\CustomPage::count() > 0)--}}
{{--                                    <li class="menu-item-has-children">--}}
{{--                                        <a href="#">{{ __('pages') }}</a>--}}
{{--                                        <ul class="sub-menu">--}}
{{--                                            @foreach(\App\Models\CustomPage::all() as $page)--}}
{{--                                                <li><a href="{{ route('pages', $page->id) }}">{{ App::isLocale('ar') ? $page->title_ar : $page->title_en }}</a></li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                @endif--}}
                                <li><a href="{{ route('contact') }}">{{ __('contact') }}</a></li>
                            </ul>
                            <!-- /.menu -->
                        </nav>
                        <!-- /#mainnav -->
                    </div>
                    <!-- /.nav-wrap -->

                    <div class="search-btn" style="{{ App::isLocale('ar') ? 'width: unset;' : '' }}">
                        <div class="btn-top">
                            <a href="{{ LaravelLocalization::getLocalizedURL(App::isLocale('ar') ? 'en' : 'ar') }}" class="themesflat-button-style2 btn-style-4">
                                <span class="btn-title">
                                    {{ App::isLocale('ar') ? __('switch-to-english')  : __('switch-to-arabic') }}
                                </span>
                            </a>
                        </div>
                        <div class="flat-show-search">
                            <div class="show-search hide-small">
                                <a href="#">
                                    <svg style="width: 50px;margin-top: 2px;height: 47px;" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6921 5H9.30807C8.15914 5.00635 7.0598 5.46885 6.25189 6.28576C5.44398 7.10268 4.99368 8.20708 5.00007 9.356V14.644C4.99368 15.7929 5.44398 16.8973 6.25189 17.7142C7.0598 18.5311 8.15914 18.9937 9.30807 19H14.6921C15.841 18.9937 16.9403 18.5311 17.7482 17.7142C18.5562 16.8973 19.0064 15.7929 19.0001 14.644V9.356C19.0064 8.20708 18.5562 7.10268 17.7482 6.28576C16.9403 5.46885 15.841 5.00635 14.6921 5Z" stroke="{{ app(App\Settings\SiteSetting::class)->color }}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.00012 9C7.58591 9 7.25012 9.33579 7.25012 9.75C7.25012 10.1642 7.58591 10.5 8.00012 10.5V9ZM12.0001 10.5C12.4143 10.5 12.7501 10.1642 12.7501 9.75C12.7501 9.33579 12.4143 9 12.0001 9V10.5ZM11.2501 9.75C11.2501 10.1642 11.5859 10.5 12.0001 10.5C12.4143 10.5 12.7501 10.1642 12.7501 9.75H11.2501ZM12.7501 8C12.7501 7.58579 12.4143 7.25 12.0001 7.25C11.5859 7.25 11.2501 7.58579 11.2501 8H12.7501ZM12.0001 9C11.5859 9 11.2501 9.33579 11.2501 9.75C11.2501 10.1642 11.5859 10.5 12.0001 10.5V9ZM15.5001 10.5C15.9143 10.5 16.2501 10.1642 16.2501 9.75C16.2501 9.33579 15.9143 9 15.5001 9V10.5ZM15.5001 9C15.0859 9 14.7501 9.33579 14.7501 9.75C14.7501 10.1642 15.0859 10.5 15.5001 10.5V9ZM16.0001 10.5C16.4143 10.5 16.7501 10.1642 16.7501 9.75C16.7501 9.33579 16.4143 9 16.0001 9V10.5ZM16.1138 10.1811C16.3519 9.84222 16.2702 9.37443 15.9313 9.13631C15.5923 8.8982 15.1246 8.97992 14.8864 9.31885L16.1138 10.1811ZM11.2737 13.2783C10.9579 13.5464 10.9193 14.0197 11.1874 14.3354C11.4555 14.6512 11.9288 14.6898 12.2445 14.4217L11.2737 13.2783ZM9.29973 14.9003C8.96852 15.149 8.90167 15.6192 9.15041 15.9504C9.39916 16.2816 9.8693 16.3485 10.2005 16.0997L9.29973 14.9003ZM12.2569 14.407C12.5667 14.1321 12.595 13.6581 12.3201 13.3483C12.0453 13.0384 11.5712 13.0101 11.2614 13.285L12.2569 14.407ZM11.1691 14.3091C11.4249 14.6349 11.8963 14.6917 12.2222 14.436C12.548 14.1802 12.6048 13.7088 12.3491 13.3829L11.1691 14.3091ZM11.186 11.4467C11.0185 11.0678 10.5756 10.8966 10.1968 11.0641C9.81796 11.2316 9.64667 11.6745 9.8142 12.0533L11.186 11.4467ZM12.3609 13.4024C12.1137 13.07 11.6439 13.001 11.3115 13.2482C10.9792 13.4954 10.9101 13.9652 11.1573 14.2976L12.3609 13.4024ZM13.8953 16.6608C14.2602 16.8567 14.7149 16.7198 14.9109 16.3548C15.1068 15.9899 14.9699 15.5352 14.605 15.3392L13.8953 16.6608ZM8.00012 10.5H12.0001V9H8.00012V10.5ZM12.7501 9.75V8H11.2501V9.75H12.7501ZM12.0001 10.5H15.5001V9H12.0001V10.5ZM15.5001 10.5H16.0001V9H15.5001V10.5ZM14.8864 9.31885C13.8552 10.7867 12.6412 12.1172 11.2737 13.2783L12.2445 14.4217C13.7091 13.1782 15.0093 11.7532 16.1138 10.1811L14.8864 9.31885ZM10.2005 16.0997C10.7113 15.7161 11.4531 15.1201 12.2569 14.407L11.2614 13.285C10.4871 13.9719 9.77692 14.5419 9.29973 14.9003L10.2005 16.0997ZM12.3491 13.3829C11.8824 12.7884 11.4917 12.1379 11.186 11.4467L9.8142 12.0533C10.1703 12.8586 10.6255 13.6164 11.1691 14.3091L12.3491 13.3829ZM11.1573 14.2976C11.8855 15.2767 12.8203 16.0835 13.8953 16.6608L14.605 15.3392C13.7239 14.8661 12.9578 14.2048 12.3609 13.4024L11.1573 14.2976Z" fill="{{ app(App\Settings\SiteSetting::class)->color }}"/>
                                    </svg>
                                </a>
                            </div>
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
                        </div> <!-- /.flat-show-search -->
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="slider-style2 cleafix" style="background-image: url('{{ URL::asset('storage/' . app(App\Settings\HeaderSetting::class)->image) }}') !important;">
        <div class="container">
            <div class="overlay-slider1 cleafix"></div>
            <div class="flat-slider clearfix">
                <div class="rev_slider_wrapper fullwidthbanner-container">
                    <div id="rev-slider2" class="rev_slider fullwidthabanner">
                        <ul>
                            @foreach(app(App\Settings\HeaderSetting::class)->header_text as $text)
                                <!-- Slide 1 -->
                                <li data-transition="random">
                                    <!-- Main Image -->
                                    <!-- Layers -->
                                    <div class="tp-caption tp-resizeme text-one"
                                         data-x="['center','left','left','center']" data-hoffset="['-1','30','15','00']"
                                         data-y="['middle','middle','middle','middle']"
                                         data-voffset="['-220','-170','-170','-260']"
                                         data-fontsize="['16','16','16','16']" data-lineheight="['30','28','28','28']"
                                         data-width="full" data-height="none" data-whitespace="normal"
                                         data-transform_idle="o:1;"
                                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                         data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;"
                                         data-start="500" data-splitin="none" data-splitout="none"
                                         data-responsive_offset="on">
                                        <span class="title1" style="letter-spacing: 0px !important;">{{ App::isLocale('ar') ? $text['sub_title_ar'] : $text['sub_title_en'] }}</span>
                                    </div>

                                    <div class="tp-caption tp-resizeme text-two"
                                         data-x="['center','center','center','left']" data-hoffset="['-8','0','15','0']"
                                         data-y="['middle','middle','middle','middle']"
                                         data-voffset="['-83','-80','-50','-140']" data-fontsize="['70','70','50','40']"
                                         data-lineheight="['68','68','64','52']" data-width="full" data-height="150"
                                         data-whitespace="normal" data-transform_idle="o:1;"
                                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                         data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;"
                                         data-start="900" data-splitin="none" data-splitout="none"
                                         data-responsive_offset="on">
                                        <h1 class="title2">{{ App::isLocale('ar') ? $text['title_ar'] : $text['title_en'] }}</h1>
                                    </div>


                                    <div class="tp-caption tp-resizeme text-three"
                                         data-x="['center','center','center','left']" data-hoffset="['0','0','15','0']"
                                         data-y="['middle','middle','middle','middle']"
                                         data-voffset="['-15','00','20','00']" data-fontsize="['16','16','16','16']"
                                         data-lineheight="['30','28','28','28']" data-width="full" data-height="none"
                                         data-whitespace="normal" data-transform_idle="o:1;"
                                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                         data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;"
                                         data-start="1700" data-splitin="none" data-splitout="none"
                                         data-responsive_offset="on">
                                        {{ App::isLocale('ar') ? $text['description_ar'] : $text['description_en'] }}
                                    </div>

                                    <div class="tp-caption btn-text btn-linear hv-linear-gradient"
                                         data-x="['center','center','center','left']" data-hoffset="['0','0','15','0']"
                                         data-y="['middle','middle','middle','middle']"
                                         data-voffset="['75','110','120','110']" data-width="full" data-height="none"
                                         data-whitespace="normal" data-transform_idle="o:1;"
                                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                         data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;"
                                         data-start="2100" data-splitin="none" data-splitout="none"
                                         data-responsive_offset="on">
                                        <a href="{{ route('contact') }}" class="themesflat-button-style2 btn-style-two">
                                            <span class="btn-title">{{ __('contact-us') }}</span></a>
                                    </div>
                                </li>
                                <!-- /End Slide 1 -->
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- flat-slider -->

        </div>
    </div>

    @if(\App\Models\Services::where('is_published', 1)->count() > 0)
        <!-- What we do -->
        <section class="what-we-do-service bg-white" id="what-we-do-service">
            <div class="container">
                <div class="row" >
                    <div class="themesflat-spacer clearfix" data-desktop="122" data-mobile="60" data-smobile="50"></div>
                    <div class="what-we-do-style what-we-do-style1 ">
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
                        <div class="themesflat-spacer clearfix" data-desktop="43" data-mobile="43" data-smobile="43">
                        </div>
                        @foreach(\App\Models\Services::where('is_published', 1)->limit(3)->orderByDesc('id')->get() as $value => $service)
                            <div class="col-sm-4" style="{{ App::isLocale('ar') ? 'float: right;' : '' }}">
                                <div class="image-box wow fadeInUp animated" data-wow-delay="0ms"
                                     data-wow-duration="1500ms">
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
                            </div>
                        @endforeach
                        <!-- col-md-4 -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
            <div class="themesflat-spacer clearfix" data-desktop="120" data-mobile="60" data-smobile="50"></div>
        </section>
    @endif

    <!-- About Us  -->
    <section class="about2 bg-color-style2" >
        <div class="container">
            <div class="row">
                <div class="themesflat-spacer clearfix" data-desktop="112" data-mobile="60" data-smobile="60"></div>
                <div class="col-sm-6 no-padding-right clearfix">
                    <div class="image-hover about-image">
                        <div class="image">
                            <img loading="lazy" src="{{ URL::asset('storage/' . app(App\Settings\SiteSetting::class)->about_image) }}" alt="images">
                        </div>
                        <span class="bg-img">
                            </span>
                    </div>
                </div>
                <div class="col-sm-6 clearfix no-padding-right" style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }}">
                    <div class="content-about">
                        <div class="title-section wow fadeInDown">
                            <div class="sub-title" style="letter-spacing: 0px !important;">{{ __('about-us') }}</div>
                            <div class="flat-title margin5-8 padding-right100" style="{{ App::isLocale('ar') ? 'padding-right: 0;' : '' }}">
                                {{ App::isLocale('ar') ? app(App\Settings\SiteSetting::class)->about_title_ar : app(App\Settings\SiteSetting::class)->about_title_en }}
                            </div>
                        </div>
                        <p>
                            {!! App::isLocale('ar') ? app(App\Settings\SiteSetting::class)->about_text_ar : app(App\Settings\SiteSetting::class)->about_text_en !!}
                        </p>
                    </div>
                    <div style="margin-top: 20px !important;" class="btn-about wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <a href="{{ route('contact') }}" class="themesflat-button-style2 btn-style-two">
                            <span class="btn-title">{{ __('contact-us') }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="themesflat-spacer clearfix" data-desktop="108" data-mobile="60" data-smobile="50"></div>
        </div>
    </section>


    <section class="window-services-style2" >
        <div class="container">
            <div class="subscribe sub-style2 clearfix wow">
                <div class="box1-subscribe no-padding-right" style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }}">
                    <div class="title-section">
                        <div class="sub-title" style="letter-spacing: 0px !important;">{{ __('newslatter') }}</div>
                        <div class="flat-title-style2 margin-top15">
                            {{ __('sign-up-for-newslatter-&-get-lattest-news-&-update') }}
                        </div>
                    </div>
                </div> <!-- box1-subscribe -->
                <div class="box2-subscribe no-padding-left padding-top29 ">
                    <form action="{{ route('new-sub') }}" method="post" class="form-email" id="formsubsribe">
                        @csrf
                        <input type="text" id="inpsub" class="email-here" name="email" placeholder="{{ __('email-address') }}" required />
                        <button type="submit" class="themesflat-button-style2 btn-style-6">
                            <span class="btn-title">{{ __('subscribe') }}</span>
                        </button>
                    </form>
                    @if(session()->has('newSub'))
                        <div>
                            {{ __('newSub') }}
                        </div>
                    @endif
                </div><!-- box2-subscribe -->
            </div> <!-- Subscribe -->
        </div>
    </section>
    <!--  NEWSLATTER   -->
    <section class="newslatter tfnewslatter-style bg-color-style2">
        <div class="newslatter-style">
            <!-- PROJECT TAB -->
            <div class="themesflat-spacer clearfix" data-desktop="755" data-mobile="755" data-smobile="755"></div>

        </div>
    </section>


    @if(\App\Models\CaseStudy::where('is_published', 1)->count() > 0)
        <section class="portfolio-slider">
            <div class="portfolio-nav bg-color-style3 clearfix" style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }}">
                <div class="themesflat-spacer clearfix" data-desktop="93" data-mobile="20" data-smobile="20"></div>
                <div class="container ">
                    <div class="title-nav flex">
                        <div class="title-section wow fadeInDown">
                            <div class="sub-title color-style1" style="letter-spacing: 0px !important;">{{ __('portfolio') }}</div>
                            <div class="flat-title color-style1">{{ __('case-study') }}</div>
                        </div>
                    </div>
                </div><!-- container  -->
                <div class="themesflat-spacer clearfix" data-desktop="63" data-mobile="20" data-smobile="20"></div>
            </div>
            <div class="tf-partners partners-style2">
                <div class="banners-z">
                    <div class="flat-carousel-box data-effect clearfix" data-zero="0" data-gap="0" data-column="4"
                         data-column2="2" data-column3="1" data-dots="false" data-auto="true" data-nav="false"
                         data-loop="true">
                        <div class="owl-carousel owl-loaded owl-drag">

                            @foreach(\App\Models\CaseStudy::where('is_published', 1)->get() as $caseStudy)
                                <div class="image-profolio style2">
                                    <div class="image">
                                        <img loading="lazy" src="{{ URL::asset('storage/' . $caseStudy->image) }}" alt="images">
                                    </div>

                                    <div class="profolio-show profolio-show-style2 ">
                                        <div class="content-title text-left tf-text-hv">
                                            <h4 class="margin-botom5"><span>{{ App::isLocale('ar') ? $caseStudy->title_ar : $caseStudy->title_en }}</span></h4>
                                            <a href="{{ route('case-study-details', $service->id) }}">{!! App::isLocale('ar') ? $caseStudy->small_description_ar : $caseStudy->small_description_en !!}</a>
                                        </div>
                                        <div class="btn-tab">
                                            <a href="{{ route('case-study-details', $service->id) }}"><i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div> <!-- partners -->
        </section>
    @endif

    @if(\App\Models\Testimonial::count() > 0)
        <section class="tf-testimonials clearfix">
            <div class="container">
                <div class="themesflat-spacer clearfix" data-desktop="120" data-mobile="60" data-smobile="50"></div>
                <div class="title-section text-center wow fadeInDown" style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }}">
                    <div class="sub-title margin5-16-5" style="letter-spacing: 0px !important;">{{ __('client-testimonials') }}</div>
                    <div class="flat-title flat-style3">{{ __('what-our-clients-say') }} </div>
                </div>
                <div class="themesflat-spacer clearfix" data-desktop="46" data-mobile="15" data-smobile="15"></div>

                <div class="flat-carousel-box data-effect clearfix" data-zero="0" data-gap="30" data-column="3"
                     data-column2="1" data-column3="1" data-column4="1" data-dots="false" data-auto="true"
                     data-nav="false" data-loop="true">
                    <div class="owl-carousel wow fadeInRight animated" data-wow-delay="0ms" data-wow-duration="1500ms">

                        @foreach(\App\Models\Testimonial::get() as $testemonial)
                            <div class="tf-image-box text-center bg-color-style2 hv-background-before-style2">
                                <div class="image">
                                    <img loading="lazy" style="width: 80px;height: 80px;" src="{{ URL::asset('storage/' . $testemonial->image) }}" alt="images">
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                                <p class="pd-center">{{ App::isLocale('ar') ? $testemonial->text_ar : $testemonial->text_en }}</p>
                                <div class="tf-conten">
                                    <span>{{ $testemonial->name }}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="themesflat-spacer clearfix" data-desktop="259" data-mobile="60" data-smobile="50"></div>
            </div>
        </section>
    @endif

    @if(\App\Models\Number::count() > 0)
        <section class="blog-latest-news bg-color-style2">
            <div class="container">
                <div class="row">
                    <div class="tf-coutor bg-color-style3 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="3s" >

                        @foreach(\App\Models\Number::get() as $number)
                            <div class="box magin-left56">
                                <div class="icon-wrap icon-wrap-style2">
                                    <img loading="lazy" style="width: 60%;height: 80%;" src="{{ URL::asset('storage/' . $number->icon) }}" alt="images">
                                </div>
                                <div class="coutor-box magin-left115">
                                    <span class="number" data-from="0" data-to="{{ $number->number }}" data-speed="3000"
                                          data-inviewport="yes">{{ $number->number }} </span><span class="item">+</span>
                                    <p style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }}">{{ App::isLocale('ar') ? $number->title_ar : $number->title_en }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="themesflat-spacer  clearfix" data-desktop="120" data-mobile="60" data-smobile="50"></div>
        </section>
    @endif

    @if(\App\Models\Post::where('is_published', 1)->count() > 0)
        <section class="tf-blog-new bg-color-style2">
            <div class="container">

                <div class="tf-blog">
                    <div class="title-section text-center wow fadeInDown" style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }}">
                        <div class="sub-title" style="letter-spacing: 0px !important;">{{ __('latest-news') }}</div>
                        <div class="flat-title">{{ __('our-insights-&-articles') }}</div>
                    </div>

                    <div class="themesflat-spacer  clearfix" data-desktop="61" data-mobile="40" data-smobile="30"></div>

                </div>
                <div class="blog-new">
                    <!-- col-md-4 -->
                    <div class="flat-carousel-box data-effect clearfix" data-zero="0" data-gap="30" data-column="3"
                         data-column2="1" data-column3="1" data-dots="false" data-auto="true" data-nav="false"
                         data-loop="true">
                        <div class="owl-carousel wow fadeInRight animated" data-wow-delay="0ms"
                             data-wow-duration="1500ms">

                            @foreach(\App\Models\Post::where('is_published', 1)->orderByDesc('id')->get() as $post)
                                <div class="image-box">
                                    <div class="image">
                                        <img loading="lazy" src="{{ URL::asset('storage/' . $post->image) }}" alt="" />
                                    </div>
                                    <div class="content-blog-style2 bg-color">
                                        <div class="title-blog tf-text-hv" style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }}">
                                            <a href="{{ route('blog-details', $post->id) }}">{{ App::isLocale('ar') ? $post->title_ar : $post->title_en }}</a>
                                        </div>
                                        <div class="date">
                                            {{ \Illuminate\Support\Carbon::make($post->created_at)->format('j F Y') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="themesflat-spacer  clearfix" data-desktop="120" data-mobile="60" data-smobile="50"></div>
        </section>
    @endif

    <section class="questions" style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }}">
        <!-- container -->
        <div class="container">
            <div class="questions-style questions-style2">
                <div class="themesflat-spacer clearfix" data-desktop="106" data-mobile="60" data-smobile="50"></div>
                <div class="title-section text-center wow fadeInDown">
                    <div class="sub-title" style="letter-spacing: 0px !important;">{{ __('get-quote') }}</div>
                    <div class="themesflat-spacer clearfix" data-desktop="16" data-mobile="16" data-smobile="16">
                    </div>
                    <div class="flat-title">
                        {{ __('do-you-have-any-questions?-we’ll-be-happy-to-assist!') }}
                    </div>
                </div>
                <div class="themesflat-spacer clearfix" data-desktop="64" data-mobile="40" data-smobile="30"></div>
                <!-- Image -->
                <div class="image-form wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image-hoverstyle2">
                        <div class="image">
                            <img loading="lazy" src="{{ URL::asset('storage/' . app(App\Settings\SiteSetting::class)->home_contact_form_image) }}" alt="images" />
                        </div>
                        <div class="contact" style="{{ App::isLocale('ar') ? 'margin-right: 20px' : '' }}">
                            <div class="time">
                                <span class="iconclock bg-color-style5" style="{{ App::isLocale('ar') ? 'margin-left: 14px;' : '' }} text-align: center;align-content: center;font-size: 23px;"><i class="fas fa-envelope"></i></span>
                                <div class="content">
                                    <div class="text"><span>{{ __('mail-us') }}</span></div>
                                    <div class="text-time">
                                        <span><a href="mailto:{{ app(App\Settings\SiteSetting::class)->email[0]['email'] }}">{{ app(App\Settings\SiteSetting::class)->email[0]['email'] }}</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="phone margin-top14">
                                <span class="icon-phone icon-phone-style2" style="{{ App::isLocale('ar') ? 'margin-left: 14px' : '' }}"></span>
                                <div class="content padding-top7">
                                    <div class="text"><span>{{ __('call-us') }}</span></div>
                                    <div class="text-time">
                                        <span><a href="tel:{{ app(App\Settings\SiteSetting::class)->phone[0]['phone'] }}">{{ app(App\Settings\SiteSetting::class)->phone[0]['phone'] }}</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Image -->
                <!-- form-questions -->
                <div class="form-questions boxshadow bg-white wow fadeInRight animated" data-wow-delay="0ms"
                     data-wow-duration="1500ms">
                    <div id="respond" class="comment-respond">
                        <form action="{{ route('new-message') }}" method="post" id="commentform" class="commentform">
                            @csrf
                            <div class="text-wrap clearfix">
                                <fieldset class="name-wrap">
                                    <input type="text" id="author" class="tb-my-input" name="name" tabindex="1"
                                           placeholder="{{ __('full-name') }}" value="" size="32" aria-required="true" required />
                                </fieldset>
                                <fieldset class="phone-wrap">
                                    <input type="number" id="phone" class="tb-my-input" name="phone" tabindex="2"
                                           placeholder="{{ __('phone-number') }}" value="" aria-required="true" required />
                                </fieldset>
                                <fieldset class="mail-wrap">
                                    <input type="email" id="email" class="tb-my-input" name="email" tabindex="2"
                                           placeholder="{{ __('email-address') }}" value="" size="32" aria-required="true"
                                           required style="{{ App::isLocale('ar') ? 'padding-right: 17px' : '' }}"/>
                                </fieldset>
                                <fieldset class="select-wrap">
                                    <input type="text" id="subject" class="tb-my-input" name="subject" tabindex="2"
                                           placeholder="{{ __('email-subject') }}" value="" size="32" aria-required="true"
                                           required />
                                </fieldset>
                            </div>
                            <fieldset class="message-wrap">
                                    <textarea style="{{ App::isLocale('ar') ? 'padding-right: 17px' : '' }}" id="comment-message" name="message" rows="8" tabindex="4"
                                              placeholder="{{ __('your-message') }}" aria-required="true" required></textarea>
                            </fieldset>
                            <p class="form-submit">
                                <button type="submit" class="themesflat-button-style3 btn-style-5 no-boder">
                                    <span class="btn-title">{{ __('send-message') }}</span>
                                </button>
                                @if (session()->has('newMessage'))
                                    <div style="margin-top: 10px">
                                        {{ __('newMessage') }}
                                    </div>
                                @endif
                            </p>
                        </form>
                    </div>
                    <!-- #respond -->
                </div>
                <!-- /form-questions -->
            </div>
            <!-- /container -->
        </div>
    </section>


    <footer id="footer" class="footer footer-h2" style="{{ App::isLocale('ar') ? 'direction: rtl;' : '' }}background-image: url('{{ URL::asset('storage/' . app(App\Settings\SiteSetting::class)->footer_image) }}')">
        <div class="overlay-ft"></div>
        <div class="themesflat-spacer clearfix" data-desktop="381" data-mobile="80" data-smobile="80"></div>
        <div class="container">
            <div class="footer-widget clearfix">
                <div class="row">
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
</div> <!-- /.boxed -->
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
<script type="text/javascript" src="/javascript/jquery-countTo.js"></script>
<script type="text/javascript" src="/javascript/jquery.easing.js"></script>
<script type="text/javascript" src="/javascript/jquery.cookie.js"></script>
<script type="text/javascript" src="/javascript/waypoints.min.js"></script>
<script type="text/javascript" src="/javascript/jquery-validate.js"></script>
<script type="text/javascript" src="/javascript/wow.min.js"></script>
<script type="text/javascript" src="/javascript/main.js"></script>
<!--owl.carousel-->
<script type="text/javascript" src="/javascript/owl.carousel.min.js"></script>
<script type="text/javascript" src="/javascript/animsition.js"></script>

<!-- slider -->
<script src="/rev-slider/js/jquery.themepunch.revolution.min.js"></script>
<script src="/rev-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="/javascript/rev-slider.js"></script>

<!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
<script src="/rev-slider/js/extensions/extensionsrevolution.extension.actions.min.js"></script>
<script src="/rev-slider/js/extensions/extensionsrevolution.extension.carousel.min.js"></script>
<script src="/rev-slider/js/extensions/extensionsrevolution.extension.kenburn.min.js"></script>
<script src="/rev-slider/js/extensions/extensionsrevolution.extension.layeranimation.min.js"></script>
<script src="/rev-slider/js/extensions/extensionsrevolution.extension.migration.min.js"></script>
<script src="/rev-slider/js/extensions/extensionsrevolution.extension.navigation.min.js"></script>
<script src="/rev-slider/js/extensions/extensionsrevolution.extension.parallax.min.js"></script>
<script src="/rev-slider/js/extensions/extensionsrevolution.extension.slideanims.min.js"></script>
<script src="/rev-slider/js/extensions/extensionsrevolution.extension.video.min.js"></script>
</body>


</html>
