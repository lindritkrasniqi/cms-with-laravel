<div class="header-divider"></div>
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            @foreach ($links as $item)
                <li @class(['breadcrumb-item', 'text-capitalize', 'active' => $loop->last])>
                    <span>{{ $item }}</span>
                </li>
            @endforeach
        </ol>
    </nav>
</div>
