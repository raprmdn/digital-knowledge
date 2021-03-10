@extends('frontend.layouts.app')

@section('content')

<main class="bg-grey pb-30">       
    <div class="container single-content">
        <div class="entry-header entry-header-style-1 mb-50 pt-50">
            <h1 class="entry-title mb-50 font-weight-900">
                {{ $article->article_title }}
            </h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="entry-meta align-items-center meta-2 font-small color-muted">
                        <p class="mb-5">
                            @if ($article->author->profile_picture)
                                <a class="author-avatar" href="#"><img class="img-circle" src="{{ $article->author->takeProfilePicture }}" alt=""></a>
                            @else
                                <a class="author-avatar" href="#"><img class="img-circle" src="{{ asset('frontend/assets/imgs/authors/default-photo-profile-icon.png') }}" alt=""></a>
                            @endif
                            By <a href="#"><span class="author-name font-weight-bold">{{ $article->author->name }}</span></a>
                        </p>
                        @if ($article->article_status == "Publish")
                            <span class="mr-10"> {{ $article->created_at->format('d F Y, H:i') }}</span>
                            <span class="has-dot"><a href="{{ route('show.category', $article->category->category_slug) }}">{{ $article->category->category_name }} &nbsp;</a></span>
                            @if ($article->edited_at)
                                <span class="has-dot"> Edited</span>
                            @endif
                        @else
                            <span class="mr-10"> {{ $article->created_at->format('d F Y, H:i') }}</span>
                            <span class="has-dot"><a href="{{ route('show.category', $article->category->category_slug) }}">{{ $article->category->category_name }} &nbsp;</a></span>
                            @if ($article->edited_at)
                                <span class="has-dot"> Edited &nbsp;</span>
                            @endif
                            <span class="has-dot"> Unlisted</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 text-right d-none d-md-inline">
                    <ul class="header-social-network d-inline-block list-inline mr-15">
                        <li class="list-inline-item text-muted"><span>Share this: </span></li>
                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                        <li class="list-inline-item"><a class="social-icon text-xs-center" style="background: #C13584;" target="_blank" href="#"><i class="elegant-icon social_instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--end single header-->
        <figure class="image mb-30 m-auto text-center border-radius-10">
            <img class="border-radius-10" src="{{ $article->takeImage }}" alt="{{ $article->article_slug }}">
        </figure>
        <!--figure-->
        <article class="entry-wraper mb-50">
            <p>{!! $article->article_content !!}</p>
            <div class="entry-bottom mt-50 mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                <div class="tags">
                    <span>Tags: </span>
                    @foreach ($article->tags as $tag)
                        <a href="{{ route('show.tag', $tag->tag_slug) }}" rel="tag">{{ $tag->tag_name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="single-social-share clearfix wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                {{-- <div class="entry-meta meta-1 font-small color-grey float-left mt-10">
                    <span class="hit-count mr-15"><i class="elegant-icon icon_comment_alt mr-5"></i>182 comments</span>
                    <span class="hit-count mr-15"><i class="elegant-icon icon_like mr-5"></i>268 likes</span>
                    <span class="hit-count"><i class="elegant-icon icon_star-half_alt mr-5"></i>Rate: 9/10</span>
                </div> --}}
                <ul class="header-social-network d-inline-block list-inline float-md-right mt-md-0 mt-4">
                    <li class="list-inline-item text-muted"><span>Share this: </span></li>
                    <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                        <li class="list-inline-item"><a class="social-icon text-xs-center" style="background: #C13584;" target="_blank" href="#"><i class="elegant-icon social_instagram"></i></a></li>
                </ul>
            </div>
            <!--author box-->
            <div class="author-bio p-30 mt-50 border-radius-10 bg-white wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                <div class="author-image mb-30">
                    @if ($article->author->profile_picture)
                        <a class="author-avatar" href="#"><img class="img-circle" src="{{ $article->author->takeProfilePicture }}" alt=""></a>
                    @else
                        <a class="author-avatar" href="#"><img class="img-circle" src="{{ asset('frontend/assets/imgs/authors/default-photo-profile-icon.png') }}" alt=""></a>
                    @endif
                </div>
                <div class="author-info">
                    <h4 class="font-weight-bold mb-20"><span class="vcard author"><span class="fn"><a href="#" title="Posted by{{ $article->author->name }}" rel="author">{{ $article->author->name }}</a></span></span>
                    </h4>
                    <h5 class="text-muted">About author</h5>
                    <div class="author-description text-muted">{{ $article->author->profile_description }}</div>
                    <a href="#" class="author-bio-link mb-md-0 mb-3">View All Article</a>
                </div>
            </div>
            <!--related posts-->
            <div class="related-posts">
                <div class="post-module-3">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Related posts</h5>
                    </div>
                    <div class="loop-list loop-list-style-1">
                        @foreach ($relatedArticle as $related)
                            <article class="hover-up-2 transition-normal wow fadeInUp   animated" style="visibility: visible; animation-name: fadeInUp;">
                                <div class="row mb-40 list-style-2">
                                    <div class="col-md-4">
                                        <div class="post-thumb position-relative border-radius-5">
                                            <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url({{ $related->takeImage }})">
                                                <a class="img-link" href="{{ route('show.article', [$related->category->category_slug, $related->article_slug]) }}"></a>
                                            </div>
                                            <ul class="social-share">
                                                <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-8 align-self-center">
                                        <div class="post-content">
                                            <div class="entry-meta meta-0 font-small mb-10">
                                                <a href="{{ route('show.category', $article->category->category_slug) }}"><span class="text-primary">{{ $related->category->category_name }}</span></a>
                                            </div>
                                            <h5 class="post-title font-weight-900 mb-20">
                                                <a href="{{ route('show.article', [$related->category->category_slug, $related->article_slug]) }}">{{ $related->article_title }}</a>
                                                <span class="post-format-icon"><i class="elegant-icon icon_star_alt"></i></span>
                                            </h5>
                                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                <span class="post-on">{{ $related->created_at->diffForHumans() }}</span>
                                                <span class="has-dot"> <a href="#">{{ $related->author->name }}</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </article>
    </div>

</main>
@include('frontend.layouts.site-bottom')

@endsection