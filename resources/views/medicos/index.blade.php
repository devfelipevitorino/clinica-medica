<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Médicos
        </h2>
        <p class="text-gray-600 mt-1">
            Gerencie os profissionais da clínica
        </p>
    </x-slot>

    <div class="p-6">

        @if (count($medicos) > 0)
        <div class="flex justify-end mb-6">
            <a href="/medicos/novo"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                + Novo Médico
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @foreach ($medicos as $medico)

            <div x-data="{ openModal: false }" class="bg-white border shadow-sm rounded-2xl p-6 flex flex-col justify-between">

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-semibold text-lg">
                        {{ strtoupper(substr($medico->nome,0,1)) }}
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ $medico->nome }}
                        </h3>
                        <p class="text-gray-600 text-sm">
                            Especialidade: {{ $medico->especialidade->nome }}
                        </p>
                    </div>

                    <div class="ml-auto">
                        <a href="/medicos/{{ $medico->id }}/editar"
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

                <div class="mt-4 space-y-1 text-sm text-gray-700">

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <span>{{ $medico->email ?? 'Sem email' }}</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                        <span>
                            {{ preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $medico->telefone) }}
                        </span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span>
                            {{ $medico->endereco->rua ?? '' }}
                            {{ $medico->endereco->numero ?? '' }} -
                            {{ $medico->endereco->cidade ?? '' }}
                        </span>
                    </div>

                </div>

                <div class="border-t mt-4 pt-3 text-xs text-gray-500">
                    Última alteração:
                    {{ $medico->updated_at ? $medico->updated_at->format('d M Y') : '—' }}
                </div>

                <!-- Modal excluir -->
                <div
                    x-show="openModal"
                    style="display: none;"
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

                    <div class="bg-white p-6 rounded-2xl shadow-xl w-96">

                        <h3 class="text-lg font-bold text-gray-900">Confirmar exclusão</h3>

                        <p class="text-gray-700 mt-2">
                            Tem certeza que deseja excluir o médico
                            <strong>{{ $medico->nome }}</strong>?
                        </p>

                        <div class="flex justify-end gap-3 mt-6">

                            <button @click="openModal = false"
                                class="px-4 py-2 rounded-lg border hover:bg-gray-100 transition">
                                Cancelar
                            </button>

                            <form action="/medicos/{{ $medico->id }}" method="POST">
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
            @else

            <div class="col-span-1 md:col-span-2">
                <div class="bg-white border rounded-2xl shadow p-10 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.362 5.214A5.25 5.25 0 0 0 6.75 9v.75M3 3l18 18M12 19.5a7.5 7.5 0 0 1-7.47-6.75c-.014-.189.135-.345.327-.345h14.286c.192 0 .34.156.327.345A7.5 7.5 0 0 1 12 19.5Z" />
                    </svg>

                    <h3 class="text-lg font-semibold text-gray-700 mt-4">
                        Nenhum médico cadastrado
                    </h3>
                    <p class="text-gray-500 mt-1">
                        Comece adicionando um novo médico.
                    </p>

                    <a href="/medicos/novo"
                        class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                        + Novo Médico
                    </a>
                </div>
            </div>

            @endif

        </div>
    </div>
</x-app-layout>