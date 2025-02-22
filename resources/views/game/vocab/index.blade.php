<x-app-layout>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-center flex-col-reverse md:flex-row">
                <div class=" md:w-3/4  md:pe-4 pt-12 md:pt-0">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="w-full">
                            <div class="card shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="mb-0 text-center">Mulai Game</h4>
                                </div>
                                <div class="card-body mt-5">
                                    <form action="{{ route('game.vocab.play') }}" method="GET">
                                        <div class="form-group mb-3">
                                            <x-input-label for="kapital" :value="__('Kapital')" />
                                            <x-text-input id="kapital" name="kapital" type="text" class="mt-1 block w-full" :value="old('kapital')" autofocus autocomplete="kapital" />
                                            <x-input-error class="mt-2" :messages="$errors->get('kapital')" />
                                            <p class="text-white text-sm mt-2">Contoh: A2-12.</p>
                                        </div>
                                        <div class="form-group mb-3">
                                            <x-input-label for="use_favorites" :value="__('Gunakan Favorit')" />
                                            <x-select id="use_favorites" class="block w-full" name="use_favorites" required>
                                                <option value="2">Ya (Hitam)</option>
                                                <option value="1">Ya</option>
                                                <option value="0" selected>Tidak</option>
                                            </x-select>
                                            <x-input-error class="mt-2" :messages="$errors->get('use_favorites')" />
                                        </div>
                                        {{-- <div class="form-group mb-3">
                                            <div class="flex flex-col">
                                                <label for="filterOwner" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Filter by Owner</label>
                                                <select id="filterOwner" name="owner" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-300">
                                                    @php
                                                        // if (auth()->user()->role == 'owner') {
                                                        //     $val_owner = request('owner', 'default');
                                                        // } else {
                                                        // }
                                                        $val_owner = request('owner', 'all');
                                                    @endphp
                                                    <option value="all" {{ $val_owner == 'all' ? 'selected' : '' }}>all</option>
                                                    <option value="default" {{ $val_owner == 'default' ? 'selected' : '' }}>default</option>
                                                    <option value="me" {{ $val_owner == 'me' ? 'selected' : '' }}>me</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="form-group mb-3">
                                            <div class="flex flex-col">
                                                <label for="filterGermanWord" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Filter by German Word</label>
                                                <input type="text" id="filterGermanWord" name="german_word" value="{{ request('german_word') }}" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-300" placeholder="Enter German Word">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <x-input-label for="use_limit" :value="__('Limit Favorit')" />
                                            <x-select id="use_limit" class="block w-full" name="use_limit" required>
                                                <option value="default" selected>default</option>
                                                <option value="semua">All</option>
                                            </x-select>
                                            <x-input-error class="mt-2" :messages="$errors->get('use_favorites')" />
                                        </div>
                                        <div class="form-group mb-3">
                                            <x-input-label for="language" :value="__('Bahasa')" />
                                            <x-select id="language" class="block w-full" name="language" required>
                                                <option value="indo">Indonesia</option>
                                                <option value="german">German</option>
                                            </x-select>
                                            <x-input-error class="mt-2" :messages="$errors->get('language')" />
                                        </div>
                                       
                                        <div class="flex items-center justify-end gap-4">
                                            <x-primary-button>{{ __('Start') }}</x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
