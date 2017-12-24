
{!! Theme::partial('header') !!}

@if (Route::currentRouteName() == 'public.index')
    <main class="main" id="main">
    <div class="container">
        <div class="main-index">
            <div class="row">
                <div class="col-md-3">
                    @php
                        echo Theme::partial('post-popular');
                        echo Theme::partial('mountain-status', ['category_ids' => explode(',', theme_option('mountain-status'))]);
                    @endphp
                    <div class="dynamic-sidebar">
                        {!! dynamic_sidebar('home_left') !!}
                    </div>
                </div>
                <div class="col-md-6 middle-widget">
                    @php
                        echo Theme::partial('post-slide', ['category_ids' => explode(',', theme_option('home-slider-feed'))]);
                        echo Theme::partial('post-tab', ['category_ids' => explode(',', theme_option('home-tabbed-feed'))]);
                    @endphp
                    <div class="dynamic-sidebar no-title">
                        @php
                            echo Theme::partial('post-midpanel');
                        @endphp
                    </div>
                </div>
                <div class="col-md-3">
                    @php
                        echo Theme::partial('post-video', ['category_ids' => explode(',', theme_option('home-right-feed'))]);
                    @endphp
                    <div class="dynamic-sidebar">
                        {!! dynamic_sidebar('home_right') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@elseif (Request::segment(1) == 'diorama' || Request::segment(1) == 'diorama.html')
    <main class="main" id="main">
    <div id="main-diorama" class="container-fluid">
        <div class="row">
            <!-- <div class="col-md-12 middle-widget"> -->
                @php
                    $news_id = get_diorama()[0]['attributes']['id'];
                    if($news_id){
                        echo Theme::partial('slide-diorama', ['category_ids' => [$news_id]]);
                        echo Theme::partial('post-diorama-middle', ['post_ids' => explode(',', theme_option('diorama-middle'))]);
                        echo Theme::partial('post-diorama', ['category_ids' => [$news_id]]);
                    }
                @endphp
            <!-- </div> -->
        </div>
    </div>
    </main>
    @elseif (Request::segment(1) == 'berita')
    <main class="main" id="main">
    <div class="container">
    <div class="main-index">
        <div class="row">
            {{-- <div class="col-md-2">
                <div class="calender">
                    <div class="row">
                        <div class="col-md-12 col-xs-6">
                            <div class="col-calender" style="">
                                <span class="pull-left"></span>
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                                <center>    
                                    <h3>{{ date('d') }}</h3>
                                    <p>{{ date('Y-m') }}</p>
                                </center>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-6">
                            <div class="col-share">
                                <h3>Share With :</h3>
                                <div class="col-sosmed">
                                    <div class="sharethis-inline-share-buttons"></div>
                                    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59c69294c28d0800122e1b44&product=inline-share-buttons"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-3">
                <div class="dynamic-sidebar">
                    @php
                        echo Theme::partial('post-popular');
                        echo Theme::partial('mountain-status', ['category_ids' => explode(',', theme_option('mountain-status'))]);
                    @endphp
                        {!! dynamic_sidebar('home_left') !!}
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        {!! Theme::breadcrumb()->render() !!}
                    </div>
                    {!! Theme::content() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
    </main>
@elseif (Request::segment(1) == 'publikasi')
    <main class="main" id="main">
    <div class="container">
        <div class="main-index">
            <div class="row">
                @if (Request::segment(2) == 'poster')
                    <div class="col-md-12">
                        <h3 class="block-title"><span><a href="{{ url('/publikasi/poster') }}" title="Publikasi BNPB">Publikasi Poster BNPB</a></span></h3>
                    </div>
                    @php
                        $publikasi_id = get_publikasi_poster()[0]['attributes']['id'];
                        if($publikasi_id) { 
                            echo Theme::partial('post-publikasi', ['category_ids' => [$publikasi_id]]);
                        }
                    @endphp
                @elseif (Request::segment(2) == 'leaflet')
                    <div class="col-md-12">
                        <h3 class="block-title"><span><a href="{{ url('/publikasi/leaflet') }}" title="Publikasi BNPB">Publikasi Leaflet BNPB</a></span></h3>
                    </div>
                    @php
                        $publikasi_id = get_publikasi_leaflet()[0]['attributes']['id'];
                        if($publikasi_id) { 
                            echo Theme::partial('post-publikasi', ['category_ids' => [$publikasi_id]]);
                        }
                    @endphp
                @elseif (Request::segment(2) == 'buku-data-bencana')
                    <div class="col-md-12">
                        <h3 class="block-title"><span><a href="{{ url('/publikasi/buku-data-bencana') }}" title="Publikasi BNPB">Publikasi Buku Data Bencana BNPB</a></span></h3>
                    </div>
                    @php
                        $publikasi_id = get_publikasi_buku()[0]['attributes']['id'];
                        if($publikasi_id) { 
                            echo Theme::partial('post-publikasi', ['category_ids' => [$publikasi_id]]);
                        }
                    @endphp
                @elseif (Request::segment(2) == 'info-bencana')
                    <div class="col-md-12">
                        <h3 class="block-title"><span><a href="{{ url('/publikasi/info-bencana') }}" title="Publikasi BNPB">Publikasi Info Bencana BNPB</a></span></h3>
                    </div>
                    @php
                        $publikasi_id = get_publikasi_buletin_bencana()[0]['attributes']['id'];
                        if($publikasi_id) { 
                            echo Theme::partial('post-publikasi', ['category_ids' => [$publikasi_id]]);
                        }
                    @endphp
                @elseif (Request::segment(2) == 'infografis')
                    <div class="col-md-12">
                        <h3 class="block-title"><span><a href="{{ url('/publikasi/infografis') }}" title="Publikasi BNPB">Publikasi Infografis BNPB</a></span></h3>
                    </div>
                    @php
                        $publikasi_id = get_publikasi_infografis()[0]['attributes']['id'];
                        if($publikasi_id) { 
                            echo Theme::partial('post-publikasi', ['category_ids' => [$publikasi_id]]);
                        }
                    @endphp
                @elseif (Request::segment(2) == 'foto')
                    <div class="col-md-12">
                        <h3 class="block-title"><span><a href="{{ url('/publikasi/foto') }}" title="Publikasi BNPB">Publikasi Foto BNPB</a></span></h3>
                    </div>
                    @php
                        $publikasi_id = get_publikasi_foto()[0]['attributes']['id'];
                        if($publikasi_id) { 
                            echo Theme::partial('post-publikasi', ['category_ids' => [$publikasi_id]]);
                        }
                    @endphp
                @else
                    <div class="col-md-12">
                        <h3 class="block-title"><span><a href="{{ url('/publikasi/semua-publikasi') }}" title="Publikasi BNPB">Semua Publikasi BNPB</a></span></h3>
                    </div>
                    @php
                        $publikasi_id = get_publikasi()[0]['attributes']['id'];
                        if($publikasi_id) { 
                            echo Theme::partial('post-publikasi', ['category_ids' => [$publikasi_id]]);
                        }
                    @endphp
                @endif
                
            </div>
        </div>
    </div>
    </main>
@elseif (Request::segment(1) == 'detail-publikasi')
    <main class="main" id="main">
    <div class="container">
        <div class="main-index">
            <div class="row">
                {!! Theme::content() !!}
                </div>
            </div>
        </div>
    </div>
    </main>
@else
    <main class="main" id="main">
    <div class="container">
    <div class="main-content">
        <div class="row">
            <div class="col-md-2">
                <div class="calender">
                    <div class="row">
                        <div class="col-md-12 col-xs-6">
                            <div class="col-calender" style="">
                                <span class="pull-left"></span>
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                                <center>    
                                    <h3>{{ date('d') }}</h3>
                                    <p>{{ date('Y-m') }}</p>
                                </center>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-6">
                            <div class="col-share">
                                <h3>Share With :</h3>
                                <div class="col-sosmed">
                                    <div class="sharethis-inline-share-buttons"></div>
                                    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59c69294c28d0800122e1b44&product=inline-share-buttons"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           {{--  <div class="col-md-3">
                <div class="dynamic-sidebar">
                    @php
                        echo Theme::partial('post-popular');
                        echo Theme::partial('mountain-status', ['category_ids' => explode(',', theme_option('mountain-status'))]);
                    @endphp
                        {!! dynamic_sidebar('home_left') !!}
                </div>
            </div> --}}
            <div class="col-md-9 middle-widget">
                <div class="row">
                    <div class="col-md-12">
                        {!! Theme::breadcrumb()->render() !!}
                    </div>
                    {!! Theme::content() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
    </main>
@endif

{!! Theme::partial('footer') !!}