<div class="header-divider"></div>
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <span>{{ $title }}</span>
            </li>
            @if (isset($subtitle))
                <li class="breadcrumb-item active"><span>{{ $subtitle }}</span></li>
            @endif
        </ol>
    </nav>
</div>
