<div class="form-group">
    <label class="form-label" for="tag_name">Tag name</label>
    <input type="text" class="form-control @error('tag_name') is-invalid @enderror" value="{{ old('tag_name') ?? $tag->tag_name }}" id="tag_name" name="tag_name">
    @error('tag_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-md btn-primary">{{ $submit ?? 'Update' }}</button>
</div>