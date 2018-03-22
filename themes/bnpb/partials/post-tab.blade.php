@if (!empty(array_filter($category_ids)))
	@php
        $_cats = [];
        $_news = [];
        $_tab = 'active';
        $_pane = 'active';
    @endphp

    <ul class="nav nav-tabs">
	    @foreach ($category_ids as $catIds)
	    	@php
	    		$_cats[$catIds] = get_category_by_id($catIds);
		    @endphp
		    @if ($catIds == 'Berita Terbaru')
		    	@php
		    		$_cats[$catIds] = get_category_by_id(17);
			    @endphp
        		<li class="{{$_tab}}"><a data-toggle="tab" href="#tab01">Berita Terbaru</a></li>
		    @elseif ($catIds == 'Siaran Pers')
		    	@php
		    		$_cats[$catIds] = get_category_by_id(23);
			    @endphp
        		<li class="{{$_tab}}"><a data-toggle="tab" href="#tab02">Siaran Pers</a></li>
    		@elseif ($_cats[$catIds])
        		<li class="{{$_tab}}"><a data-toggle="tab" href="#tab{{$catIds}}">{{ $_cats[$catIds]->name }}</a></li>
    		@endif
        	@php
        		$_tab = '';
		    @endphp
	    @endforeach
    </ul>

    <div class="tab-content green-section">
    	@foreach ($category_ids as $catIds)
    		@if ($catIds == 'Berita Terbaru')
        		<div id="tab01" class="tab-pane fade in {{$_pane}}">
			        @php
			            $_news[$catIds] = get_posts_by_category(17,3,5);
			        @endphp
			        @if (count($_news[$catIds]) > 0)
			            @foreach ($_news[$catIds] as $news_item)
			            <a href="{{ route('public.single.detail', $news_item->slug) }}"
			               title="{{ $news_item->name }}" class="block-has-border">
			                <span class="post-item"
			                      title="{{ $news_item->name }}">
			                    <h3>{{ $news_item->name }}</h3>
			                </span>
			                <span class="post-date">
			                    {{ date('d F Y | H:i', strtotime($news_item->created_at)) }}WIB
			                </span><br>
			                
			                <span>
			                	<p align="justify">
			                	{{-- {{str_limit('The PHP framework for web artisans.', 7)}} --}}
			                	{{ str_limit(strip_tags( $news_item->content),300)}}
			               		</p>
			                </span>
			            </a>
			            @endforeach
			            <a href="{{ route('public.single.detail', $_cats[$catIds]->slug) }}" class="block-button">
			                <span class="post-date">
			                    Berita Terbaru Lainnya
			                </span>
			            </a>
			        @endif
			    </div>
		    @elseif ($catIds == 'Siaran Pers')
        		<div id="tab02" class="tab-pane fade in {{$_pane}}">
			        @php
			            $_news[$catIds] = get_posts_by_category(60,10,5);
			        @endphp
			        @if (count($_news[$catIds]) > 0)
			            @foreach ($_news[$catIds] as $news_item)
			            <a href="{{ route('public.single.detail', $news_item->slug) }}"
			               title="{{ $news_item->name }}" class="block-has-border">
			                <span class="post-date">
			                    {{ date('d F Y | H:i', strtotime($news_item->created_at)) }}WIB
			                </span>
			                <span class="post-item"
			                      title="{{ $news_item->name }}">
			                    <h3>{{ $news_item->name }}</h3>
			                </span>
			            </a>
			            @endforeach
			            <a href="{{ url('/siaran-pers') }}" class="block-button">
			                <span class="post-date">
							Siaran Pers Lainnya
			                </span>
			            </a>
			        @endif
			    </div>
    		@elseif ($_cats[$catIds])
			    <div id="tab{{$catIds}}" class="tab-pane fade in {{$_pane}}">
			        @php
			            $_news[$catIds] = get_posts_by_category($catIds,10,5);
			        @endphp
			        @if (count($_news[$catIds]) > 0)
			            @foreach ($_news[$catIds] as $news_item)
			            <a href="{{ route('public.single.detail', $news_item->slug) }}"
			               title="{{ $news_item->name }}" class="block-has-border">
			                <span class="post-date">
			                    {{ date('d F Y | H:i', strtotime($news_item->created_at)) }}WIB
			                </span>
			                <span class="post-item"
			                      title="{{ $news_item->name }}">
			                    <h3>{{ $news_item->name }}</h3>
			                </span>
			            </a>
			            @endforeach
			            <a href="{{ route('public.single.detail', $_cats[$catIds]->slug) }}" class="block-button">
			                <span class="post-date">
			                    Pengumuman Lainnya
			                </span>
			            </a>
			        @endif
			    </div>
    		@endif
    		@php
        		$_pane = '';
		    @endphp
    	@endforeach
	</div>
@endif