<div >
{{-- wire:poll.1000ms="tickCountdown" --}}
    {{-- رسائل التنبيه --}}
    @if (session()->has('on'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('on') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('off'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('off') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- الزر --}}
    <div class="d-flex flex-column align-items-center justify-content-center vh-100">

        <button wire:click="buttons_state"
                wire:loading.attr="disabled"
                {{ $isDisabled ? 'disabled' : '' }}
                class="btn {{ $data->button_state ? 'btn-outline-danger' : 'btn-outline-success' }} btn-lg px-5 py-3 my-3">
            {{ $data->button_state ? 'Turn Off' : 'Turn On' }}
        </button>

        {{-- العد التنازلي --}}
        @if($isDisabled)
            <div class="text-muted text-center">
                <strong>{{ $countdown }}</strong> ثانية
                <br>
                @if($data->button_state)
                    جاري إيقاف الجهاز، يرجى الانتظار...
                @else
                    جاري تشغيل الجهاز، يرجى الانتظار...
                @endif
            </div>
        @endif

    </div>
</div>
