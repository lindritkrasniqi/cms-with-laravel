<ol class="list-group">
    @foreach ($roles as $role)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="ms-2 me-auto">
                <div class="fw-bold text-capitalize">{{ __($role->role) }}</div>
                {{ __('Total users on this role') }}
            </div>
            <span class="badge bg-primary rounded-pill">{{ __($role->id) }}</span>
        </li>
    @endforeach
</ol>
