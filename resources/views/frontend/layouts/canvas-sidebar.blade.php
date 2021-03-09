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
                        <li class="cat-item cat-item-2"><a href="#">{{ $category->category_name }}</a> <span class="post-count">{{ $category->articles->count() }}</span></li>
                    @endforeach
                    @auth
                        <li class="cat-item cat-item-6"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    @endauth
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