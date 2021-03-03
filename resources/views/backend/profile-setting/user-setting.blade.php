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
                                            <h4 class="nk-block-title">Security Settings</h4>
                                            <div class="nk-block-des">
                                                <p>These settings are helps you keep your account secure.</p>
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
                                            <h6 class="overline-title">Security Settings</h6>
                                        </div>
                                        <div class="card-inner">
                                            <div class="between-center flex-wrap g-3">
                                                <div class="nk-block-text">
                                                    <h6>Change Password</h6>
                                                    <p>Set a unique password to protect your account.</p>
                                                </div>
                                                <div class="nk-block-actions flex-shrink-sm-0">
                                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                        <li class="order-md-last">
                                                            <a href="#" class="btn btn-primary">Change Password</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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
                                            <li><a href="{{ route('profile.personal.information') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                            <li><a class="active" href="{{ route('profile.personal.settings') }}"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
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