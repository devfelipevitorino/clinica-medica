<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <svg xmlns="http: //www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
            </svg>

            <div>
                <h2 class="font-semibold text-2xl text-gray-900">
                    Especialidades
                </h2>
                <p class="text-gray-600">
                    Gerencie as especialidades médicas da clínica
                </p>
            </div>
        </div>
    </x-slot>

    <div class="p-6">
        @if ($especialidades->count() > 0)
        <div class="flex justify-end mb-6">
            <a href="{{ route('especialidades.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                + Nova Especialidade
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @foreach ($especialidades as $especialidade)
            <div x-data="{ openModal: false }"
                class="bg-white border shadow-sm rounded-2xl p-6">

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-purple-100 text-purple-700 flex items-center justify-center font-bold text-lg">
                        {{ strtoupper(substr($especialidade->nome,0,1)) }}
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ $especialidade->nome }}
                        </h3>
                        <p class="text-gray-600 text-sm">
                            {{ $especialidade->descricao ?? 'Sem descrição' }}
                        </p>
                    </div>

                    <div class="ml-auto flex gap-3">
                        <a href="{{ route('especialidades.edit', $especialidade->id) }}"
                            class="border rounded-lg px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-100 transition">
                            Editar
                        </a>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600 cursor-pointer hover:text-red-800"
                        @click="openModal = true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </div>

                <div
                    x-show="openModal"
                    style="display: none;"
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

                    <div class="bg-white p-6 rounded-2xl shadow-xl w-96">

                        <h3 class="text-lg font-bold text-gray-900">Confirmar exclusão</h3>

                        <p class="text-gray-700 mt-2">
                            Tem certeza que deseja excluir?
                        </p>

                        <div class="flex justify-end gap-3 mt-6">
                            <button @click="openModal = false"
                                class="px-4 py-2 rounded-lg border hover:bg-gray-100 transition">
                                Cancelar
                            </button>

                            <form action="/especialidades/{{ $especialidade->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
        @else
        <div class="col-span-1 md:col-span-2">
            <div class="bg-white border rounded-2xl shadow p-10 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.362 5.214A5.25 5.25 0 0 0 6.75 9v.75M3 3l18 18M12 19.5a7.5 7.5 0 0 1-7.47-6.75c-.014-.189.135-.345.327-.345h14.286c.192 0 .34.156.327.345A7.5 7.5 0 0 1 12 19.5Z" />
                </svg>

                <h3 class="text-lg font-semibold text-gray-700 mt-4">
                    Nenhuma especialidade cadastrada
                </h3>
                <p class="text-gray-500 mt-1">
                    Comece adicionando uma nova especialidade.
                </p>

                <a href="/especialidades/novo"
                    class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                    + Nova Especialidade
                </a>
            </div>
        </div>
        @endif

    </div>
</x-app-layout>