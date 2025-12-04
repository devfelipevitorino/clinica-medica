<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                    Pacientes
                </h2>
                <p class="text-gray-600 text-sm mt-1">
                    Altere informações necessárias do paciente!
                </p>
            </div>

            <a href="/pacientes"
                class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="bg-white shadow-md rounded-xl p-6">

            <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- DADOS PRINCIPAIS --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Nome*</label>
                        <input type="text" name="nome"
                            value="{{ old('nome', $paciente->nome) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('nome')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">CPF*</label>
                        <input type="text" name="cpf"
                            value="{{ old('cpf', $paciente->cpf) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('cpf')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Email*</label>
                        <input type="email" name="email"
                            value="{{ old('email', $paciente->email) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Telefone*</label>
                        <input type="text" name="telefone"
                            value="{{ old('telefone', $paciente->telefone) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('telefone')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Data de Nascimento*</label>
                        <input type="date" name="data_nascimento"
                            value="{{ old('data_nascimento', $paciente->data_nascimento) }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('data_nascimento')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- ENDEREÇO --}}
                <h3 class="text-lg font-semibold text-gray-900 mt-10 mb-4">Endereço*</h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Rua*</label>
                        <input type="text" name="rua"
                            value="{{ old('rua', $paciente->endereco->rua ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('rua')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Número*</label>
                        <input type="text" name="numero"
                            value="{{ old('numero', $paciente->endereco->numero ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('numero')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Bairro*</label>
                        <input type="text" name="bairro"
                            value="{{ old('bairro', $paciente->endereco->bairro ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('bairro')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Cidade*</label>
                        <input type="text" name="cidade"
                            value="{{ old('cidade', $paciente->endereco->cidade ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('cidade')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Estado*</label>
                        <input type="text" name="estado" maxlength="2"
                            value="{{ old('estado', $paciente->endereco->estado ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('estado')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">CEP</label>
                        <input type="text" name="cep"
                            value=" {{ old('cep', $paciente->endereco->cep ?? '') }}"
                            class="w-full p-3 border rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition">
                        @error('cep')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="flex justify-end mt-6">
                    <button
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                        Atualizar
                    </button>
                </div>

            </form>

        </div>
    </div>

</x-app-layout>