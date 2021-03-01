@extends('backend.layouts.app')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <nav class="mb-3">
                    <ul class="breadcrumb breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="{{ route('menu.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Articles & Users</li>
                        <li class="breadcrumb-item active"><a href="{{ route('data.user.index') }}">List All Users</a></li>
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">List All Users</h3>
                            <div class="nk-block-des text-soft">
                                <p>Total Registered user : {{ $users->total() }}</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="more-options" style="display: none;">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <input type="text" class="form-control" id="default-04" placeholder="Search by name">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Last 30 Days</span></a></li>
                                                        <li><a href="#"><span>Last 6 Months</span></a></li>
                                                        <li><a href="#"><span>Last 1 Years</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
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
                        <em class="icon ni ni-cross-circle"></em> <strong>Oooops</strong>! {{ session('error') }} </div>
                </div>
                @endif

                <div class="row g-gs">
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
                                                <th scope="col">User Role</th>
                                                <th scope="col">Verified Email</th>
                                                <th scope="col">User Status</th>
                                                <th scope="col">Joined At</th>
                                                <th scope="col">Banned Until</th>
                                                <th scope="col">Action</th>
                                            </tr><!-- .nk-tb-item -->
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $key => $user)
                                                <tr>
                                                    <td>{{ $users->firstItem() + $key }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <span class="badge badge-pill badge-primary">{{ $user->getRoleNames()->first() }}</span>
                                                    </td>
                                                    <td>
                                                        @if ($user->email_verified_at)
                                                            <span class="badge badge-dot badge-dot-xs badge-success">
                                                                Verified
                                                            </span>
                                                        @else
                                                            <span class="badge badge-dot badge-dot-xs badge-danger">
                                                                Unverified
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!now()->lessThan($user->suspend_user))
                                                            <span class="badge badge-dot badge-dot-xs badge-success">
                                                                Active
                                                            </span>
                                                        @else
                                                            <span class="badge badge-dot badge-dot-xs badge-danger">
                                                                Suspend
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->created_at->format('d F Y, H:i') }}</td>
                                                    <td>
                                                        @if ($user->suspend_user)
                                                            {{ Carbon\Carbon::parse($user->suspend_user)->format('d F Y, H:i') }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            @if (now()->lessThan($user->suspend_user))
                                                            <form action="{{ route('data.user.recovery', $user) }}" method="post">
                                                                @csrf
                                                                <button class="btn btn-sm btn-success mr-1"><em class="icon ni ni-undo"></em></em>&nbsp;Recover User</button>
                                                            </form>
                                                            @else
                                                                <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#modalForm"><em class="icon ni ni-na"></em>&nbsp;Suspend User</button>
                                                            @endif
                                                            <div class="modal fade" tabindex="-1" id="modalForm" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Susped User</h5>
                                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <form action="{{ route('data.user.suspend', $user) }}" method="post">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label class="form-label">Suspend Until</label>
                                                                                <div class="form-control-wrap">
                                                                                    <div class="form-icon form-icon-left">
                                                                                        <em class="icon ni ni-calendar"></em>
                                                                                    </div>
                                                                                    <input type="text" class="form-control date-picker @error('suspend_until') is-invalid @enderror" data-date-format="yyyy-mm-dd" name="suspend_until">
                                                                                    @error('suspend_until')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-sm btn-block btn-danger">Confirm</button>
                                                                            </div>
                                                                        </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="11">
                                                        <h5 class="text-center">Ops, There's no user here!</h5>
                                                    </td>
                                                </tr>
                                            @endforelse
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