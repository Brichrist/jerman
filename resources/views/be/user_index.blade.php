<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
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
                            <div class="w-full relative overflow-x-auto shadow-md sm:rounded-lg border-slate-700 border-2">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Email
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                                Role
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Gender
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                                Expired At
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Token
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-900">
                                                    {{ $user->name }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $user->email }}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-900">
                                                    {{ $user->role }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $user->gender }}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-900">
                                                    {{ $user->expired_at }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $user->token }}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-900">
                                                    <div class="flex">
                                                        @if (auth()->user()->role == 'owner')
                                                            <button type="button" data-data="{{ $user }}" class="clone-btn focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-500 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-green-950">
                                                                📄
                                                            </button>

                                                            <button type="button" data-data="{{ $user }}" class="edit-btn focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-950">
                                                                ✏️
                                                            </button>

                                                            <button type="button" class="delete-btn focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-500 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-red-950">
                                                                🗑️
                                                            </button>

                                                            <form action="{{ route('user.destroy', $user->id) }}" class="hidden delete-form" method="POST">
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
                                    {{ $users->appends(request()->query())->links() }}
                                </div>

                                @if ($users->isEmpty())
                                    <div class="text-center p-4 text-gray-500">
                                        No words found.
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
                                {{-- <!-- Button to open the modal -->
                                <button type="button" class="mb-5 bg-blue-500 text-white px-4 py-2 rounded" data-modal-target="addUserModal">
                                    Add by Pdf
                                </button>

                                <!-- Modal -->
                                <div id="addUserModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
                                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md max-h-screen overflow-y-auto">
                                        <header class="flex justify-between items-center">
                                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                Add User by PDF
                                            </h2>
                                            <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300" data-modal-close="addUserModal">
                                                &times;
                                            </button>
                                        </header>
                                        <form method="post" action="/multiple-user" id="pdfForm" enctype="multipart/form-data" class="mt-6 space-y-6">
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
                                                <x-secondary-button type="button" data-modal-close="addUserModal">{{ __('Cancel') }}</x-secondary-button>
                                                <x-primary-button class="get-data-ai">{{ __('Upload') }}</x-primary-button>
                                            </div>
                                            <div>
                                                <div id="output" class="dark:text-gray-100"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}

                                <header>
                                    <h2 class="text-lg font-medium title-form text-gray-900 dark:text-gray-100">
                                        Add User
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Exciting news! We’re adding a new user to our lineup. It’s coming soon!
                                    </p>
                                </header>

                                <form method="post" action="{{ route('user.store') }}" class="mt-6 space-y-6">
                                    @csrf
                                    <input type="text" class="hidden" id="id" name="id">
                                    <div>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                    </div>
                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autofocus autocomplete="email" />
                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                    </div>
                                    <div>
                                        <x-input-label for="role" :value="__('Role')" />
                                        <select id="role" name="role" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                            <option value="owner" {{ old('role') == 'owner' ? 'selected' : '' }}>Owner</option>
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('role')" />
                                    </div>
                                    <div>
                                        <x-input-label for="gender" :value="__('Gender')" />
                                        <select id="gender" name="gender" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                                    </div>
                                    <div>
                                        <x-input-label for="expired_at" :value="__('Expired At')" />
                                        <x-text-input id="expired_at" name="expired_at" type="date" class="mt-1 block w-full" :value="old('expired_at')" autofocus autocomplete="expired_at" />
                                        <x-input-error class="mt-2" :messages="$errors->get('expired_at')" />
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <x-primary-button type="button" id="add_month_btn">{{ __('+ 1M') }}</x-primary-button>
                                    </div>
                                    <script type="module">
                                        document.getElementById('add_month_btn').addEventListener('click', function() {
                                            let expiredAtInput = document.getElementById('expired_at');
                                            let currentDate = expiredAtInput.value ? new Date(expiredAtInput.value) : new Date();
                                            let today = new Date();
                                            if (currentDate < today) {
                                                currentDate = today;
                                            }
                                            currentDate.setMonth(currentDate.getMonth() + 1);
                                            expiredAtInput.value = currentDate.toISOString().split('T')[0];
                                        });
                                    </script>
                                    <div>
                                        <x-input-label for="token" :value="__('Token')" />
                                        <x-text-input id="token" name="token" type="number" step="0.0001" class="mt-1 block w-full" :value="old('token')" autofocus autocomplete="token" />
                                        <x-input-error class="mt-2" :messages="$errors->get('token')" />
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <x-primary-button type="button" id="add_token_btn">{{ __('Rp.6K = 0.3125T') }}</x-primary-button>
                                    </div>
                                    <script type="module">
                                        document.getElementById('add_token_btn').addEventListener('click', function() {
                                            let tokenInput = document.getElementById('token');
                                            let currentToken = parseFloat(tokenInput.value) || 0;
                                            tokenInput.value = (currentToken + 0.3125).toFixed(4);
                                        });
                                    </script>
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
                    if (i == 'token' && v == null) {
                        $('#' + i).val(null);
                    }
                });

                $('.title-form').text('Edit User');
            });
            $('.clone-btn').click(function(e) {
                let data = $(this).data('data');

                $.each(data, function(i, v) {
                    $('#' + i).val(v);
                    if (i == 'token' && v == null) {
                        $('#' + i).val(null);
                    }
                });

                $('#id').val('');
                $('.title-form').text('Clone User');
            });
            $('.reset-btn').click(function(e) {
                $('.title-form').text('Add User');
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
                                        <input type="checkbox" id="${key}" name="user[]" value="${key}" class="user" checked>
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
                //     let formData = $('#pdfForm').serializeArray().filter(item => item.name === 'user[]');
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
