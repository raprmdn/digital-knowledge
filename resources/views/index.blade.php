@extends('frontend.layouts.app')

@section('content')


@if ($articles->onFirstPage())
    <main class="bg-grey pb-30">

        <div class="container pt-30">
            <div class="featured-slider-3 position-relative">
                <div class="slider-3-arrow-cover"></div>
                <div class="featured-slider-3-items">
                    @foreach ($articles->slice(0, 4) as $article)
                        <div class="slider-single overflow-hidden border-radius-10">
                            <div class="post-thumb position-relative">
                                <div class="thumb-overlay position-relative" style="background-image: url({{ $article->takeImage }})">
                                    <div class="post-content-overlay">
                                        <div class="container">
                                            <div class="entry-meta meta-0 font-small mb-20">
                                                <a href="{{ route('show.category', $article->category->category_slug) }}" tabindex="0"><span class="text-white text-uppercase">{{ $article->category->category_name }}</span></a>
                                            </div>
                                            <h1 class="post-title mb-20 font-weight-900 text-white">
                                                <a class="text-white" href="{{ route('show.article', [$article->category->category_slug, $article->article_slug]) }}"
                                                    tabindex="0">{{ $article->article_title }}</a>
                                            </h1>
                                            <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                                <span class="post-on">{{ $article->created_at->diffForHumans() }}</span>
                                                <span class="has-dot"> <a href="{{ route('show.profile', $article->author->username) }}" class="text-white">{{ $article->author->name }}</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>      

        <div class="container">
            <div class="hot-tags pt-30 pb-30 font-small align-self-center">
                <div class="widget-header-3">
                    <div class="row align-self-center">
                        <div class="col-md-4 align-self-center">
                            <h5 class="widget-title">Featured posts</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="loop-grid mb-30">
                <div class="row">
                    <div class="col-lg-8 mb-30">
                        <div class="carausel-post-1 hover-up border-radius-10 overflow-hidden transition-normal position-relative wow fadeInUp animated">
                            <div class="arrow-cover"></div>
                            <div class="slide-fade">
                                @foreach ($articles->slice(4, 2) as $article)
                                    <div class="position-relative post-thumb">
                                        <div class="thumb-overlay img-hover-slide position-relative" style="background-image: url({{ $article->takeImage }})">
                                            <a class="img-link" href="{{ route('show.article', [$article->category->category_slug, $article->article_slug]) }}"></a>
                                            <span class="top-left-icon bg-warning"><i class="elegant-icon icon_star_alt"></i></span>
                                            <div class="post-content-overlay text-white ml-30 mr-30 pb-30">
                                                <div class="entry-meta meta-0 font-small mb-20">
                                                    <a href="{{ route('show.category', $article->category->category_slug) }}"><span class="text-white text-uppercase">{{ $article->category->category_name }}</span></a>
                                                </div>
                                                <h3 class="post-title font-weight-900 mb-20">
                                                    <a class="text-white" href="{{ route('show.article', [$article->category->category_slug, $article->article_slug]) }}">{{ $article->article_title }}</a>
                                                </h3>
                                                <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                                    <span class="post-on">{{ $article->created_at->diffForHumans() }}</span>
                                                    <span class="has-dot"> <a href="#" class="text-white">{{ $article->author->name }}</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @foreach ($articles->slice(6, 4) as $article)
                        <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                            <div class="post-card-1 border-radius-10 hover-up">
                                <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ $article->takeImage }})">
                                    <a class="img-link" href="{{ route('show.article', [$article->category->category_slug, $article->article_slug]) }}"></a>
                                    <ul class="social-share">
                                        <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon text-xs-center" style="background: #C13584;" target="_blank" href="#"><i class="elegant-icon social_instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="post-content p-30">
                                    <div class="entry-meta meta-0 font-small mb-10">
                                        <a href="{{ route('show.category', $article->category->category_slug) }}"><span class="text-info">{{ $article->category->category_name }}</span></a>
                                    </div>
                                    <div class="d-flex post-card-content">
                                        <h5 class="post-title mb-20 font-weight-900">
                                            <a href="{{ route('show.article', [$article->category->category_slug, $article->article_slug]) }}">{{ $article->article_title }}</a>
                                        </h5>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on">{{ $article->created_at->diffForHumans() }}</span>
                                            <span class="has-dot"> <a href="#">{{ $article->author->name }}</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-grey pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="post-module-2">
                            @foreach ($categories->shuffle()->take(1) as $category)
                                <div class="widget-header-1 position-relative mb-30  wow fadeInUp animated">
                                    <h5 class="mt-5 mb-30">{{ $category->category_name }} tips</h5>
                                </div>
                                <div class="loop-list loop-list-style-1">
                                    <div class="row">
                                        @foreach ($category->articles->take(4) as $article)
                                            <article class="col-md-6 mb-40 wow fadeInUp  animated">
                                                <div class="post-card-1 border-radius-10 hover-up">
                                                    <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ $article->takeImage }} )">
                                                        <a class="img-link" href="{{ route('show.article', [$category->category_slug, $article->article_slug]) }}"></a>
                                                        <ul class="social-share">
                                                            <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                            <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                                                            <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                                                            <li class="list-inline-item"><a class="social-icon text-xs-center" style="background: #C13584;" target="_blank" href="#"><i class="elegant-icon social_instagram"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="post-content p-30">
                                                        <div class="entry-meta meta-0 font-small mb-10">
                                                            <a href="{{ route('show.category', $category->category_slug) }}"><span class="text-info">{{ $article->category->category_name }}</span></a>
                                                        </div>
                                                        <div class="d-flex post-card-content">
                                                            <h5 class="post-title mb-20 font-weight-900">
                                                                <a href="{{ route('show.article', [$category->category_slug, $article->article_slug]) }}">{{ $article->article_title }}</a>
                                                            </h5>
                                                            <div class="post-excerpt mb-25 font-small text-muted">
                                                                <p>{!! Str::limit(strip_tags($article->article_content), $limit = 150, '...') !!}</p>
                                                            </div>
                                                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                                <span class="post-on">{{ $article->created_at->diffForHumans() }}</span>
                                                                <span class="has-dot"> <a href="#">{{ $article->author->name }}</a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="post-module-3">
                            <div class="widget-header-1 position-relative mb-30">
                                <h5 class="mt-5 mb-30">Latest posts</h5>
                            </div>
                            <div class="loop-list loop-list-style-1">
                                @foreach ($articles->slice(10, 5) as $article)
                                    <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                        <div class="row mb-40 list-style-2">
                                            <div class="col-md-4">
                                                <div class="post-thumb position-relative border-radius-5">
                                                    <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url({{ $article->takeImage }} )">
                                                        <a class="img-link" href="{{ route('show.article', [$article->category->category_slug, $article->article_slug]) }}"></a>
                                                    </div>
                                                    <ul class="social-share">
                                                        <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                                                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                                                        <li class="list-inline-item"><a class="social-icon text-xs-center" style="background: #C13584;" target="_blank" href="#"><i class="elegant-icon social_instagram"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-8 align-self-center">
                                                <div class="post-content">
                                                    <div class="entry-meta meta-0 font-small mb-10">
                                                        <a href="{{ route('show.category', $article->category->category_slug) }}"><span class="text-primary">{{ $article->category->category_name }}</span></a>
                                                    </div>
                                                    <h5 class="post-title font-weight-900 mb-20">
                                                        <a href="{{ route('show.article', [$article->category->category_slug, $article->article_slug]) }}">{{ $article->article_title }}</a>
                                                        <span class="post-format-icon"><i class="elegant-icon icon_star_alt"></i></span>
                                                    </h5>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on">{{ $article->created_at->diffForHumans() }}</span>
                                                        <span class="has-dot"> <a href="#">{{ $article->author->name }}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                        <div class="pagination-area mb-30 wow fadeInUp animated">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    {{ $articles->links('pagination::bootstrap-4') }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    @include('frontend.layouts.side-widget')
                </div>
            </div>
        </div>

    </main>
    @include('frontend.layouts.site-bottom')

@else

    <main class="bg-grey pb-30">
        <div class="bg-grey pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="post-module-3">
                            <div class="widget-header-1 position-relative mb-30">
                                <h5 class="mt-5 mb-30">Latest posts</h5>
                            </div>
                            <div class="loop-list loop-list-style-1">
                                @foreach ($articles as $article)
                                    <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                        <div class="row mb-40 list-style-2">
                                            <div class="col-md-4">
                                                <div class="post-thumb position-relative border-radius-5">
                                                    <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url({{ $article->takeImage }} )">
                                                        <a class="img-link" href="{{ route('show.article', [$article->category->category_slug, $article->article_slug]) }}"></a>
                                                    </div>
                                                    <ul class="social-share">
                                                        <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                                                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                                                        <li class="list-inline-item"><a class="social-icon text-xs-center" style="background: #C13584;" target="_blank" href="#"><i class="elegant-icon social_instagram"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-8 align-self-center">
                                                <div class="post-content">
                                                    <div class="entry-meta meta-0 font-small mb-10">
                                                        <a href="{{ route('show.category', $article->category->category_slug) }}"><span class="text-primary">{{ $article->category->category_name }}</span></a>
                                                    </div>
                                                    <h5 class="post-title font-weight-900 mb-20">
                                                        <a href="{{ route('show.article', [$article->category->category_slug, $article->article_slug]) }}">{{ $article->article_title }}</a>
                                                        <span class="post-format-icon"><i class="elegant-icon icon_star_alt"></i></span>
                                                    </h5>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on">{{ $article->created_at->diffForHumans() }}</span>
                                                        <span class="has-dot"> <a href="#">{{ $article->author->name }}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                        <div class="pagination-area mb-30 wow fadeInUp animated">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    {{ $articles->links('pagination::bootstrap-4') }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    @include('frontend.layouts.side-widget')
                </div>
            </div>
        </div>
    </main>
    @include('frontend.layouts.site-bottom')

@endif

@endsection