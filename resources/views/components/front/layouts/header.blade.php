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
                        <button class="search-icon"><span class="mr-15 text-muted font-small"><i class="elegant-icon icon_search mr-5"></i>Search</span></button>
                        <span class="vertical-divider mr-20 ml-20 d-none d-md-inline"></span>
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-radius bg-primary text-white ml-15 font-small box-shadow">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-radius bg-primary text-white ml-15 font-small box-shadow">Register</a>
                        @else
                            <ul class="list-inline nav-topbar d-none d-md-inline">
                                <li class="list-inline-item menu-item-has-children"><a href="{{ route('show.profile', Auth::user()->username) }}">{{ Auth::user()->name }}</a>
                                    <ul class="sub-menu font-small">
                                        <li>
                                            <a href="{{ route('show.profile', Auth::user()->username) }}">View Profile</a>
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
                            @if ( !Request::segment(1) )
                                <li class="current-item">
                                    <a href="/"> <i class="elegant-icon icon_house_alt mr-5"></i> Home</a>
                                </li>
                            @else
                                <li>
                                    <a href="/"> <i class="elegant-icon icon_house_alt mr-5"></i> Home</a>
                                </li>
                            @endif
                            @foreach ($categories as $category)
                                @if (Request::segment(2) == $category->category_slug)
                                    <li class="current-item">
                                        <a href="{{ route('show.category', $category) }}">{{ $category->category_name }}</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('show.category', $category) }}">{{ $category->category_name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <!--Mobile menu-->
                        <ul id="mobile-menu" class="d-block d-lg-none text-muted">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Category</a>
                                <ul class="sub-menu font-small">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('show.category', $category->category_slug) }}">{{ $category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('show.profile', Auth::user()->username) }}">View Profile</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="float-right header-tools text-muted font-small">
                    <ul class="header-social-network d-inline-block list-inline mr-15">
                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                        <li class="list-inline-item"><a class="social-icon text-xs-center" style="background: #C13584;" target="_blank" href="#"><i class="elegant-icon social_instagram"></i></a></li>
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
        @if (session('success'))
        <div class="container">
            <div class="alert alert-success" role="alert">
               <p class="text-center m-0">
                   <strong>Thanks!</strong> {{ session('success') }}
               </p>
            </div>
        </div>
        @endif
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
                        <strong>Attention!</strong> to complete your profile information, and accessing Dashboard Menu. please check your email <strong>{{ Auth::user()->email }}</strong> for a verification. <br>
                        Did not receive any email? check spam or <a href="{{ route('verification.resend') }}" onclick="event.preventDefault(); document.getElementById('resend-verif-form').submit();">resend verification</a>.
                        If you want to change your email <button type="button" class="btn btn-radius bg-primary text-white font-small box-shadow" data-toggle="modal" data-target="#changeEmail">Click Here</button>
                    </p>
                </div>
            </div>
        @endif

    </header>
    <form class="d-inline m-0" method="POST" action="{{ route('verification.resend') }}" id="resend-verif-form">
        @csrf
    </form>

    <form action="{{ route('update.email.index') }}" method="post">
        @csrf
        @method('put')
        <div class="modal fade" id="changeEmail" tabindex="-1" aria-labelledby="changeEmailLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="changeEmailLabel">Change Your Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="current_email">Current Email</label>
                            <input type="email" class="form-control" id="current_email" name="current_email" value="{{ Auth::user()->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">New Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white font-small" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text-white font-small">Change Email</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endauth

</div>
