<div>
    @if (session()->has('message'))
        <div style="color: green;">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save">
        <input type="file" wire:model="pic" accept="image/*">

        @error('pic') <span style="color: red;">{{ $message }}</span> @enderror
        <br><br>
        <button type="submit">Save Image</button>
    </form>

    <img src="{{ asset('storage/img/' . $img_name) }}" width="200">
</div>
