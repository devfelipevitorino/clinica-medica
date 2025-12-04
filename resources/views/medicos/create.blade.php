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

        <div class="bg-white shadow-sm border rounded-2xl p-8 max-w-5xl mx-auto">

            <h3 class="text-xl font-semibold text-gray-900 mb-6">Novo Médico</h3>

            <form action="/medicos" method="POST">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Nome*</label>
                        <input type="text" name="nome" value="{{ old('nome') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('nome') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">CRM*</label>
                        <input type="text" name="crm" value="{{ old('crm') }}" 
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('crm') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Email*</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Telefone*</label>
                        <input type="text" name="telefone" value="{{ old('telefone') }}" 
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('telefone') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Especialidade*</label>

                        <div class="flex items-center gap-2">
                            <select name="especialidade_id"
                                class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                                <option value="">Selecione</option>
                                @foreach($especialidades as $especialidade)
                                <option value="{{ $especialidade->id }}">
                                    {{ $especialidade->nome }}
                                </option>
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

                {{-- Endereço --}}
                <h3 class="text-lg font-semibold text-gray-900 mt-10 mb-4">Endereço*</h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Rua*</label>
                        <input type="text" name="rua" value="{{ old('rua') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('rua') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Número*</label>
                        <input type="text" name="numero" value="{{ old('numero') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('numero') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Bairro*</label>
                        <input type="text" name="bairro" value="{{ old('bairro') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('bairro') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Cidade*</label>
                        <input type="text" name="cidade" value="{{ old('cidade') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('cidade') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Estado*</label>
                        <input type="text" maxlength="2" name="estado" value="{{ old('estado') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('estado') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">CEP</label>
                        <input type="text" name="cep" value="{{ old('cep') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:ring-2 focus:ring-blue-500 transition">
                        @error('cep') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                </div>

                <div class="flex justify-end mt-8">
                    <button
                        class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition font-medium">
                        Salvar Médico
                    </button>
                </div>

            </form>

        </div>

    </div>

    <!-- Modal -->
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