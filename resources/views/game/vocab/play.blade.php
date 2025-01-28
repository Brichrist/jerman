<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>German Vocabulary Game</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #6c5ce7, #a363d9);
            padding: 1rem;
            touch-action: manipulation;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 1.5rem;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 380px;
            position: relative;
            overflow: hidden;
        }

        .card {
            min-height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            position: relative;
        }

        .card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: #6c5ce7;
            border-radius: 2px;
        }

        .german-word {
            font-size: 2.4rem;
            color: #2d3436;
            margin-bottom: 1.5rem;
            font-weight: 700;
            text-align: center;
            line-height: 1.2;
        }

        .indonesian-word {
            font-size: 2rem;
            color: #6c5ce7;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-align: center;
            line-height: 1.4;
        }

        .indonesian-word.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.8rem;
            padding: 0.5rem;
            margin-top: 0.5rem;
        }

        button {
            padding: 1rem;
            border: none;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            touch-action: manipulation;
            position: relative;
            overflow: hidden;
        }

        .favorite-only {
            background: white;
            color: #ff7675;
            border: 2px solid #ff7675;
            margin-bottom: 1rem;
            width: fit-content;
            padding: 0.5rem 1.5rem;
        }

        .favorite-only.active {
            background: #ff7675;
            color: white;
        }

        button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.5s;
        }

        button:active::after {
            transform: translate(-50%, -50%) scale(2);
        }

        #revealBtn {
            background: #6c5ce7;
            color: white;
        }

        #nextBtn {
            background: #00b894;
            color: white;
        }

        #favoriteBtn {
            background: #ff7675;
            color: white;
        }

        .progress-bar {
            position: absolute;
            top: 0;
            left: 0;
            height: 4px;
            background: #6c5ce7;
            transition: width 0.3s ease;
        }

        .score {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(108, 92, 231, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            color: #6c5ce7;
            font-weight: 600;
        }

        .favorite-emote {
            font-size: 1.5rem;
            margin-left: 0.5rem;
            color: #ff7675;
        }

        @media (max-width: 380px) {
            .german-word {
                font-size: 2rem;
            }

            .indonesian-word {
                font-size: 1.8rem;
            }

            button {
                padding: 0.8rem;
                font-size: 0.8rem;
            }
        }

        /* Tambahkan di bagian style */
        .list-mode {
            display: none;
            width: 100%;
        }

        .list-mode table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .list-mode th,
        .list-mode td {
            padding: 0.8rem;
            border: 1px solid #ddd;
            text-align: left;
        }

        .list-mode th {
            background: #6c5ce7;
            color: white;
        }

        .list-mode tr:nth-child(even) {
            background: #f5f5f5;
        }

        .control-buttons {
            justify-content: space-between;
            display: flex;
            gap: 0.8rem;
            margin-bottom: 1rem;
        }

        #backBtn,
        #listModeBtn {
            background: #636e72;
            color: white;
            padding: 0.5rem 1.5rem;
        }

        .list-mode td.favorite {
            color: #ff7675;
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
    <style>
        .edit-form {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .edit-overlay {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            width: 90%;
            max-width: 400px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .edit-input {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }

        .form-buttons {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        .save-btn,
        .cancel-btn {
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
        }

        .save-btn {
            background: #4CAF50;
            color: white;
        }

        .cancel-btn {
            background: #f44336;
            color: white;
        }

        #editBtn {
            background: #2196F3;
            color: white;
        }

        .list-controls {
            margin: 10px 0;
            display: flex;
            gap: 10px;
            justify-content: space-between;
        }

        .list-controls button {
            background: #636e72;
            color: white;
            padding: 0.5rem 1rem;
        }

        .hidden-cell {
            color: transparent;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.05);
        }

        .hidden-cell:hover {
            background: rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body>
    <div class="container" data-aos="fade-up">
        <div class="progress-bar"></div>
        <div>
            <button class="favorite-only" id="toggleFavoriteBtn">Show Favorites Only ❤</button>
            <div class="score">0/{{ count($vocabularies) }}</div>
        </div>
        <div class="control-buttons">
            <button id="backBtn">Back</button>
            <button id="editBtn">Edit</button>
            <button id="listModeBtn">List Mode</button>
        </div>
        <div class="edit-form" style="display: none;">
            <div class="edit-overlay">
                <form id="editForm">
                    <div class="form-group">
                        <label>{{ $language === 'indo' ? 'Indonesian Word:' : 'German Word:' }}</label>
                        <input type="text" id="editGerman" class="edit-input">
                    </div>
                    <div class="form-group">
                        <label>{{ $language === 'indo' ? 'German Meaning:' : 'Indonesian Meaning:' }}</label>
                        <input type="text" id="editIndonesian" class="edit-input">
                    </div>
                    <div class="form-buttons">
                        <button type="button" id="cancelEdit" class="cancel-btn">Cancel</button>
                        <button type="submit" class="save-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="vocab-pages">
            @foreach ($vocabularies as $index => $vocabulary)
                <div class="card" data-index="{{ $index }}" style="display: none;">
                    @php
                        if ($language === 'indo') {
                            $text2 = $vocabulary->german_word;
                            $text1 = $vocabulary->meaning;
                        } else {
                            $text1 = $vocabulary->german_word;
                            $text2 = $vocabulary->meaning;
                        }
                    @endphp
                    <div class="german-word floating">
                        {{ $text1 }}
                        @if ($vocabulary->linkfavorite->count() > 0)
                            <span class="favorite-emote">❤</span>
                        @endif
                    </div>
                    <div class="indonesian-word">{{ $text2 }}</div>
                    <div style="display: none" class="id-vocab">{{ $vocabulary->id }}</div>
                </div>
            @endforeach
        </div>
        <div style="text-align: center; margin-top: 10px">
            ({{ $vocabulary->kapital }})
        </div>
        <div class="list-mode">
            <div class="list-controls" style="display: none;">
                <button id="hideLeftBtn">Hide Left</button>
                <button id="hideRightBtn">Hide Right</button>
                <button id="showAllBtn">Show All</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>German</th>
                        <th>Indonesian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vocabularies as $vocabulary)
                        <tr>
                            <td class="german-column {{ $vocabulary->linkfavorite->count() > 0 ? 'favorite' : '' }}">
                                {{ $vocabulary->german_word }}
                                @if ($vocabulary->linkfavorite->count() > 0)
                                    <span class="favorite-emote">❤</span>
                                @endif
                            </td>
                            <td class="indonesian-column">{{ $vocabulary->meaning }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="buttons">
            <button id="revealBtn" data-aos="fade-up" data-aos-delay="200">
                <span class="button-text">Reveal</span>
            </button>
            <button id="nextBtn" data-aos="fade-up" data-aos-delay="300">
                <span class="button-text">Next</span>
            </button>
            <button id="favoriteBtn" data-aos="fade-up" data-aos-delay="400">
                <span class="button-text">❤</span>
            </button>
        </div>
    </div>
    <script>
        // Tambahkan di bagian inisialisasi
        $(document).ready(function() {
            $('.quiz-type-selection').show();
            $('#quiz-container').hide();
            $('.list-controls').hide();
        });

        // Tambahkan variabel untuk menyimpan data saat ini
        let currentWord = '';
        let currentId = '';
        let currentMeaning = '';

        // Handler untuk tombol edit
        $('#editBtn').on('click', function() {
            currentId = $('.card:visible .id-vocab').text();

            // Tentukan posisi bahasa berdasarkan mode
            const isIndonesianMode = '{{ $language }}' === 'indo';

            if (isIndonesianMode) {
                // Jika mode indo, text1 adalah bahasa Indonesia, text2 adalah bahasa Jerman
                currentMeaning = $('.card:visible .german-word').text().trim().replace('❤', '');
                currentWord = $('.card:visible .indonesian-word').text().trim();
            } else {
                // Jika mode german, text1 adalah bahasa Jerman, text2 adalah bahasa Indonesia
                currentWord = $('.card:visible .german-word').text().trim().replace('❤', '');
                currentMeaning = $('.card:visible .indonesian-word').text().trim();
            }

            // Isi form sesuai bahasa
            $('#editGerman').val(currentMeaning); // text2 jika indo mode
            $('#editIndonesian').val(currentWord); // text1 jika indo mode
            $('.edit-form').css('display', 'flex');
        });

        // Handler untuk cancel
        $('#cancelEdit').on('click', function() {
            $('.edit-form').hide();
        });

        // Handler untuk submit form
        $('#editForm').on('submit', function(e) {
            e.preventDefault();
            const newGerman = $('#editGerman').val();
            const newIndonesian = $('#editIndonesian').val();
            const isIndonesianMode = '{{ $language }}' === 'indo';

            $.ajax({
                url: '/updateVocab',
                method: 'POST',
                data: JSON.stringify({
                    id: currentId,
                    german_word: newGerman,
                    meaning: newIndonesian,
                    _token: '{{ csrf_token() }}'
                }),
                contentType: 'application/json',
                success: function(response) {
                    if (response.success) {
                        let targetCard = $('.card:visible');
                        let isFavorite = targetCard.find('.favorite-emote').length ? '<span class="favorite-emote">❤</span>' : '';

                        // Update UI berdasarkan mode bahasa
                        if (isIndonesianMode) {
                            // Update text1 (Indonesian) dan text2 (German)
                            targetCard.find('.german-word').html(newGerman + isFavorite);
                            targetCard.find('.indonesian-word').text(newIndonesian);
                        } else {
                            // Update text1 (German) dan text2 (Indonesian)
                            targetCard.find('.german-word').html(newGerman + isFavorite);
                            targetCard.find('.indonesian-word').text(newIndonesian);
                        }

                        // Update list mode
                        let targetRow = $(`.list-mode tr td:contains('${currentWord}')`).parent();
                        if (isIndonesianMode) {
                            targetRow.find('td:first').html(newIndonesian + isFavorite);
                            targetRow.find('td:last').text(newGerman);
                        } else {
                            targetRow.find('td:first').html(newGerman + isFavorite);
                            targetRow.find('td:last').text(newIndonesian);
                        }

                        $('.edit-form').hide();
                        alert('Word updated successfully!');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Failed to update word. Please try again.');
                }
            });
        });

        // Close form ketika klik di luar
        $('.edit-form').on('click', function(e) {
            if (e.target === this) {
                $(this).hide();
            }
        });
    </script>
    <script>
        // Tambahkan di bagian script
        let isListMode = false;

        $('#backBtn').on('touchstart click', function(e) {
            e.preventDefault();
            if (currentIndex > 0) {
                currentIndex--;
                if (showFavoritesOnly) {
                    showNextFavoriteCard();
                } else {
                    showCard(currentIndex);
                    updateProgressBar('normal');
                }
            }
        });

        // Modifikasi listModeBtn handler
        $('#listModeBtn').on('touchstart click', function(e) {
            e.preventDefault();
            isListMode = !isListMode;

            if (isListMode) {
                $('.vocab-pages, .buttons').hide();
                $('.list-mode, .list-controls').show();
                $(this).text('Card Mode');
                $('#backBtn, #editBtn').hide();
            } else {
                $('.vocab-pages, .buttons').show();
                $('.list-mode, .list-controls').hide();
                $(this).text('List Mode');
                $('#backBtn, #editBtn').show();
            }
        });

        // Handler untuk hide left column
        $('#hideLeftBtn').on('click', function() {
            $('.list-mode table td:first-child').each(function() {
                $(this).addClass('hidden-cell');
            });
        });

        // Handler untuk hide right column
        $('#hideRightBtn').on('click', function() {
            $('.list-mode table td:last-child').each(function() {
                $(this).addClass('hidden-cell');
            });
        });

        // Handler untuk show all
        $('#showAllBtn').on('click', function() {
            $('.list-mode table td').removeClass('hidden-cell');
        });

        // Handler untuk toggle individual cell
        $('.list-mode table td').on('click', function() {
            if ($(this).hasClass('hidden-cell')) {
                $(this).removeClass('hidden-cell');
            } else {
                $(this).addClass('hidden-cell');
            }
        });

        // Modifikasi fungsi showCard
        function showCard(index) {
            if (isListMode) return;
            $('.card').hide();
            $(`.card[data-index="${index}"]`).show();
            $('.indonesian-word').removeClass('revealed');
        }
    </script>

    <script>
        let currentIndex = 0;
        const totalCards = document.querySelectorAll('.card').length;
        let showFavoritesOnly = false;
        let favoriteCards = [];

        function updateFavoritesList() {
            favoriteCards = Array.from(document.querySelectorAll('.card')).filter(card =>
                card.querySelector('.favorite-emote') !== null
            ).map(card => parseInt(card.dataset.index));
        }

        $('#toggleFavoriteBtn').on('touchstart click', function(e) {
            e.preventDefault();
            showFavoritesOnly = !showFavoritesOnly;
            $(this).toggleClass('active');

            updateFavoritesList();
            currentIndex = 0;

            if (showFavoritesOnly) {
                if (favoriteCards.length > 0) {
                    // Update untuk card mode
                    showNextFavoriteCard();

                    // Update untuk list mode
                    $('.list-mode tbody tr').hide(); // Sembunyikan semua row
                    $('.list-mode td .favorite-emote').each(function() {
                        $(this).closest('tr').show(); // Tampilkan row yang memiliki favorite
                    });
                } else {
                    $('.card').hide();
                    $('.list-mode tbody tr').hide();
                    $('.score').text('0/0');
                }
            } else {
                showCard(currentIndex);
                $('.list-mode tbody tr').show(); // Tampilkan semua row
                updateProgressBar('normal');
            }
        });

        function showNextFavoriteCard() {
            if (favoriteCards.length === 0) return;

            currentIndex = favoriteCards[currentIndex % favoriteCards.length];
            showCard(currentIndex);
            updateProgressBar('favorite');
        }

        function updateProgressBar(type) {
            if (type === 'favorite') {
                const currentFavoriteIndex = favoriteCards.indexOf(currentIndex);
                $('.score').text(`${currentFavoriteIndex + 1}/${favoriteCards.length}`);
                const progress = ((currentFavoriteIndex + 1) / favoriteCards.length) * 100;
                $('.progress-bar').css('width', `${progress}%`);
            } else {
                $('.score').text(`${currentIndex + 1}/${totalCards}`);
                const progress = ((currentIndex + 1) / totalCards) * 100;
                $('.progress-bar').css('width', `${progress}%`);
            }
        }

        function showCard(index) {
            $('.card').hide();
            $(`.card[data-index="${index}"]`).show();
            $('.indonesian-word').removeClass('revealed');
        }

        $('#revealBtn').on('touchstart click', function(e) {
            e.preventDefault();
            $('.card:visible .indonesian-word').toggleClass('revealed');
        });

        $('#nextBtn').on('touchstart click', function(e) {
            e.preventDefault();
            if (showFavoritesOnly) {
                currentIndex = (favoriteCards.indexOf(currentIndex) + 1) % favoriteCards.length;
                showNextFavoriteCard();
            } else {
                currentIndex = (currentIndex + 1) % totalCards;
                showCard(currentIndex);
                updateProgressBar('normal');
            }
        });

        $('#favoriteBtn').on('touchstart click', function(e) {
            e.preventDefault();
            const currentWord = {
                id: $('.card:visible .id-vocab').text(),
                _token: '{{ csrf_token() }}'
            };
            let target = $('.card:visible .german-word');
            let germanWord = target.text().trim().replace('❤', '');

            $.ajax({
                url: '/vocab/favorite',
                method: 'POST',
                data: JSON.stringify(currentWord),
                contentType: 'application/json',
                success: function(response) {
                    $('#favoriteBtn').addClass('animate__animated animate__heartBeat');
                    setTimeout(() => {
                        $('#favoriteBtn').removeClass('animate__animated animate__heartBeat');
                    }, 1000);

                    if (response.action == 'add') {
                        // Update di card mode
                        target.append(`<span class="favorite-emote">❤</span>`);

                        // Update di list mode (selalu di kolom bahasa Jerman)
                        let listCell = $(`.list-mode .german-column:contains('${germanWord}')`);
                        listCell.addClass('favorite');
                        listCell.append(`<span class="favorite-emote">❤</span>`);
                    } else {
                        // Update di card mode
                        target.find('.favorite-emote').remove();

                        // Update di list mode (selalu di kolom bahasa Jerman)
                        let listCell = $(`.list-mode .german-column:contains('${germanWord}')`);
                        listCell.removeClass('favorite');
                        listCell.find('.favorite-emote').remove();
                    }

                    updateFavoritesList();
                    if (showFavoritesOnly && favoriteCards.length === 0) {
                        $('.card').hide();
                        $('.list-mode tbody tr').hide();
                        $('.score').text('0/0');
                    }
                }
            });
        });

        // Initialize
        updateFavoritesList();
        AOS.init({
            duration: 1000,
            once: true
        });
        updateProgressBar('normal');
        showCard(0);
    </script>
</body>

</html>
