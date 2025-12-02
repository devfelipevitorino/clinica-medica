<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                    Médicos
                </h2>
                <p class="text-gray-600 text-sm mt-1">
                    Altere informações do médico!
                </p>
            </div>

            <a href="/medicos"
                class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="bg-white shadow-md rounded-xl p-6">

            <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Nome*</label>
                        <input type="text" name="nome" value="{{ old('nome', $medico->nome) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500" required>
                        @error('nome')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1" pattern="[0-9]*" inputmode="numeric">CRM*</label>
                        <input type="text" name="crm" value="{{ old('crm', $medico->crm) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500" required>
                        @error('crm')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1" pattern="[0-9]*" inputmode="numeric">Telefone*</label>
                        <input type="text" name="telefone"
                            value="{{ old('telefone', $medico->telefone) }}" maxlength="11"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500" required>
                        @error('telefone')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Email*</label>
                        <input type="email" name="email"
                            value="{{ old('email', $medico->email) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500" required>
                        @error('email')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-gray-700 font-medium mb-1">Especialidade*</label>
                        <select name="especialidade_id"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500" required>
                            @foreach($especialidades as $esp)
                            <option value="{{ $esp->id }}"
                                {{ $medico->especialidade_id == $esp->id ? 'selected' : '' }}>
                                {{ $esp->nome }}
                            </option>
                            @endforeach
                        </select>
                        @error('especialidade_id')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <h3 class="text-lg font-semibold text-gray-900 mt-10 mb-4">Endereço*</h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Rua*</label>
                        <input type="text" name="rua"
                            value="{{ old('rua', $medico->endereco->rua ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500" required>
                        @error('rua')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Número*</label>
                        <input type="text" name="numero"
                            value="{{ old('numero', $medico->endereco->numero ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500" required>
                        @error('numero')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Bairro*</label>
                        <input type="text" name="bairro"
                            value="{{ old('bairro', $medico->endereco->bairro ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500" required>
                        @error('bairro')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Cidade*</label>
                        <input type="text" name="cidade"
                            value="{{ old('cidade', $medico->endereco->cidade ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500" required>
                        @error('cidade')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Estado*</label>
                        <input type="text" name="estado" maxlength="2"
                            value="{{ old('estado', $medico->endereco->estado ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500" required>
                        @error('estado')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">CEP</label>
                        <input type="text" name="cep" maxlength="9" pattern="[0-9]*" inputmode="numeric"
                            value="{{ old('cep', $medico->endereco->cep ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">
                        @error('cep')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="flex justify-end mt-8">
                    <button class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition font-medium">
                        Atualizar Médico
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>