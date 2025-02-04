<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gramatik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('notif'))
                @foreach (session('notif') as $key => $item)
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @php
                                switch ($key) {
                                    case 'success':
                                        $clr = 'text-green-500';
                                        break;
                                    case 'failed':
                                        $clr = 'text-red-500';
                                        break;
                                    default:
                                        $clr = 'text-blue-500';
                                        break;
                                }
                            @endphp
                            <h2 class="{{ $clr }} font-semibold text-xl">
                                {{ $item }}
                            </h2>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="flex justify-between flex-col-reverse md:flex-row">
                <div class=" {{ auth()->user()->role == 'owner' ? 'md:w-3/4' : 'md:w-full' }}  md:pe-4 pt-12 md:pt-0">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="w-full">
                            <form method="GET" action="{{ route('gramatik.index') }}" class="p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg mb-4">
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div class="space-y-4">
                                        <div class="flex flex-col">
                                            <label for="filterKapital" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Filter by Kapital</label>
                                            <input type="text" id="filterKapital" name="kapital" value="{{ request('kapital') }}" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-300" placeholder="Enter Kapital">
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="filterFavorite" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Filter by Favorite</label>
                                            <select id="filterFavorite" name="favorite" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-300">
                                                @php
                                                    $val_favorite = request('favorite', 'no');
                                                @endphp
                                                <option value="yes" {{ $val_favorite == 'yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="no" {{ $val_favorite == 'no' ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="flex flex-col">
                                            <label for="filterTitle" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Filter by Title</label>
                                            <input type="text" id="filterTitle" name="title" value="{{ request('title') }}" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-300" placeholder="Enter Title">
                                        </div>
                                        {{-- <div class="flex flex-col">
                                            <label for="filterOwner" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Filter by Owner</label>
                                            <select id="filterOwner" name="owner" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-300">
                                                @php
                                                    if (auth()->user()->role == 'owner') {
                                                        $val_owner = request('owner', 'default');
                                                    } else {
                                                        $val_owner = request('owner', 'all');
                                                    }
                                                @endphp
                                                <option value="all" {{ $val_owner == 'all' ? 'selected' : '' }}>all</option>
                                                <option value="default" {{ $val_owner == 'default' ? 'selected' : '' }}>default</option>
                                                <option value="me" {{ $val_owner == 'me' ? 'selected' : '' }}>me</option>
                                            </select>
                                        </div> --}}
                                    </div>
                                    <div class="col-span-full mt-4">
                                        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">Filter</button>
                                    </div>
                                </div>
                            </form>
                            <div class="w-full relative overflow-x-auto shadow-md sm:rounded-lg border-slate-700 border-2">
                                <!-- resources/views/german-dictionary/index.blade.php -->
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                                Kapital
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Title
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                                Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                HTML
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gramatiks as $gramatik)
                                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-900">
                                                    {{ $gramatik->kapital }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $gramatik->title }} {{ $gramatik->linkFavorite[0] ?? null ? '❤' : '' }}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-900">
                                                    {{ $gramatik->desc }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if ($gramatik->html)
                                                        <a target="_blank" href="{{ route('gramatik.preview', $gramatik->id) }}" class="text-blue-500 hover:underline">Preview</a>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-900">
                                                    <div class="flex">
                                                        <button data-model="gramatik" data-id="{{ $gramatik->id }}" type="button" class="favorite-btn focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-500 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-blue-950">
                                                            <span class="favorite-emote">❤</span>
                                                        </button>
                                                        @if (auth()->user()->role == 'owner')
                                                            <button type="button" data-data="{{ $gramatik }}" class="clone-btn focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-500 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-green-950">
                                                                📄
                                                            </button>

                                                            <button type="button" data-data="{{ $gramatik }}" class="edit-btn focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-950">
                                                                ✏️
                                                            </button>

                                                            <button type="button" class="delete-btn focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-500 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-red-950">
                                                                🗑️
                                                            </button>

                                                            <form action="{{ route('gramatik.destroy', $gramatik->id) }}" class="hidden delete-form" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE" />
                                                                <button type="submit"></button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                                    {{ $gramatiks->appends(request()->query())->links() }}
                                </div>

                                @if ($gramatiks->isEmpty())
                                    <div class="text-center p-4 text-gray-500">
                                        No gramatiks found.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if (auth()->user()->role == 'owner')
                    <div class=" md:w-1/4">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                <header>
                                    <h2 class="text-lg font-medium title-form text-gray-900 dark:text-gray-100">
                                        Add Gramatik
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Exciting news! We’re adding a new gramatik to our lineup. It’s coming soon!
                                    </p>
                                </header>

                                <form method="post" action="{{ route('gramatik.store') }}" class="mt-6 space-y-6">
                                    @csrf
                                    <input type="text" class="hidden" id="id" name="id">
                                    <div>
                                        <x-input-label for="kapital" :value="__('Kapital')" />
                                        <x-text-input id="kapital" name="kapital" type="text" class="mt-1 block w-full" :value="old('kapital')" autofocus autocomplete="kapital" />
                                        <x-input-error class="mt-2" :messages="$errors->get('kapital')" />
                                    </div>
                                    <div>
                                        <x-input-label for="title" :value="__('Title')" />
                                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus autocomplete="title" />
                                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                    </div>
                                    <div>
                                        <x-input-label for="desc" :value="__('Description')" />
                                        <x-textarea id="desc" name="desc" class="mt-1 block w-full" :value="old('desc')" required autofocus autocomplete="desc" />
                                        <x-input-error class="mt-2" :messages="$errors->get('desc')" />
                                    </div>
                                    <div>
                                        <x-input-label for="html" :value="__('HTML')" />
                                        <x-textarea id="html" name="html" class="mt-1 block w-full" :value="old('html')" autofocus autocomplete="html" />
                                        <x-input-error class="mt-2" :messages="$errors->get('html')" />
                                    </div>

                                    <div class="flex items-between justify-between gap-4">
                                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                                        <x-secondary-button class="reset-btn" type="button">{{ __('Reset') }}</x-secondary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @push('js')
        <script type="module">
            $('.favorite-btn').click(function(e) {
                let id = $(this).data('id');
                let model = $(this).data('model');

                $.ajax({
                    url: "/" + model + "/" + 'favorite',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        id_user: '{{ auth()->user()->id }}',
                        model: model
                    },
                    success: function(response) {
                        if (response.success == true) {
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        alert('An error occurred while processing your request.');
                        console.error(xhr.responseText);
                    }
                });
            });
            $('.edit-btn').click(function(e) {
                let data = $(this).data('data');

                $.each(data, function(i, v) {
                    $('#' + i).val(v);
                });

                $('.title-form').text('Edit Gramatik');
            });
            $('.clone-btn').click(function(e) {
                let data = $(this).data('data');

                $.each(data, function(i, v) {
                    $('#' + i).val(v);
                });

                $('#id').val('');
                $('.title-form').text('Clone Gramatik');
            });
            $('.reset-btn').click(function(e) {
                $(this).parents('form').find('.title-form').text('Add Redemittel');
                $(this).parents('form').find('input').not('[name=_token]').val("").trigger('change')
                $(this).parents('form').find('textarea').text("").val("").trigger('change')
                $(this).parents('form').find("option:selected").prop("selected", false)
            });
            $('.delete-btn').click(function(e) {
                Swal.fire({
                    title: "Are You Sure?",
                    text: "The data can't be restore after you delete!",
                    icon: "question",
                    showCancelButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).siblings('.delete-form').trigger('submit');
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
