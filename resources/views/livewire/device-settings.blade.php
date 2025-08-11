<div class="p-6 rounded-xl shadow-md max-w-xl mx-auto space-y-4 bg-transparent">
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 px-4 py-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="text-lg font-bold text-brown-700 dark:text-yellow-300">Select sensor to activate device:</h2>

    <div class="space-y-2">
        <div class="flex items-center space-x-2">
            <input type="hidden" wire:model.lazy="IR_senser" value="0">
            <input type="checkbox" wire:model.lazy="IR_senser" value="1" class="form-checkbox h-5 w-5 text-green-600">
            <label class="text-gray-800 dark:text-gray-200">IR Sensor</label>
        </div>

        <div class="flex items-center space-x-2">
            <input type="hidden" wire:model.lazy="SWITCH_senser" value="0">
            <input type="checkbox" wire:model.lazy="SWITCH_senser" value="1" class="form-checkbox h-5 w-5 text-green-600">
            <label class="text-gray-800 dark:text-gray-200">Switch Sensor</label>
        </div>

        <div class="flex items-center space-x-2">
            <input type="hidden" wire:model.lazy="fire_senser" value="0">
            <input type="checkbox" wire:model.lazy="fire_senser" value="1" class="form-checkbox h-5 w-5 text-green-600">
            <label class="text-gray-800 dark:text-gray-200">Fire Sensor</label>
        </div>
    </div>

    <h2 class="text-lg font-bold text-gray-800 dark:text-yellow-300 mt-4">Setting Navigation Device:</h2>

    <div class="space-y-2">
        <div class="flex items-center space-x-2">
            <input type="hidden" wire:model.lazy="alart_sound" value="0">
            <input type="checkbox" wire:model.lazy="alart_sound" value="1" class="form-checkbox h-5 w-5 text-green-600">
            <label class="text-gray-800 dark:text-gray-200">Alert Sound</label>
        </div>

        <div class="flex items-center space-x-2">
            <input type="hidden" wire:model.lazy="send_whatapp" value="0">
            <input type="checkbox" wire:model.lazy="send_whatapp" value="1" class="form-checkbox h-5 w-5 text-green-600">
            <label class="text-gray-800 dark:text-gray-200">Send WhatsApp Message</label>
        </div>

        <div class="flex items-center space-x-2">
            <input type="hidden" wire:model.lazy="send_emil" value="0">
            <input type="checkbox" wire:model.lazy="send_emil" value="1" class="form-checkbox h-5 w-5 text-green-600">
            <label class="text-gray-800 dark:text-gray-200">Send Email Message</label>
        </div>

        <div class="flex items-center space-x-2">
            <input type="hidden" wire:model.lazy="send_pumm" value="0">
            <input type="checkbox" wire:model.lazy="send_pumm" value="1" class="form-checkbox h-5 w-5 text-green-600">
            <label class="text-gray-800 dark:text-gray-200">Pumm Alert</label>
        </div>

        <div class="flex items-center space-x-2">
            <input type="hidden" wire:model.lazy="send_eleictrical" value="0">
            <input type="checkbox" wire:model.lazy="send_eleictrical" value="1" class="form-checkbox h-5 w-5 text-green-600">
            <label class="text-gray-800 dark:text-gray-200">Send Electrical Alert</label>
        </div>

        <div class="flex items-center space-x-2">
            <input type="hidden" wire:model.lazy="send_network" value="0">
            <input type="checkbox" wire:model.lazy="send_network" value="1" class="form-checkbox h-5 w-5 text-green-600">
            <label class="text-gray-800 dark:text-gray-200">Send Network Alert</label>
        </div>
    </div>

    <div class="text-right pt-4">
        <button wire:click="updateSettings" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
            OK
        </button>
    </div>
</div>
