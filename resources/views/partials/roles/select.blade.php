<select class="form-select text-capitalize @error('role_id') is-invalid @endError" aria-label="Default select example" name="role_id">
    <option selected disabled>{{ isset($default) ? __($default) : __('Choose role...') }}</option>

    @foreach ($roles as $role)
        <option value="{{ $role->id }}" @if(isset($selected) && $selected == $role->id) selected @endIf>{{ $role->role }}</option>
    @endforeach
</select>
