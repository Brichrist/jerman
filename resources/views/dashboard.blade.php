<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <a href="{{ route('vocab.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="font-semibold text-lg">{{ __('Vocab') }}</h3>
                        <p>{{ __('Learn new vocabulary words.') }}</p>
                    </div>
                </a>
                <a href="{{ route('redemittel.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="font-semibold text-lg">{{ __('Redemittel') }}</h3>
                        <p>{{ __('Useful phrases and expressions.') }}</p>
                    </div>
                </a>
                <a href="{{ route('gramatik.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="font-semibold text-lg">{{ __('Gramatik') }}</h3>
                        <p>{{ __('Grammar rules and tips.') }}</p>
                    </div>
                </a>
                <a href="{{ route('ai.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="font-semibold text-lg">{{ __('AI') }}</h3>
                        <p>{{ __('Artificial Intelligence resources.') }}</p>
                    </div>
                </a>
                <a href="{{ route('game.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="font-semibold text-lg">{{ __('Game') }}</h3>
                        <p>{{ __('Fun and educational games.') }}</p>
                    </div>
                </a>
                <a href="{{ route('forum.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="font-semibold text-lg">{{ __('Forum') }}</h3>
                        <p>{{ __('Join discussions and share knowledge.') }}</p>
                    </div>
                </a>
                <a href="{{ route('report.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="font-semibold text-lg">{{ __('Report') }}</h3>
                        <p>{{ __('View and create reports.') }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
