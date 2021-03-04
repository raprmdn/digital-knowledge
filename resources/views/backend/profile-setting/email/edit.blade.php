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
                                            <h4 class="nk-block-title">Change Email</h4>
                                            <div class="nk-block-des">
                                                <p>Make unique password.</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                    <div class="example-alert mt-2">
                                        <div class="alert alert-fill alert-danger alert-icon">
                                            <em class="icon ni ni-alert"></em> <strong>Important</strong>! After changed email you will be redirect to
                                            homepage, and to access this menu again you have to verify your email first. 
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
                                        <div class="card">
                                            <div class="card-inner">
                                                <form action="{{ route('profile.update.email') }}" class="gy-3" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="current_email">Current Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <input type="email" class="form-control @error('current_email') is-invalid @enderror" id="current_email" name="current_email"
                                                                 readonly value="{{ Auth::user()->email }}">
                                                                @error('current_email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email">New Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="data-col-end">
                                                        <button type="submit" class="btn btn-primary">Update Email</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
        $('.securitySettings').addClass('active');
    </script>
@endpush