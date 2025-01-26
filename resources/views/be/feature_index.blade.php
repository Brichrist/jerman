<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Feature') }}
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
                <div class=" md:w-3/4  md:pe-4 pt-12 md:pt-0">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="w-full">
                            <div class="w-full relative overflow-x-auto shadow-md sm:rounded-lg border-slate-700 border-2">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                                Feature name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Description
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($features ?? [] as $feature)
                                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-900">
                                                    {{ $feature->title ?? null }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $feature->description ?? null }}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-900">
                                                    {{ $feature->status ?? null }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex">
                                                        <button type="button" data-data="{{ $feature }}" class="clone-btn focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-green-950">
                                                            Clone
                                                        </button>

                                                        <button type="button" data-data="{{ $feature }}" class="edit-btn focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-950">
                                                            Edit
                                                        </button>

                                                        <button type="button" class="delete-btn focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-red-950">
                                                            Delete
                                                        </button>

                                                        <form action="{{ route('feature.destroy', $feature->id) }}" class="hidden delete-form" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <button type="submit"></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" md:w-1/4">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            <header>
                                <h2 class="text-lg font-medium title-form text-gray-900 dark:text-gray-100">
                                    Add Feature
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    Exciting news! We’re adding a new feature to our lineup. It’s coming soon!
                                </p>
                            </header>

                            <form method="post" action="{{ route('feature.store') }}" class="mt-6 space-y-6">
                                @csrf
                                <input type="text" class="hidden" id="id" name="id">
                                <div>
                                    <x-input-label for="title" :value="__('Title')" />
                                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus autocomplete="title" />
                                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                </div>
                                <div>
                                    <x-input-label for="description" :value="__('Description')" />
                                    <x-textarea id="description" name="description" type="text" class="mt-1 block w-full" autofocus autocomplete="description">
                                        {{ old('description') }}
                                    </x-textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                </div>
                                <div>
                                    <x-input-label for="status" :value="__('status')" />
                                    <x-select id="status" class="block w-full" name="status">
                                        <option value="" selected disabled hidden>{{ __('Choose an option') }}</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </x-select>
                                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                                </div>

                                <div class="flex items-between justify-between gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                    <x-secondary-button class="reset-btn" type="button">{{ __('Reset') }}</x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script type="module">
            $('.edit-btn').click(function(e) {
                let data = $(this).data('data');

                $.each(data, function(i, v) {
                    $('#' + i).val(v);
                });

                $('.title-form').text('Edit Feature');
            });
            $('.clone-btn').click(function(e) {
                let data = $(this).data('data');

                $.each(data, function(i, v) {
                    $('#' + i).val(v);
                });

                $('#id').val('');
                $('.title-form').text('Clone Feature');
            });
            $('.reset-btn').click(function(e) {
                $('.title-form').text('Add Feature');
                $('input').val("").trigger('change')
                $('textarea').text("").val("").trigger('change')
                $("option:selected").prop("selected", false)
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
