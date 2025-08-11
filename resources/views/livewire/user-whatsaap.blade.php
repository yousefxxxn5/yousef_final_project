<div>
    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Options</th>
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
                        <option value="Admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
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

    <!-- Button to open modal -->
    <button type="button" class="btn btn-success" wire:click="add_user_whatsapp">
        Add WhatsApp User
    </button>

    <!-- WhatsApp Modal -->
    <div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content text-end">

                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="whatsappModalLabel">Login to WhatsApp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body text-center">
                    <p>📱 Scan the QR code to login from your phone</p>

                    <!-- QR Code -->
                    {!! DNS2D::getBarcodeHTML($whatsurl, "QRCODE") !!}
                    <p>Or login using this link</p>
                    <p>{{ $whatsurl }}</p>

                    <!-- Code Box -->
                    <div class="input-group mb-3 w-75 mx-auto">
                        <input type="text" class="form-control text-center" id="whatsappCode" value="{{ $whatsurl }}" readonly>
                        <button class="btn btn-outline-success" type="button" onclick="copyWhatsappCode()">📋 Copy</button>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" onclick="window.open('{{ $whatsurl }}', '_blank'); var modal = bootstrap.Modal.getInstance(document.getElementById('whatsappModal')); modal.hide();">
                        Login on this device
                    </button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">❌ Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        window.addEventListener('open-whatsapp-modal', () => {
            const modal = new bootstrap.Modal(document.getElementById('whatsappModal'));
            modal.show();
        });

        function copyWhatsappCode() {
            const input = document.getElementById("whatsappCode");
            input.select();
            input.setSelectionRange(0, 99999); // For mobile
            document.execCommand("copy");
            alert("✅ Link copied: " + input.value);
        }
    </script>
</div>
