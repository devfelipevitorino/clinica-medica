<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-700">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
            </svg>
            <span>Visão geral</span>
        </h2>
    </x-slot>


    <div class="py-10 px-6 space-y-10">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="p-6 bg-white shadow-md rounded-xl flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total de Pacientes</p>
                    <p class="text-3xl font-semibold text-gray-900 mt-1">{{ count($pacientes) }}</p>
                </div>

                <div class="bg-blue-500 w-14 h-14 rounded-xl flex items-center justify-center">
                    <a href="/pacientes">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 20a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3
                               m9-11a3 3 0 1 1-6 0a3 3 0 0 1 6 0zm6 11a6 6 0 0 0-5-6m-8 0a6 6 0 0 0-5 6" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="p-6 bg-white shadow-md rounded-xl flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-600">Agendamentos do dia</p>
                    <p class="text-3xl font-semibold text-gray-900 mt-1">{{ $consultas->where('data', now()->toDateString())->count() }}</p>
                </div>

                <div class="bg-green-500 w-14 h-14 rounded-xl flex items-center justify-center">
                    <a href="/consultas/hoje">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 8.25h18M4.5 7.5h15
                               c.6 0 1.125.45 1.125 1.125V19.5A1.5 1.5 0 0 1 19.5 21h-15A1.5 1.5 0 0 1 3 19.5V8.625C3 7.95 3.45 7.5 4.5 7.5z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="p-6 bg-white shadow-md rounded-xl flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-600">Em Atendimento</p>
                    <p class="text-3xl font-semibold text-gray-900 mt-1">{{ $consultas->where('status', 'em_atendimento')->count() }}</p>
                </div>

                <div class="bg-orange-500 w-14 h-14 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6l3 3m6-3a9 9 0 1 1-18 0a9 9 0 0 1 18 0z" />
                    </svg>
                </div>
            </div>

            <div class="p-6 bg-white shadow-md rounded-xl flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-600">Taxa de Comparecimento</p>
                    <p class="text-3xl font-semibold text-gray-900 mt-1">Em breve</p>
                    <p class="text-sm text-gray-500 mt-1">-</p>
                </div>

                <div class="bg-purple-500 w-14 h-14 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 17l6-6l4 4l8-8
                               m0 0h-5m5 0v5" />
                    </svg>
                </div>
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

            <!-- Em Atendimento -->
            <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Em Atendimento</h3>

                <div class="space-y-4">
                    @forelse ($em_atendimento as $consulta)
                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">

                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm">
                            {{ substr($consulta->hora, 0, 5) }}
                        </span>

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                {{ $consulta->paciente->nome }}
                            </p>
                            <p class="text-xs text-gray-500">
                                <strong>Dr(a). {{ $consulta->medico->nome }}</strong>
                            </p>
                            <p class="text-xs text-gray-500">
                                Data: {{ date('d/m/Y', strtotime($consulta->data)) }}
                            </p>
                        </div>

                        <span class="badge rounded-pill bg-primary px-3 py-2">
                            Em atendimento
                        </span>

                    </div>
                    @empty
                    <p class="text-gray-500 text-sm text-center py-4">
                        Nenhum atendimento em andamento.
                    </p>
                    @endforelse
                </div>
            </div>

            <!-- Próximas Consultas -->
            <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Próximas Consultas</h3>

                <div class="space-y-4">
                    @forelse ($proximas_consultas as $consulta)
                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">

                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm">
                            {{ substr($consulta->hora, 0, 5) }}
                        </span>

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                {{ $consulta->paciente->nome }}
                            </p>
                            <p class="text-xs text-gray-500">
                                <strong>Dr(a).{{ $consulta->medico->nome }}</strong>
                            </p>
                            <p class="text-xs text-gray-500">
                                Data: {{ date('d/m/Y', strtotime($consulta->data)) }}
                            </p>
                        </div>

                        <span class="text-xs text-gray-500">
                            @if ($consulta->status === 'espera')
                            <span class="badge rounded-pill bg-warning text-dark px-3 py-2">Em espera</span>
                            @elseif ($consulta->status === 'em_atendimento')
                            <span class="badge rounded-pill bg-primary px-3 py-2">Em atendimento</span>
                            @elseif ($consulta->status === 'finalizado')
                            <span class="badge rounded-pill bg-success px-3 py-2">Finalizado</span>
                            @endif
                        </span>

                    </div>
                    @empty
                    <p class="text-gray-500 text-sm text-center py-4">
                        Nenhuma consulta para o restante do dia.
                    </p>
                    @endforelse
                </div>
            </div>

            <!-- Atendimentos Recentes -->
            <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Atendimentos Recentes</h3>

                <div class="space-y-4">
                    @forelse ($consultas->where('status', 'finalizado') as $consulta)
                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">

                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm">
                            {{ substr($consulta->hora, 0, 5) }}
                        </span>

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                {{ $consulta->paciente->nome }}
                            </p>
                            <p class="text-xs text-gray-500">
                                <strong>Dr(a). {{ $consulta->medico->nome }}</strong>
                            </p>
                            <p class="text-xs text-gray-500">
                                Data: {{ date('d/m/Y', strtotime($consulta->data)) }}
                            </p>
                        </div>

                        <span class="text-xs text-gray-500">
                            <span class="badge rounded-pill bg-success px-3 py-2">Finalizado</span>
                        </span>

                    </div>
                    @empty
                    <p class="text-gray-500 text-sm text-center py-4">
                        Nenhuma consulta anterior.
                    </p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</x-app-layout>