@extends('backend.layouts.app')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <nav class="mb-3">
                    <ul class="breadcrumb breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="{{ route('menu.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Articles</li>
                        <li class="breadcrumb-item active"><a href="{{ route('menu.article.create') }}">Create Article</a></li>
                    </ul>
                </nav>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Create Article</h3>
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

                <form action="{{ route('menu.article.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row g-gs">

                        <div class="col-lg-8">
                            <div class="card card-preview">
                                <div class="card-inner">

                                    <div class="form-group">
                                        <label class="form-label" for="article_title">Article Title</label>
                                        <input type="text" class="form-control @error('article_title') is-invalid @enderror" value="{{ old('article_title') ?? $article->article_title }}" id="article_title" name="article_title">
                                        @error('article_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="article_content">Article Content</label>
                                        <textarea class="summernote @error('article_content') is-invalid @enderror" name="article_content" id="summernote">{!! old('article_content') !!}</textarea>
                                        @error('article_content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="article_thumbnail">Article Thumbnail</label>
                                        <div class="custom-file">
                                            <input type="file" multiple="" class="custom-file-input @error('article_thumbnail') is-invalid @enderror" id="article_thumbnail" name="article_thumbnail">
                                            <label class="custom-file-label" for="article_thumbnail">Choose image for thumbnail</label>
                                            @error('article_thumbnail')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-danger">** Article Thumbnail will optimized to : 1000px x 600px</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card card-preview">
                                <div class="card-inner">

                                    <div class="form-group">
                                        <label class="form-label" for="article_category">Article Category</label>
                                        <select class="form-select form-control form-control-lg @error('article_category') is-invalid @enderror" name="article_category" id="article_category">
                                            <option selected disabled hidden>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('article_category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="article_tag">Article Tags</label>
                                        <select class="form-select @error('article_tag') is-invalid @enderror" name="article_tag[]" id="article_tag" multiple="multiple" data-placeholder="Select Tags">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('article_tag')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small class="text-danger">* Tag : Max 5</small>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label" for="article_status">Status</label>
                                        <select class="form-select form-control form-control-lg @error('article_status') is-invalid @enderror" name="article_status" id="article_status">
                                            <option value="1">Publish</option>
                                            <option value="0">Unlisted</option>
                                        </select>
                                    </div>

                                    
                                    <div class="form-group">
                                        <p class="fw-bold">Published by </p>
                                        {{ Auth::user()->name }}
                                    </div>
                                    
                                    <div class="form-group">
                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="" data-original-title="Unlisted : Only the author and everyone have link can see the article "></em>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/editors/summernote.css?ver=2.2.0') }}">
    <script src="{{ asset('backend/assets/js/libs/editors/summernote.js?ver=2.2.0') }}"></script>
    <script src="{{ asset('backend/assets/js/editors.js?ver=2.2.0') }}"></script>
    <script>
        $(document).ready(function() {
          $('.summernote').summernote({
              height: 1000,
          });
        });
    </script>
@endpush