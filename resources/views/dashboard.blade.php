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
                    <p class="text-sm text-gray-500 mt-1">0% vs mês anterior</p>
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
                    <p class="text-3xl font-semibold text-gray-900 mt-1">0</p>
                    <p class="text-sm text-gray-500 mt-1">0% vs mês anterior</p>
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
                    <p class="text-3xl font-semibold text-gray-900 mt-1">0</p>
                    <p class="text-sm text-gray-500 mt-1">0% vs mês anterior</p>
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
                    <p class="text-3xl font-semibold text-gray-900 mt-1">0%</p>
                    <p class="text-sm text-gray-500 mt-1">0% vs mês anterior</p>
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
                    @foreach ([
                    ['09:00','Maria Silva','Dr. João Santos','Consulta'],
                    ['09:30','Pedro Costa','Dra. Ana Paula','Retorno'],
                    ['10:00','Carla Mendes','Dr. João Santos','Exame'],
                    ['10:30','José Oliveira','Dr. Carlos Lima','Consulta'],
                    ['11:00','Fernanda Souza','Dra. Ana Paula','Consulta'],
                    ] as $consulta)
                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm">
                            {{ $consulta[0] }}
                        </span>

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $consulta[1] }}</p>
                            <p class="text-xs text-gray-500">{{ $consulta[2] }}</p>
                        </div>

                        <span class="text-xs text-gray-500">{{ $consulta[3] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- ATENDIMENTOS RECENTES --}}
            <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Atendimentos Recentes</h3>

                <div class="space-y-4">
                    @foreach ([
                    ['Roberto Almeida','23 Nov 2025','Concluído'],
                    ['Juliana Pires','23 Nov 2025','Em atendimento'],
                    ['Marcos Ferreira','22 Nov 2025','Concluído'],
                    ['Patrícia Lima','22 Nov 2025','Concluído'],
                    ] as $paciente)

                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                <span class="text-sm text-gray-600">{{ substr($paciente[0],0,1) }}</span>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $paciente[0] }}</p>
                                <p class="text-xs text-gray-500">{{ $paciente[1] }}</p>
                            </div>
                        </div>

                        <span class="text-xs px-2 py-1 rounded
                            {{ $paciente[2] === 'Concluído' 
                                ? 'bg-green-100 text-green-700' 
                                : 'bg-orange-100 text-orange-700' }}">
                            {{ $paciente[2] }}
                        </span>
                    </div>

                    @endforeach
                </div>
            </div>

        </div>

    </div>
</x-app-layout>