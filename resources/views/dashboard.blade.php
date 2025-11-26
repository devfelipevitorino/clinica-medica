<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Visão geral
        </h2>
    </x-slot>

    <div class="py-10 px-6 space-y-10">

        {{-- GRID DE ESTATÍSTICAS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            {{-- CARD: Pacientes --}}
            <div class="p-6 bg-white shadow-md rounded-xl flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total de Pacientes</p>
                    <p class="text-3xl font-semibold text-gray-900 mt-1">{{ count($pacientes) }}</p>
                </div>

                <div class="bg-blue-500 w-14 h-14 rounded-xl flex items-center justify-center">
                    {{-- USERS ICON --}}
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 20a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3
                               m9-11a3 3 0 1 1-6 0a3 3 0 0 1 6 0zm6 11a6 6 0 0 0-5-6m-8 0a6 6 0 0 0-5 6" />
                    </svg>
                </div>
            </div>

            {{-- CARD: Consultas Hoje --}}
            <div class="p-6 bg-white shadow-md rounded-xl flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-600">Consultas Hoje</p>
                    <p class="text-3xl font-semibold text-gray-900 mt-1">{{ $consultas->where('data', now()->toDateString())->count() }}</p>
                </div>

                <div class="bg-green-500 w-14 h-14 rounded-xl flex items-center justify-center">
                    {{-- CALENDAR ICON --}}
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 8.25h18M4.5 7.5h15
                               c.6 0 1.125.45 1.125 1.125V19.5A1.5 1.5 0 0 1 19.5 21h-15A1.5 1.5 0 0 1 3 19.5V8.625C3 7.95 3.45 7.5 4.5 7.5z" />
                    </svg>
                </div>
            </div>

            {{-- CARD: Em Atendimento --}}
            <div class="p-6 bg-white shadow-md rounded-xl flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-600">Em Atendimento</p>
                    <p class="text-3xl font-semibold text-gray-900 mt-1">Em breve</p>
                </div>

                <div class="bg-orange-500 w-14 h-14 rounded-xl flex items-center justify-center">
                    {{-- CLOCK ICON --}}
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6l3 3m6-3a9 9 0 1 1-18 0a9 9 0 0 1 18 0z" />
                    </svg>
                </div>
            </div>

            {{-- CARD: Comparecimento --}}
            <div class="p-6 bg-white shadow-md rounded-xl flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-600">Taxa de Comparecimento</p>
                    <p class="text-3xl font-semibold text-gray-900 mt-1">Em breve</p>
                    <p class="text-sm text-gray-500 mt-1">-</p>
                </div>

                <div class="bg-purple-500 w-14 h-14 rounded-xl flex items-center justify-center">
                    {{-- TRENDING UP ICON --}}
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 17l6-6l4 4l8-8
                               m0 0h-5m5 0v5" />
                    </svg>
                </div>
            </div>

        </div>

        {{-- GRID PRINCIPAL --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- PRÓXIMAS CONSULTAS --}}
            <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Próximas Consultas</h3>

                <div class="space-y-4">

                    @forelse ($proximas_consultas as $consulta)
                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">

                        {{-- HORA --}}
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
                            {{ $consulta->observacoes ?? 'Consulta' }}
                        </span>

                    </div>
                    @empty
                    <p class="text-gray-500 text-sm text-center py-4">
                        Nenhuma consulta para o restante do dia.
                    </p>
                    @endforelse

                </div>

            </div>

            <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Atendimentos Recentes</h3>

                <div class="space-y-4">
                    @forelse ($consultas_anteriores as $consulta)
                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">

                        {{-- HORA --}}
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
                            {{ $consulta->observacoes ?? 'Consulta' }}
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