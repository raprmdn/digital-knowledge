@extends('frontend.layouts.app')

@section('content')

<main class="bg-grey pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--author box-->
                <div class="author-bio mb-50 bg-white p-30 border-radius-10">
                    <div class="author-image mb-30">
                        <a href="{{ route('show.profile', $user->username) }}"><img src="{{ $user->takeProfilePicture }}" alt="" class="avatar"></a>
                    </div>
                    <div class="author-info">
                        <h3 class="font-weight-900"><span class="vcard author"><span class="fn"><a href="{{ route('show.profile', $user->username) }}" rel="author">{{ $user->name }}</a></span></span>
                        </h3>
                        <h5 class="text-muted">About author</h5>
                        <div class="author-description text-muted">{{ $user->profile_description }}</div>
                        <strong class="text-muted">Follow: </strong>
                        <ul class="header-social-network d-inline-block list-inline color-white mb-20">
                            <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                            <li class="list-inline-item"><a class="social-icon text-xs-center" style="background: #C13584;" target="_blank" href="#"><i class="elegant-icon social_instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="post-module-2">
                    <div class="widget-header-1 position-relative mb-30  wow fadeInUp animated">
                        <h5 class="mt-5 mb-30">Posted by {{ $user->name }}</h5>
                    </div>
                    <div class="loop-list loop-list-style-1">
                        <div class="row">
                            @foreach ($articles->slice(0, 2) as $article)
                                <article class="col-md-6 mb-40 wow fadeInUp  animated">
                                    <div class="post-card-1 border-radius-10 hover-up">
                                        <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ $article->takeImage }} )">
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
                </div>
                <div class="post-module-3">
                    <div class="widget-header-1 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Latest posts</h5>
                    </div>
                    <div class="loop-list loop-list-style-1">
                        @foreach ($articles->slice(2,13) as $article)
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
</main>

@endsection