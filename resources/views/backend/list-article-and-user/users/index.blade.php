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
                                @if (request('query'))
                                    <p>Search results {{ $users->total() }} users</p>
                                @else
                                    <p>Total Registered user : {{ $users->total() }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="more-options" style="display: none;">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="form-control-wrap">
                                                <form action="{{ route('search.user.list') }}" method="get" autocomplete="off">
                                                    <div class="form-icon form-icon-right">
                                                        <button type="submit" class="btn btn-sm">
                                                            <em class="icon ni ni-search"></em>
                                                        </button>
                                                    </div>
                                                    <input type="text" class="form-control" name="query" id="default-04" placeholder="Search by username">
                                                </form>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown">
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Username</th>
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
                                                    <td>
                                                        <a href="{{ route('show.profile', $user->username) }}" target="_blank">{{ $user->username }}</a>
                                                    </td>
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
                                                                    @method('put')
                                                                    <button class="btn btn-sm btn-success mr-1"><em class="icon ni ni-undo"></em>&nbsp;Recover User</button>
                                                                </form>
                                                            @else
                                                                <button type="button" class="btn btn-sm btn-danger mr-1 suspendButton" data-toggle="modal" data-target="#modal" data-id="{{ $user->id }}"><em class="icon ni ni-na"></em>&nbsp;Suspend User</button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="11">
                                                        @if (request('query'))
                                                            <h5 class="text-center">Search result with keyword " {{ request('query') }} " was not found</h5>
                                                        @else
                                                            <h5 class="text-center">Ops, There's no users here!</h5>
                                                        @endif
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
                                    {{ $users->withQueryString()->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('data.user.suspend') }}" method="post">
    @csrf
    @method('put')
    <input type="hidden" name="id" id="id">
    <div class="modal fade" tabindex="-1" id="modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Suspend User</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
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
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>

        $('.suspendButton').on('click', function (e) {
            const id = $(this).data('id');
            $('.modal-body form').attr('action', "{{ route('data.user.suspend') }}");
            $.ajax({
                data: { id: id, "_token": "{{ csrf_token() }}",},
                url: "{{ route('data.user.detail') }}",
                method: 'PUT',
                dataType: 'json',
                success: function (data) {
                    $('#formModalLabel').html('Suspend User : ' + data.name);
                    $('#id').val(data.id);
                }
            });

        });
    </script>
@endpush
