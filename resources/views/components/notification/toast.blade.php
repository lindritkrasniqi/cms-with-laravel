@empty(!$message)
    <div {{ $attributes }}>
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="notification-toast" class="toast align-items-center show callout callout-{{ $type }} p-0"
                    data-delay="{{ $delay }}" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            @php echo $message; @endphp
                        </div>
                        <button type="button" class="btn-close me-2 m-auto" data-coreui-dismiss="toast" aria-label="Close">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const toast = document.getElementById('notification-toast');

        setTimeout(() => {
            toast.classList.remove('show');
        }, toast.getAttribute('data-delay') || 5000);
    </script>
@endempty
