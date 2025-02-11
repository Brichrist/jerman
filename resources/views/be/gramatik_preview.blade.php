<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $gramatik->title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content=">{{ $gramatik->desc }}">
    <meta name="keywords" content="Bahasa Jerman, Struktur Kalimat, Gramatik, Belajar Bahasa Jerman, {{ $gramatik->title }}">
    <style>
        #q {
            display: none;
            position: fixed;
            min-width: 100vw;
        }

        #q.active {
            z-index: 1;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            background: #00000071;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        #q .close-btn {
            position: absolute;
            top: -15px;
            /* Sesuaikan posisi */
            right: -15px;
            /* Sesuaikan posisi */
            background: #f44336;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            /* Tambahkan ini */
            align-items: center;
            /* Tambahkan ini */
            justify-content: center;
            /* Tambahkan ini */
            padding: 0;
            /* Reset padding */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            /* Tambahkan shadow */
        }

        #q .close-btn:hover {
            background: #d32f2f;
            transform: scale(1.1);
        }

        #q .container {
            width: 90%;
            max-width: 800px;
            /* tambahkan ini */
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            /* tambahkan ini */
        }

        #q .result-container {
            display: none;
        }

        #q .question-block {
            margin-bottom: 30px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        #q .question {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        #q #questions {
            max-height: 70vh;
            overflow-y: auto;
        }

        #q .question span {
            font-size: 18px;
        }

        #q input[type="text"] {
            width: 120px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        #q .multiple-choice {
            display: grid;
            gap: 10px;
            margin: 10px 0;
        }

        #q .option {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }

        #q .option:hover {
            background: #f5f5f5;
        }

        #q .option.selected {
            background: #e8f5e9;
            border-color: #4CAF50;
        }

        #q .answer {
            margin-top: 10px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 4px;
            display: none;
        }

        #q .answer-text {
            font-weight: bold;
            color: #4CAF50;
        }

        #q .full-sentence {
            color: #666;
            margin-top: 5px;
        }

        #q .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        #q .back-btn,
        #q .finish-btn,
        #q .next-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            color: white;
            transition: background 0.3s;
        }

        #q .back-btn {
            background: #666;
        }

        #q .finish-btn {
            background: #4CAF50;
            margin-left: auto;
        }

        #q .next-btn {
            background: #2196F3;
        }

        @media (max-width: 480px) {
            #q .container {
                width: 95%;
                padding: 1rem;
            }

            #q .question span {
                font-size: 16px;
            }

            #q input[type="text"] {
                width: 100px;
            }
        }

        #q .incorrect {
            background: #ffebee !important;
            border-color: #f44336 !important;
            color: #f44336;
        }

        #q input[type="text"].incorrect {
            border-color: #f44336;
            color: #f44336;
        }

        .custom-btn {
            position: fixed;
            right: 20px;
            z-index: 5;
            top: 20px;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: background 0.3s, transform 0.3s;
        }

        .custom-btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .ask-btn {
            position: fixed;
            left: 20px;
            z-index: 5;
            top: 20px;
            padding: 12px 24px;
            background-color: rgb(53, 0, 128);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: background 0.3s, transform 0.3s;
        }

        .ask-btn:hover {
            background-color: #260a8a;
            transform: scale(1.05);
        }

        #q #quiz-container {
            max-height: 80vh;
        }

        #q .answer-input {
            padding: 1px 8px !important;
            margin: 0 8px !important;
        }

        #q .buttons {
            position: sticky;
            bottom: 0;
            background: white;
            padding-top: 10px;
            z-index: 1;
        }

        #q .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        #q .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #4CAF50;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .message-input {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        header {
            padding: 4rem 1rem 2rem 1rem !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <button class="custom-btn">Quiz by AI</button>
    <button class="ask-btn">Ask AI</button>
    <div id="ask-popup" style="z-index:1; display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); justify-content:center; align-items:center;">
        <!-- Header -->
        <div class="flex-1 max-w-2xl mx-auto w-full bg-white rounded-2xl shadow-xl flex flex-col my-4 overflow-hidden">

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
            <div id="chat-messages" class="flex-1 p-6 space-y-6 overflow-y-auto bg-gray-50" style="max-height: 65vh;">
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
                    @php
                        $conversation = [
                            [
                                'role' => 'system',
                                'content' =>
                                    "Anda adalah guru bahasa Jerman ' {{ $name }}' berumur 28 tahun yang mengajar murid dari Indonesia. Anda suka mendapat pertanyaan dari anak-anak, 
                                dan akan menjelaskan secara simpel dan mudah dipahami oleh orang dengan IQ minimal 90. 
                                Anda akan memberikan jawaban yang benar dan memberikan hint jika diperlukan. bahasa pengantar anda adalah bahasa Indonesia, 
                                Anda juga akan memberikan salam jika ada yang berterima kasih kepada anda / menutup percakapan dengan Anda.
                                Anda juga hanya akan membahas seputar bahasa jerman, dan anda akan menjadi marah dan akan tegas menolak apa pun yang berhubungan dangan 'NSFW'.
                                Saat ini murid anda sedang belajar tentang " .
                                    $gramatik->title .
                                    'di level ' .
                                    $gramatik->kapital .
                                    ",
                                anda akan menjawab dengan format JSON yang valid.
                                format: {id-user: number, question: 'pertanyaan', answer: 'jawaban', hint: 'hint jika diperlukan jika tidak ada bisa dikosongkan'}",
                            ],
                        ];
                        $conversation = json_encode($conversation);
                    @endphp
                    <input type="hidden" name="conversation" id="conversation" value="{{ $conversation }}">
                    <textarea id="question" name="question" class="flex-1 p-4 rounded-xl border border-purple-200 text-gray-700 focus:outline-none focus:border-purple-400 placeholder-gray-400" placeholder="Type something nice..." autocomplete="off" rows="1"></textarea>
                    {{-- <input type="text" id="question" name="question" class="flex-1 p-4 rounded-xl border border-purple-200 text-gray-700 focus:outline-none focus:border-purple-400 placeholder-gray-400" placeholder="Type something nice..." autocomplete="off"> --}}
                    <div class="flex flex-col items-center justify-center space-y-2">
                        <button type="submit" class="gradient-bg text-white rounded-xl w-12 h-12 flex items-center justify-center hover:opacity-90 transition-all transform hover:scale-105">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                        <p class="text-xs whitespace-nowrap">sisa token: <span class="remaining">{{ auth()->user()->token ? auth()->user()->token * 100 : '∞' }}</span></p>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="q">
        <div class="container">
            <button class="close-btn">&times;</button>
            <div class="quiz-type-selection">
                <h2>Pilih Jenis Soal</h2>
                <div class="buttons">
                    <button data-data="short" class="back-btn loadQuiz">Jawaban Singkat</button>
                    <button data-data="multiple" class="back-btn loadQuiz ">Pilihan Ganda</button>
                </div>
            </div>
            <div class="loading">
                <div class="loading-spinner"></div>
            </div>

            <div id="quiz-container" style="display:none; position: relative;">
                {{-- <button class="close-btn">&times;</button> --}}
                <div id="questions"></div>
                <div class="buttons">
                    <button class="back-btn">Back</button>
                    <button class="finish-btn">Finish</button>
                </div>
            </div>
        </div>
    </div>
    <div id="materi" data-materi={{ $gramatik->title }} data-kapital={{ $gramatik->kapital }}></div>
    {!! $gramatik->html !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script type="module">
        $('.ask-btn').click(function() {
            if ($('#ask-popup').css('display') === 'flex') {
                $('#ask-popup').hide();
            } else {
                $('#ask-popup').css('display', 'flex');
            }
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
    </script>
    <script type="module">
        let token = 0;
        let dollar = 0;

        $(document).ready(function() {
            $('table').each(function() {
                $(this).before('<span style="color: red;">NB: Untuk tampilan lebih baik, putar ponsel Anda ke mode horizontal.</span>');
                $(this).wrap('<div style="overflow-x:auto;"></div></div>');
            });
            anime({
                targets: '.bot-message',
                opacity: [0, 1],
                translateY: [20, 0],
                duration: 1200,
                easing: 'spring(1, 80, 10, 0)'
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
    <script type="module">
        // Contoh struktur data dari API
        const mockApi = {
            shortAnswer: [
                // Set 1
                [{
                        id: 1,
                        question: "Ich __ nach __ Schule.",
                        answers: ["gehe", "der"],
                        blanks: 2,
                        fullSentence: "Ich gehe nach der Schule."
                    },
                    {
                        id: 2,
                        question: "Mein Bruder __ Deutsch.",
                        answers: ["lernt"],
                        blanks: 1,
                        fullSentence: "Mein Bruder lernt Deutsch."
                    },
                    {
                        id: 3,
                        question: "Wir __ im __ Restaurant.",
                        answers: ["essen", "dem"],
                        blanks: 2,
                        fullSentence: "Wir essen im dem Restaurant."
                    }
                ],
                // Set 2
                [{
                        id: 1,
                        question: "Sie __ ein __ Buch.",
                        answers: ["liest", "neues"],
                        blanks: 2,
                        fullSentence: "Sie liest ein neues Buch."
                    },
                    {
                        id: 2,
                        question: "Der Hund __ im Park.",
                        answers: ["spielt"],
                        blanks: 1,
                        fullSentence: "Der Hund spielt im Park."
                    },
                    {
                        id: 3,
                        question: "Wir __ __ Kaffee.",
                        answers: ["trinken", "den"],
                        blanks: 2,
                        fullSentence: "Wir trinken den Kaffee."
                    }
                ]
            ],
            multipleChoice: [
                // Set 1
                [{
                        id: 1,
                        question: "Wie __ du?",
                        options: ["heißt", "heißen", "heißet", "heißest"],
                        correctAnswer: 0,
                        fullSentence: "Wie heißt du?"
                    },
                    {
                        id: 2,
                        question: "Ich __ aus Deutschland.",
                        options: ["komme", "kommst", "kommen", "kommt"],
                        correctAnswer: 0,
                        fullSentence: "Ich komme aus Deutschland."
                    },
                    {
                        id: 3,
                        question: "__ du Hunger?",
                        options: ["Hast", "Haben", "Hat", "Habt"],
                        correctAnswer: 0,
                        fullSentence: "Hast du Hunger?"
                    }
                ],
                // Set 2
                [{
                        id: 1,
                        question: "Er __ Fußball.",
                        options: ["spielt", "spielst", "spielen", "spiele"],
                        correctAnswer: 0,
                        fullSentence: "Er spielt Fußball."
                    },
                    {
                        id: 2,
                        question: "__ ihr heute Zeit?",
                        options: ["Habt", "Hast", "Haben", "Hat"],
                        correctAnswer: 0,
                        fullSentence: "Habt ihr heute Zeit?"
                    },
                    {
                        id: 3,
                        question: "Das Wetter __ schön.",
                        options: ["ist", "bin", "sind", "bist"],
                        correctAnswer: 0,
                        fullSentence: "Das Wetter ist schön."
                    }
                ]
            ]
        };
        let currentSet = 0;
        let currentType = '';
        $('.custom-btn').click(function(e) {
            e.preventDefault();
            $('#q').toggleClass('active');

        });

        $(document).ready(function() {
            $('.quiz-type-selection').show();
            $('#quiz-container').hide();
        });

        // function loadQuiz(type) {
        //     currentType = type;
        //     const questions = type === 'short' ? mockApi.shortAnswer[currentSet] : mockApi.multipleChoice[currentSet];
        //     renderQuiz(type, questions);
        // }

        // function nextQuestions() {
        //     currentSet++;
        //     if (currentSet >= mockApi[currentType === 'short' ? 'shortAnswer' : 'multipleChoice'].length) {
        //         currentSet = 0;
        //     }
        //     const questions = currentType === 'short' ? mockApi.shortAnswer[currentSet] : mockApi.multipleChoice[currentSet];
        //     renderQuiz(currentType, questions);

        //     // Reset tampilan
        //     $('.answer').hide();
        //     $('.finish-btn').show();
        //     $('.next-btn').remove();
        //     $('.answer-input').css('color', '');
        //     $('.option').removeClass('selected incorrect');
        // }
        // Close button handler
        $(document).on('click', '.close-btn', function() {
            $('#q').removeClass('active');
        });

        // Back button handler 
        $(document).on('click', '.back-btn:not(.loadQuiz)', function() {
            goBack();
        });

        // Finish button handler
        $(document).on('click', '.finish-btn', function() {
            showAnswers();
        });

        // Next button handler (for dynamically added button)
        $(document).on('click', '.next-btn', function() {
            nextQuestions();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.loadQuiz').click(function(e) {
            const type = $(this).data('data');
            loadQuiz(type)
        });

        function loadQuiz(type) {
            $('#q .loading').css('display', 'flex');
            currentType = type;
            $.ajax({
                url: `/gramatik/practice`,
                method: 'POST',
                data: {
                    type: type,
                    materi: $('#materi').data('materi'),
                    kapital: $('#materi').data('kapital'),
                },
                success: function(response) {
                    if (response.success) {
                        renderQuiz(type, response.data); // Wrap dalam array karena API mengembalikan satu soal
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error loading questions:', error);
                },
                complete: function() {
                    $('#q .loading').hide();
                }
            });
        }

        function nextQuestions() {
            $('#q .loading').css('display', 'flex');
            $.ajax({
                url: `/gramatik/practice`,
                method: 'POST',
                data: {
                    type: currentType,
                    materi: $('#materi').data('materi'),
                    kapital: $('#materi').data('kapital'),
                },
                success: function(response) {
                    if (response.success) {
                        renderQuiz(currentType, response.data);

                        // Reset tampilan
                        $('.answer').hide();
                        $('.finish-btn').show();
                        $('.next-btn').remove();
                        $('.answer-input').css('color', '');
                        $('.option').removeClass('selected incorrect');
                    }

                },
                error: function(xhr, status, error) {
                    console.error('Error loading next questions:', error);
                },
                complete: function() {
                    $('#q .loading').hide();
                }
            });
        }

        function renderQuiz(type, questions) {
            questions = JSON.parse(questions);
            $('.quiz-type-selection').hide();
            $('#quiz-container').show();
            let html = '';

            if (type === 'short') {
                questions.forEach(q => {
                    html += generateShortAnswerHTML(q);
                });
            } else {
                questions.forEach(q => {
                    html += generateMultipleChoiceHTML(q);
                });
            }

            $('#questions').html(html);
            setupEventListeners();
        }

        function generateShortAnswerHTML(question) {
            const words = question.question.split('...');
            let html = `
            <div class="question-block">
                <div class="question">
                    <span>${question.id}. `;

            let answerIndex = 0;
            for (let i = 0; i < words.length; i++) {
                html += words[i];
                if (i < words.length - 1) {
                    // Tambahkan data-correct untuk setiap input
                    html += `<input type="text" class="answer-input" data-correct="${question.answers[answerIndex]}">`;
                    answerIndex++;
                }
            }

            html += `</span>
                </div>
                <div class="answer">
                    <div class="answer-text">Jawaban: ${question.answers.join(', ')}</div>
                    <div class="full-sentence">Kalimat lengkap: ${question.fullSentence}</div>
                </div>
            </div>`;

            return html;
        }

        function generateMultipleChoiceHTML(question) {
            return `
            <div class="question-block">
                <div class="question">
                    <span>${question.id}. ${question.question}</span>
                </div>
                <div class="multiple-choice">
                    ${question.options.map((option, index) => `
                                                                                                                                                            <div class="option" data-correct="${index === question.correctAnswer}">
                                                                                                                                                                ${option}
                                                                                                                                                            </div>
                                                                                                                                                        `).join('')}
                </div>
                <div class="answer">
                    <div class="answer-text">Jawaban: ${question.options[question.correctAnswer]}</div>
                    <div class="full-sentence">Kalimat lengkap: ${question.fullSentence}</div>
                </div>
            </div>`;
        }

        function setupEventListeners() {
            $('.option').click(function() {
                $(this).siblings().removeClass('selected');
                $(this).addClass('selected');
            });
        }

        function showAnswers() {
            $('.answer').show();
            $('.finish-btn').hide();

            // Use jQuery to create and append next button
            $('<button>')
                .addClass('next-btn')
                .text('Next')
                .appendTo('.buttons');

            // Check short answer inputs
            $('.answer-input').each(function() {
                const correctAnswer = $(this).data('correct');
                const userAnswer = $(this).val().toLowerCase();
                if (userAnswer === correctAnswer.toLowerCase()) {
                    $(this).css('color', '#4CAF50');
                } else {
                    $(this).css('color', '#f44336');
                }
            });

            // Check multiple choice options
            $('.option.selected').each(function() {
                const isCorrect = $(this).data('correct') === true;
                if (isCorrect) {
                    $(this).addClass('selected').css('background', '#e8f5e9');
                } else {
                    $(this).addClass('incorrect');
                }
            });
        }

        // Dan tambahkan reset warna saat kembali ke menu
        function goBack() {
            $('#quiz-container').hide();
            $('.quiz-type-selection').show();
            $('#questions').empty();
            $('.answer-input').css('color', '');
            $('.option').removeClass('selected incorrect');
            $('.finish-btn').show();
            $('.next-btn').remove();
            currentSet = 0;
        }
        // Contoh cara menggunakan dengan API asli:
        /*
        async function loadQuiz(type) {
            try {
                const response = await fetch(`/api/questions/${type}`);
                const questions = await response.json();
                renderQuiz(type, questions);
            } catch (error) {
                console.error('Error loading questions:', error);
            }
        }
        */
    </script>
</body>

</html>
