@extends('frontend.layouts.app')

@section('content')

<main class="bg-grey pb-30">       
    <div class="container pt-30">
        <div class="featured-slider-3 position-relative">
            <div class="slider-3-arrow-cover"></div>
            <div class="featured-slider-3-items">
                <div class="slider-single overflow-hidden border-radius-10">
                    <div class="post-thumb position-relative">
                        <div class="thumb-overlay position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-16.jpg') }} )">
                            <div class="post-content-overlay">
                                <div class="container">
                                    <div class="entry-meta meta-0 font-small mb-20">
                                        <a href="category.html.htm" tabindex="0"><span class="post-cat text-info text-uppercase">Travel</span></a>
                                        <a href="category.html.htm" tabindex="0"><span class="post-cat text-warning text-uppercase">Animal</span></a>
                                    </div>
                                    <h1 class="post-title mb-20 font-weight-900 text-white">
                                        <a class="text-white" href="single.html.htm" tabindex="0">How to Visit Bali's Monkey Forest</a>
                                    </h1>
                                    <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                        <span class="post-on">26 August 2020</span>
                                        <span class="hit-count has-dot">18k Views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-single overflow-hidden border-radius-10">
                    <div class="post-thumb position-relative">
                        <div class="thumb-overlay position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-17.jpg')}})">
                            <div class="post-content-overlay">
                                <div class="container">
                                    <div class="entry-meta meta-0 font-small mb-20">
                                        <a href="category.html.htm" tabindex="0"><span class="post-cat text-info text-uppercase">Lifestyle</span></a>
                                        <a href="category.html.htm" tabindex="0"><span class="post-cat text-warning text-uppercase">Destinations</span></a>
                                    </div>
                                    <h1 class="post-title mb-20 font-weight-900 text-white">
                                        <a class="text-white" href="single.html.htm" tabindex="0">Abstract Australia from Above</a>
                                    </h1>
                                    <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                        <span class="post-on">15 September 2020</span>
                                        <span class="hit-count has-dot">23k Views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-single overflow-hidden border-radius-10">
                    <div class="post-thumb position-relative">
                        <div class="thumb-overlay position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-18.jpg')}} )">
                            <div class="post-content-overlay">
                                <div class="container">
                                    <div class="entry-meta meta-0 font-small mb-20">
                                        <a href="category.html.htm" tabindex="0"><span class="post-cat text-warning text-uppercase">Travel Tips</span></a>
                                    </div>
                                    <h1 class="post-title mb-20 font-weight-900 text-white">
                                        <a class="text-white" href="single.html.htm" tabindex="0">Tips for Scuba Diving the Great Barrier Reef</a>
                                    </h1>
                                    <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                        <span class="post-on">15 September 2020</span>
                                        <span class="hit-count has-dot">17k Views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-single overflow-hidden border-radius-10">
                    <div class="post-thumb position-relative">
                        <div class="thumb-overlay position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-19.jpg')}} )">
                            <div class="post-content-overlay">
                                <div class="container">
                                    <div class="entry-meta meta-0 font-small mb-20">
                                        <a href="category.html.htm" tabindex="0"><span class="post-cat text-info text-uppercase">Hotel</span></a>
                                        <a href="category.html.htm" tabindex="0"><span class="post-cat text-warning text-uppercase">Healthy</span></a>
                                    </div>
                                    <h1 class="post-title mb-20 font-weight-900 text-white">
                                        <a class="text-white" href="single.html.htm" tabindex="0">Staying at the Hilton Seychelles Northolme Resort & Spa</a>
                                    </h1>
                                    <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                        <span class="post-on">22 September 2020</span>
                                        <span class="hit-count has-dot">16k Views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      
    <!-- End feature -->
    <div class="container">
        <div class="hot-tags pt-30 pb-30 font-small align-self-center">
            <div class="widget-header-3">
                <div class="row align-self-center">
                    <div class="col-md-4 align-self-center">
                        <h5 class="widget-title">Featured posts</h5>
                    </div>
                    <div class="col-md-8 text-md-right font-small align-self-center">
                        <p class="d-inline-block mr-5 mb-0"><i class="elegant-icon  icon_tag_alt mr-5 text-muted"></i>Hot tags:</p>
                        <ul class="list-inline d-inline-block tags">
                            <li class="list-inline-item"><a href="#"># Covid-19</a></li>
                            <li class="list-inline-item"><a href="#"># Inspiration</a></li>
                            <li class="list-inline-item"><a href="#"># Work online</a></li>
                            <li class="list-inline-item"><a href="#"># Stay home</a></li>
                        </ul>
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
                            <div class="position-relative post-thumb">
                                <div class="thumb-overlay img-hover-slide position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-4.jpg') }} )">
                                    <a class="img-link" href="single.html.htm"></a>
                                    <span class="top-left-icon bg-warning"><i class="elegant-icon icon_star_alt"></i></span>
                                    <div class="post-content-overlay text-white ml-30 mr-30 pb-30">
                                        <div class="entry-meta meta-0 font-small mb-20">
                                            <a href="category.html.htm"><span class="post-cat text-info text-uppercase">Travel</span></a>
                                            <a href="category.html.htm"><span class="post-cat text-success text-uppercase">Animal</span></a>
                                        </div>
                                        <h3 class="post-title font-weight-900 mb-20">
                                            <a class="text-white" href="single.html.htm">Beachmaster Elephant Seal Fights off Rival Male, The match is uncompromising</a>
                                        </h3>
                                        <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                            <span class="post-on">20 minutes ago</span>
                                            <span class="hit-count has-dot">23k Views</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative post-thumb">
                                <div class="thumb-overlay img-hover-slide position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-6.jpg')}} )">
                                    <a class="img-link" href="single.html.htm"></a>
                                    <span class="top-left-icon bg-danger"><i class="elegant-icon icon_image"></i></span>
                                    <div class="post-content-overlay text-white ml-30 mr-30 pb-30">
                                        <div class="entry-meta meta-0 font-small mb-20">
                                            <a href="category.html.htm"><span class="post-cat text-info text-uppercase">Lifestyle</span></a>
                                        </div>
                                        <h3 class="post-title font-weight-900 mb-20">
                                            <a class="text-white" href="single.html.htm">This genius photo experiment shows we are all just sheeple in the consumer matrix</a>
                                        </h3>
                                        <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                            <span class="post-on">26 August 2020</span>
                                            <span class="hit-count has-dot">18k Views</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-1.jpg')}} )">
                            <a class="img-link" href="single.html.htm"></a>
                            <span class="top-right-icon bg-success"><i class="elegant-icon icon_camera_alt"></i></span>
                            <ul class="social-share">
                                <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="post-content p-30">
                            <div class="entry-meta meta-0 font-small mb-10">
                                <a href="category.html.htm"><span class="post-cat text-info">Travel</span></a>
                                <a href="category.html.htm"><span class="post-cat text-success">Food</span></a>
                            </div>
                            <div class="d-flex post-card-content">
                                <h5 class="post-title mb-20 font-weight-900">
                                    <a href="single.html.htm">Want fluffy Japanese pancakes but can’t fly to Tokyo?</a>
                                </h5>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-on">27 August</span>
                                    <span class="time-reading has-dot">12 mins read</span>
                                    <span class="post-by has-dot">23k views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-7.jpg')}} )">
                            <a class="img-link" href="single.html.htm"></a>
                            <ul class="social-share">
                                <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="post-content p-30">
                            <div class="entry-meta meta-0 font-small mb-10">
                                <a href="category.html.htm"><span class="post-cat text-warning">Fashion</span></a>
                            </div>
                            <div class="d-flex post-card-content">
                                <h5 class="post-title mb-20 font-weight-900">
                                    <a href="single.html.htm">Put Yourself in Your Customers Shoes</a>
                                </h5>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-on">17 July</span>
                                    <span class="time-reading has-dot">8 mins read</span>
                                    <span class="post-by has-dot">12k views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-9.jpg')}} )">
                            <a class="img-link" href="single.html.htm"></a>
                            <ul class="social-share">
                                <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="post-content p-30">
                            <div class="entry-meta meta-0 font-small mb-10">
                                <a href="category.html.htm"><span class="post-cat text-danger">Travel</span></a>
                            </div>
                            <div class="d-flex post-card-content">
                                <h5 class="post-title mb-20 font-weight-900">
                                    <a href="single.html.htm">Life and Death in the Empire of the Tiger</a>
                                </h5>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-on">7 August</span>
                                    <span class="time-reading has-dot">15 mins read</span>
                                    <span class="post-by has-dot">500 views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.4s">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-11.jpg') }} )">
                            <a class="img-link" href="single.html.htm"></a>
                            <span class="top-right-icon bg-info"><i class="elegant-icon icon_headphones"></i></span>
                            <ul class="social-share">
                                <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="post-content p-30">
                            <div class="entry-meta meta-0 font-small mb-10">
                                <a href="category.html.htm"><span class="post-cat text-success">Lifestyle</span></a>
                            </div>
                            <div class="d-flex post-card-content">
                                <h5 class="post-title mb-20 font-weight-900">
                                    <a href="single.html.htm">When Two Wheels Are Better Than Four</a>
                                </h5>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-on">15 Jun</span>
                                    <span class="time-reading has-dot">9 mins read</span>
                                    <span class="post-by has-dot">1.2k views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="post-module-2">
                        <div class="widget-header-1 position-relative mb-30  wow fadeInUp animated">
                            <h5 class="mt-5 mb-30">Travel tips</h5>
                        </div>
                        <div class="loop-list loop-list-style-1">
                            <div class="row">
                                <article class="col-md-6 mb-40 wow fadeInUp  animated">
                                    <div class="post-card-1 border-radius-10 hover-up">
                                        <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-6.jpg') }} )">
                                            <a class="img-link" href="single.html.htm"></a>
                                            <ul class="social-share">
                                                <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="post-content p-30">
                                            <div class="entry-meta meta-0 font-small mb-10">
                                                <a href="category.html.htm"><span class="post-cat text-info">Artists</span></a>
                                                <a href="category.html.htm"><span class="post-cat text-success">Film</span></a>
                                            </div>
                                            <div class="d-flex post-card-content">
                                                <h5 class="post-title mb-20 font-weight-900">
                                                    <a href="single.html.htm">Easy Ways to Use Alternatives to Plastic</a>
                                                </h5>
                                                <div class="post-excerpt mb-25 font-small text-muted">
                                                    <p>Graduating from a top accelerator or incubator can be as career-defining for a&nbsp;startup founder&nbsp;as an elite university diploma. The intensive programmes, which…</p>
                                                </div>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">27 August</span>
                                                    <span class="time-reading has-dot">12 mins read</span>
                                                    <span class="post-by has-dot">23k views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="col-md-6 mb-40 wow fadeInUp  animated">
                                    <div class="post-card-1 border-radius-10 hover-up">
                                        <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-8.jpg') }})">
                                            <a class="img-link" href="single.html.htm"></a>
                                            <ul class="social-share">
                                                <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="post-content p-30">
                                            <div class="entry-meta meta-0 font-small mb-10">
                                                <a href="category.html.htm"><span class="post-cat">Fashion</span></a>
                                            </div>
                                            <div class="d-flex post-card-content">
                                                <h5 class="post-title mb-20 font-weight-900">
                                                    <a href="single.html.htm">Tips for Growing Healthy, Longer Hair</a>
                                                </h5>
                                                <div class="post-excerpt mb-25 font-small text-muted">
                                                    <p>Proin vitae placerat quam. Ut sodales eleifend urna, in condimentum tortor ultricies eu. Nunc auctor iaculis dolorProin vitae placerat quam. Proin vitae placerat quam.</p>
                                                </div>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">12 August</span>
                                                    <span class="time-reading has-dot">6 mins read</span>
                                                    <span class="post-by has-dot">3k views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="col-md-6 mb-40 wow fadeInUp  animated">
                                    <div class="post-card-1 border-radius-10 hover-up">
                                        <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-10.jpg') }} )">
                                            <a class="img-link" href="single.html.htm"></a>
                                            <span class="top-right-icon bg-secondary"><i class="elegant-icon icon_heart_alt"></i></span>
                                            <ul class="social-share">
                                                <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="post-content p-30">
                                            <div class="entry-meta meta-0 font-small mb-10">
                                                <a href="category.html.htm"><span class="post-cat text-success">Lifestyle</span></a>
                                            </div>
                                            <div class="d-flex post-card-content">
                                                <h5 class="post-title mb-20 font-weight-900">
                                                    <a href="single.html.htm">Project Ideas Around the House</a>
                                                </h5>
                                                <div class="post-excerpt mb-25 font-small text-muted">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor condimentum metus non tempor. Maecenas non augue aliquam, facilisis lectus quis, lacinia risus.</p>
                                                </div>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">27 August</span>
                                                    <span class="time-reading has-dot">12 mins read</span>
                                                    <span class="post-by has-dot">23k views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="col-md-6 mb-40 wow fadeInUp  animated">
                                    <div class="post-card-1 border-radius-10 hover-up">
                                        <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-12.jpg') }} )">
                                            <a class="img-link" href="single.html.htm"></a>
                                            <ul class="social-share">
                                                <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="post-content p-30">
                                            <div class="entry-meta meta-0 font-small mb-10">
                                                <a href="category.html.htm"><span class="post-cat text-danger">Hotels</span></a>
                                            </div>
                                            <div class="d-flex post-card-content">
                                                <h5 class="post-title mb-20 font-weight-900">
                                                    <a href="single.html.htm">How to Give Yourself a Spa Day from Home</a>
                                                </h5>
                                                <div class="post-excerpt mb-25 font-small text-muted">
                                                    <p>Graduating from a top accelerator or incubator can be as career-defining for a&nbsp;startup founder&nbsp;as an elite university diploma. The intensive programmes, which…</p>
                                                </div>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">18 August</span>
                                                    <span class="time-reading has-dot">14 mins read</span>
                                                    <span class="post-by has-dot">25k views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="post-module-3">
                        <div class="widget-header-1 position-relative mb-30">
                            <h5 class="mt-5 mb-30">Latest posts</h5>
                        </div>
                        <div class="loop-list loop-list-style-1">
                            <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                <div class="row mb-40 list-style-2">
                                    <div class="col-md-4">
                                        <div class="post-thumb position-relative border-radius-5">
                                            <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-13.jpg') }} )">
                                                <a class="img-link" href="single.html.htm"></a>
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
                                                <a href="category.html.htm"><span class="post-cat text-primary">Food</span></a>
                                            </div>
                                            <h5 class="post-title font-weight-900 mb-20">
                                                <a href="single.html.htm">Helpful Tips for Working from Home as a Freelancer</a>
                                                <span class="post-format-icon"><i class="elegant-icon icon_star_alt"></i></span>
                                            </h5>
                                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                <span class="post-on">7 August</span>
                                                <span class="time-reading has-dot">11 mins read</span>
                                                <span class="post-by has-dot">3k views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                <div class="row mb-40 list-style-2">
                                    <div class="col-md-4">
                                        <div class="post-thumb position-relative border-radius-5">
                                            <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-4.jpg') }}">
                                                <a class="img-link" href="single.html.htm"></a>
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
                                                <a href="category.html.htm"><span class="post-cat text-success">Cooking</span></a>
                                            </div>
                                            <h5 class="post-title font-weight-900 mb-20">
                                                <a href="single.html.htm">10 Easy Ways to Be Environmentally Conscious At Home</a>
                                            </h5>
                                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                <span class="post-on">27 Sep</span>
                                                <span class="time-reading has-dot">10 mins read</span>
                                                <span class="post-by has-dot">22k views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                <div class="row mb-40 list-style-2">
                                    <div class="col-md-4">
                                        <div class="post-thumb position-relative border-radius-5">
                                            <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-2.jpg') }} )">
                                                <a class="img-link" href="single.html.htm"></a>
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
                                                <a href="category.html.htm"><span class="post-cat text-warning">Cooking</span></a>
                                            </div>
                                            <h5 class="post-title font-weight-900 mb-20">
                                                <a href="single.html.htm">My Favorite Comfies to Lounge in At Home</a>
                                            </h5>
                                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                <span class="post-on">7 August</span>
                                                <span class="time-reading has-dot">9 mins read</span>
                                                <span class="post-by has-dot">12k views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                <div class="row mb-40 list-style-2">
                                    <div class="col-md-4">
                                        <div class="post-thumb position-relative border-radius-5">
                                            <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url({{ url('frontend/assets/imgs/news/news-3.jpg') }} )">
                                                <a class="img-link" href="single.html.htm"></a>
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
                                                <a href="category.html.htm"><span class="post-cat text-danger">Travel</span></a>
                                            </div>
                                            <h5 class="post-title font-weight-900 mb-20">
                                                <a href="single.html.htm">How to Give Your Space a Parisian-Inspired Makeover</a>
                                            </h5>
                                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                <span class="post-on">27 August</span>
                                                <span class="time-reading has-dot">12 mins read</span>
                                                <span class="post-by has-dot">23k views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="pagination-area mb-30 wow fadeInUp animated">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#"><i class="elegant-icon arrow_left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#">04</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="elegant-icon arrow_right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                @include('frontend.layouts.side-widget')
            </div>
        </div>
    </div>
</main>
@endsection