@extends('backend.layouts.app')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <nav class="mb-3">
                    <ul class="breadcrumb breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="{{ route('menu.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Role And Permission</li>
                        <li class="breadcrumb-item active"><a href="{{ route('menu.role.user.create') }}">Assign Role to User</a></li>
                        <li class="breadcrumb-item active">Synchronize Role to User</li>
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Synchronize Role to User</h3>
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

                <div class="row g-gs">
                    <div class="col-lg-12">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <form action="{{ route('menu.role.user.sync', $user) }}" method="post" class="form-validate">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="id" value="{{ Crypt::encrypt($user->id) }}">
                                    <div class="form-group">
                                        <label class="form-label" for="user_email">User Email</label>
                                        <input type="email" class="form-control" id="user_email" name="user_email" value="{{ $user->email }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="roles">Select Roles</label>
                                        <select class="form-select @error('roles') is-invalid @enderror" name="roles[]" id="roles" multiple="multiple" data-placeholder="Select roles">
                                            @foreach ($roles as $role)
                                                <option {{ $user->hasRole($role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('roles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                    </div>                             
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection