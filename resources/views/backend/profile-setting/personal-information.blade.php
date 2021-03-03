@extends('backend.layouts.app')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Personal Information</h4>
                                            <div class="nk-block-des">
                                                <p>Basic info, like your name and email, that you use on Digital-Knowledge.</p>
                                                <p>Joined since {{ Auth::user()->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="nk-data data-list">
                                        <div class="data-head">
                                            <h6 class="overline-title">Profile Information</h6>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Full Name</span>
                                                <span class="data-value">{{ Auth::user()->name }}</span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Email Address</span>
                                                <span class="data-value">{{ Auth::user()->email }} <em class="icon ni ni-check-circle-fill"></em></span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Profile Description</span>
                                                <span class="data-value">{{ Str::limit(Auth::user()->profile_description, 70, '...') }}</span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Member Since</span>
                                                <span class="data-value">{{ Auth::user()->created_at->format('d F Y, H:i') }}</span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-data data-list">
                                        <div class="data-head">
                                            <h6 class="overline-title">Social Media</h6>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Instagram</span>
                                                <span class="data-value"><a href="https://www.instagram.com/{{ Auth::user()->instagram }}/" target="_blank"><em class="icon ni ni-instagram"></em>{{ Auth::user()->instagram }}</a></span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Twitter</span>
                                                <span class="data-value"><a href="https://twitter.com/{{ Auth::user()->twitter }}/" target="_blank"><em class="icon ni ni-twitter"></em>{{ Auth::user()->twitter }}</a></span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Facebook</span>
                                                <span class="data-value"><a href="https://www.facebook.com/{{ Auth::user()->facebook }}/" target="_blank"><em class="icon ni ni-facebook-f"></em>{{ Auth::user()->facebook }}</a></span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                        </div>
                                    </div>
                                    <div class="data-col-end">
                                        <a href="#" class="btn btn-primary">Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                    <div class="card-inner">
                                        <div class="user-card">
                                            <div class="user-avatar bg-primary">
                                                <span>AB</span>
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text">{{ Auth::user()->name }} <span class="text-azure"><em class="icon ni ni-check-circle-fill"></em></span></span>
                                                <span class="sub-text">{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner">
                                        <div class="row text-center">
                                            <div class="col-6">
                                                <div class="profile-stats">
                                                    <span class="amount">-</span>
                                                    <span class="sub-text">Total Article</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="profile-stats">
                                                    <span class="amount">-</span>
                                                    <span class="sub-text">Total Views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner p-0">
                                        <ul class="link-list-menu">
                                            <li><a class="active" href="{{ route('profile.personal.information') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                            <li><a href="{{ route('profile.personal.settings') }}"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                        </ul>
                                    </div>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 443px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div><!-- .card-inner-group -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection