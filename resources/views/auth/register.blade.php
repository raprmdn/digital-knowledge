@extends('auth.layouts.app')

@section('content')
<div class="card">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Register</h4>
                <div class="nk-block-des">
                    <p>Create new Digital-Knowledge Account.</p>
                </div>
            </div>
        </div>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="name">Name</label>
                </div>
                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Enter your name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="email">Email Address</label>
                </div>
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password">Password</label>
                </div>
                <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password_confirmation">Password</label>
                </div>
                <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password_confirmation">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" class="form-control form-control-lg" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
            </div>
        </form>
        <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{ route('login') }}">Sign in instead</a>
        </div>
        <div class="text-center pt-4 pb-3">
            <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
        </div>
        <ul class="nav justify-center gx-4">
            <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
        </ul>
    </div>
</div>
@endsection