<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header bg-primary text-white"><strong>Select Sensors</strong></div>
        <div class="card-body">
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" wire:model.blur="IR_senser"  id="ir_sensor">
                <label class="form-check-label" for="IR_senser" >Do you enable IR Sensor?</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" wire:model.blur="SWITCH_senser" id="SWITCH_senser">
                <label class="form-check-label" for="SWITCH_senser">Do you enable Switch Sensor?</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" wire:model.blur="fire_senser" id="fire_sensor">
                <label class="form-check-label" for="fire_sensor">Do you enable Fire Sensor?</label>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-secondary text-white"><strong>Notification Settings</strong></div>
        <div class="card-body">
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" wire:model.blur="alart_sound" id="alert_sound">
                <label class="form-check-label" for="alert_sound">Enable Alert Sound?</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" wire:model.blur="send_whatapp" id="send_whatsapp">
                <label class="form-check-label" for="send_whatsapp">Send or Receive WhatsApp Enable?</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" wire:model.blur="send_sms" id="send_sms">
                <label class="form-check-label" for="send_sms">Send SMS Alert?</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" wire:model.blur="send_telegram" id="send_telegram">
                <label class="form-check-label" for="send_telegram">Send or Receive Telegram Enable?</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" wire:model.blur="send_pumm" id="pumm_alert">
                <label class="form-check-label" for="pumm_alert">Activate Pumm Alert?</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" wire:model.blur="send_eleictrical" id="electrical_alert">
                <label class="form-check-label" for="electrical_alert">Send Electrical Alert?</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" wire:model.blur="send_network" id="network_alert">
                <label class="form-check-label" for="network_alert">Send Network Alert?</label>
            </div>
        </div>
    </div>

</div>
