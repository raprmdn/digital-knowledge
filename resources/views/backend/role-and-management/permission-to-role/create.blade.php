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
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Assign Permission to Role</h3>
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
                    @can('permission to role')
                    <div class="col-lg-12">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <form action="{{ route('menu.permission.role.create') }}" method="post" class="form-validate">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="role">Select Role</label>
                                        <select class="form-select form-control form-control-lg @error('role') is-invalid @enderror" name="role" id="role">
                                            <option selected disabled hidden>Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="permissions">Select Permissions</label>
                                        <select class="form-select @error('permissions') is-invalid @enderror" name="permissions[]" id="permissions" multiple="multiple" data-placeholder="Select permissions">
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
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
                    @endcan
                    <div class="col-lg-12">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="bg-gray-300">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Role Name</th>
                                                <th scope="col">Permission</th>
                                                @can('permission to role')
                                                <th scope="col">Action</th>
                                                @endcan
                                            </tr><!-- .nk-tb-item -->
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $key => $role)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    @foreach ($role->getPermissionNames()->toArray() as $item)
                                                    <span class="badge badge-pill badge-success">{{ $item }}</span>
                                                    @endforeach
                                                </td>
                                                @can('permission to role')
                                                <td>
                                                    <a href="{{ route('menu.permission.role.sync', $role) }}" class="btn btn-round btn-sm btn-primary">Synchronize</a>
                                                </td>
                                                @endcan
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table><!-- .nk-tb-list -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection