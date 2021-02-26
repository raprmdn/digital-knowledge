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
                        <li class="breadcrumb-item active"><a href="{{ route('menu.menu.create') }}">Create Menu</a></li>
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Create Menu</h3>
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
                                <form action="{{ route('menu.menu.create') }}" method="post" class="form-validate">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="parent_menu">Parent Menu</label>
                                        <select class="form-select form-control form-control-lg @error('parent_menu') is-invalid @enderror" name="parent_menu" id="parent_menu">
                                            <option selected disabled hidden>Select Parent</option>
                                            @foreach ($parents as $parent)
                                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('parent_menu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="permission">Permission</label>
                                        <select class="form-select form-control form-control-lg @error('permission') is-invalid @enderror" name="permission" id="permission">
                                            <option selected disabled hidden>Select Permission</option>
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->name }}">{{ $permission->name }}</option> 
                                            @endforeach
                                        </select>
                                        @error('permission')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="menu_name">Menu Name</label>
                                                <input type="text" class="form-control @error('menu_name') is-invalid @enderror" id="menu_name" name="menu_name"
                                                value="{{ old('menu_name') }}">
                                                @error('menu_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="menu_position">Menu Parent Position</label>
                                                <input type="number" class="form-control @error('menu_position') is-invalid @enderror" id="menu_position" name="menu_position"
                                                placeholder="only for parent menu" value="{{ old('menu_position') }}">
                                                @error('menu_position')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="menu_icon">Icon</label>
                                                <input type="text" class="form-control @error('menu_icon') is-invalid @enderror" id="menu_icon" name="menu_icon"
                                                placeholder="example : icon ni ni-list-index" value="{{ old('menu_icon') }}">
                                                @error('menu_icon')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="url">Url</label>
                                                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url"
                                                value="menu/dashboard/{{ old('url') }}">
                                                <em class="icon ni ni-alert-circle text-danger"></em>
                                                <small class="text-danger">
                                                    <span>Url Parent : slug parent menu. Example : menu-management</span>
                                                </small>
                                                <br>
                                                <em class="icon ni ni-alert-circle text-danger"></em>
                                                <small class="text-danger">
                                                    <span>Url Sub Menu : menu/dashboard/{parent_slug}/{submenu_slug}/... Example : menu/dashboard/menu-managament/menu/create </span>
                                                </small>
                                                <br>
                                                <em class="icon ni ni-alert-circle text-danger"></em>
                                                <small class="text-danger">
                                                    <span>Url <i>menu/dashboard</i>  is a must</span>
                                                </small>
                                                @error('url')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
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