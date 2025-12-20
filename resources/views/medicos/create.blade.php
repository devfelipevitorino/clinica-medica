<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                    Médicos
                </h2>
                <p class="text-gray-600 text-sm mt-1">
                    Cadastre um novo médico!
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

            <form action="/medicos" method="POST">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Nome*</label>
                        <input type="text" name="nome" value="{{ old('nome') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">
                        @error('nome')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">CRM*</label>
                        <input type="text" name="crm" value="{{ old('crm') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">
                        @error('crm')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Telefone*</label>
                        <input type="text" name="telefone" value="{{ old('telefone') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">
                        @error('telefone')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Email*</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">
                        @error('email')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-gray-700 font-medium mb-1">Especialidade*</label>
                        <div class="flex items-center gap-2">
                            <select name="especialidade_id"
                                class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-blue-500">
                                <option value="">Selecione</option>
                                @foreach($especialidades as $esp)
                                <option value="{{ $esp->id }}">{{ $esp->nome }}</option>
                                @endforeach
                            </select>

                            <button type="button"
                                onclick="document.getElementById('modalEspecialidade').classList.remove('hidden')"
                                class="bg-blue-600 text-white p-3 rounded-xl hover:bg-blue-700 transition">
                                +
                            </button>
                        </div>
                        @error('especialidade_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- ENDEREÇO --}}
                <h3 class="text-lg font-semibold text-gray-900 mt-10 mb-4">Endereço*</h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Rua*</label>
                        <input type="text" name="rua" id="rua"
                            value="{{ old('rua', $paciente->endereco->rua ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('rua')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Número*</label>
                        <input type="text" name="numero" id="numero"
                            value="{{ old('numero', $paciente->endereco->numero ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('numero')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Bairro*</label>
                        <input type="text" name="bairro" id="bairro"
                            value="{{ old('bairro', $paciente->endereco->bairro ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('bairro')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Cidade*</label>
                        <input type="text" name="cidade" id="cidade"
                            value="{{ old('cidade', $paciente->endereco->cidade ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('cidade')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Estado*</label>
                        <input type="text" name="estado" id="uf" maxlength="2"
                            value="{{ old('estado', $paciente->endereco->estado ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('estado')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">CEP</label>

                        <div class="flex gap-2">
                            <input type="text" name="cep" id="cep"
                                value="{{ old('cep', $paciente->endereco->cep ?? '') }}"
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
                        Salvar Médico
                    </button>
                </div>

            </form>

        </div>
    </div>

    <div id="modalEspecialidade" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-xl w-96">
            <h2 class="text-xl font-semibold mb-4">Nova Especialidade</h2>

            <form action="/especialidades" method="POST">
                @csrf

                <input type="hidden" name="from_modal" value="1">

                <label class="block mb-2 text-gray-700 font-medium">Nome*</label>
                <input type="text" name="nome"
                    class="w-full p-3 border rounded-xl bg-gray-50 mb-4">

                <label class="block mb-2 text-gray-700 font-medium">Descrição</label>
                <textarea name="descricao"
                    class="w-full p-3 border rounded-xl bg-gray-50 mb-4"
                    rows="3"></textarea>

                <div class="flex justify-between mt-4">
                    <button type="button"
                        onclick="document.getElementById('modalEspecialidade').classList.add('hidden')"
                        class="px-4 py-2 bg-gray-300 rounded-xl hover:bg-gray-400">
                        Cancelar
                    </button>

                    <button class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700">
                        Salvar
                    </button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>

<script src="{{ asset('js/buscarCep.js') }}"></script>