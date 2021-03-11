@extends('frontend.layouts.app')

@section('content')

<main>

    @if( $articles->total() > 0 )

    <div class="archive-header pt-50">
        <div class="container">
            <h2 class="font-weight-900">Search results</h2>
            <div>
                We found {{ $articles->total() }} articles for keyword " <strong>{{ request('search_query') }}</strong> ".
            </div>
            <div class="bt-1 border-color-1 mt-30 mb-50"></div>
        </div>
    </div>

    <div class="pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="post-module-3">
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
                                                    <span class="has-dot"> <a href="{{ route('show.profile', $article->author->username) }}">{{ $article->author->name }}</a></span>
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
                                {{ $articles->withQueryString()->links('pagination::bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
                @include('frontend.layouts.side-widget')
            </div>
        </div>
    </div>

    @else

        <div class="container pb-50">
            <div class="row pt-80">
                <div class="col-lg-6 col-md-12 d-lg-block d-none pr-50"><img src="{{ asset('frontend/assets/imgs/theme/page-not-found.png') }}" alt=""></div>
                <div class="col-lg-6 col-md-12 pl-50 text-md-center text-lg-left">
                    <h1 class="mb-30 font-weight-900 page-404">404</h1>
                    <p class="">Sorry, What you looking for ? <br> We cannot found Article with keyword " <strong>{{ request('search_query') }}</strong> ".
                    </p>
                    <div class="form-group">
                        <a class="text-white button button-contactForm mt-30" href="/">Home page</a>
                    </div>
                </div>
            </div>
        </div>

    @endif

</main>

@endsection
