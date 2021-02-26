@csrf
<div class="form-group">
    <label class="form-label" for="role_name">Role name</label>
    <input type="text" class="form-control @error('role_name') is-invalid @enderror" value="{{ old('role_name') ?? $role->name }}" id="role_name" name="role_name">
    @error('role_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="guard_name">Guard name</label>
    <input type="text" class="form-control @error('guard_name') is-invalid @enderror" value="{{ old('guard_name') ?? $role->guard_name }}" id="guard_name" name="guard_name" placeholder='default to "web"'>
    @error('guard_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-md btn-primary">{{ $submit ?? 'Update' }}</button>
</div>