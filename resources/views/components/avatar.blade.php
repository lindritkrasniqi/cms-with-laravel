<div {{ $attributes }}>
    @isset($user->avatar)
        <img src="{{ url('storage/avatars/' . $user->avatar->name . '.' . $user->avatar->extension) }}"
            alt="{{ $user->name }}" @isset($width) width="{{ $width }}" @endisset
            class="avatar-img border border-info rounded-circle" alt="{{ $user->name }}">
    @else
        <span @class([
            'text-capitalize fw-bolder',
            'h1' => isset($width),
        ])>{{ Str::substr($user->name, 0, 1) }}</span>
    @endisset
</div>
