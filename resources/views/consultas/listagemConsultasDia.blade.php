<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">

            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-700">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75" />
                </svg>

                <div>
                    <h2 class="font-semibold text-2xl text-gray-900">
                        Consultas de Hoje
                    </h2>
                    <p class="text-gray-600">
                        Listagem das consultas agendadas para hoje
                    </p>
                </div>
            </div>

            <a href="/consultas"
                class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Todas as consultas
            </a>

        </div>
    </x-slot>

    <div class="p-6">

        @if ($consultas->count() > 0)

        <div class="bg-white border shadow-sm rounded-2xl overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Paciente</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Médico</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Data</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Hora</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Atualização</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @foreach ($consultas as $consulta)
                    <tr class="hover:bg-gray-50 transition">

                        {{-- Paciente --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 font-semibold">
                                    {{ strtoupper(substr($consulta->paciente->nome, 0, 1)) }}
                                </div>
                                <span class="font-medium text-gray-900">
                                    {{ $consulta->paciente->nome }}
                                </span>
                            </div>
                        </td>

                        {{-- Médico --}}
                        <td class="px-6 py-4 text-gray-700">
                            {{ $consulta->medico->nome }}
                        </td>

                        {{-- Data (SVG original) --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008Z" />
                                </svg>
                                <span>{{ \Carbon\Carbon::parse($consulta->data)->format('d/m/Y') }}</span>
                            </div>
                        </td>

                        {{-- Hora (SVG original) --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span>{{ $consulta->hora }}</span>
                            </div>
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4">
                            @if ($consulta->status === 'espera')
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs">
                                Em espera
                            </span>
                            @elseif ($consulta->status === 'em_atendimento')
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs">
                                Em atendimento
                            </span>
                            @else
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">
                                Finalizado
                            </span>
                            @endif
                        </td>

                        {{-- Atualização --}}
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ optional($consulta->updated_at)->format('d M Y') ?? '—' }}
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        @else

        <div class="bg-white border rounded-2xl shadow p-10 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.362 5.214A5.25 5.25 0 0 0 6.75 9v.75M3 3l18 18M12 19.5a7.5 7.5 0 0 1-7.47-6.75c-.014-.189.135-.345.327-.345h14.286c.192 0 .34.156.327.345A7.5 7.5 0 0 1 12 19.5Z" />
            </svg>

            <h3 class="text-lg font-semibold text-gray-700 mt-4">
                Nenhuma consulta para hoje
            </h3>
            <p class="text-gray-500 mt-1">
                Não há consultas agendadas para a data atual.
            </p>
        </div>

        @endif

    </div>

</x-app-layout>