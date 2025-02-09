<div>
    <x-button class="font-bold bg-red-900 text-white p-2 mb-4" wire:click="$set('openNew', true)">
        <i class="fas fa-add mr-2"></i>nuevo
    </x-button>

    <x-dialog-modal wire:model="openNew">
        <x-slot name="title">
        <span class="text-red-900 font-bold">-- NUEVO PEDIDO --</span>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <label for="nombre" class="block text-medium font-medium text-gray-700 mb-2">Nombre del pedido:</label>
                <input type="text" id="nombre" wire:model="cform.nombre"
                    class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-900">
                    <x-input-error for="cform.nombre" />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Estado</label>
                
                <div class="flex items-center space-x-4">
                    <!-- Opción Procesado -->
                    <label class="flex items-center space-x-2">
                        <input type="radio" wire:model="cform.estado" value="Procesado"
                            class="form-radio text-blue-500 focus:ring-blue-500">
                        <span class="text-gray-700">Procesado</span>
                    </label>

                    <!-- Opción Pendiente -->
                    <label class="flex items-center space-x-2">
                        <input type="radio" wire:model="cform.estado" value="Pendiente"
                            class="form-radio text-blue-500 focus:ring-blue-500">
                        <span class="text-gray-700">Pendiente</span>
                    </label>
                </div>

                <x-input-error for="cform.estado" />
            </div>

            <div class="mb-4">
                <label for="cantidad" class="block text-medium font-medium text-gray-700 mb-2">Cantidad:</label>
                <input type="text" id="cantidad" wire:model="cform.cantidad"
                    class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-900">
                    <x-input-error for="cform.cantidad" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row-reverse justify-center">
                <button wire:click="store" wire:loading.attr="disabled" class="ml-2 p-2 bg-green-900/80 text-white font-semibold rounded-lg shadow-md hover:bg-green-900 transition duration-300">
                    <i class="fas fa-paper-plane mr-2"></i> Pedir
                </button>
                <button wire:click="cancelar" class="p-2 bg-red-900/80 text-white font-semibold rounded-lg shadow-md hover:bg-red-900 transition duration-300">
                    <i class="fas fa-xmark mr-2"></i> Cancelar
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
