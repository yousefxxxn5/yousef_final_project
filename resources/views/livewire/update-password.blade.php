<div>
    <div>
        <h4 class="mb-4">Change Name</h4>
        <form wire:submit.prevent="updateName" class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="name" class="col-form-label">New Name</label>
            </div>
            <div class="col-auto">
                <input type="text" id="name" wire:model.defer="name" class="form-control"
                    placeholder="Enter new name">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Change</button>
            </div>

            @if (session()->has('message'))
                <div class="col-12 text-success mt-2">
                    {{ session('message') }}
                </div>
            @endif
        </form>
        <br>
        <br>
    </div>

    <h4 class="mb-4">Change Password</h4>
    <form wire:submit.prevent="updatePassword" class="row gy-2 gx-3 align-items-center">

        <!-- Current Password -->
        <div class="col-auto">
            <label for="currentPassword" class="form-label">Current Password</label>
            <input type="password" wire:model.defer="currentPassword" class="form-control" id="currentPassword"
                placeholder="Current password">
            @error('currentPassword') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <!-- Check Button -->
        <div class="col-auto align-self-end">
            <button type="button" class="btn btn-secondary mt-2" wire:click="checkCurrentPassword">Check</button>
        </div>

        <!-- New Password -->
        <div class="col-auto">
            <label for="newPassword" class="form-label" {{ $canChange ? '' : 'hidden' }}>New Password</label>
            <input type="password" wire:model.defer="newPassword" class="form-control" id="newPassword"
                placeholder="New password" {{ $canChange ? '' : 'hidden' }}>
            @error('newPassword') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <!-- Confirm Password -->
        <div class="col-auto">
            <label for="confirmPassword" class="form-label" {{ $canChange ? '' : 'hidden' }}>Confirm Password</label>
            <input type="password" wire:model.defer="confirmPassword" class="form-control" id="confirmPassword"
                placeholder="Confirm password" {{ $canChange ? '' : 'hidden' }}>
            @error('confirmPassword') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="col-auto align-self-end">
            <button type="submit" class="btn btn-primary mt-2" {{ $canChange ? '' : 'hidden' }}>Change</button>
        </div>

        @if ($successMessage)
        <div class="col-12 text-success mt-2">
            {{ $successMessage }}
        </div>
        @endif

    </form>
</div>
