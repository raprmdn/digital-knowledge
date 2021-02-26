@csrf
<div class="form-group">
    <label class="form-label" for="permission_name">Permission name</label>
    <input type="text" class="form-control @error('permission_name') is-invalid @enderror" value="{{ old('permission_name') ?? $permission->name }}" id="permission_name" name="permission_name">
    @error('permission_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="guard_name">Guard name</label>
    <input type="text" class="form-control @error('guard_name') is-invalid @enderror" value="{{ old('guard_name') ?? $permission->guard_name }}" id="guard_name" name="guard_name" placeholder='default to "web"'>
    @error('guard_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-md btn-primary">{{ $submit ?? 'Update' }}</button>
</div>