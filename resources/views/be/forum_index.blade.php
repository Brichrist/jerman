<x-app-layout>
    <style>
        .messages-container {
            height: calc(100vh - 250px);
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #CBD5E0 #EDF2F7;
        }

        .messages-container::-webkit-scrollbar {
            width: 8px;
        }

        .messages-container::-webkit-scrollbar-track {
            background: #EDF2F7;
            border-radius: 4px;
        }

        .messages-container::-webkit-scrollbar-thumb {
            background-color: #CBD5E0;
            border-radius: 4px;
        }

        .message-bubble {
            max-width: 80%;
            word-wrap: break-word;
        }

        .messages-container .message-left:first-child,
        .messages-container .message-right:first-child {
            margin-top: auto;
        }
    </style>

    <div class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto w-full bg-white rounded-2xl shadow-xl flex flex-col">
                <!-- Header -->
                <div class="px-6 py-4 border-b">
                    <h1 class="text-xl font-semibold text-gray-800">Forum Chat</h1>
                    <p class="text-sm text-gray-500">Pesan akan diperbarui setiap 15 detik.</p>
                </div>

                <!-- Messages Area -->
                <div class="messages-container p-6 space-y-4" id="forum-messages">
                    <!-- Messages will be populated here -->
                </div>

                <!-- Input Area -->
                <div class="border-t px-6 py-4 bg-white rounded-b-2xl">
                    <form id="messageForm" class="flex gap-3">
                        @csrf
                        <input type="text" name="message" class="flex-1 rounded-lg border border-gray-200 px-4 py-2.5 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400" placeholder="Tulis pesan..." id="message" autocomplete="off">
                        <button type="button" id="sendButton" class="px-6 py-2.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
                            Kirim
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script type="module">
            // Pertama, mari coba versi yang lebih sederhana tanpa EventSource dulu
            $(document).ready(function() {
                const $messages = $('#forum-messages');
                const currentUserId = {{ auth()->user()->id }};
                const id_tema = {{ $id }};

                function formatTime(dateString) {
                    return new Date(dateString).toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                }

                function createMessageHTML(msg) {
                    const isCurrentUser = msg.id_user === currentUserId;
                    const isOwner = msg.link_user?.role === 'owner';

                    return `
                    <div class="flex items-start gap-3 ${isCurrentUser ? 'justify-end message-right' : 'message-left'}">
                        <div class="message-bubble">
                            <div class="bg-${isCurrentUser ? 'blue' : isOwner ? 'yellow' : 'gray'}-100 
                                ${isOwner ? 'border-2 border-yellow-400' : ''} 
                                rounded-lg px-4 py-2">
                                <div class="flex items-baseline gap-2 ${isCurrentUser ? 'justify-end' : ''}">
                                    ${!isCurrentUser ? `
                                                <span class="font-medium text-sm ${isOwner ? 'text-yellow-600' : 'text-blue-600'}">
                                                    ${msg.link_user?.name || 'User'} 
                                                    ${isOwner ? '<span class="ml-1 px-2 py-0.5 bg-yellow-200 text-yellow-700 text-xs rounded-full">Developer</span>' : ''}
                                                </span>
                                            ` : ''}
                                    <span class="text-xs text-gray-500">${formatTime(msg.created_at)}</span>
                                    ${isCurrentUser ? `<span class="font-medium text-sm text-blue-600">You</span>` : ''}
                                </div>
                                <p class="text-gray-700 mt-1">${msg.description}</p>
                            </div>
                        </div>
                    </div>
                    `;
                }

                // Function untuk reload messages
                function loadMessages() {
                    $.ajax({
                        url: '/forum-chat/messages/' + id_tema, // Endpoint baru yang perlu dibuat
                        method: 'GET',
                        success: function(data) {
                            // Balik urutan array data sebelum di-render
                            const reversedData = data.reverse();
                            $messages.html(reversedData.map(createMessageHTML).join(''));
                            $messages.scrollTop($messages[0].scrollHeight);
                        }
                    });
                }

                // Load messages setiap beberapa detik
                setInterval(loadMessages, 15000); // Reload setiap 3 detik

                // Load messages pertama kali
                loadMessages();

                function sendMessage() {
                    const $messageInput = $('#message');
                    const message = $messageInput.val().trim();

                    if (message) {
                        $.ajax({
                            url: '/forum-chat/send',
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': $('input[name="_token"]').val()
                            },
                            data: JSON.stringify({
                                message: message,
                                user: currentUserId,
                                id_tema_forum: id_tema
                            }),
                            success: function(response) {
                                $messageInput.val('').focus();
                                // Reload messages setelah mengirim
                                loadMessages();
                            },
                            error: function(error) {
                                console.error('Error sending message:', error);
                            }
                        });
                    }
                }

                // Handle button click
                $('#sendButton').on('click', sendMessage);

                // Handle form submission
                $('#messageForm').on('submit', function(e) {
                    e.preventDefault();
                    sendMessage();
                });

                // Handle enter key
                $('#message').on('keypress', function(e) {
                    if (e.which === 13 && !e.shiftKey) {
                        e.preventDefault();
                        sendMessage();
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
