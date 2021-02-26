@extends('auth.layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="card">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Reset password</h5>
                <div class="nk-block-des">
                    <p>Reset your password</p>
                </div>
            </div>
        </div>
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="email">Email</label>
                </div>
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="email" value="{{ $email ?? old('email') }}" placeholder="Enter your email address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password">Password</label>
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                </div>
                <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
