@extends('front.Base')
@section('title','Render | Blog')
@section('main')
    <div class="main wrap container">
        <div class="ts-row cf">
            <div class="col-sm-8 main-content cf">
                <article id="post-5968"
                         class="post-5968 post type-post status-publish format-standard has-post-thumbnail category-phong-cach"
                         itemscope="" itemtype="http://schema.org/Article">
                    <header class="post-header cf">
                        <div class="heading-area top-area">
                            <div class="container">
                                <div class="banner relative">
                                    <a href="hang-moi.html" target="_blank">
                                        <img class="lazyload" data-src="<?php echo e(asset('public/images/banner3.jpg')); ?>">
                                        <div class="banner_body center">
                                            <div class="upcase banner_header"></div>
                                            <div class="banner_description text-justify"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- End heading area -->
                    </header><!-- .post-header -->

                    <div class="post-meta"><span class="posted-on">on<span class="dtreviewed">
				<time class="value-datetime" datetime="{{$item->created_at}}"
                      itemprop="datePublished">{{$item->created_at}}</time>
			</span>
		</span>
                    </div>

                    <div class="post-container cf">
                        <div class="post-content text-font description" itemprop="articleBody">
                            <h1><strong>{{$item->title}}</strong></h1>
                            <br>
                            <img src="{{asset('public/media/'.$item->img)}}" data-zoom-image="{{asset('public/media/'.$item->img)}}">
                            <br>
                            {!! $item->content !!}
                        </div><!-- .post-content -->
                    </div>
                </article>
            </div>
        </div> <!-- .ts-row -->
    </div>
@stop
