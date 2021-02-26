@extends('backend.layouts.app')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <nav class="mb-3">
                    <ul class="breadcrumb breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="{{ route('menu.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Menu Management</li>
                        <li class="breadcrumb-item active"><a href="{{ route('menu.menu.list') }}">List Menu</a></li>
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">List Menu</h3>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                <div class="example-alert mb-2">
                    <div class="alert alert-fill alert-success alert-icon">
                        <em class="icon ni ni-check-circle"></em> <strong>Coool!</strong>. {{ session('success') }}
                    </div>
                </div>
                @endif

                @if (session('error'))
                <div class="example-alert mb-2">
                    <div class="alert alert-fill alert-danger alert-icon">
                        <em class="icon ni ni-cross-circle"></em> <strong>Oooops</strong>! {{ session('error') }} </div>
                </div>
                @endif

                <div class="row g-gs">
                    <div class="col-lg-2">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <h6 class="mb-3">Preview Menu</h6>
                                <ul class="list list-checked">
                                    @foreach ($menuLists as $menu)
                                    <li>{{ $menu->name }}
                                        <ul>
                                            @foreach ($menu->children as $subMenu)
                                                <li>{{ $subMenu->name }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="bg-gray-300">
                                            <tr>
                                                <th scope="col">Parent Menu</th>
                                                <th scope="col">Icon</th>
                                                <th scope="col">Sub Menu</th>
                                                <th scope="col">Url</th>
                                                <th scope="col">Permission</th>
                                                <th scope="col">Action</th>
                                            </tr><!-- .nk-tb-item -->
                                        </thead>
                                        <tbody>
                                            @foreach ($menuLists as $key => $menu)
                                            <tr>
                                                <th rowspan="{{ $menu->children->count() + 1 }}" scope="rowgroup"><span class="badge badge-pill badge-danger">{{ $menu->name }}</span></th>
                                                <td rowspan="{{ $menu->children->count() + 1 }}" scope="rowgroup"> <em class="{{ $menu->icon }}"></em> ( {{ $menu->icon }} )</td>
                                                @foreach ($menu->children as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->url }}</td>
                                                    <td><span class="badge badge-pill bg-azure text-white">{{ $item->permission_name }}</span></td>
                                                    <td>
                                                        <ul class="nk-tb-actions gx-1">
                                                            <li>
                                                                <div class="drodown">
                                                                    <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="{{ route('main.menu.edit', $menu) }}"><em class="icon ni ni-setting"></em><span>Parent Menu Setting</span></a></li>
                                                                            <form action="{{ route('menu.delete', $menu) }}" method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <li><button type="submit" class="btn"><em class="icon ni ni-trash"></em><span>Main Menu Remove</span></button></li>
                                                                            </form>
                                                                            <li><a href="{{ route('menu.menu.edit', $item) }}"><em class="icon ni ni-setting"></em><span>Sub Menu Setting</span></a></li>
                                                                            <form action="{{ route('menu.delete', $item) }}" method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <li><button type="submit" class="btn"><em class="icon ni ni-trash"></em><span>Sub Menu Remove</span></button></li>
                                                                            </form>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @endforeach
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
