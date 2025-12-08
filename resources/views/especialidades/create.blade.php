<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                    Nova Especialidade
                </h2>
                <p class="text-gray-600 text-sm mt-1">
                    Cadastre uma nova especialidade médica
                </p>
            </div>

            <a href="/especialidades"
                class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('especialidades.store') }}" method="POST"
            class="bg-white border shadow-sm rounded-2xl p-6 max-w-xl mx-auto">
            @csrf

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Nome</label>
                <input type="text" name="nome"
                    class="w-full border-gray-300 rounded-lg shadow-sm">
                @error('nome')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Descrição</label>
                <textarea name="descricao"
                    class="w-full border-gray-300 rounded-lg shadow-sm"
                    rows="3"></textarea>
            </div>

            <div class="flex justify-end">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Salvar
                </button>
            </div>
        </form>

    </div>
</x-app-layout>