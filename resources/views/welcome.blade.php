<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>German Quiz</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .quiz-type-selection,
        .result-container {
            display: none;
        }

        .question-block {
            margin-bottom: 30px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .question {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .question span {
            font-size: 18px;
        }

        input[type="text"] {
            width: 120px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .multiple-choice {
            display: grid;
            gap: 10px;
            margin: 10px 0;
        }

        .option {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .option:hover {
            background: #f5f5f5;
        }

        .option.selected {
            background: #e8f5e9;
            border-color: #4CAF50;
        }

        .answer {
            margin-top: 10px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 4px;
            display: none;
        }

        .answer-text {
            font-weight: bold;
            color: #4CAF50;
        }

        .full-sentence {
            color: #666;
            margin-top: 5px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .back-btn,
        .finish-btn,
        .next-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            color: white;
            transition: background 0.3s;
        }

        .back-btn {
            background: #666;
        }

        .finish-btn {
            background: #4CAF50;
            margin-left: auto;
        }

        .next-btn {
            background: #2196F3;
        }

        @media (max-width: 480px) {
            .container {
                width: 95%;
                padding: 1rem;
            }

            .question span {
                font-size: 16px;
            }

            input[type="text"] {
                width: 100px;
            }
        }

        .incorrect {
            background: #ffebee !important;
            border-color: #f44336 !important;
            color: #f44336;
        }

        input[type="text"].incorrect {
            border-color: #f44336;
            color: #f44336;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="quiz-type-selection">
            <h2>Pilih Jenis Soal</h2>
            <div class="buttons">
                <button onclick="loadQuiz('short')" class="back-btn">Jawaban Singkat</button>
                <button onclick="loadQuiz('multiple')" class="back-btn">Pilihan Ganda</button>
            </div>
        </div>

        <div id="quiz-container" style="display:none;">
            <div id="questions"></div>
            <div class="buttons">
                <button class="back-btn" onclick="goBack()">Back</button>
                <button class="finish-btn" onclick="showAnswers()">Finish</button>
            </div>
        </div>
    </div>

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

        function loadQuiz(type) {
            currentType = type;
            const questions = type === 'short' ? mockApi.shortAnswer[currentSet] : mockApi.multipleChoice[currentSet];
            renderQuiz(type, questions);
        }

        function nextQuestions() {
            currentSet++;
            if (currentSet >= mockApi[currentType === 'short' ? 'shortAnswer' : 'multipleChoice'].length) {
                currentSet = 0;
            }
            const questions = currentType === 'short' ? mockApi.shortAnswer[currentSet] : mockApi.multipleChoice[currentSet];
            renderQuiz(currentType, questions);

            // Reset tampilan
            $('.answer').hide();
            $('.finish-btn').show();
            $('.next-btn').remove();
            $('.answer-input').css('color', '');
            $('.option').removeClass('selected incorrect');
        }

        function renderQuiz(type, questions) {
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

        $(document).ready(function() {
            $('.quiz-type-selection').show();
            $('#quiz-container').hide();
        });
    </script>
</body>

</html>
