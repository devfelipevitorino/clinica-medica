<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                    Consultas
                </h2>
                <p class="text-gray-600 text-sm mt-1">
                    Altere informações da consulta!
                </p>
            </div>

            <a href="/consultas"
                class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="bg-white shadow-md rounded-xl p-6">

            <form action="{{ route('consultas.update', $consulta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Paciente*</label>
                        <select name="paciente_id"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500"
                            required>
                            @foreach ($pacientes as $paciente)
                            <option value="{{ $paciente->id }}"
                                {{ $consulta->paciente_id == $paciente->id ? 'selected' : '' }}>
                                {{ $paciente->nome }}
                            </option>
                            @endforeach
                        </select>
                        @error('paciente_id')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Médico*</label>
                        <select name="medico_id"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500"
                            required>
                            @foreach ($medicos as $medico)
                            <option value="{{ $medico->id }}"
                                {{ $consulta->medico_id == $medico->id ? 'selected' : '' }}>
                                {{ $medico->nome }} — {{ $medico->especialidade->nome }}
                            </option>
                            @endforeach
                        </select>
                        @error('medico_id')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Data*</label>
                        <input type="date" name="data"
                            value="{{ old('data', $consulta->data) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500"
                            required>
                        @error('data')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Hora*</label>
                        <input type="time" name="hora"
                            value="{{ old('hora', $consulta->hora) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500"
                            required>
                        @error('hora')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Status*</label>
                    <select name="status"
                        class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500"
                        required>
                        <option value="espera" {{ $consulta->status == 'espera' ? 'selected' : '' }}>
                            Em espera
                        </option>
                        <option value="em_atendimento" {{ $consulta->status == 'em_atendimento' ? 'selected' : '' }}>
                            Em atendimento
                        </option>
                        <option value="finalizado" {{ $consulta->status == 'finalizado' ? 'selected' : '' }}>
                            Finalizado
                        </option>
                    </select>
                    @error('consultas_id')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="block text-gray-700 font-medium mb-1">Observações</label>
                    <textarea name="observacoes" rows="3"
                        class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">{{ old('observacoes', $consulta->observacoes) }}</textarea>
                </div>

                <div class="flex justify-end mt-8">
                    <button
                        class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition font-medium">
                        Atualizar Consulta
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>