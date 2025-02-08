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
            grid-template-columns: repeat(4, 1fr);
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

        .buttons button {
            padding: 0.7rem !important;
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

        #speakBtn {
            background: #34495e;
            color: white;
        }

        .control-buttons button {
            padding: 0.7rem !important;
        }

        #backBtn,
        #listModeBtn {
            background: #636e72;
            color: white;
            padding: 0.5rem 1.5rem;
        }

        .list-mode td.favorite {
            /* color: #ff7675; */
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
    <style>
        /* Tambahkan atau update CSS berikut */
        .list-mode table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            table-layout: fixed;
            /* Penting untuk word wrap bekerja */
        }

        .list-mode tr.read {
            background-color: rgba(108, 92, 231, 0.1);
        }

        .list-mode tr.reading {
            background-color: rgba(108, 92, 231, 0.2);
            transition: background-color 0.3s ease;
        }

        .progress-indicator {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: #6c5ce7;
            width: 0;
            transition: width 0.3s ease;

            .list-mode th,
            .list-mode td {
                padding: 0.8rem;
                border: 1px solid #ddd;
                text-align: left;
                word-wrap: break-word;
                /* Memungkinkan word wrap */
                overflow-wrap: break-word;
                max-width: 0;
                /* Diperlukan untuk word wrap bekerja dengan table-layout: fixed */
            }

            /* Atur lebar kolom */
            .list-mode .german-column {
                width: 50%;
                /* Atau sesuaikan dengan kebutuhan */
            }

            .list-mode .indonesian-column {
                width: 50%;
                /* Atau sesuaikan dengan kebutuhan */
            }

            /* Pastikan emoji hati tidak wrap */
            .favorite-emote {
                display: inline-block;
                white-space: nowrap;
            }

            /* Optional: tambahkan hover state untuk meningkatkan UX */
            .list-mode tr:hover {
                background-color: rgba(108, 92, 231, 0.05);
            }

            .example-speaker {
                cursor: pointer;
                margin-left: 0.5rem;
                transition: transform 0.2s ease;
            }

            .example-speaker:hover {
                transform: scale(1.2);
            }

            /* .example-content .example {
            display: flex;
            align-items: center;
            justify-content: center;
        } */
    </style>
    <style>
        .example-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .example-modal.show {
            display: flex;
            opacity: 1;
        }

        .example-modal-content {
            background: white;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            max-height: 85vh;
            overflow-y: auto;
            padding: 2rem;
            position: relative;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            transform: scale(0.7);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .example-modal-content.show {
            transform: scale(1);
            opacity: 1;
        }

        .example-modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: #ff7675;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .example-modal-close:hover {
            background: #ff5252;
        }

        #exampleBtn {
            background: #2ecc71;
            color: white;
        }

        .example-content {
            text-align: center;
        }

        .example-content h2 {
            color: #6c5ce7;
            margin-bottom: 1rem;
        }

        .example-content .example-list {
            text-align: left;
            margin-top: 1rem;
        }

        .example-content .example-list li {
            margin-bottom: 0.5rem;
            padding: 0.5rem;
            background: rgba(108, 92, 231, 0.05);
            border-radius: 8px;
            list-style-type: none;
            text-align: center;
        }

        .example-content .example-list li strong {
            color: #6c5ce7;
            margin-right: 0.5rem;
        }

        .example-content .example-list li:hover {
            background: rgba(108, 92, 231, 0.1);
        }
    </style>
    <style>
        .audio-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: flex-start;
            padding-top: 50px;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .audio-modal.show {
            display: flex;
            opacity: 1;
        }

        .audio-modal-content {
            background: white;
            border-radius: 24px;
            width: 90%;
            max-width: 420px;
            padding: 2rem;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            transform: scale(0.7);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .audio-modal-content.show {
            transform: scale(1);
            opacity: 1;
        }

        .audio-modal-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .audio-modal-title {
            color: #6c5ce7;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .audio-modal-subtitle {
            color: #666;
            font-size: 0.9rem;
        }

        .audio-settings-group {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .audio-preview-group {
            text-align: center;
            background: #f0f0f0;
            width: 100%;
            min-height: 100px;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .preview-item {
            margin-bottom: 1.5rem;
        }

        .setting-item {
            margin-bottom: 1.5rem;
        }

        .setting-item:last-child {
            margin-bottom: 0;
        }

        .setting-label {
            display: block;
            color: #2d3436;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .setting-value {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .range-slider {
            flex: 1;
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 3px;
            background: #dfe6e9;
            outline: none;
        }

        .range-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #6c5ce7;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .range-slider::-webkit-slider-thumb:hover {
            transform: scale(1.1);
        }

        .range-value {
            min-width: 45px;
            padding: 0.3rem 0.8rem;
            background: #6c5ce7;
            color: white;
            border-radius: 12px;
            font-size: 0.85rem;
            text-align: center;
        }

        .option-group {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
        }

        .option-button {
            flex: 1;
            min-width: 100px;
            padding: 0.8rem;
            border: 2px solid #6c5ce7;
            background: white;
            color: #6c5ce7;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .option-button.active {
            background: #6c5ce7;
            color: white;
        }

        .option-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(108, 92, 231, 0.2);
        }

        .start-button {
            width: 100%;
            padding: 1rem;
            background: #6c5ce7;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 1.5rem;
        }

        .start-button:hover {
            background: #5a4bd1;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(108, 92, 231, 0.2);
        }

        .audio-modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #ff7675;
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 1rem;
        }

        .audio-modal-close:hover {
            background: #ff5252;
            transform: rotate(90deg);
        }

        /* Animation for active state */
        .option-button.active {
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(108, 92, 231, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(108, 92, 231, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(108, 92, 231, 0);
            }
        }

        .control-buttons-container {
            display: none;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .control-buttons-container.show {
            display: flex !important;
        }

        .control-buttons-container button {
            flex: 1;
        }

        .control-buttons-container {
            display: none;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        /* Pastikan start button dan control buttons bisa tampil bersamaan */
        .start-button,
        .control-buttons-container {
            opacity: 1;
            visibility: visible;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .resume-button,
        .restart-button {
            flex: 1;
            padding: 1rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .resume-button {
            background: #00b894;
            color: white;
        }

        .restart-button {
            background: #ff7675;
            color: white;
        }

        .resume-button:hover,
        .restart-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(108, 92, 231, 0.2);
        }

        .start-number-input {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ddd;
            border-radius: 12px;
            font-size: 1rem;
            text-align: center;
            margin-bottom: 1rem;
            transition: border-color 0.3s ease;
        }

        .start-number-input:focus {
            border-color: #6c5ce7;
            outline: none;
        }

        .start-number-input::-webkit-inner-spin-button,
        .start-number-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .start-number-input[type=number] {
            -moz-appearance: textfield;
        }

        .setting-error {
            color: #ff5252;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: none;
        }

        .score-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .score-modal.show {
            display: flex;
            opacity: 1;
        }

        .score-modal-content {
            background: white;
            border-radius: 20px;
            width: 90%;
            max-width: 320px;
            padding: 2rem;
            position: relative;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            transform: scale(0.7);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .score-modal-content.show {
            transform: scale(1);
            opacity: 1;
        }

        .score-input {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #6c5ce7;
            border-radius: 12px;
            font-size: 1rem;
            text-align: center;
            margin-bottom: 1rem;
            transition: border-color 0.3s ease;
        }

        .score-input:focus {
            outline: none;
            border-color: #5a4bd1;
        }

        .score-btn {
            width: 100%;
            padding: 1rem;
            background: #6c5ce7;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .score-btn:hover {
            background: #5a4bd1;
            transform: translateY(-2px);
        }

        .score-modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: #ff7675;
            color: white;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .score-modal-close:hover {
            background: #ff5252;
            transform: rotate(90deg);
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
            @if (auth()->user()->role === 'owner')
                <button id="editBtn">Edit</button>
            @endif
            <button id="exampleBtn">Example</button>
            <button id="listModeBtn">List Mode</button>
            <button id="playAudio" style="display: none">Play Audio</button>
        </div>
        <div class="score-modal" id="scoreModal">
            <div class="score-modal-content">
                <button class="score-modal-close" id="closeScoreModal">✕</button>
                <div class="audio-modal-header">
                    <h2 class="audio-modal-title">Go to Number</h2>
                </div>
                <input type="number" class="score-input" id="scoreInput" min="1" placeholder="Enter number">
                <button class="score-btn" id="goToScore">Go</button>
            </div>
        </div>
        <div class="audio-modal" id="audioModal">
            <div class="audio-modal-content">
                <button class="audio-modal-close" id="closeAudioModal">✕</button>
                <div class="audio-modal-header">
                    <h2 class="audio-modal-title">Audio Settings</h2>
                    <p class="audio-modal-subtitle">jika suara yang di hasilkan jelek (khususnya HP). coba lihat petunjuk penggunaan <a href="https://jerman.suralaya.web.id/forum-chat/1" target="_blank">di link ini</a> no 11</p>
                </div>

                <div class="audio-settings-group">
                    <div class="setting-item">
                        <label class="setting-label">Speech Rate</label>
                        <div class="setting-value">
                            <input type="range" id="rateSlider" class="range-slider" min="0.5" max="1.5" step="0.1" value="1">
                            <span class="range-value" id="rateValue">1.0x</span>
                        </div>
                    </div>

                    <div class="setting-item">
                        <label class="setting-label">Pause</label>
                        <div class="setting-value">
                            <input type="range" id="pauseSlider" class="range-slider" min="1" max="4" step="0.1" value="2">
                            <span class="range-value" id="pauseValue">2x</span>
                        </div>
                    </div>
                </div>

                <div class="setting-item">
                    <label class="setting-label">What to read?</label>
                    <div class="option-group">
                        <button class="option-button active" data-option="german">German</button>
                        <button class="option-button" data-option="indonesia">Bahasa</button>
                        <button class="option-button" data-option="example">Example</button>
                    </div>
                </div>

                <div class="audio-preview-group">
                    <div class="preview-item">
                        <span class="number"></span>
                    </div>
                    <div class="preview-item">
                        <span class="jerman"></span>
                        <span class="indo"></span>
                    </div>
                    <div class="preview-item">
                        <span class="sample"></span>
                    </div>
                </div>
                <div class="setting-item">
                    <label class="setting-label">Start from number</label>
                    <div class="setting-value">
                        <input type="number" id="startNumber" class="start-number-input" min="1" placeholder="Enter start number">
                    </div>
                    <div class="setting-error" id="numberError">Please enter a valid number between 1 and total words</div>
                </div>
                <button class="start-button" id="startAudio">
                    Start Reading ▶
                </button>
                <div class="control-buttons-container" id="controlButtons">
                    <button class="restart-button" id="restartButton">Restart 🔄</button>
                    <button class="resume-button" id="resumeButton">Resume ▶</button>
                </div>
            </div>
        </div>
        <div class="example-modal" id="exampleModal">
            <div class="example-modal-content">
                <button class="example-modal-close" id="closeExampleModal">✕</button>
                <div class="example-content">
                    <h2>Example</h2>
                    <div class="example-list">
                        <ul>
                            <li><strong class="word"></strong></li>
                            <li class="example"></li>
                        </ul>
                    </div>
                    <div class="example-speaker">🔊</div>
                </div>
            </div>
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
        @php
            $kapital;
        @endphp

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
                        $kapital = $vocabulary->kapital;

                    @endphp
                    <div class="german-word floating">
                        {{ $text1 }}
                        @if ($vocabulary->linkfavorite->count() > 0)
                            <span class="favorite-emote">❤</span>
                        @endif
                    </div>
                    <div class="indonesian-word">{{ $text2 }}</div>
                    <div style="display: none" class="id-vocab">{{ $vocabulary->id }}</div>
                    <div style="display: none" class="example-vocab">{{ $vocabulary->example }}</div>
                    <div style="display: none" class="german-vocab">{{ $vocabulary->german_word }}</div>
                </div>
            @endforeach
        </div>
        <div style="text-align: center; margin: 20px 0">
            ({{ $kapital ?? null }})
        </div>
        <div class="list-mode">
            <hr>
            <div class="list-controls" style="display: none;">
                <button id="hideLeftBtn">Hide Left</button>
                <button id="hideRightBtn">Hide Right</button>
                {{-- <button id="showAllBtn">Show All</button> --}}
            </div>
            <table>
                <thead>
                    <tr>
                        <th style="width: 50px">no</th>
                        <th>German</th>
                        <th>Indonesian</th>
                        <th style="display: none">example</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vocabularies as $vocabulary)
                        <tr>
                            <td style="width: 50px">{{ $loop->iteration }}</td>
                            <td class="german-column {{ $vocabulary->linkfavorite->count() > 0 ? 'favorite' : '' }}">
                                {{ $vocabulary->german_word }}
                                @if ($vocabulary->linkfavorite->count() > 0)
                                    <span class="favorite-emote">❤</span>
                                @endif
                            </td>
                            <td class="meaning">{{ $vocabulary->meaning }}</td>
                            <td style="display: none">{!! $vocabulary->example !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="buttons">
            <button id="speakBtn" data-aos-delay="500">
                <span class="button-text">🔊</span>
            </button>
            <button id="favoriteBtn" data-aos-delay="400">
                <span class="button-text">❤</span>
            </button>
            <button id="revealBtn" data-aos-delay="200">
                <span class="button-text">Reveal</span>
            </button>
            <button id="nextBtn" data-aos-delay="300">
                <span class="button-text">Next</span>
            </button>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Untuk reload dan close tab
            window.onbeforeunload = function(e) {
                e.preventDefault();
                return "Apakah Anda yakin ingin meninggalkan halaman ini?";
            };
            // Untuk tombol back
            window.onpopstate = function(e) {
                if (!confirm("Apakah Anda yakin ingin kembali?")) {
                    history.pushState(null, null, window.location.href);
                }
            };
            // Initial state
            history.pushState(null, null, window.location.href);
            $('#playAudio').on('click', function() {
                $('#audioModal').addClass('show');
                $('#audioRate').val(1);
                $('#audioRate').attr('data-audio', 'A');
                $('#audioRate').focus();
                setTimeout(() => {
                    $('.audio-modal-content').addClass('show');
                }, 50);
            });
        });
    </script>
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
                // Isi form sesuai bahasa
                $('#editGerman').val(currentMeaning); // text2 jika indo mode
                $('#editIndonesian').val(currentWord); // text1 jika indo mode
            } else {
                // Jika mode german, text1 adalah bahasa Jerman, text2 adalah bahasa Indonesia
                currentWord = $('.card:visible .german-word').text().trim().replace('❤', '');
                currentMeaning = $('.card:visible .indonesian-word').text().trim();
                // Isi form sesuai bahasa
                $('#editGerman').val(currentWord); // text2 jika indo mode
                $('#editIndonesian').val(currentMeaning); // text1 jika indo mode
            }


            $('.edit-form').css('display', 'flex');
        });

        // Handler untuk cancel
        $('#cancelEdit').on('click', function() {
            $('.edit-form').hide();
        });

        // Handler untuk submit form
        $('#editForm').on('submit', function(e) {
            e.preventDefault();
            const isIndonesianMode = '{{ $language }}' === 'indo';
            let newGerman = null;
            let newIndonesian = null;

            if (isIndonesianMode) {
                newGerman = $('#editIndonesian').val();
                newIndonesian = $('#editGerman').val();
            } else {
                newGerman = $('#editGerman').val();
                newIndonesian = $('#editIndonesian').val();
            }

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
                            targetCard.find('.german-word').html(newIndonesian + isFavorite);
                            targetCard.find('.indonesian-word').text(newGerman);
                        } else {
                            // Update text1 (German) dan text2 (Indonesian)
                            targetCard.find('.german-word').html(newGerman + isFavorite);
                            targetCard.find('.indonesian-word').text(newIndonesian);
                        }

                        // Update list mode
                        let targetRow = $(`.list-mode tr td:contains('${currentWord}')`).parent();
                        if (isIndonesianMode) {
                            targetRow.find('td.german-column').html(newIndonesian + isFavorite);
                            targetRow.find('td.meaning').text(newGerman);
                        } else {
                            targetRow.find('td.german-column').html(newGerman + isFavorite);
                            targetRow.find('td.meaning').text(newIndonesian);
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

        // $('#backBtn').on('touchstart click', function(e) {
        //     e.preventDefault();
        //     if (currentIndex > 0) {
        //         currentIndex--;
        //         if (showFavoritesOnly) {
        //             showNextFavoriteCard();
        //         } else {
        //             showCard(currentIndex);
        //             updateProgressBar('normal');
        //         }
        //     }
        // });
        $('#backBtn').on('touchstart click', function(e) {
            e.preventDefault();
            if (showFavoritesOnly) {
                currentIndex = (favoriteCards.indexOf(currentIndex) - 1) % favoriteCards.length;
                if (currentIndex >= 0) {
                    showNextFavoriteCard();
                } else {
                    currentIndex = favoriteCards.length - 1;
                    showNextFavoriteCard();
                }
            } else {
                currentIndex = (currentIndex - 1) % totalCards;
                if (currentIndex >= 0) {
                    showCard(currentIndex);
                    updateProgressBar('normal');
                } else {
                    currentIndex = totalCards - 1;
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
                $('#backBtn, #editBtn, #exampleBtn').hide();
                $('#playAudio').show();
            } else {
                $('.vocab-pages, .buttons').show();
                $('.list-mode, .list-controls').hide();
                $(this).text('List Mode');
                $('#backBtn, #editBtn, #exampleBtn').show();

                $('#playAudio').hide();
            }
        });

        // Handler untuk hide left column
        $('#hideLeftBtn').on('click', function() {
            const leftCells = $('.list-mode table td.german-column');
            const hiddenLeftCells = leftCells.filter('.hidden-cell').length;

            if (hiddenLeftCells >= leftCells.length / 2) {
                leftCells.removeClass('hidden-cell');
            } else {
                leftCells.addClass('hidden-cell');
            }
        });

        // Handler untuk hide right column
        $('#hideRightBtn').on('click', function() {
            const rightCells = $('.list-mode table td.meaning');
            const hiddenRightCells = rightCells.filter('.hidden-cell').length;

            if (hiddenRightCells >= rightCells.length / 2) {
                rightCells.removeClass('hidden-cell');
            } else {
                rightCells.addClass('hidden-cell');
            }
        });

        // Handler untuk show all
        // $('#showAllBtn').on('click', function() {
        //     $('.list-mode table td').removeClass('hidden-cell');
        // });

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
        $(document).ready(function() {
            // Speech synthesis
            const synth = window.speechSynthesis;
            // Example Modal Open
            $('#exampleBtn').on('click', function() {
                $('#exampleModal').addClass('show');
                const germanWord = $('.card:visible .german-vocab').text();
                const exampleText = $('.card:visible .example-vocab').text();

                $('.example-content .word').html(germanWord);
                $('.example-content .example').html(exampleText);

                // Add speaker icon to example text

                setTimeout(() => {
                    $('.example-modal-content').addClass('show');
                }, 50);
            });

            // Example speaker click event with explicit context
            let holdvoice = false
            $('.example-speaker').on('click', function(e) {
                console.log('Speaking example text');
                e.stopPropagation(); // Prevent modal from closing

                let textToSpeak = $('.example-content .example').text().replace('🔊', '').trim();

                // Check if speech synthesis is available
                if ('speechSynthesis' in window && !holdvoice) {
                    holdvoice = true
                    // Create a new speech utterance
                    const utterance = new SpeechSynthesisUtterance(textToSpeak);

                    // if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    //     utterance.lang = 'de_DE';
                    // } else {
                    //     utterance.lang = 'de-DE';
                    // }
                    utterance.lang = 'de-DE';


                    // Adjust speech parameters for better pronunciation
                    utterance.rate = 0.9; // Slightly slower speech
                    utterance.pitch = 1.0; // Normal pitch

                    // Speak the text
                    synth.speak(utterance);

                    setTimeout(() => {
                        holdvoice = false
                    }, 2000);
                } else {
                    console.log('Speech synthesis not supported');
                    if (!('speechSynthesis' in window)) {
                        alert('Text-to-speech is not supported in this browser');
                    }
                }
            });

            // Example Modal Close
            $('#closeExampleModal, #exampleModal, #audioModal').on('click', function(e) {
                // Close modal only if clicking on modal background or close button
                if (e.target === this || $(e.target).hasClass('example-modal-close')) {
                    $('.example-modal-content').removeClass('show');
                    setTimeout(() => {
                        $('#exampleModal').removeClass('show');
                    }, 300);
                }
                if (e.target === this || $(e.target).hasClass('audio-modal-close')) {
                    $('.audio-modal-content').removeClass('show');
                    setTimeout(() => {
                        $('#audioModal').removeClass('show');
                    }, 300);
                }
            });

            // Prevent modal content from closing when clicked
            $('.example-modal-content').on('click', function(e) {
                e.stopPropagation();
            });
        });
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
            if ($(this).data('disabled')) return;
            $(this).data('disabled', true);

            if (showFavoritesOnly) {
                currentIndex = (favoriteCards.indexOf(currentIndex) + 1) % favoriteCards.length;
                showNextFavoriteCard();
            } else {
                currentIndex = (currentIndex + 1) % totalCards;
                showCard(currentIndex);
                updateProgressBar('normal');
            }
            setTimeout(() => {
                $(this).data('disabled', false);
            }, 500);
        });
        // Ketika skor diklik
        $('.score').on('click', function() {
            $('#scoreModal').addClass('show');
            setTimeout(() => {
                $('.score-modal-content').addClass('show');
                $('#scoreInput').focus();
            }, 50);
        });

        // Tutup modal
        $('#closeScoreModal, #scoreModal').on('click', function(e) {
            if (e.target === this || $(e.target).hasClass('score-modal-close')) {
                $('.score-modal-content').removeClass('show');
                setTimeout(() => {
                    $('#scoreModal').removeClass('show');
                }, 300);
            }
        });

        // Mencegah modal menutup ketika konten diklik
        $('.score-modal-content').on('click', function(e) {
            e.stopPropagation();
        });

        // Handler untuk tombol Go
        $('#goToScore').on('click', function() {
            const targetNumber = parseInt($('#scoreInput').val());
            if (targetNumber && targetNumber > 0 && targetNumber <= totalCards) {
                currentIndex = targetNumber - 1;
                if (showFavoritesOnly) {
                    showNextFavoriteCard();
                } else {
                    showCard(currentIndex);
                    updateProgressBar('normal');
                }
                // Tutup modal
                $('.score-modal-content').removeClass('show');
                setTimeout(() => {
                    $('#scoreModal').removeClass('show');
                }, 300);
            } else {
                alert('Please enter a valid number between 1 and ' + totalCards);
            }
        });

        // Handler untuk enter key pada input
        $('#scoreInput').on('keypress', function(e) {
            if (e.which === 13) {
                $('#goToScore').click();
            }
        });

        $('#favoriteBtn').on('touchstart click', function(e) {
            e.preventDefault();
            const currentWord = {
                id: $('.card:visible .id-vocab').text(),
                id_user: '{{ auth()->user()->id }}',
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

                        // Update di list mode
                        let listCell = $(`.list-mode td:contains('${germanWord}')`);
                        if (!listCell.hasClass('german-column')) {
                            listCell = listCell.siblings('.german-column');
                        }
                        listCell.addClass('favorite');
                        listCell.append(`<span class="favorite-emote">❤</span>`);
                    } else {
                        // Update di card mode
                        target.find('.favorite-emote').remove();

                        // Update di list mode
                        let listCell = $(`.list-mode td:contains('${germanWord}')`);
                        if (!listCell.hasClass('german-column')) {
                            listCell = listCell.siblings('.german-column');
                        }
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
    <script>
        // Speech functionality
        $(document).ready(function() {
            const synth = window.speechSynthesis;
            let holdvoice = false
            $('#speakBtn').on('click', function() {
                if (!holdvoice) {
                    holdvoice = true

                    // Get the text to speak (remove the heart emoji if present)
                    let textToSpeak = $('.card:visible .german-vocab').text().replace('❤', '').trim();

                    // Create a new speech utterance
                    const utterance = new SpeechSynthesisUtterance(textToSpeak);

                    // if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    //     utterance.lang = 'de_DE';
                    // } else {
                    //     utterance.lang = 'de-DE';
                    // }
                    utterance.lang = 'de-DE';


                    // Adjust speech parameters for better pronunciation
                    utterance.rate = 1.0; // Slightly slower speech
                    utterance.pitch = 1.0; // Normal pitch

                    // Speak the text
                    synth.speak(utterance);
                    // Disable the button for 1 second to prevent multiple clicks
                    setTimeout(() => {
                        holdvoice = false
                    }, 2000);
                }

            });
        });
    </script>
    <script>
        window.speechSynthesis.onvoiceschanged = function() {
            const voices = window.speechSynthesis.getVoices();
            // console.log('Daftar Suara Tersedia:')
            voices.forEach((voice, index) => {
                // console.log(`${index + 1}. ${voice.name} - (${voice.lang})`);
            });


            let germanVoices = voices.filter(voice => voice.lang === 'de_DE');
            let text = ""
            germanVoices.forEach((voice, index) => {
                text += `${index + 1}. ${voice.name} - (${voice.lang})\n`
            });
            // alert(text)
        };
    </script>
    <script>
        // Script untuk audio functionality
        document.addEventListener('DOMContentLoaded', function() {
            // State variables
            let lastPosition = 0;
            const resumeButton = document.getElementById('resumeButton');
            const restartButton = document.getElementById('restartButton');
            const controlButtons = document.getElementById('controlButtons');
            const startButton = document.getElementById('startAudio');
            const synth = window.speechSynthesis;
            let isReading = false;
            let currentRow = null;

            // Initialize UI state
            controlButtons.style.display = 'none';
            document.getElementById('rateValue').textContent = '1.0x';
            document.getElementById('pauseValue').textContent = '2x';

            // Update slider values on input
            document.getElementById('rateSlider').addEventListener('input', function() {
                document.getElementById('rateValue').textContent = this.value + 'x';
            });

            document.getElementById('pauseSlider').addEventListener('input', function() {
                document.getElementById('pauseValue').textContent = this.value + 'x';
            });

            // Option buttons dengan multiple selection
            const optionButtons = document.querySelectorAll('.option-button');
            optionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.classList.toggle('active');
                });
            });

            function sleep(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }

            function createUtterance(text, lang, rate) {
                const utterance = new SpeechSynthesisUtterance(text);
                utterance.lang = lang;
                utterance.rate = rate;
                return utterance;
            }

            async function speakText(text, lang, rate) {
                return new Promise((resolve) => {
                    const utterance = createUtterance(text, lang, rate);
                    utterance.onend = resolve;
                    synth.speak(utterance);
                });
            }

            function updateRowState(row, state) {
                document.querySelectorAll('.list-mode tbody tr').forEach(r => {
                    r.classList.remove('reading');
                });

                if (state === 'reading') {
                    row.classList.add('reading');
                    let number = row.cells[0].textContent.trim();
                    let germanText = row.cells[1].textContent.trim();
                    let indoText = row.cells[2].textContent.trim();
                    let exampleText = row.cells[3]?.textContent.trim();
                    setTimeout(
                        function() {
                            $('.audio-preview-group').find('.jerman').text(germanText + " = ")
                            $('.audio-preview-group').find('.indo').text(indoText)
                            $('.audio-preview-group').find('.sample').text(exampleText)
                            $('.audio-preview-group').find('.number').text(number)
                            let helper_number = parseInt(number) - 1
                            helper_number = helper_number < 1 ? 1 : helper_number
                            $('#startNumber').val(helper_number).trigger('change');
                        }, 800);
                    // console.log($('.audio-preview-group').find('.sample').length, exampleText)
                    // row.scrollIntoView({
                    //     behavior: 'smooth',
                    //     block: 'center'
                    // });
                } else if (state === 'read') {
                    row.classList.remove('reading');
                    row.classList.add('read');
                }
            }

            async function processRow(row, rate, pause) {
                if (!isReading) return;

                updateRowState(row, 'reading');
                currentRow = row;

                const germanText = row.cells[1].textContent.replace('❤', '').trim();
                const indoText = row.cells[2].textContent.trim();
                const exampleText = row.cells[3]?.textContent.trim();

                // Baca bahasa Indonesia jika opsi dipilih
                if (document.querySelector('[data-option="indonesia"].active')) {
                    await speakText(indoText, 'id-ID', rate);
                }

                // Baca bahasa Jerman jika opsi dipilih
                if (document.querySelector('[data-option="german"].active')) {
                    await sleep(500); // Jeda 0.5 detik sebelum membaca bahasa jerman
                    await speakText(germanText, 'de-DE', rate);
                }

                // Baca contoh jika opsi dipilih
                if (document.querySelector('[data-option="example"].active') && exampleText) {
                    await sleep(500); // Jeda 0.5 detik sebelum membaca contoh
                    await speakText(exampleText, 'de-DE', rate);
                }

                if (isReading) {
                    updateRowState(row, 'read');
                    await sleep(pause * 1000); // Jeda antar baris sesuai setting user
                }
            }

            async function startReading(fromPosition = 0) {
                const rate = parseFloat(document.getElementById('rateSlider').value);
                const pause = parseFloat(document.getElementById('pauseSlider').value);
                const startNumber = parseInt(document.getElementById('startNumber').value) || 1;
                const rows = Array.from(document.querySelectorAll('.list-mode tbody tr'));

                // Validasi nomor awal
                if (startNumber < 1 || startNumber > rows.length) {
                    document.getElementById('numberError').style.display = 'block';
                    return;
                }
                document.getElementById('numberError').style.display = 'none';

                // Mulai dari nomor yang diinginkan (kurangi 1 karena array dimulai dari 0)
                let startIndex = Math.max(startNumber - 1, fromPosition);

                for (let i = startIndex; i < rows.length; i++) {
                    if (!isReading) break;
                    lastPosition = i;
                    await processRow(rows[i], rate, pause);
                }

                if (isReading) {
                    isReading = false;
                    startButton.textContent = 'Start Reading ▶';
                    startButton.style.display = 'block';
                    controlButtons.classList.remove('show');
                }
            }

            startButton.addEventListener('click', async function() {
                if (isReading) {
                    isReading = false;
                    synth.cancel();
                    this.style.display = 'none';
                    this.textContent = 'Start Reading ▶';
                    controlButtons.classList.add('show');
                    if (currentRow) {
                        updateRowState(currentRow, 'read');
                    }
                    return;
                }

                // Check if at least one option is selected
                const hasSelectedOption = document.querySelector('.option-button.active');
                if (!hasSelectedOption) {
                    alert('Please select at least one language option');
                    return;
                }

                isReading = true;
                this.textContent = 'Stop Reading ⏹';
                controlButtons.classList.remove('show');
                await startReading(0); // Akan menggunakan nilai dari input startNumber
            });
            resumeButton.addEventListener('click', async function() {
                synth.cancel();
                await new Promise(resolve => setTimeout(resolve, 100));
                isReading = true;
                controlButtons.classList.remove('show');
                startButton.style.display = 'block';
                startButton.textContent = 'Stop Reading ⏹';
                await startReading(lastPosition);
            });

            restartButton.addEventListener('click', async function() {
                synth.cancel();
                await new Promise(resolve => setTimeout(resolve, 100));
                document.querySelectorAll('.list-mode tbody tr').forEach(row => {
                    row.classList.remove('read', 'reading');
                });
                lastPosition = 0;
                isReading = true;
                controlButtons.classList.remove('show');
                startButton.style.display = 'block';
                startButton.textContent = 'Stop Reading ⏹';
                await startReading(0);
            });

            document.getElementById('closeAudioModal').addEventListener('click', function() {
                isReading = false;
                synth.cancel();
                startButton.textContent = 'Start Reading ▶';
                startButton.style.display = 'block';
                controlButtons.classList.remove('show');
                if (currentRow) {
                    updateRowState(currentRow, 'read');
                }

                const modal = document.getElementById('audioModal');
                const modalContent = modal.querySelector('.audio-modal-content');
                modalContent.classList.remove('show');
                setTimeout(() => {
                    modal.classList.remove('show');
                }, 300);
            });
        });
    </script>
</body>

</html>
