<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <a href="{{ route('game.vocab.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="font-semibold text-lg">{{ __('Vocab') }}</h3>
                        <p>{{ __('Learn new vocabulary words.') }}</p>
                    </div>
                </a>
                {{-- <a href="{{ route('game.redemittel.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="font-semibold text-lg">{{ __('Redemittel') }}</h3>
                        <p>{{ __('Useful phrases and expressions.') }}</p>
                    </div>
                </a>
                <a href="{{ route('game.gramatik.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="font-semibold text-lg">{{ __('Gramatik') }}</h3>
                        <p>{{ __('Grammar rules and tips.') }}</p>
                    </div>
                </a> --}}
            </div>
        </div>
    </div>
</x-app-layout>
