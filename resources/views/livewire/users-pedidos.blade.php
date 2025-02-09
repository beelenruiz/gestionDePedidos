<x-self.base>
    <h1 class="text-xl text-center text-red-900 font-bold mb-5"> -- TUS PEDIDOS -- </h1>

    <div>
        @livewire('new-pedido')
    </div>

    @if($pedidos -> count())
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white font-bold uppercase bg-red-900">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        cantidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $item)
                <tr class="bg-white hover:bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium font-bold text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item -> nombre}}
                    </th>
                    <td class="px-6 py-4 flex items-center">
                        <button @class(
                            [ ' h-4 w-4 rounded-full me-2' , 'bg-red-900/60'=>$item->estado == 'Pendiente',
                            'bg-green-900/60'=> $item->estado == 'Procesado',
                            ]) wire:click="cambiarEstado({{$item -> id}})">

                        </button>{{$item -> estado}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item -> cantidad}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item -> updated_at}}
                    </td>
                    <td class="px-6 py-4">
                        <button wire:click="edit({{$item -> id}})">
                            <i class="fas fa-edit text-lg text-red-900/60 hover:text-red-900 mr-5"></i>
                        </button>
                        <button wire:click="delete({{$item->id}})">
                            <i class="fas fa-trash text-lg text-red-900/60 hover:text-red-900"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @else

    <p class="w-full p-4 rounded-xl shadow-xl font-bold">
        No se encontró ningún pedido o aún no ha hecho ninguno.
    </p>
    @endif

    <!-- para el update -->
    @isset($uform->pedido)
    <x-dialog-modal wire:model="openUpdate">
        <x-slot name="title">
            <span class="text-red-900 font-bold">-- EDITAR PEDIDO --</span>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <label for="nombre" class="block text-medium font-medium text-gray-700 mb-2">Nombre del pedido:</label>
                <input type="text" id="nombre" wire:model="uform.nombre"
                    class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-900">
                    <x-input-error for="cform.nombre" />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Estado</label>
                
                <div class="flex items-center space-x-4">
                    <!-- Opción Procesado -->
                    <label class="flex items-center space-x-2">
                        <input type="radio" wire:model="uform.estado" value="Procesado"
                            class="form-radio text-blue-500 focus:ring-blue-500">
                        <span class="text-gray-700">Procesado</span>
                    </label>

                    <!-- Opción Pendiente -->
                    <label class="flex items-center space-x-2">
                        <input type="radio" wire:model="uform.estado" value="Pendiente"
                            class="form-radio text-blue-500 focus:ring-blue-500">
                        <span class="text-gray-700">Pendiente</span>
                    </label>
                </div>

                <x-input-error for="cform.estado" />
            </div>

            <div class="mb-4">
                <label for="cantidad" class="block text-medium font-medium text-gray-700 mb-2">Cantidad:</label>
                <input type="text" id="cantidad" wire:model="uform.cantidad"
                    class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-900">
                    <x-input-error for="cform.cantidad" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row-reverse justify-center">
                <button wire:click="update" wire:loading.attr="disabled" class="ml-2 p-2 bg-green-900/80 text-white font-semibold rounded-lg shadow-md hover:bg-green-900 transition duration-300">
                    <i class="fas fa-paper-plane mr-2"></i> Editar Pedido
                </button>
                <button wire:click="cancelar" class="p-2 bg-red-900/80 text-white font-semibold rounded-lg shadow-md hover:bg-red-900 transition duration-300">
                    <i class="fas fa-xmark mr-2"></i> Cancelar
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>
    @endisset
</x-self.base>