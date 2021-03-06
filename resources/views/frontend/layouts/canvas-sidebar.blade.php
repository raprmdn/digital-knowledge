<aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar">
    <button class="off-canvas-close"><i class="elegant-icon icon_close"></i></button>
    <div class="sidebar-inner">
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-50 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">Hot topics</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                    @foreach ($categories as $category)
                        <li class="cat-item cat-item-2"><a href="#">{{ $category->category_name }}</a> <span class="post-count">30</span></li>
                    @endforeach
                    @auth
                    <li class="cat-item cat-item-6"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    @endauth
                </ul>
            </div>
        </div>
        <!--Latest-->
        <div class="sidebar-widget widget-latest-posts mb-50">
            <div class="widget-header-2 position-relative mb-30">
                <h5 class="mt-5 mb-30">Don't miss</h5>
            </div>
            <div class="post-block-list post-module-1 post-module-5">
                <ul class="list-post">
                    <li class="mb-30">
                        <div class="d-flex hover-up-2 transition-normal">
                            <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                <a class="color-white" href="single.html.htm">
                                    <img src="{{ asset('frontend/assets/imgs/news/thumb-1.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.html.htm">The Life of a Travel Writer with David Farley</a></h6>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-on">05 August</span>
                                    <span class="post-by has-dot">300 views</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mb-30">
                        <div class="d-flex hover-up-2 transition-normal">
                            <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                <a class="color-white" href="single.html.htm">
                                    <img src="{{ asset('frontend/assets/imgs/news/thumb-2.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.html.htm">Why Don’t More Black American Women Travel Solo?</a></h6>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-on">12 August</span>
                                    <span class="post-by has-dot">23k views</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mb-30">
                        <div class="d-flex hover-up-2 transition-normal">
                            <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                <a class="color-white" href="single.html.htm">
                                    <img src="{{ asset('frontend/assets/imgs/news/thumb-3.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.html.htm">The 22 Best Things to See and Do in Bangkok</a></h6>
                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                    <span class="post-on">27 August</span>
                                    <span class="post-by has-dot">23k views</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--Ads-->
        <div class="sidebar-widget widget-ads">
            <div class="widget-header-2 position-relative mb-30">
                <h5 class="mt-5 mb-30">Advertise banner</h5>
            </div>
            <a href="../../../user/alithemes/portfolio.htm" target="_blank">
                <img class="advertise-img border-radius-5" src="{{ asset('frontend/assets/imgs/ads/ads-1.jpg') }}" alt="">
            </a>
        </div>
    </div>
</aside>