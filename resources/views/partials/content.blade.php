<div class="container-fluid">
    <div class="row">
        <footer>
            @if ($key->button_state == 0)
                @if (session('messages'))
                    <div class="alert alert-danger solid alert-dismissible fade show">
                        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Error!</strong> {{ session('messages') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                    </div>
                @endif
                <form action="{{ route('data.edit', Auth::id()) }}" method="get">
                    @csrf
                    <input type="text" name="name" value="true" style="visibility: hidden">
                    <input type="submit" class="btn btn-square btn-outline-success" value="{{ $key->button_state }}">
                </form>
            @endif

            @if (  $key->button_state == 1)
                @if (session('messages'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <strong>Success!</strong> {{ session('messages') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                    </div>
                @endif
                <form action="{{ route('data.edit', Auth::id()) }}" method="get">
                    @csrf
                    <input type="text" name="name" value="false" style="visibility: hidden">
                    <input type="submit" class="btn btn-outline-danger btn-lg rounded-circle" value="off">
                </form>
            @endif
        </footer>
    </div>
</div>
