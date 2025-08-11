<div>
    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr wire:click="selectRow({{ $user->id }})"
                class="{{ $user->state == 1 ? 'table-success' : 'table-danger' }}"
                style="cursor: pointer;">
                <td>{{ $user->name }}</td>
                <td>{{ $user->id_user }}</td>
                <td>
                    <select wire:change="updateRole({{ $user->id }}, $event.target.value)" class="form-select form-select-sm" wire:click.stop>
                        <option value="Admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user</option>
                    </select>
                </td>
                <td>
                    <button type="button"
                        wire:click.stop="delete({{ $user->id }})"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this user?')"
                    >
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add Telegram User Button -->
    <button type="button" class="btn btn-primary" wire:click="add_user_telegram">
        Add Telegram User
    </button>

    <!-- Telegram Modal -->
    <div class="modal fade" id="telegramModal" tabindex="-1" aria-labelledby="telegramModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content text-end">

                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="telegramModalLabel">Login to Telegram</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body text-center">
                    <p>📱 Scan the QR code to login on another device</p>

                    <!-- QR Code -->
                    {!! DNS2D::getBarcodeHTML($teleurl, "QRCODE") !!}

                    <p>Or copy the code and send it manually</p>
                    <p>{{ $teleurl }}</p>

                    <!-- Code Input -->
                    <div class="input-group mb-3 w-75 mx-auto">
                        <input type="text" class="form-control text-center" id="telegramCode" value="{{ $teleurl }}" readonly>
                        <button class="btn btn-outline-primary" type="button" onclick="copyTelegramCode()">📋 Copy</button>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-success" onclick="window.open('{{ $teleurl }}', '_blank'); var modal = bootstrap.Modal.getInstance(document.getElementById('telegramModal')); modal.hide();">
                        Login on this device
                    </button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">❌ Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Show Listener -->
    <script>
        window.addEventListener('open-telegram-modal', () => {
            const modal = new bootstrap.Modal(document.getElementById('telegramModal'));
            modal.show();
        });
    </script>

    <!-- Copy Code Function -->
    <script>
        function copyTelegramCode() {
            const input = document.getElementById("telegramCode");
            input.select();
            input.setSelectionRange(0, 99999); // For mobile
            document.execCommand("copy");
            alert("✅ Code copied: " + input.value);
        }

        function registerThisDevice() {
            alert("🟢 Registering this device...");
            // You can call an AJAX or other function here
        }
    </script>
</div>
