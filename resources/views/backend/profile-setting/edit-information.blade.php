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
                                            <h4 class="nk-block-title">Update Personal Information</h4>
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
                                        <div class="card">
                                            <div class="card-inner">
                                                <form action="{{ route('update.personal.information') }}" class="gy-3" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full_name">Full Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ Auth::user()->name }}">
                                                                @error('full_name')
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
                                                                <label class="form-label" for="profile_description">Profile Description</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <textarea class="form-control form-control-sm" id="cf-default-textarea" name="profile_description" placeholder="About your profile">{{ Auth::user()->profile_description }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="instagram">Instagram</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="instagram" name="instagram" placeholder="username" value="{{ Auth::user()->instagram }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="twitter">Twitter</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="username" value="{{ Auth::user()->twitter }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="facebook">Facebook</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="username" value="{{ Auth::user()->facebook }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="data-col-end">
                                                        <button type="submit" class="btn btn-primary">Update Profile</button>
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
        $('.personalInformation').addClass('active');
    </script>
@endpush