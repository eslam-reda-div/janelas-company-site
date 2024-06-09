<!-- Blog -->
<div style="margin-top: 20px" class="blog-content no-column clearfix" wire:poll>
    <div class="themesflat-spacer  clearfix" data-desktop="100" data-mobile="60" data-smobile="50"></div>
    <div class="container">
        <div class="col-left content-style1">
            <div class="site-content">
                @if($allPosts->count() > 0)
                    @foreach($allPosts as $post)
                        <article class="main-post">
                            <div class="featured-post">
                                <div class="entry-image wow fadeUp animated" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <img loading="lazy" src="{{ URL::asset('storage/' . $post->image) }}" alt="images" />
                                </div>
                            </div>

                            <div class="conten-section">
                                <div class="post-calendar">
                                    <span class="inner">
                                        <span class="entry-calendar">
                                        <span class="day">{{ \Illuminate\Support\Carbon::make($post->created_at)->format('j F Y') }}</span>
                                        </span>
                                    </span>
                                </div>
                                <div class="content-blog">
                                    <ul class="post-meta">
                                        <li class="date">
                                            <span>
                                                @if($post->categories->count() > 0)
                                                    <a href="#"><i class="far fa-folder-open"></i>
                                                        @foreach($post->categories as $category)
                                                            {{ App::isLocale('ar') ? $category->name_ar : $category->name_en }}
                                                            {{ !$loop->last ? ', ' : '' }}
                                                        @endforeach
                                                    </a>
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="title">
                                        <a href="{{ route('blog-details', $post->id) }}">
                                            {{ App::isLocale('ar') ? $post->title_ar : $post->title_en }}
                                        </a>
                                    </div>
                                    <div class="flat-read-more">
                                        <span><i class="fas fa-arrow-alt-circle-right"></i><a href="{{ route('blog-details', $post->id) }}">{{ __('read-more') }}</a></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!-- main-post -->
                    @endforeach
                @else
                    <div class="main-post" style="margin-top: 100px;text-align: center">
                        <div class="conten-section">
                            <div class="content-blog">
                                <div class="title">
                                    <a href="#">
                                        {{ __('no-posts') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="themesflat-pagination clearfix">
                {{ $allPosts->links(data: ['scrollTo' => false]) }}
            </div>
        </div>
        <div class="col-right margin-top2">
            <div id="sidebar" class="sidebar-style2">
                <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60"></div>
                <div id="inner-sidebar" class="inner-content-wrap">
                    <!-- Widget-search   -->
                    @if (\App\Models\Post::where('is_published', 1)->count() > 0)
                        <div class="widget widget-search clearfix">
                            <h2 class="widget-title">
                                <span>{{ __('search') }}</span>
                            </h2>
                            <form class="form-search clearfix">
                                <input type="search" wire:model="search" class="search margin-top1" placeholder="{{ __('search') }}" required/>
                                <button type="button" class="btn-search linear-color">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    @endif

                    @if (\App\Models\Category::count() > 0)
                        <!-- Widget-category  -->
                        <div class="widget widgetstyle widget-category widget-bg">
                            <h2 class="widget-title"><span>{{ __('category') }}</span></h2>
                            <ul class="category-wrap">
                                <li>
                                    <div class="block-inside" x-on:click="$wire.category = ''" style="cursor: pointer">
                                        <a>
                                            {{ __('all') }}
                                        </a>
                                    </div>
                                </li>
                                @foreach(\App\Models\Category::all() as $category)
                                    <li>
                                        <div class="block-inside" x-on:click="$wire.category = '{{ $category->id }}'" style="cursor: pointer">
                                            <a>
                                                {{ App::isLocale('ar') ? $category->name_ar : $category->name_en }}
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (\App\Models\Post::where('is_published', 1)->count() > 0)
                        <!-- Widget_lastest -->
                        <div class="widget widget_lastest" style="margin-top: 0">
                            <h2 class="widget-title padding-left2"><span>{{ __('recent-news') }}</span></h2>
                            <ul class="lastest-posts data-effect margintop3 clearfix">
                                @foreach(\App\Models\Post::orderByDesc('id')->limit(3)->get() as $recentPosts)
                                    <li class="lastest-box clearfix">
                                        <div class="thumb">
                                            <img loading="lazy" style="width: 100px;max-height: 69px;" src="{{ URL::asset('storage/' . $recentPosts->image) }}" alt="Image" />
                                            <div class="overlay-effect"></div>
                                        </div>
                                        <div class="text">
                                            <h5>
                                                <a href="{{ route('blog-details', $recentPosts->id) }}">
                                                    {{ App::isLocale('ar') ? Str()->limit($recentPosts->title_ar, 25) : Str()->limit($recentPosts->title_en, 25) }}
                                                </a>
                                            </h5>
                                            <span class="post-date"
                                            ><span class="entry-date">{{ \Illuminate\Support\Carbon::make($recentPosts->created_at)->format('j F Y') }}
                                                    </span></span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Image blog -->
                    <div class="blog-contact wow fadeInRight animated" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <img loading="lazy" src="{{ URL::asset('storage/' . app(App\Settings\SiteSetting::class)->home_contact_form_image) }}" alt="" />

                        <div class="contact-info">
                            <div class="call-us">
                                <div class="icon-call-us"></div>
                                <div class="content-call-us">
                                    <div class="text-body"><span>{{ __('call-us') }}</span></div>
                                    <div class="text-number">
                                            <span>
                                                <a style="color: white;" href="tel:{{ app(App\Settings\SiteSetting::class)->phone[0]['phone'] }}">{{ app(App\Settings\SiteSetting::class)->phone[0]['phone'] }}</a>
                                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="mail">
                                <div class="icon-mail"></div>
                                <div class="content-mail">
                                    <div class="text-body"><span>{{ __('mail-us') }}</span></div>
                                    <div class="text-number">
                                        <span>
                                            <a style="color: white;" href="mailto:{{ app(App\Settings\SiteSetting::class)->email[0]['email'] }}">{{ app(App\Settings\SiteSetting::class)->email[0]['email'] }}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="themesflat-spacer  clearfix" data-desktop="120" data-mobile="60" data-smobile="50"></div>
    </div>
    <!-- blog-content -->
</div>
