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
            margin-top: 1rem;
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
    </style>
</head>
<body>
    <div class="container" data-aos="fade-up">
        <div class="progress-bar"></div>
        <div>
            <button class="favorite-only" id="toggleFavoriteBtn">Show Favorites Only ❤</button>
            <div class="score">0/{{ count($vocabularies) }}</div>
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
                    showNextFavoriteCard();
                } else {
                    $('.card').hide();
                    $('.score').text('0/0');
                }
            } else {
                showCard(currentIndex);
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
                        target.append(`<span class="favorite-emote">❤</span>`);
                    } else {
                        target.find('.favorite-emote').remove();
                    }
                    
                    updateFavoritesList();
                    if (showFavoritesOnly && favoriteCards.length === 0) {
                        $('.card').hide();
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