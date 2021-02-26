<div class="form-group">
    <label class="form-label" for="category_name">Category name</label>
    <input type="text" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name') ?? $category->category_name }}" id="category_name" name="category_name">
    @error('category_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="category_description">Category description</label>
    <textarea type="text" class="form-control @error('category_description') is-invalid @enderror" id="category_description" name="category_description">{{ old('category_description') ?? $category->category_description }}</textarea>
    @error('category_description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-md btn-primary">{{ $submit ?? 'Update' }}</button>
</div>