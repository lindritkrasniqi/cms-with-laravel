<select class="form-select" name="{{ $name }}"
    onchange="event.preventDefault(); document.getElementById('{{ $id }}-form').submit()"
    aria-label="Default select example">
    <option value="0" @if (!$value) selected @endif>Denied</option>
    <option value="1" @if ($value) selected @endif>Allowed</option>
</select>
