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
                    <h1 class="text-xl font-semibold text-gray-800">Forum Chat {{ $data->locked == 'yes' ? '🔒' : '' }}</h1>
                    <p class="text-sm text-gray-500">
                        @if ($data->locked == 'yes' && auth()->user()->role !== 'owner')
                            Forum ini telah dikunci
                        @else
                            Pesan akan diperbarui setiap 15 detik.
                        @endif
                    </p>
                </div>

                <!-- Messages Area -->
                <div class="messages-container p-6 space-y-4" id="forum-messages">
                    <!-- Messages will be populated here -->
                </div>

                <!-- Input Area -->
                <div class="border-t px-6 py-4 bg-white rounded-b-2xl">
                    <form id="messageForm" class="flex gap-3" @if ($data->locked == 'yes' && auth()->user()->role !== 'owner') style="display: none;" @endif>
                        @csrf
                        <textarea type="text" name="message" class="flex-1 rounded-lg border border-gray-200 px-4 py-2.5 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400" placeholder="Tulis pesan..." id="message" autocomplete="off"></textarea>
                        <div class="flex gap-3 justify-end flex-col">
                            <button type="button" id="sendButton" class="px-6 py-2.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
                                Kirim
                            </button>
                        </div>
                    </form>
                    @if ($data->locked == 'yes' && auth()->user()->role !== 'owner')
                        <div class="text-center text-gray-500">
                            <p>Forum ini telah dikunci. Tidak dapat mengirim pesan baru.</p>
                        </div>
                    @endif
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
                const isLocked = "{{ $data->locked }}" === "yes";
                const isOwner = "{{ auth()->user()->role }}" === "owner";

                function formatTime(dateString) {
                    const date = new Date(dateString);
                    const now = new Date();

                    // Format untuk waktu
                    const timeOptions = {
                        hour: '2-digit',
                        minute: '2-digit'
                    };
                    const timeStr = date.toLocaleTimeString('id-ID', timeOptions);

                    // Hitung selisih hari
                    const diffTime = Math.abs(now - date);
                    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

                    // Jika hari ini
                    if (date.toDateString() === now.toDateString()) {
                        return timeStr;
                    }

                    // Jika kemarin
                    const yesterday = new Date(now);
                    yesterday.setDate(yesterday.getDate() - 1);
                    if (date.toDateString() === yesterday.toDateString()) {
                        return `Kemarin ${timeStr}`;
                    }

                    // Jika dalam 7 hari terakhir
                    if (diffDays < 7) {
                        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        return `${days[date.getDay()]} ${timeStr}`;
                    }

                    // Jika lebih dari 7 hari
                    const dateOptions = {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    };
                    return `${date.toLocaleDateString('id-ID', dateOptions)} ${timeStr}`;
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
                                <p class="text-gray-700 mt-1">${msg.description.replace(/\n/g, '<br>')}</p>
                            </div>
                        </div>
                    </div>
                    `;
                }
                let isScrolledToBottom = true;

                $messages.on('scroll', function() {
                    isScrolledToBottom = Math.abs(($messages[0].scrollHeight - $messages.scrollTop()) - $messages.height()) < 200;
                    // console.log(isScrolledToBottom);
                });

                // Function untuk reload messages
                function loadMessages() {
                    $.ajax({
                        url: '/forum-chat/messages/' + id_tema, // Endpoint baru yang perlu dibuat
                        method: 'GET',
                        success: function(data) {
                            const scrollPos = $messages.scrollTop();
                            const reversedData = data.reverse();
                            $messages.html(reversedData.map(createMessageHTML).join(''));

                            if (isScrolledToBottom) {
                                $messages.scrollTop($messages[0].scrollHeight);
                            } else {
                                $messages.scrollTop(scrollPos);
                            }
                        }
                    });
                }

                // Load messages setiap beberapa detik
                setInterval(loadMessages, 15000); // Reload setiap 3 detik
                // setInterval(loadMessages, 3000); // Reload setiap 3 detik

                // Load messages pertama kali
                loadMessages();

                function sendMessage() {
                    if (isLocked && !isOwner) return;

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
                                isScrolledToBottom = true
                                // Reload messages setelah mengirim
                                loadMessages();
                            },
                            error: function(error) {
                                console.error('Error sending message:', error);
                            }
                        });
                    }
                }

                if (!isLocked || isOwner) {
                    // Handle button click
                    $('#sendButton').on('click', sendMessage);
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
                }
            });
        </script>
    @endpush
</x-app-layout>
