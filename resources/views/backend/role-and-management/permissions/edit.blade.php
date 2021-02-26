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
                        <li class="breadcrumb-item active"><a href="{{ route('menu.permission.create') }}">Permission</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Permissions</h3>
                            
                            <div class="nk-block-des text-soft">
                                <p>Edit Permission :: {{ $permission->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-gs">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-inner">
                                <form action="{{ route('menu.permission.edit', $permission) }}" method="post" class="form-validate">
                                    @method('put')
                                    @include('backend.role-and-management.permissions.partials.form-control')
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