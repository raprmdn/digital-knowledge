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
                                                <p>Basic info, like your name, email, and social media, that you use on Digital-Knowledge.</p>
                                                <p>Joined since {{ Auth::user()->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div>

                                @if (session('success'))
                                <div class="example-alert mb-2">
                                    <div class="alert alert-fill alert-success alert-icon">
                                        <em class="icon ni ni-check-circle"></em> <strong>Coool!</strong>. {{ session('success') }} </div>
                                </div>
                                @endif

                                @if (session('error'))
                                <div class="example-alert mb-2">
                                    <div class="alert alert-fill alert-danger alert-icon">
                                        <em class="icon ni ni-cross-circle"></em> <strong>Oooops</strong>! {{ session('error') }} </div>
                                </div>
                                @endif
                                
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
                                        <a href="{{ route('edit.personal.information') }}" class="btn btn-primary">Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                            @include('backend.profile-setting.layouts.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $('.personalInformation').addClass('active');
    </script>
@endpush