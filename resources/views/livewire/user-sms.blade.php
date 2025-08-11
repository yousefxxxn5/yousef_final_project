<div>
    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Phone number</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
                <tr class="{{ $user->state == 1 ? 'table-success' : 'table-danger' }}" style="cursor: pointer;">
                    @if ($user->id == $edit_number)
                        <td>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </td>
                        <td>
                            <input type="text" wire:model.defer="phone_number" class="form-control">
                            @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </td>
                    @else
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone_number }}</td>
                    @endif
                    <td>
                        <select wire:change="updateRole({{ $user->id }}, $event.target.value)"
                            class="form-select form-select-sm" wire:click.stop>
                            <option value="Admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user</option>
                        </select>
                    </td>
                    <td>
                        @if ($user->id == $edit_number)
                            <button type="button" wire:click="cansel({{ $user->id }})" class="btn btn-secondary btn-sm">
                                Cancel
                            </button>
                            <button type="button" wire:click="save({{ $user->id }})" class="btn btn-success btn-sm">
                                Save
                            </button>
                        @else
                            <button type="button" wire:click.stop="delete({{ $user->id }})" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                            <button type="button" wire:click="edit({{ $user->id }})" class="btn btn-primary btn-sm">
                                Edit
                            </button>

                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add Telegram User Button -->
    <button type="button" class="btn btn-primary" wire:click="addSmsListener">
        Add SMS Listener
    </button>

</div>
