<div>
<form wire:submit.prevent="updateSetting">
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Select Sensors</strong>
        </div>
        <div class="card-body">
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="ir_sensor" wire:model="IR_senser">
                <label class="form-check-label" for="ir_sensor">Do you enable IR Sensor?</label>
            </div>

            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="switch_sensor" wire:model="SWITCH_senser">
                <label class="form-check-label" for="switch_sensor">Do you enable Switch Sensor?</label>
            </div>

            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="fire_sensor" wire:model="fire_senser">
                <label class="form-check-label" for="fire_sensor">Do you enable Fire Sensor?</label>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <strong>Notification Settings</strong>
        </div>
        <div class="card-body">

            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="alert_sound" wire:model="alart_sound">
                <label class="form-check-label" for="alert_sound">Enable Alert Sound?</label>
            </div>

            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="send_whatsapp" wire:model="send_whatapp">
                <label class="form-check-label" for="send_whatsapp">Send or Receive WhatsApp Enable?</label>
            </div>

            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="send_sms" wire:model="send_sms">
                <label class="form-check-label" for="send_sms">Send SMS Alert?</label>
            </div>

            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="send_telegram" wire:model="send_emil">
                <label class="form-check-label" for="send_telegram">Send or Receive Telegram Enable?</label>
            </div>

            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="pumm_alert" wire:model="send_pumm">
                <label class="form-check-label" for="pumm_alert">Activate Pumm Alert?</label>
            </div>

            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="electrical_alert" wire:model="send_eleictrical">
                <label class="form-check-label" for="electrical_alert">Send Electrical Alert?</label>
            </div>

            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="network_alert" wire:model="send_network">
                <label class="form-check-label" for="network_alert">Send Network Alert?</label>
            </div>

        </div>
    </div>

    <div class="text-start">
        <button type="submit" class="btn btn-success px-4">OK</button>
    </div>
</form>

</div>
