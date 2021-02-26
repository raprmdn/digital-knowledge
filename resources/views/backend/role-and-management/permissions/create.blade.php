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
                        <li class="breadcrumb-item active"><a href="{{ route('menu.permission.create') }}">Permissions</a></li>
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Permissions</h3>
                            
                            <div class="nk-block-des text-soft">
                                <p>You have total {{ $permissions->count() }} Permissions</p>
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

                @if (session('error'))
                <div class="example-alert mb-2">
                    <div class="alert alert-fill alert-danger alert-icon">
                        <em class="icon ni ni-cross-circle"></em> <strong>Delete failed</strong>! Something went wrong. </div>
                </div>
                @endif

                <div class="row g-gs">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-inner">
                                <form action="{{ route('menu.permission.create') }}" method="post" class="form-validate">
                                    @include('backend.role-and-management.permissions.partials.form-control', ['submit' => 'Submit'])
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="bg-gray-300">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Permssion Name</th>
                                                <th scope="col">Guard name</th>
                                                <th scope="col">Created at</th>
                                                <th scope="col">Action</th>
                                            </tr><!-- .nk-tb-item -->
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $key => $permission)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>
                                                    <span class="badge badge-pill badge-success">{{ $permission->guard_name }}</span>
                                                </td>
                                                <td>
                                                    <span>{{ $permission->created_at->format('d F Y H:i') }}</span>
                                                </td>
                                                <td>
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{ route('menu.permission.edit', $permission) }}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                        @can('delete permission')
                                                                        <form action="{{ route('menu.permission.delete', $permission) }}" method="post">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <li><button type="submit" class="btn delete-confirm" data-name="{{ $permission->name }}"><em class="icon ni ni-trash"></em><span>Remove</span></button></li>
                                                                        </form>
                                                                        @endcan
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
         $('.delete-confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete "${name}"?`,
                text: "You won't be able to revert this!.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((result) => {
                if (result) {
                form.submit();
                }
            });
        });
    </script>
@endpush