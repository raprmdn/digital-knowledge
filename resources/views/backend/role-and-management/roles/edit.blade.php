@extends('backend.layouts.app')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <nav class="mb-3">
                    <ul class="breadcrumb breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Role And Permission</li>
                        <li class="breadcrumb-item active"><a href="{{ route('menu.role.create') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Roles</h3>
                            
                            <div class="nk-block-des text-soft">
                                <p>Edit Role :: {{ $role->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @if (session('success'))
                <div class="example-alert mb-2">
                    <div class="alert alert-fill alert-success alert-icon">
                        <em class="icon ni ni-check-circle"></em> <strong>Coool!</strong>. {{ session('success') }} </div>
                </div>
                @endif
                <div class="row g-gs">
                    <div class="col-lg-4">
                        <div class="card h-100">
                            <div class="card-inner">
                                <form action="{{ route('menu.role.edit', $role) }}" method="post" class="form-validate">
                                    @method('put')
                                    @include('backend.role-and-management.roles.partials.form-control')
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