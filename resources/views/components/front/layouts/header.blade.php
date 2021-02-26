<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <header class="main-header header-style-1 font-heading">
        <div class="header-top">
            <div class="container">
                <div class="row pt-20 pb-20">
                    <div class="col-md-3 col-xs-6 mt-5">
                        <a href="/">
                            <h5 class="logo mt-5">
                                <strong> {{ config('app.name') }}</strong>
                            </h5>
                        </a>
                    </div>
                    <div class="col-md-9 col-xs-6 text-right header-top-right ">
                        <button class="search-icon d-none d-md-inline"><span class="mr-15 text-muted font-small"><i class="elegant-icon icon_search mr-5"></i>Search</span></button>
                        <span class="vertical-divider mr-20 ml-20 d-none d-md-inline"></span>
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-radius bg-primary text-white ml-15 font-small box-shadow">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-radius bg-primary text-white ml-15 font-small box-shadow">Register</a>
                        @else
                            <ul class="list-inline nav-topbar d-none d-md-inline">
                                <li class="list-inline-item menu-item-has-children"><a href="#">{{ Auth::user()->name }}</a>
                                    <ul class="sub-menu font-small">
                                        <li>
                                            <a href="#">View Profile</a>
                                        </li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                            @hasanyrole($roles)
                            <a href="{{ route('menu.dashboard') }}" class="btn btn-radius bg-primary text-white ml-15 font-small box-shadow">Dashboard</a>
                            @endhasanyrole
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        <div class="header-sticky">
            <div class="container align-self-center">
                <div class="mobile_menu d-lg-none d-block"></div>
                <div class="main-nav d-none d-lg-block float-left">
                    <nav>
                        <!--Desktop menu-->
                        <ul class="main-menu d-none d-lg-inline font-small">
                            <li class="menu-item-has-children">
                                <a href="index.html.htm"> <i class="elegant-icon icon_house_alt mr-5"></i> Home</a>
                                <ul class="sub-menu text-muted font-small">
                                    <li><a href="index.html.htm">Home default</a></li>
                                    <li><a href="home-2.html.htm">Homepage 2</a></li>
                                    <li><a href="home-3.html.htm">Homepage 3</a></li>
                                </ul>
                            </li>
                            <li> <a href="category-list.html.htm">Travel</a> </li>
                            <li class="current-item"> <a href="category-list.html.htm">Destinations</a> </li>
                            <li> <a href="category-grid.html.htm">Guides</a> </li>
                            <li> <a href="category-masonry.html.htm">Food</a> </li>
                            <li> <a href="category-big.html.htm">Hotels</a> </li>
                            <li> <a href="category.html.htm">Review</a> </li>
                            <li> <a href="category.html.htm">Healthy </a> </li>
                            <li> <a href="category.html.htm">Lifestyle</a> </li>
                            <li> <a href="category.html.htm">Blog</a> </li>
                        </ul>
                        <!--Mobile menu-->
                        <ul id="mobile-menu" class="d-block d-lg-none text-muted">
                            <li class="menu-item-has-children">
                                <a href="index.html.htm">Home</a>
                                <ul class="sub-menu text-muted font-small">
                                    <li><a href="index.html.htm">Home default</a></li>
                                    <li><a href="home-2.html.htm">Homepage 2</a></li>
                                    <li><a href="home-3.html.htm">Homepage 3</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Pages</a>
                                <ul class="sub-menu font-small">
                                    <li><a href="page-about.html.htm">About</a></li>
                                    <li><a href="page-contact.html.htm">Contact</a></li>
                                    <li><a href="page-typography.html.htm">Typography</a></li>
                                    <li><a href="page-register.html.htm">Register</a></li>
                                    <li><a href="page-login.html.htm">Login</a></li>
                                    <li><a href="page-search.html.htm">Search</a></li>
                                    <li><a href="page-author.html.htm">Author</a></li>
                                    <li><a href="page-404.html.htm">404 page</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Category</a>
                                <ul class="sub-menu font-small">
                                    <li><a href="category-list.html.htm">List layout</a></li>
                                    <li><a href="category-grid.html.htm">Grid layout</a></li>
                                    <li><a href="category-masonry.html.htm">Masonry layout</a></li>
                                    <li><a href="category-big.html.htm">Big layout</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Single post</a>
                                <ul class="sub-menu font-small">
                                    <li><a href="single.html.htm">Default</a></li>
                                    <li><a href="single-2.html.htm">Big image</a></li>
                                    <li><a href="single-3.html.htm">Left image</a></li>
                                    <li><a href="single-4.html.htm">With sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="float-right header-tools text-muted font-small">
                    <ul class="header-social-network d-inline-block list-inline mr-15">
                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                        <li class="list-inline-item"><a class="social-icon pt text-xs-center" target="_blank" href="#"><i class="elegant-icon social_pinterest "></i></a></li>
                    </ul>
                    <div class="off-canvas-toggle-cover d-inline-block">
                        <div class="off-canvas-toggle hidden d-inline-block" id="off-canvas-toggle">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        @if (session('resent'))
        <div class="container">
            <div class="alert alert-success" role="alert">
               <p class="text-center m-0">
                   <strong>Thanks!</strong> New Verification Link has been sent to your email.
               </p>
            </div>
        </div>
        @endif
        @auth
            @if (!Auth::user()->hasVerifiedEmail())
                <div class="container">
                    <div class="alert alert-warning">
                        <p class="text-center m-0">
                            <strong>Attention!</strong> to complete your profile information, and accessing Dashboard Menu. please check your email for a verification. <br>
                            Did not receive any email? check spam or <a href="{{ route('verification.resend') }}" onclick="event.preventDefault(); document.getElementById('resend-verif-form').submit();">resend verification</a>.
                        </p>
                    </div>
                </div>
            @endif
        @endauth
    </header>
    <form class="d-inline m-0" method="POST" action="{{ route('verification.resend') }}" id="resend-verif-form">
        @csrf
    </form>
    
</div>