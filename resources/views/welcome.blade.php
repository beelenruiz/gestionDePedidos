<x-app-layout>
    <x-self.base>
    <h1 class="text-xl text-center text-red-900 font-bold mb-5"> -- PEDIDOS PENDIENTES -- </h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white font-bold uppercase bg-red-900">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            usuario
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $item)
                    <tr class="bg-white hover:bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium font-bold text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item -> nombre}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item -> user -> name}}
                        </td>
                        <td class="px-6 py-4 flex items-center">
                            <div class="h-2 w-2 rounded-full bg-red-900/60 me-2"></div>{{$item -> estado}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item -> cantidad}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item -> updated_at}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </x-self.base>
</x-app-layout>