<div>
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
<div class="mb-3 fw-bold fs-5">
    Test Button
</div>
    <div class="d-flex align-items-center gap-2 mb-2">
        <button wire:click="alart"
                @disabled($buttonDisabled)
                class="btn text-white"
                style="background-color: #7f6dcf; border-radius: 50px;">
            DC Alert
        </button>

        <button wire:click="AcAlart"
                @disabled($buttonDisabled)
                class="btn text-white"
                style="background-color: #7f6dcf; border-radius: 50px;">
            AC Alert
        </button>

        <button wire:click="boom_tast"
                @disabled($buttonDisabled)
                class="btn text-white"
                style="background-color: #7f6dcf; border-radius: 50px;">
            Boom Test
        </button>
    </div>

    @if ($buttonDisabled)
        <div wire:poll.1000ms="tick" class="mt-2 text-danger fw-bold">
            الرجاء الانتظار {{ $countdown }} ثانية
        </div>
    @endif
</div>
