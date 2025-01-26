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
            z-index: 1;
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
</head>

<body>
    <button class="custom-btn">Quiz by AI</button>
    <div id="q">
        <div class="container">
            <button class="close-btn" onclick="$('#q').removeClass('active')">&times;</button>
            <div class="quiz-type-selection">
                <h2>Pilih Jenis Soal</h2>
                <div class="buttons">
                    <button onclick="loadQuiz('short')" class="back-btn">Jawaban Singkat</button>
                    <button onclick="loadQuiz('multiple')" class="back-btn">Pilihan Ganda</button>
                </div>
            </div>
            <div class="loading">
                <div class="loading-spinner"></div>
            </div>

            <div id="quiz-container" style="display:none; position: relative;">
                {{-- <button class="close-btn" onclick="$('#q').removeClass('active')">&times;</button> --}}
                <div id="questions"></div>
                <div class="buttons">
                    <button class="back-btn" onclick="goBack()">Back</button>
                    <button class="finish-btn" onclick="showAnswers()">Finish</button>
                </div>
            </div>
        </div>
    </div>
    <div id="materi" data-materi={{ $gramatik->title }} data-kapital={{ $gramatik->kapital }}></div>
    {!! $gramatik->html !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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
            // Menampilkan kunci jawaban
            $('.answer').show();

            // Sembunyikan tombol finish
            $('.finish-btn').hide();

            // Tambahkan tombol next
            $('.buttons').append('<button class="next-btn" onclick="nextQuestions()">Next</button>');

            // Cek jawaban singkat
            $('.answer-input').each(function() {
                const correctAnswer = $(this).data('correct');
                const userAnswer = $(this).val().toLowerCase();
                if (userAnswer === correctAnswer.toLowerCase()) {
                    $(this).css('color', '#4CAF50');
                } else {
                    $(this).css('color', '#f44336');
                }
            });

            // Cek jawaban pilihan ganda
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
            // Reset warna dan state
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
