<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <svg xmlns="http: //www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
            </svg>

            <div>
                <h2 class="font-semibold text-2xl text-gray-900">
                    Consultas
                </h2>
                <p class="text-gray-600">
                    Gerencie todas as consultas cadastradas
                </p>
            </div>
        </div>
    </x-slot>

    <div class="p-6">

        @if (count($consultas) > 0)
        <div class="flex justify-end mb-6">
            <a href="/consultas/nova"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition"">
                + Nova Consulta
            </a>
        </div>

        <div class=" grid grid-cols-1 md:grid-cols-2 gap-6">

                @foreach ($consultas as $consulta)

                <div
                    x-data="{ openModal: false }"
                    class="bg-white border shadow-sm rounded-2xl p-6 flex flex-col justify-between">

                    <div class="flex items-center justify-between">

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $consulta->paciente->nome }}
                            </h3>
                            <p class="text-gray-600 text-sm">
                                <strong>Médico:</strong> {{ $consulta->medico->nome }}
                            </p>
                        </div>

                        <div class="flex items-center gap-3">

                            <a href="/consultas/{{ $consulta->id }}/editar"
                                class="border rounded-lg px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-100 transition">
                                Editar
                            </a>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="w-5 h-5 text-red-600 cursor-pointer hover:text-red-800"
                                @click="openModal = true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>

                        </div>
                    </div>


                    <div class="mt-4 space-y-1 text-sm text-gray-700">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            <span>{{ date('d/m/Y', strtotime($consulta->data)) }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>{{ $consulta->hora }}</span>
                        </div>
                    </div>

                    <div class="border-t mt-4 pt-3 flex items-center justify-between text-xs">

                        <span class="text-gray-500">
                            Última atualização:
                            {{ $consulta->updated_at ? $consulta->updated_at->format('d M Y') : '—' }}
                        </span>

                        <div>
                            @if ($consulta->status === 'espera')
                            <span class="badge rounded-pill bg-warning text-dark px-3 py-2">Em espera</span>
                            @elseif ($consulta->status === 'em_atendimento')
                            <span class="badge rounded-pill bg-primary px-3 py-2">Em atendimento</span>
                            @elseif ($consulta->status === 'finalizado')
                            <span class="badge rounded-pill bg-success px-3 py-2">Finalizado</span>
                            @endif
                        </div>
                    </div>


                    <div
                        x-show="openModal"
                        style="display:none;"
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

                        <div class="bg-white p-6 rounded-2xl shadow-xl w-96">

                            <h3 class="text-lg font-bold text-gray-900">Confirmar exclusão</h3>

                            <p class="text-gray-700 mt-2">
                                Tem certeza que deseja excluir a consulta de
                                <strong>{{ $consulta->paciente->nome }}</strong> com
                                <strong>{{ $consulta->medico->nome }}</strong>?
                            </p>

                            <div class="flex justify-end gap-3 mt-6">

                                <button @click="openModal = false"
                                    class="px-4 py-2 rounded-lg border hover:bg-gray-100 transition">
                                    Cancelar
                                </button>

                                <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">
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
                            Nenhuma consulta cadastrada
                        </h3>
                        <p class="text-gray-500 mt-1">
                            Comece criando uma nova consulta.
                        </p>

                        <a href="/consultas/nova"
                            class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                            + Nova Consulta
                        </a>
                    </div>
                </div>

                @endif

        </div>
</x-app-layout>