<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Editar Especialidade
        </h2>
        <p class="text-gray-600 mt-1">Atualize os dados da especialidade</p>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('especialidades.update', $especialidade->id) }}" method="POST"
            class="bg-white border shadow-sm rounded-2xl p-6 max-w-xl mx-auto">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Nome</label>
                <input type="text" name="nome"
                    value="{{ $especialidade->nome }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm"
                    required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Descrição</label>
                <textarea name="descricao"
                    class="w-full border-gray-300 rounded-lg shadow-sm"
                    rows="3">{{ $especialidade->descricao }}</textarea>
            </div>

            <div class="flex justify-end">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Atualizar
                </button>
            </div>
        </form>

    </div>
</x-app-layout>