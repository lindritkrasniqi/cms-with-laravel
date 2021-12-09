<select class="form-select @error('policy') is-invalid @enderror" name="policy" aria-label="Default select example">
    @foreach ($policies as $key => $value)
        <option value="{{ $key }}" @if (isset($selected) && $selected == $key) selected @endif>{{ $value }}</option>
    @endforeach
</select>
