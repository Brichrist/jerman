<x-app-layout>

    <div class="py-12">
        <div class="container mx-auto px-4 h-screen flex flex-col">
            <div class="flex-1 max-w-2xl mx-auto w-full bg-white rounded-2xl shadow-xl flex flex-col my-4 overflow-hidden">
                <!-- Header -->
                <div class="gradient-bg p-6 flex items-center">
                    <div class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                        <i class="fas fa-message-smile text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        @php
                            $name = auth()->user()->gender == 'male' ? 'Silvi' : 'David';
                        @endphp
                        <h1 class="text-2xl text-white font-light">Ask {{ $name }}</h1>
                        <div class="text-purple-100 text-sm">Your German language assistant ✨</div>
                    </div>
                </div>

                <!-- Messages -->
                <div id="chat-messages" class="flex-1 p-6 space-y-6 overflow-y-auto bg-gray-50">
                    <div class="flex items-start bot-message opacity-0">
                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('img/' . $name . '.jpg') }}" alt="Robot" class="w-full h-full object-cover">
                        </div>
                        <div class="ml-3 bg-white rounded-2xl p-4 max-w-[80%] shadow-sm">
                            <p class="text-gray-700">Halo! Saya {{ $name }}, seorang guru bahasa Jerman berumur 28 tahun. Saya siap membantu Anda belajar bahasa Jerman. 😊</p>
                        </div>
                    </div>
                </div>

                <!-- Input -->
                <div class="p-4 bg-gray-50 border-t border-gray-100">
                    <form id="chat-form" action="{{ route('ai.askAi') }}" method="POST" class="flex gap-3">
                        <input type="hidden" name="conversation" id="conversation" value="">
                        <textarea id="question" name="question" class="flex-1 p-4 rounded-xl border border-purple-200 text-gray-700 focus:outline-none focus:border-purple-400 placeholder-gray-400" placeholder="Type something nice..." autocomplete="off" rows="1"></textarea>
                        <div class="flex flex-col items-center justify-center space-y-2">
                            <button type="submit" class="gradient-bg text-white rounded-xl w-12 h-12 flex items-center justify-center hover:opacity-90 transition-all transform hover:scale-105">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                            <p class="text-xs whitespace-nowrap">sisa token: <span class="remaining">{{ auth()->user()->token ? auth()->user()->token * 100 : '∞' }}</span></p>
                        </div>
                    </form>
                    <div class="mt-2 flex flex-wrap gap-2">
                        <button type="button" class="quick-input px-3 py-2 text-sm rounded-full bg-purple-500 text-white hover:bg-purple-600 transition-colors" data-text="bantu saya mendapatkan data berupa object untuk Arti, Genus (der, die, das, die-pl), Bentuk jamak, Contoh umum (beserta artinya). Dari kata ini: ">
                            Nomen
                        </button>
                        <button type="button" class="quick-input px-3 py-2 text-sm rounded-full bg-purple-500 text-white hover:bg-purple-600 transition-colors" data-text="bantu saya mendapatkan data berupa object untuk  Arti, Bentuk infinitif, Bentuk perfekt/Partizip II dan prateritumnya, Bentuk konjugasi (lengkap), bentuk verb lain dengan Prefiks berbeda (sebanyak banyaknya beserta artinya saja), Contoh umum (beserta artinya). Dari kata ini: ">
                            Verb
                        </button>
                        <button type="button" class="quick-input px-3 py-2 text-sm rounded-full bg-purple-500 text-white hover:bg-purple-600 transition-colors" data-text="bantu saya mendapatkan data berupa object untuk  Arti, Perbandingan adjektive (Bentuk komparatif dan superlatif), Contoh umum (beserta artinya). Dari kata ini: ">
                            Adjektiv
                        </button>
                        <button type="button" class="quick-input px-3 py-2 text-sm rounded-full bg-purple-500 text-white hover:bg-purple-600 transition-colors" data-text="bantu saya mendapatkan data berupa object untuk  Arti, Perbandingan Adverb (Bentuk komparatif dan superlatif), Contoh umum (beserta artinya). Dari kata ini: ">
                            Adverb
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <script type="module">
            let token = 0;
            let dollar = 0;

            $(document).ready(function() {
                $('.quick-input').click(function() {
                    const text = $(this).data('text');
                    $('#question').focus();
                    $('#question').text(text).val(text);
                    $('#question').focus();
                    $('#question').trigger('input');
                });
                anime({
                    targets: '.bot-message',
                    opacity: [0, 1],
                    translateY: [20, 0],
                    duration: 1200,
                    easing: 'spring(1, 80, 10, 0)'
                });

                $('#question').on('keydown', function(e) {
                    if (e.key === 'Enter' && e.shiftKey) {
                        e.preventDefault();
                        const cursorPos = this.selectionStart;
                        const value = this.value;
                        this.value = value.substring(0, cursorPos) + '\n' + value.substring(cursorPos);
                        this.selectionStart = cursorPos + 1;
                        this.selectionEnd = cursorPos + 1;
                    }
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        $('#chat-form').submit();
                    }
                });

                $('#question').on('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight > 100 ? 100 : (this.scrollHeight + 5)) + 'px';
                });

                $('#chat-form').on('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    const question = $('#question').val();
                    if (!question.trim()) return;

                    addMessage(question, null, 'user');
                    $('#question').val('');
                    if (new URLSearchParams(window.location.search).get('free') != 'true') {
                        if (dollar > 0.05) {
                            addMessage("Maaf ya, {{ $name }} sudah capek buat jelasin.", "Silahkan reload url untuk chat dengan {{ $name }} kembali", 'bot');
                            return;
                        }
                    }
                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Accept': 'application/json',
                        },
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // console.log(response);
                            if (response.success) {
                                setTimeout(() => {
                                    let data = JSON.parse(response.data);
                                    // console.log(data);
                                    addMessage(data.answer, data.hint, 'bot');
                                }, 1000);
                                $('#conversation').val(response.conversation);
                                if (response.remaining_dollar !== null) {
                                    if ((response.remaining_dollar * 100) > 0) {
                                        $('.remaining').text(response.remaining_dollar * 100);
                                    }
                                }
                                let conversation = JSON.parse(response.conversation);
                                for (let i = 0; i < conversation.length; i++) {
                                    console.log(conversation[i].role + ' : ' + conversation[i].content);
                                }
                                dollar += response.dollar
                                token += response.token
                                console.log('total dollar sampai saat ini: ' + dollar);
                                console.log('total token sampai saat ini: ' + token);

                            } else {
                                alert(' Terjadi kesalahan, silakan coba lagi.');
                            }
                        },
                        error: function(error) {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan, silakan coba lagi.');
                        }
                    });
                });

                function addMessage(text, hint, sender) {
                    const isBot = sender === 'bot';

                    // Function to format JSON data
                    function formatJSONContent(content) {
                        try {
                            // If content is already an object, use it directly
                            const jsonData = typeof content === 'string' ? JSON.parse(content) : content;

                            // Function to create HTML for nested objects
                            function createJSONView(obj, level = 0) {
                                const padding = 20; // pixels of padding per level
                                let html = '';

                                Object.entries(obj).forEach(([key, value]) => {
                                    const indent = level * padding;
                                    const isObject = value !== null && typeof value === 'object';

                                    html += `
                                        <div class="json-row" style="padding-left: ${indent}px">
                                            <span class="font-semibold text-blue-600 dark:text-blue-400">${key}</span>
                                            ${isObject ? ':' : `: <span class="text-gray-800 dark:text-gray-200">${value}</span>`}
                                        </div>
                                    `;

                                    if (isObject) {
                                        html += createJSONView(value, level + 1);
                                    }
                                });

                                return html;
                            }

                            return `
                                <div class="json-viewer bg-gray-50 dark:bg-gray-800 rounded p-3 font-mono text-sm overflow-x-auto">
                                    ${createJSONView(jsonData)}
                                </div>
                            `;
                        } catch (e) {
                            // If not valid JSON or already processed, return original text with line breaks
                            return text.replace(/\n/g, '<br>');
                        }
                    }

                    const formattedContent = formatJSONContent(text);

                    const messageHTML = `
                        <div class="flex items-start ${isBot ? '' : 'justify-end'} message opacity-0">
                            ${isBot ? `
                                                                <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center overflow-hidden">
                                                                    <img src="{{ asset('img/' . $name . '.jpg') }}" alt="Robot" class="w-full h-full object-cover">
                                                                </div>
                                                            ` : ''}
                            <div class="mx-3 ${isBot ? 'bg-white text-gray-700' : 'gradient-bg text-white'} rounded-2xl p-4 max-w-[80%] shadow-sm">
                                ${formattedContent}
                                ${hint ? `<hr class="my-2"><p class="text-sm text-gray-500">${hint}</p>` : ''}
                            </div>
                            ${!isBot ? `
                                                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                                    <i class="fas fa-user text-gray-500 text-sm"></i>
                                                                </div>
                                                    ` : ''}
                        </div>
                    `;

                    const $messages = $('#chat-messages');
                    $messages.append(messageHTML);
                    $messages.scrollTop($messages[0].scrollHeight);

                    anime({
                        targets: '.message:last-child',
                        opacity: [0, 1],
                        translateY: [20, 0],
                        duration: 1200,
                        easing: 'spring(1, 80, 10, 0)'
                    });

                    // Add hover effect to JSON rows
                    $('.json-row').hover(
                        function() {
                            $(this).addClass('bg-gray-100 dark:bg-gray-700');
                        },
                        function() {
                            $(this).removeClass('bg-gray-100 dark:bg-gray-700');
                        }
                    );
                }
            });
        </script>
    @endpush
    @push('css')
        <style>
            .gradient-bg {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }

            .message-input {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
            }
        </style>
    @endpush
</x-app-layout>
