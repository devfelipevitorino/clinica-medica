<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                    Nova Consulta
                </h2>
                <p class="text-gray-600 text-sm mt-1">
                    Cadastre uma nova consulta!
                </p>
            </div>

            <a href="/consultas"
                class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="p-6">

        <div class="bg-white shadow-sm border rounded-2xl p-8 max-w-5xl mx-auto">

            <h3 class="text-xl font-semibold text-gray-900 mb-6">Cadastrar Consulta</h3>

            <form action="/consultas" method="POST">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    {{-- Paciente --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Paciente*</label>
                        <select name="paciente_id"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                            <option value="">Selecione um paciente</option>
                            @foreach ($pacientes as $paciente)
                            <option value="{{ $paciente->id }}"
                                {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                {{ $paciente->nome }}
                            </option>
                            @endforeach
                        </select>
                        @error('paciente_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Médico --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Médico*</label>
                        <select name="medico_id"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                            <option value="">Selecione um médico</option>
                            @foreach ($medicos as $medico)
                            <option value="{{ $medico->id }}"
                                {{ old('medico_id') == $medico->id ? 'selected' : '' }}>
                                {{ $medico->nome }} — {{ $medico->especialidade->nome }}
                            </option>
                            @endforeach
                        </select>
                        @error('medico_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Data --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Data da Consulta*</label>
                        <input type="date" name="data" value="{{ old('data') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('data')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Hora --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Hora*</label>
                        <input type="time" name="hora" value="{{ old('hora') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('hora')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Status*</label>
                    <select name="status"
                        class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        <option value="espera">Em espera</option>
                        <option value="em_atendimento">Em atendimento</option>
                        <option value="finalizado">Finalizado</option>
                    </select>
                    @error('paciente_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Observações --}}
                <div class="mt-6">
                    <label class="block text-gray-700 font-medium mb-1">Observações (opcional)</label>
                    <textarea name="observacoes" rows="4"
                        class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">{{ old('observacoes') }}</textarea>
                </div>

                <div class="flex justify-end mt-8">
                    <button
                        class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition font-medium">
                        Criar Consulta
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app-layout>