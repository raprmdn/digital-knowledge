@extends('backend.layouts.app')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <nav class="mb-3">
                    <ul class="breadcrumb breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="{{ route('menu.dashboard') }}">Dashboard</a></li>
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Dashboard</h3>
                        </div>
                    </div>
                </div>
                <p>Hi {{ Auth::user()->name }}, Welcome to Dashboard Digital-Knowledge!</p>
                <p>Please be kind, and supporting us. Feel free to ask, contact email : cs.digital.knowledge@gmail.com</p>
            </div>
        </div>
    </div>
</div>
@endsection
