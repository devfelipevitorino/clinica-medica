<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Em breve...
        </h2>
        <p class="text-gray-600 mt-1">
            Esta página ainda está em desenvolvimento
        </p>
    </x-slot>

    <div class="p-6 flex items-center justify-center">
        <div class="bg-white border rounded-2xl shadow-lg p-10 max-w-xl w-full text-center">

            <div class="mx-auto w-20 h-20 flex items-center justify-center rounded-full bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                </svg>

            </div>

            <h3 class="text-xl font-semibold text-gray-800 mt-5">
                Página em construção
            </h3>

            <p class="text-gray-600 mt-2">
                Estamos trabalhando para liberar este recurso em breve.
            </p>

            <div class="mt-6">
                <a href="{{ url()->previous() }}"
                    class="inline-block px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                    Voltar
                </a>
            </div>

        </div>
    </div>
</x-app-layout>