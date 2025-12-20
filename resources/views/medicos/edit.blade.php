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
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">
                        @error('nome')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">CRM*</label>
                        <input type="text" name="crm" value="{{ old('crm', $medico->crm) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">
                        @error('crm')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Telefone*</label>
                        <input type="text" name="telefone"
                            value="{{ old('telefone', $medico->telefone) }}" maxlength="11"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">
                        @error('telefone')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Email*</label>
                        <input type="email" name="email"
                            value="{{ old('email', $medico->email) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">
                        @error('email')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-gray-700 font-medium mb-1">Especialidade*</label>
                        <select name="especialidade_id"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">
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

                {{-- ENDEREÇO --}}
                <h3 class="text-lg font-semibold text-gray-900 mt-10 mb-4">Endereço*</h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Rua*</label>
                        <input type="text" name="rua" id="rua"
                            value="{{ old('rua', $medico->endereco->rua ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('rua')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Número*</label>
                        <input type="text" name="numero" id="numero"
                            value="{{ old('numero', $medico->endereco->numero ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('numero')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Bairro*</label>
                        <input type="text" name="bairro" id="bairro"
                            value="{{ old('bairro', $medico->endereco->bairro ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('bairro')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Cidade*</label>
                        <input type="text" name="cidade" id="cidade"
                            value="{{ old('cidade', $medico->endereco->cidade ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('cidade')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Estado*</label>
                        <input type="text" name="estado" id="uf" maxlength="2"
                            value="{{ old('estado', $medico->endereco->estado ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('estado')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">CEP</label>

                        <div class="flex gap-2">
                            <input type="text" name="cep" id="cep"
                                value="{{ old('cep', $medico->endereco->cep ?? '') }}"
                                class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">

                            <button type="button" id="btnBuscarCep"
                                class="relative flex items-center gap-1 px-3 py-1.5
           bg-blue-600 text-white text-sm rounded-lg font-medium
           shadow hover:shadow-md active:scale-95
           transition duration-150">

                                <svg id="iconSearch" xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                                </svg>
                                <span id="btnText">Buscar</span>
                                <span id="btnLoader"
                                    class="hidden w-4 h-4 border-2 border-white border-t-transparent
               rounded-full animate-spin"></span>
                            </button>

                        </div>

                        <p id="cepErro" class="text-red-600 text-sm mt-1 hidden"></p>
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

<script src="{{ asset('js/buscarCep.js') }}"></script>