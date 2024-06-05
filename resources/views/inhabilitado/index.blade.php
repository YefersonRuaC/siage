<x-guest-layout>
    <div class="mt-16 w-full py-16 flex items-center justify-center">
        <div class="bg-white border border-gray-200 flex flex-col items-center justify-center p-10 rounded-lg shadow-2xl">
            <p class="text-5xl font-bold text-gray-400 uppercase">¡Error!</p>
            <p class="text-2xl font-bold text-gray-500 mt-4">Su cuenta ha sido inhabilitada</p>
            <p class="text-gray-500 mt-4 pb-4 border-b-2 text-center">Si presenta inconvenientes, comuniquese con su centro de formación.</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    :href="route('logout')"
                    class="flex items-center font-bold hover:text-red-900 bg-red-300 hover:bg-red-100 px-4 py-2 mt-6 rounded transition duration-150"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                    {{ __('Cerrar sesion') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
