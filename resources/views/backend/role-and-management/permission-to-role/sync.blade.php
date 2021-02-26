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
                        <li class="breadcrumb-item active"><a href="{{ route('menu.permission.role.create') }}">Assign Permission to Role</a></li>
                        <li class="breadcrumb-item active">Synchronize</li>
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Assign Permission to Role</h3>
                        </div>
                    </div>
                </div>

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
                                <form action="{{ route('menu.permission.role.sync', $role) }}" method="post" class="form-validate">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="id" value="{{ Crypt::encrypt($role->id) }}">
                                    <div class="form-group">
                                        <label class="form-label" for="role">Role</label>
                                        <input type="text" class="form-control" name="role" value="{{ $role->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="permissions">Select Permissions</label>
                                        <select class="form-select @error('permissions') is-invalid @enderror" name="permissions[]" id="permissions" multiple="multiple" data-placeholder="Select permissions">
                                            @foreach ($permissions as $permission)
                                                <option {{ $role->hasPermissionTo($permission->name) ? 'selected' : '' }} value="{{ $permission->id }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('permissions')
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