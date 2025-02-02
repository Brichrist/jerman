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
                        <h1 class="text-2xl text-white font-light">Ask Maria</h1>
                        <div class="text-purple-100 text-sm">Your German language assistant ✨</div>
                    </div>
                </div>

                <!-- Messages -->
                <div id="chat-messages" class="flex-1 p-6 space-y-6 overflow-y-auto bg-gray-50">
                    <div class="flex items-start bot-message opacity-0">
                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('img/maria.jpg') }}" alt="Robot" class="w-full h-full object-cover">
                        </div>
                        <div class="ml-3 bg-white rounded-2xl p-4 max-w-[80%] shadow-sm">
                            <p class="text-gray-700">Halo! Saya Maria, seorang guru bahasa Jerman berumur 28 tahun. Saya siap membantu Anda belajar bahasa Jerman. 😊</p>
                        </div>
                    </div>
                </div>

                <!-- Input -->
                <div class="p-4 bg-gray-50 border-t border-gray-100">
                    <form id="chat-form" action="{{ route('ai.askAi') }}" method="POST" class="flex gap-3">
                        <input type="hidden" name="conversation" id="conversation" value="">
                        <textarea id="question" name="question" class="flex-1 p-4 rounded-xl border border-purple-200 text-gray-700 focus:outline-none focus:border-purple-400 placeholder-gray-400" placeholder="Type something nice..." autocomplete="off" rows="1"></textarea>
                        <button type="submit" class="gradient-bg text-white rounded-xl w-12 h-12 flex items-center justify-center hover:opacity-90 transition-all transform hover:scale-105">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
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
                });

                $('#question').on('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight > 100 ? 100 : (this.scrollHeight+5)) + 'px';
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
                            addMessage("Maaf ya, Maria sudah capek buat jelasin.", "Silahkan reload url untuk chat dengan maria kembali", 'bot');
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
                                let conversation = JSON.parse(response.conversation);
                                for (let i = 0; i < conversation.length; i++) {
                                    console.log(conversation[i].role + ' : ' + conversation[i].content);
                                }
                                dollar += response.dollar
                                token += response.token
                                console.log('total dollar sampai saat ini: ' + dollar);
                                console.log('total token sampai saat ini: ' + token);

                            } else {
                                alert('Terjadi kesalahan, silakan coba lagi.');
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
                    text = text.replace(/\n/g, '<br>')
                    const messageHTML = `
                        <div class="flex items-start ${isBot ? '' : 'justify-end'} message opacity-0">
                            ${isBot ? `
                                                                                                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center overflow-hidden">
                                                                                                            <img src="{{ asset('img/maria.jpg') }}" alt="Robot" class="w-full h-full object-cover">
                                                                                                        </div>
                                                                                                    ` : ''}
                            <div class="mx-3 ${isBot ? 'bg-white text-gray-700' : 'gradient-bg text-white'} rounded-2xl p-4 max-w-[80%] shadow-sm">
                                <p>${text}</p>
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
