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
    <button type="submit" class="btn btn-md btn-primary">{{ $submit ?? 'Update' }}</button>
</div>