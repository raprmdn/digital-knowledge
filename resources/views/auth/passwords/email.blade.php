@extends('auth.layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
        @if (session('status'))
            <div class="alert alert-fill alert-success alert-icon">
                <em class="icon ni ni-check-circle"></em> <strong>Thanks!</strong> Password reset link has been sent to your email.
            </div>
        @endif
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Reset password</h5>
                <div class="nk-block-des">
                    <p>If you forgot your password, well, then we’ll email you instructions to reset your password.</p>
                </div>
            </div>
        </div>
        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="email">Email</label>
                </div>
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block">Send Reset Link</button>
            </div>
        </form>
        <div class="form-note-s2 text-center pt-4">
            <a href="{{ route('login') }}"><strong>Return to login</strong></a>
        </div>
    </div>
</div>
@endsection
