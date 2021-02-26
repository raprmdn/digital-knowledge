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
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Assign Role to User</h3>
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
                        @can('role to user')
                        <div class="card card-preview">
                            <div class="card-inner">
                                <form action="{{ route('menu.role.user.create') }}" method="post" class="form-validate">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="user_email">User Email</label>
                                        <input type="email" class="form-control @error('user_email') is-invalid @enderror" id="user_email" name="user_email">
                                        @error('user_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="roles">Select Roles</label>
                                        <select class="form-select @error('roles') is-invalid @enderror" name="roles[]" id="roles" multiple="multiple" data-placeholder="Select roles">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                        @endcan
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="bg-gray-300">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">User name</th>
                                                <th scope="col">User Email</th>
                                                <th scope="col">Role User</th>
                                                @can('role to user')
                                                <th scope="col">Action</th>
                                                @endcan
                                            </tr><!-- .nk-tb-item -->
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $users->firstItem() + $key }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach ($user->getRoleNames()->toArray() as $item)
                                                        <span class="badge badge-pill badge-success">{{ $item }}</span>
                                                    @endforeach
                                                </td>
                                                @can('role to user')
                                                <td>
                                                    <a href="{{ route('menu.role.user.sync', $user) }}" class="btn btn-round btn-sm btn-primary">Synchronize</a>
                                                </td>
                                                @endcan
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table><!-- .nk-tb-list -->
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-inner">
                                <div class="d-flex justify-content-center">
                                    {{ $users->links('pagination::bootstrap-4') }}
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