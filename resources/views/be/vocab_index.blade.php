<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vocabulary') }}
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
                            <form method="GET" action="{{ route('vocab.index') }}" class="p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg mb-4 flex items-center space-x-4">
                                <label for="filterKapital" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Filter by Kapital</label>
                                <input type="text" id="filterKapital" name="kapital" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-300" placeholder="Enter Kapital">
                                <button type="submit" class="mt-1 bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
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
                                                German Word
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                                Meaning
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Description
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vocabs as $word)
                                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-900">
                                                    {{ $word->kapital }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $word->german_word }}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-900">
                                                    {{ $word->meaning }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $word->word_type }}<br>
                                                    Example: {!! $word->example !!}<br>
                                                    Note: {{ $word->additional_notes }}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-900">
                                                    <div class="flex">
                                                        <button type="button" data-data="{{ $word }}" class="clone-btn focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-500 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-green-950">
                                                            📄
                                                        </button>

                                                        <button type="button" data-data="{{ $word }}" class="edit-btn focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-950">
                                                            ✏️
                                                        </button>

                                                        <button type="button" class="delete-btn focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-500 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-red-950">
                                                            🗑️
                                                        </button>

                                                        <form action="{{ route('vocab.destroy', $word->id) }}" class="hidden delete-form" method="POST">
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
                                <div class="p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                                    {{ $vocabs->links() }}
                                </div>

                                @if ($vocabs->isEmpty())
                                    <div class="text-center p-4 text-gray-500">
                                        No words found.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" md:w-1/4">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            <!-- Button to open the modal -->
                            <button type="button" class="mb-5 bg-blue-500 text-white px-4 py-2 rounded" data-modal-target="addVocabModal">
                                Add by Pdf
                            </button>

                            <!-- Modal -->
                            <div id="addVocabModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
                                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-screen overflow-y-auto">
                                    <header class="flex justify-between items-center">
                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            Add Vocabulary by PDF
                                        </h2>
                                        <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300" data-modal-close="addVocabModal">
                                            &times;
                                        </button>
                                    </header>
                                    <form method="post" action="/multiple-vocab" id="pdfForm" enctype="multipart/form-data" class="mt-6 space-y-6">
                                        @csrf
                                        <div>
                                            <x-input-label for="document" :value="__('Upload PDF')" />
                                            <x-file-input id="pdfFile" name="document" class="mt-1 block w-full" required />
                                            <x-input-error class="mt-2" :messages="$errors->get('document')" />
                                        </div>
                                        <div id="loading" class="hidden flex items-center justify-center">
                                            <svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                            </svg>
                                            <span class="ml-2 text-gray-500">Loading...</span>
                                        </div>
                                        <div>
                                            <x-input-label for="kapital" :value="__('Kapital')" />
                                            <x-text-input id="kapital" name="kapital" type="text" class="mt-1 block w-full" :value="old('kapital')" autofocus autocomplete="kapital" />
                                            <x-input-error class="mt-2" :messages="$errors->get('kapital')" />
                                        </div>
                                        <div class="flex items-center justify-end gap-4">
                                            <x-secondary-button type="button" data-modal-close="addVocabModal">{{ __('Cancel') }}</x-secondary-button>
                                            {{-- <x-primary-button type="button" class="get-data-ai">{{ __('Get Data (AI)') }}</x-primary-button> --}}
                                            <x-primary-button class="get-data-ai">{{ __('Upload') }}</x-primary-button>
                                        </div>
                                        <div>
                                            <div id="output" class="dark:text-gray-100"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <header>
                                <h2 class="text-lg font-medium title-form text-gray-900 dark:text-gray-100">
                                    Add Vocabulary
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    Exciting news! We’re adding a new vocabulary to our lineup. It’s coming soon!
                                </p>
                            </header>

                            <form method="post" action="{{ route('vocab.store') }}" class="mt-6 space-y-6">
                                @csrf
                                <input type="text" class="hidden" id="id" name="id">
                                <div>
                                    <x-input-label for="kapital" :value="__('Kapital')" />
                                    <x-text-input id="kapital" name="kapital" type="text" class="mt-1 block w-full" :value="old('kapital')" autofocus autocomplete="kapital" />
                                    <x-input-error class="mt-2" :messages="$errors->get('kapital')" />
                                </div>
                                <div>
                                    <x-input-label for="german_word" :value="__('German Word')" />
                                    <x-text-input id="german_word" name="german_word" type="text" class="mt-1 block w-full" :value="old('german_word')" required autofocus autocomplete="german_word" />
                                    <x-input-error class="mt-2" :messages="$errors->get('german_word')" />
                                </div>
                                <div>
                                    <x-input-label for="meaning" :value="__('Meaning')" />
                                    <x-text-input id="meaning" name="meaning" type="text" class="mt-1 block w-full" :value="old('meaning')" required autofocus autocomplete="meaning" />
                                    <x-input-error class="mt-2" :messages="$errors->get('meaning')" />
                                </div>
                                <div>
                                    <x-input-label for="word_type" :value="__('Word Type')" />
                                    <x-select id="word_type" class="block w-full" name="word_type">
                                        <option value="" selected disabled hidden>{{ __('Choose an option') }}</option>
                                        <option value="Nomen">Noun</option>
                                        <option value="Verb">Verb</option>
                                        <option value="Adjektiv">Adjective</option>
                                        <option value="Präposition">Preposition</option>
                                        <option value="Adverb">Adverb</option>
                                        <option value="Konjunktion">Conjunction</option>
                                    </x-select>
                                    <x-input-error class="mt-2" :messages="$errors->get('word_type')" />
                                </div>
                                <div>
                                    <x-input-label for="additional_notes" :value="__('Additional Notes')" />
                                    <x-textarea id="additional_notes" name="additional_notes" class="mt-1 block w-full" :value="old('additional_notes')" autofocus autocomplete="additional_notes" />
                                    <x-input-error class="mt-2" :messages="$errors->get('additional_notes')" />
                                </div>

                                <div class="flex items-between justify-between gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                    <x-secondary-button class="reset-btn" type="button">{{ __('Reset') }}</x-secondary-button>
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
            document.querySelectorAll('[data-modal-target]').forEach(button => {
                button.addEventListener('click', () => {
                    const modal = document.getElementById(button.getAttribute('data-modal-target'));
                    modal.classList.remove('hidden');
                });
            });

            document.querySelectorAll('[data-modal-close]').forEach(button => {
                button.addEventListener('click', () => {
                    const modal = document.getElementById(button.getAttribute('data-modal-close'));
                    modal.classList.add('hidden');
                });
            });
        </script>
        <script type="module">
            $('.edit-btn').click(function(e) {
                let data = $(this).data('data');

                $.each(data, function(i, v) {
                    $('#' + i).val(v);
                });

                $('.title-form').text('Edit Vocabulary');
            });
            $('.clone-btn').click(function(e) {
                let data = $(this).data('data');

                $.each(data, function(i, v) {
                    $('#' + i).val(v);
                });

                $('#id').val('');
                $('.title-form').text('Clone Vocabulary');
            });
            $('.reset-btn').click(function(e) {
                $('.title-form').text('Add Vocabulary');
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
        <script type="module">
            $(document).ready(function() {
                $(document).on('click', '.removeFile', function(e) {
                    e.preventDefault();
                    $(this).closest('.parent').remove();
                });
                $('#pdfFile').on('change', function(e) {
                    e.preventDefault();
                    $('#loading').removeClass('hidden');
                    $('#output').find('.error').remove();


                    var formData = new FormData();
                    formData.append('document', $('#pdfFile')[0].files[0]);
                    formData.append('type', 'file');

                    $.ajax({
                        url: '/extract-pdf',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#loading').addClass('hidden');
                            if (response.success) {
                                let data = JSON.parse(response.data);
                                data = data.bahasaJerman;
                                console.log(data)
                                let outputHtml = '<div class="parent border border-gray-200 dark:border-gray-700 p-4 rounded-lg mb-4">';
                                let fileName = $('#pdfFile')[0].files[0].name;
                                outputHtml += `<div class="flex justify-between items-center mb-4">
                                    <p class="font-semibold">${fileName}</p>
                                    <button type="button" class="text-red-500 hover:text-red-700 removeFile">
                                        🗑️
                                    </button>
                                    </div>`;
                                outputHtml += `<p>Total Keys: ${Object.keys(data).length}</p>`;
                                Object.keys(data).forEach(key => {
                                    outputHtml += `<div>
                                        <input type="checkbox" id="${key}" name="vocab[]" value="${key}" class="vocab" checked>
                                        <label for="${key}">${key} = ${data[key].meaning} (${data[key].word_type})</label>
                                        <input type="hidden" name="meaning[]" value="${data[key].meaning}">
                                        <input type="hidden" name="word_type[]" value="${data[key].word_type}">
                                    </div>`;
                                });
                                outputHtml += '</div>';
                                $('#output').prepend(outputHtml);
                            } else {
                                $('#output').prepend('<div class="text-red-500 error">Error: ' + response.message + '</div>');
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#loading').addClass('hidden');
                            $('#output').prepend('<div class="text-red-500 error">Error: ' + response.message + '</div>');
                            console.error(error);
                        }
                    });
                });
                // $('.get-data-ai').click(function(e) {
                //     e.preventDefault();
                //     let formData = $('#pdfForm').serializeArray().filter(item => item.name === 'vocab[]');
                //     $.ajax({
                //         url: '/get-data-ai',
                //         type: 'POST',
                //         data: formData,
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         },
                //         success: function(response) {
                //             if (response.success) {
                //                 $('#output').html(response.data);
                //             } else {
                //                 $('#output').text('Error: ' + response.message);
                //             }
                //         },
                //         error: function(xhr, status, error) {
                //             $('#output').text('Error fetching data from AI');
                //             console.error(error);
                //         }
                //     });

                // });
            });
        </script>
    @endpush
</x-app-layout>
