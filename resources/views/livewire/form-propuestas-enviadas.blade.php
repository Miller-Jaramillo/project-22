<div wire:poll.5000ms>
    <x-label
        class="flex justify-center mt-2 font-semibold uppercase tracking-widest text-xs text-sky-500 dark:text-sky-500">
        Propuestas enviadas
    </x-label>

    <!-- Tabla propuestas -->
    <div class="py-5 ">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8    px-4 sm:px-6  ">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg rounded-md">

                @if ($propuestas->count())
                    <table class="w-full md:w-auto min-w-full ">
                        <thead class="border-b dark:border-indigo-800 border-indigo-500">
                            <tr>
                                <th
                                    class="hidden sm:table-cell  px-6 py-3  bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Nombre</th>
                                <th
                                    class="px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Propuesta</th>
                                <th
                                    class="hidden sm:table-cell px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Agruacion</th>

                                <th
                                    class="px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Estado</th>

                                <th
                                    class="hidden sm:table-cell px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Fecha</th>

                                <th
                                    class="px-6 py-3 bg-indigo-50 dark:bg-gray-800 text-gray-500 text-center text-xs font-medium  uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>


                        <tbody class="dark:bg-gray-900 divide-y dark:divide-indigo-950 divide-indigo-50">
                            @foreach ($propuestas as $propuesta)
                                <tr>
                                    <td class="px-6 py-4 hidden sm:table-cell">
                                        <div class="flex items-center">
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                src="{{ $propuesta->user->profile_photo_url }}"
                                                alt="{{ $propuesta->user->name }}" />
                                            <div class="ml-4">
                                                <p
                                                    class="text-sm font-semibold leading-6 dark:text-gray-100  text-gray-900">
                                                    {{ $propuesta->user->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <p class="text-sm leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->nombre_propuesta }}</p>
                                    </td>

                                    <td class="hidden sm:table-cell px-6 py-4 text-center ">
                                        <p class="text-sm leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->nombre_agrupacion }}</p>
                                    </td>


                                    @if ($propuesta->estado === 'Enviada')
                                        <td class="px-6 py-4 text-center">
                                            <x-label class="blue-text text-sm leading-6 tracking-widest">
                                                {{ $propuesta->estado }}</x-label>
                                        </td>
                                    @elseif($propuesta->estado == 'Rechazada')
                                        <td class="px-6 py-4 text-center">
                                            <x-label class="red-text text-sm leading-6 tracking-widest">
                                                {{ $propuesta->estado }}</x-label>
                                        </td>
                                    @elseif($propuesta->estado == 'Revision')
                                        <td class="px-6 py-4 text-center ">
                                            <x-label class="yellow-text text-sm tracking-widest ">
                                                {{ $propuesta->estado }}</x-label>
                                        </td>
                                    @elseif($propuestas->where('estado', 'publicada'))
                                        <td class="px-6 py-4 text-center">
                                            <x-label class="green-text leading-6 tracking-widest">
                                                {{ $propuesta->estado }}</x-label>
                                        </td>
                                    @endif



                                    <td class="hidden sm:table-cell px-6 py-4 text-center">
                                        <p class="text-sm leading-6 dark:text-gray-100  text-gray-900">
                                            {{ $propuesta->created_at->format('d-m-y') }}</p>
                                    </td>

                                    {{-- --> ICONOS - ACCIONES --}}

                                    <td class="px-6 py-4 text-center dark:bg-gray-900 bg-white ">
                                        <div class="flex justify-center">

                                            {{-- -->Ver User --}}
                                            <a href="#" class="icon-blue green-hover"
                                                wire:click="showPropuesta({{ $propuesta->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="w-10 h-6">
                                                    <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                                                    <path fill-rule="evenodd"
                                                        d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div
                        class="justify-between border-t dark:border-indigo-800 border-indigo-500  dark:bg-gray-900 bg-white px-4 py-3 sm:px-6 text-gray-500 ">
                        {{ $propuestas->links() }}
                    </div>
                @else
                    <div
                        class="mt-5 text-center justify-between border-t dark:border-indigo-800 border-indigo-500 dark:bg-gray-900 bg-gray-100 dark:text-indigo-600 text-indigo-500 px-4 py-3 sm:px-6 tracking-widest">
                        No hay resultados.
                    </div>
                @endif

                <div>
                    @if ($message)
                        <div x-data="{ show: @entangle('message') }" x-show="show" x-init="setTimeout(() => { show = false; }, 2000)"
                            class="fixed inset-0 flex items-center justify-center">
                            <div class="bg-white dark:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg text-center">
                                {!! $message !!}
                            </div>
                        </div>
                    @endif
                </div>
                @livewireScripts

            </div>
        </div>
    </div>


    <!-- Información del usuario flotante -->
    <div class="flex items-center">
        @if ($showPropuestaInfo)
            <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75">


                <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-40 px-4 sm:px-6">

                    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-20 px-4 sm:px-6  ">
                        <div class="flex justify-center">
                            <button wire:click="closeShowPropuesta" class="shadow-sm ml-3 block icon-red  ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </button>
                        </div>

                        <div
                            class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-xl rounded-xl
                                    border border-b-indigo-400 border-l-indigo-400 border border-t-sky-400 border-r-sky-400
                                dark:border-b-indigo-900 dark:border-l-indigo-900 dark:border-t-sky-900 dark:border-r-sky-900">
                            <div class="modal-content">

                                @if ($propuestaInfo->estado === 'Enviada')
                                    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-16 px-4 sm:px-6  ">
                                        {{-- titulo formulario --}}
                                        <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 flex-row  ">

                                            <div class=" pb-2 flex justify-end ">
                                                <label class="font-semibold text-blue-500 tracking-widest">
                                                    {{ $propuestaInfo->estado }}
                                                </label>

                                            </div>
                                        </div>

                                        <div class="mt-1  border-t dark:border-blue-500 border-blue-500"></div>


                                        {{-- inicio del grid --}}
                                        <div class="mt-3 grid grid-cols-1 sm:grid-cols-1   gap-x-10 pb-5">

                                            <div>
                                                <x-label for=""
                                                    class=" uppercase tracking-widest text-xs text-green-500 dark:text-green-500 ">
                                                    {{ $propuestaInfo->created_at->format('d-m-y') }}
                                                </x-label>
                                                <div class="">
                                                    <x-label
                                                        class="text-lg font-semibold tracking-widest leading-6 dark:text-gray-200  text-gray-900 flex justify-center uppercase  ">
                                                        {{ $propuestaInfo->nombre_propuesta }}
                                                    </x-label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5 grid grid-cols-3 sm:grid-cols-3 text-center   gap-x-10  ">


                                            <div class="">
                                                <x-label for="nombreAgrupacion"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Agrupación</x-label>
                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->nombre_agrupacion }}
                                                    </p>
                                                </div>
                                            </div>


                                            <div>
                                                <x-label for="categoria"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Categoria
                                                </x-label>

                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->categoria->nombre }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div>
                                                <x-label for="subcategoria"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Subcategoria</x-label>
                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->subcategoria->nombre }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5 grid grid-cols-1 sm:grid-cols-1">
                                            <div class="">
                                                <x-label for="descripcion"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Descripcion</x-label>
                                                <div
                                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest">
                                                    <x-label for="">
                                                        {{ $propuestaInfo->descripcion }}
                                                    </x-label>
                                                </div>

                                            </div>

                                            <div class="mt-4 pb-5">
                                                <div
                                                    class="mt-2 flex justify-center sm:rounded-lg rounded-md dark:bg-gray-900  border border-dashed border-indigo-900/25 dark:border-indigo-100/25 px-6 py-10">
                                                    <div class="text-center">

                                                        <img class="h-128 w-128 sm:rounded-lg rounded-md  border-2 border-indigo-100 "
                                                            src="{{ asset('storage/' . $propuestaInfo->foto_o_video) }}"
                                                            alt="Foto de la propuesta">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <x-label for="descripcion"
                                                class="block text-xs font-medium leading-6 text-sky-500 dark:text-sky-700 tracking-widest">
                                                Tu propuesta ha sido enviada y está pendiente de revisión por parte
                                                del administrador.
                                                Una vez que tu propuesta entre en estado de revisión, no podrás
                                                eliminarla.
                                            </x-label>
                                        </div>

                                        <div class="mt-1  border-t dark:border-blue-500 border-blue-500"></div>

                                        <div class="mt-2  pb-7 flex justify-end">
                                            <x-button wire:click="eliminarPropuesta({{ $propuestaInfo->id }})"
                                                class="bg-red-500 dark:bg-red-500 tracking-widest">
                                                {{ __('Eliminar') }}
                                            </x-button>
                                        </div>
                                    </div>
                                @endif

                                @if ($propuestaInfo->estado === 'Rechazada')
                                    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-16 px-4 sm:px-6  ">
                                        {{-- titulo formulario --}}
                                        <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 flex-row  ">

                                            <div class=" pb-2 flex justify-end ">
                                                <x-label class="font-semibold red-text tracking-widest">
                                                    {{ $propuestaInfo->estado }}
                                                </x-label>

                                            </div>
                                        </div>

                                        <div class="mt-1  border-t dark:border-red-500 border-red-500"></div>


                                        {{-- inicio del grid --}}
                                        <div class="mt-3 grid grid-cols-1 sm:grid-cols-1   gap-x-10 pb-5">

                                            <div>
                                                <x-label for=""
                                                    class=" uppercase tracking-widest text-xs text-green-500 dark:text-green-500 ">
                                                    {{ $propuestaInfo->created_at->format('d-m-y') }}
                                                </x-label>
                                                <div class="">
                                                    <x-label
                                                        class="text-lg font-semibold tracking-widest leading-6 dark:text-gray-200  text-gray-900 flex justify-center uppercase  ">
                                                        {{ $propuestaInfo->nombre_propuesta }}
                                                    </x-label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5 grid grid-cols-3 sm:grid-cols-3 text-center   gap-x-10  ">


                                            <div class="">
                                                <x-label for="nombreAgrupacion"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Agrupación</x-label>
                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->nombre_agrupacion }}
                                                    </p>
                                                </div>
                                            </div>


                                            <div>
                                                <x-label for="categoria"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Categoria
                                                </x-label>

                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->categoria->nombre }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div>
                                                <x-label for="subcategoria"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Subcategoria</x-label>
                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->subcategoria->nombre }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5 grid grid-cols-1 sm:grid-cols-1">
                                            <div class="">
                                                <x-label for="descripcion"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Descripcion</x-label>
                                                <div
                                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest">
                                                    <x-label for="">
                                                        {{ $propuestaInfo->descripcion }}
                                                    </x-label>
                                                </div>

                                            </div>

                                            <div class="mt-4">
                                                <div
                                                    class="mt-2 flex justify-center sm:rounded-lg rounded-md dark:bg-gray-900  border border-dashed border-indigo-900/25 dark:border-indigo-100/25 px-6 py-10">
                                                    <div class="text-center">

                                                        <img class="h-128 w-128 sm:rounded-lg rounded-md  border-2 border-indigo-100 "
                                                            src="{{ asset('storage/' . $propuestaInfo->foto_o_video) }}"
                                                            alt="Foto de la propuesta">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($propuestaInfo->observaciones != null)
                                            <div class="mt-4">
                                                <x-label
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Observaciones</x-label>
                                                <x-label
                                                    class="text-xs font-semibold leading-6 dark:text-red-500  text-red-500 tracking-widest">
                                                    {{ $propuestaInfo->observaciones }}</x-label>
                                            </div>
                                        @endif

                                        <div class="mt-1  border-b dark:border-red-500 border-red-500 pb-5"></div>

                                        <div class="mt-2  pb-7 flex justify-end">
                                            <x-button wire:click="eliminarPropuesta({{ $propuestaInfo->id }})"
                                                class="bg-red-500 dark:bg-red-500 tracking-widest">
                                                {{ __('Eliminar') }}
                                            </x-button>
                                        </div>

                                    </div>
                                @endif

                                @if ($propuestaInfo->estado === 'Publicada')
                                    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-16 px-4 sm:px-6  ">
                                        {{-- titulo formulario --}}
                                        <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 flex-row  ">

                                            <div class=" pb-2 flex justify-end ">
                                                <x-label class="font-semibold green-text tracking-widest">
                                                    {{ $propuestaInfo->estado }}
                                                </x-label>

                                            </div>
                                        </div>

                                        <div class="mt-1  border-t dark:border-green-500 border-green-500"></div>


                                        {{-- inicio del grid --}}
                                        <div class="mt-3 grid grid-cols-1 sm:grid-cols-1 gap-x-10 pb-5">

                                            <div>
                                                <x-label for=""
                                                    class=" uppercase tracking-widest text-xs text-green-500 dark:text-green-500 ">
                                                    {{ $propuestaInfo->created_at->format('d-m-y') }}
                                                </x-label>
                                                <div class="">
                                                    <x-label
                                                        class="text-lg font-semibold tracking-widest leading-6 dark:text-gray-200  text-gray-900 flex justify-center uppercase  ">
                                                        {{ $propuestaInfo->nombre_propuesta }}
                                                    </x-label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5 grid grid-cols-3 sm:grid-cols-3 text-center gap-x-10  ">


                                            <div class="">
                                                <x-label for="nombreAgrupacion"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Agrupación</x-label>
                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->nombre_agrupacion }}
                                                    </p>
                                                </div>
                                            </div>


                                            <div>
                                                <x-label for="categoria"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Categoria
                                                </x-label>

                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->categoria->nombre }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div>
                                                <x-label for="subcategoria"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Subcategoria</x-label>
                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->subcategoria->nombre }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5 grid grid-cols-1 sm:grid-cols-1">
                                            <div class="">
                                                <x-label for="descripcion"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Descripcion</x-label>
                                                <div
                                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest">
                                                    <x-label for="">
                                                        {{ $propuestaInfo->descripcion }}
                                                    </x-label>
                                                </div>

                                            </div>

                                            <div class="mt-4 pb-5">
                                                <div
                                                    class="mt-2 flex justify-center sm:rounded-lg rounded-md dark:bg-gray-900  border border-dashed border-indigo-900/25 dark:border-indigo-100/25 px-6 py-10">
                                                    <div class="text-center">

                                                        <img class="h-128 w-128 sm:rounded-lg rounded-md  border-2 border-indigo-100 "
                                                            src="{{ asset('storage/' . $propuestaInfo->foto_o_video) }}"
                                                            alt="Foto de la propuesta">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($propuestaInfo->observaciones != null)
                                            <div class="mt-2">
                                                <x-label
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Observaciones</x-label>
                                                <x-label
                                                    class="text-xs font-semibold leading-6 dark:text-green-500  text-green-500 tracking-widest">
                                                    {{ $propuestaInfo->observaciones }}</x-label>
                                            </div>
                                        @endif

                                        <div class="mt-1  border-b dark:border-green-500 border-green-500 pb-5"></div>

                                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5 px-4 sm:px-6 py-2">
                                            <div
                                                class="bg-white dark:bg-gray-900 overflow-hidden  sm:rounded-lg rounded-md  pb-2">
                                                <div class="flex justify-center mt-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="w-5 h-5 icon-red dark:icon-red">
                                                        <path
                                                            d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z" />
                                                    </svg>
                                                    <x-label for="" class="mr-5 ml-1">
                                                        {{ $propuestaInfo->likes }}
                                                    </x-label>

                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="w-5 h-5  icon-blue dark:icon-blue">
                                                        <path fill-rule="evenodd"
                                                            d="M3.43 2.524A41.29 41.29 0 0110 2c2.236 0 4.43.18 6.57.524 1.437.231 2.43 1.49 2.43 2.902v5.148c0 1.413-.993 2.67-2.43 2.902a41.102 41.102 0 01-3.55.414c-.28.02-.521.18-.643.413l-1.712 3.293a.75.75 0 01-1.33 0l-1.713-3.293a.783.783 0 00-.642-.413 41.108 41.108 0 01-3.55-.414C1.993 13.245 1 11.986 1 10.574V5.426c0-1.413.993-2.67 2.43-2.902z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <x-label for="" class="mr-5 ml-1  text-gray-400">
                                                        {{ $propuestaInfo->comments }}
                                                    </x-label>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                @endif

                                @if ($propuestaInfo->estado === 'Revision')
                                    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-16 px-4 sm:px-6  ">
                                        {{-- titulo formulario --}}
                                        <div class="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 sm:px-6 flex-row  ">

                                            <div class=" pb-2 flex justify-end ">
                                                <x-label class="font-semibold yellow-text tracking-widest">
                                                    {{ $propuestaInfo->estado }}
                                                </x-label>

                                            </div>
                                        </div>

                                        <div class="mt-1  border-t dark:border-yellow-500 border-yellow-500"></div>


                                        {{-- inicio del grid --}}
                                        <div class="mt-3 grid grid-cols-1 sm:grid-cols-1 gap-x-10 pb-5">

                                            <div>
                                                <x-label for=""
                                                    class=" uppercase tracking-widest text-xs text-green-500 dark:text-green-500 ">
                                                    {{ $propuestaInfo->created_at->format('d-m-y') }}
                                                </x-label>
                                                <div class="">
                                                    <x-label
                                                        class="text-lg font-semibold tracking-widest leading-6 dark:text-gray-200  text-gray-900 flex justify-center uppercase  ">
                                                        {{ $propuestaInfo->nombre_propuesta }}
                                                    </x-label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5 grid grid-cols-3 sm:grid-cols-3 text-center gap-x-10  ">


                                            <div class="">
                                                <x-label for="nombreAgrupacion"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Agrupación</x-label>
                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->nombre_agrupacion }}
                                                    </p>
                                                </div>
                                            </div>


                                            <div>
                                                <x-label for="categoria"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Categoria
                                                </x-label>

                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->categoria->nombre }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div>
                                                <x-label for="subcategoria"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Subcategoria</x-label>
                                                <div class="mt-1">
                                                    <p
                                                        class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest uppercase">
                                                        {{ $propuestaInfo->subcategoria->nombre }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5 grid grid-cols-1 sm:grid-cols-1">
                                            <div class="">
                                                <x-label for="descripcion"
                                                    class="block text-sm font-medium leading-6 text-gray-200 dark:text-gray-700 tracking-widest">
                                                    Descripcion</x-label>
                                                <div
                                                    class="text-xs font-semibold leading-6 dark:text-gray-100  text-gray-900 tracking-widest">
                                                    <x-label for="">
                                                        {{ $propuestaInfo->descripcion }}
                                                    </x-label>
                                                </div>

                                            </div>

                                            <div class="mt-4">
                                                <div
                                                    class="mt-2 flex justify-center sm:rounded-lg rounded-md dark:bg-gray-900  border border-dashed border-indigo-900/25 dark:border-indigo-100/25 px-6 py-10">
                                                    <div class="text-center">

                                                        <img class="h-128 w-128 sm:rounded-lg rounded-md  border-2 border-indigo-100 "
                                                            src="{{ asset('storage/' . $propuestaInfo->foto_o_video) }}"
                                                            alt="Foto de la propuesta">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mt-1  border-b dark:border-yellow-500 border-yellow-500 pb-5">
                                        </div>
                                        <div class="mt-2"></div>



                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


    <style>
        /* styles.css */
        .modal-content {
            max-height: 80vh;
            /* Altura máxima del 80% del viewport height */
            overflow-y: auto;
            /* Habilita el scroll vertical si el contenido excede la altura máxima */
        }

        /* Estilo para el texto verde */
        .green-text {
            color: green;
        }

        .dark .green-text {
            color: limegreen;
        }

        .blue-text {
            color: blue;
        }

        .dark .blue-text {
            color: skyblue;
        }

        .yellow-text {
            color: yellow;
        }

        .dark .yellow-text {
            color: yellow;
        }


        .red-text {
            color: red
        }

        .dark .red-text {
            color: red;
        }
    </style>


</div>
