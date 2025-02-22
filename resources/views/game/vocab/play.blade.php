<!DOCTYPE html>
<html lang="de">

<head>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>German Vocabulary Game</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        button,
        a {
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
            padding: 0.5rem;
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
        }

        .list-mode th,
        .list-mode td {
            padding: 0.8rem;
            border: 1px solid #ddd;
            text-align: left;
            word-wrap: break-word;
            /* Memungkinkan word wrap */
            overflow-wrap: break-word;
            /* max-width: 0; */
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

        .favorite-emote.black {
            color: unset !important;
            position: relative;
            box-shadow: 0 0 5px rgb(99, 0, 152);
            border-radius: 10px;
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
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: flex-start;
            padding-top: 50px;
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

        .indo-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .eye-toggle {
            cursor: pointer;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .eye-toggle:hover {
            opacity: 1;
        }

        .eye-toggle.hidden {
            opacity: 0.3;
        }

        .indo.lg.hidden {
            visibility: hidden;
        }

        .preview-item hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .preview-item span.lg {
            font-weight: 600;
            font-size: 24px;
        }

        .setting-item {
            margin-bottom: 1.5rem;
        }

        .setting-favorite {
            width: 100%;
            display: flex;
            justify-content: center;
            padding-bottom: 24px;
        }

        .setting-favorite .fav-button {
            flex: 1;
            width: fit-content;
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
        .restart-button,
        .restart-from-button {
            flex: 1;
            padding: 1rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .restart-from-button {
            background: #f6c42c;
            color: white;
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
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: flex-start;
            padding-top: 150px;
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
    <style>
        .option-button {
            position: relative;
            padding-right: 2rem !important;
            /* Make room for the number */
        }

        .order-number {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(108, 92, 231, 0.2);
            width: 1.5rem;
            height: 1.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
            color: #6c5ce7;
            transition: all 0.3s ease;
        }

        .option-button.active .order-number {
            background: white;
            color: #6c5ce7;
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

        .ask-btn {
            position: fixed;
            left: 20px;
            z-index: 1;
            top: 20px;
            padding: 10px;
            background-color: rgb(53, 0, 128);
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: background 0.3s, transform 0.3s;
        }

        .ask-btn:hover {
            background-color: #260a8a;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
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
                        <input type="range" id="pauseSlider" class="range-slider" min="1" max="8" step="0.1" value="2">
                        <span class="range-value" id="pauseValue">2x</span>
                    </div>
                </div>
                <div class="setting-item">
                    <label class="setting-label">Conversation Distance</label>
                    <div class="setting-value">
                        <input type="range" id="distanceSlider" class="range-slider" min="1" max="4" step="0.1" value="1">
                        <span class="range-value" id="distanceValue">1x</span>
                    </div>
                </div>
            </div>

            <div class="setting-item">
                <label class="setting-label">What to read?</label>
                <div class="option-group">
                    <button class="option-button active" data-option="german">German</button>
                    <button class="option-button" data-option="indonesia">Bahasa</button>
                    <button class="option-button" data-option="example">Example</button>
                    <button class="option-button" data-option="example_bahasa">Example (Bahasa)</button>
                </div>
            </div>

            <div class="audio-preview-group">
                <div class="preview-item">
                    <span class="number"></span>
                </div>
                <div class="preview-item">
                    <span class="jerman lg"></span>
                    <hr>
                    <div class="indo-container">
                        <span class="eye-toggle">👁️</span>
                        <span class="indo lg"></span>
                    </div>
                    {{-- <span class="indo lg"></span> --}}
                </div>
                <br>
                <div class="preview-item">
                    <span class="sample"></span>
                </div>
                <div class="preview-item">
                    <span class="sample-indo"></span>
                </div>
            </div>
            <div class="setting-favorite">
                <button class="fav-button" id="favoriteAudioBtn">
                    <span class="favorite-emote">❤</span>
                </button>
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
                <button class="restart-button" id="restartButton">From 0</button>
                <button class="restart-from-button" id="restartFromNumber">Start from</button>
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
                        <li class="example_bahasa"></li>
                    </ul>
                </div>
                <div class="example-speaker">🔊</div>
            </div>
        </div>
    </div>
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
                            <span class="favorite-emote  @if (($vocabulary->linkfavorite[0]->level ?? null) == 2) black @endif ">❤</span>
                        @endif
                    </div>
                    <div class="indonesian-word">{{ $text2 }}</div>
                    <div style="display: none" class="id-vocab">{{ $vocabulary->id }}</div>
                    <div style="display: none" class="example-vocab">{{ $vocabulary->example }}</div>
                    <div style="display: none" class="example_bahasa-vocab">{{ $vocabulary->translated_example }}</div>
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
                        <th style="width: 70px; text-align: center;padding: 0.8rem 0.3rem">no</th>
                        <th>German</th>
                        <th>Indonesian</th>
                        <th style="display: none">example</th>
                        <th style="display: none">example_bahasa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vocabularies as $vocabulary)
                        <tr>
                            <td style="width: 70px; text-align: center; padding: 0.8rem 0.3rem" data-id="{{ $vocabulary->id }}" class="favorite-list">{{ $loop->iteration }} <br>
                                <span style="font-size: 10px">({{ $vocabulary->kapital }})</span>
                            </td>
                            <td style="word-wrap: break-word" class="german-column {{ $vocabulary->linkfavorite->count() > 0 ? 'favorite' : '' }}" data-id="{{ $vocabulary->id }}">
                                {{ $vocabulary->german_word }}
                                @if ($vocabulary->linkfavorite->count() > 0)
                                    <span class="favorite-emote @if (($vocabulary->linkfavorite[0]->level ?? null) == 2) black @endif ">❤</span>
                                @endif
                            </td>
                            <td style="word-wrap: break-word" class="meaning">{{ $vocabulary->meaning }}</td>
                            <td style="display: none">{!! $vocabulary->example !!}</td>
                            <td style="display: none">{!! $vocabulary->translated_example !!}</td>
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
        <div class="buttons" style="display:flex; justify-content: center; gap: 10px">
            <a href="{{ url()->current() }}?kapital={{ request('kapital') }}&use_favorites={{ request('use_favorites') }}&language={{ request('language') }}&same=true">shuffle</a>
        </div>
    </div>
    @if (auth()->user()->role == 'owner')
        <button class="ask-btn">AI</button>
    @endif
    <div id="ask-popup" style="z-index:1; display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); justify-content:center; align-items:center;">
        <div class="modal flex-1 max-w-xs md:max-w-2xl mx-auto w-full bg-white rounded-2xl shadow-xl flex flex-col my-4 overflow-hidden">
            <div class="gradient-bg p-6 flex items-center">
                <div class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                    <i class="fas fa-message-smile text-white text-xl"></i>
                </div>
                @php
                    $name = auth()->user()->gender == 'male' ? 'Silvi' : 'David';
                @endphp
                <div class="ml-4">
                    <h1 class="text-2xl text-white font-light">Ask {{ $name }}</h1>
                    <div class="text-purple-100 text-sm">Your German language assistant ✨</div>
                </div>
            </div>

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

            <div class="p-4 bg-gray-50 border-t border-gray-100">
                <form id="chat-form" action="{{ route('ai.askAi') }}" method="POST" class="flex gap-3">
                    <textarea id="question" name="question" class="flex-1 p-4 rounded-xl border border-purple-200 text-gray-700 focus:outline-none focus:border-purple-400 placeholder-gray-400" placeholder="Type your question..." rows="1"></textarea>
                    <div class="flex flex-col items-center justify-center space-y-2">
                        <button type="button" class="gradient-bg btn-submit text-white rounded-xl w-12 h-12 flex items-center justify-center hover:opacity-90 transition-all transform hover:scale-105">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                        <p class="text-xs whitespace-nowrap">sisa token: <span class="remaining">{{ auth()->user()->token ? auth()->user()->token * 100 : '∞' }}</span></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script type="module">
        $(document).ready(function() {
            $('.ask-btn').click(function() {
                if ($('#ask-popup').css('display') === 'flex') {
                    $('#ask-popup').hide();
                } else {
                    $('#ask-popup').css('display', 'flex');
                }
            });

            // Textarea handling
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
                    $('#chat-form .btn-submit').trigger('click');
                }
            });

            $('#question').on('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight > 100 ? 100 : (this.scrollHeight + 5)) + 'px';
            });

            // Initial animation
            anime({
                targets: '.bot-message',
                opacity: [0, 1],
                translateY: [20, 0],
                duration: 1200,
                easing: 'spring(1, 80, 10, 0)'
            });

            // Form submission
            $('#chat-form .btn-submit').on('click', function(e) {
                e.preventDefault();
                const formData = new FormData($('#chat-form')[0]);
                const question = $('#question').val().trim();
                if (!question) return;

                addMessage(question, null, 'user');
                $('#question').val('');

                $.ajax({
                    url: $('#chat-form').attr('action'),
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json',
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            setTimeout(() => {
                                let data = JSON.parse(response.data);
                                addMessage(data.answer, data.hint, 'bot');
                            }, 1000);
                            $('#conversation').val(response.conversation);
                            if (response.remaining_dollar !== null) {
                                if ((response.remaining_dollar * 100) > 0) {
                                    $('.remaining').text(response.remaining_dollar * 100);
                                }
                            }
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
                const messageHTML = `
                    <div class="flex items-start ${sender === 'bot' ? '' : 'justify-end'} message opacity-0">
                        ${sender === 'bot' ? `
                                                    <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center overflow-hidden">
                                                        <img src="{{ asset('img/' . $name . '.jpg') }}" alt="AI Assistant" class="w-full h-full object-cover">
                                                    </div>
                                                ` : ''}
                        <div class="mx-3 ${sender === 'bot' ? 'bg-white text-gray-700' : 'gradient-bg text-white'} rounded-2xl p-4 max-w-[80%] shadow-sm">
                            ${text}
                            ${hint ? `<hr class="my-2"><p class="text-sm text-gray-500">${hint}</p>` : ''}
                        </div>
                        ${sender === 'user' ? `
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
    <script type="module">
        $(document).ready(function() {
            $(document).on('click', '.eye-toggle', function() {
                $(this).toggleClass('hidden');
                $(this).siblings('.indo.lg').toggleClass('hidden');
            });
            const url = new URL(window.location.href);
            url.searchParams.delete('same');
            window.history.replaceState({}, document.title, url.toString());
            // Untuk reload dan close tab
            window.onbeforeunload = function(e) {
                e.preventDefault();
                return "Apakah Anda yakin ingin meninggalkan halaman ini?";
            };
            // Untuk tombol back
            // window.onpopstate = function(e) {
            //     if (!confirm("Apakah Anda yakin ingin kembali?")) {
            //         history.pushState(null, null, window.location.href);
            //     }
            // };
            // Initial state
            // history.pushState(null, null, window.location.href);
            $('#playAudio').on('click', function() {
                $('#audioModal').addClass('show');
                $('.container').css('min-height', '200vh');
                $('#audioRate').val(1);
                $('#audioRate').attr('data-audio', 'A');
                $('#audioRate').focus();
                setTimeout(() => {
                    $('.audio-modal-content').addClass('show');
                }, 50);
            });
        });
    </script>
    <script type="module">
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
                currentMeaning = $('.card:visible .german-word').text().replace('❤', '').trim();
                currentWord = $('.card:visible .indonesian-word').text().trim();
                // Isi form sesuai bahasa
                $('#editGerman').val(currentMeaning); // text2 jika indo mode
                $('#editIndonesian').val(currentWord); // text1 jika indo mode
            } else {
                // Jika mode german, text1 adalah bahasa Jerman, text2 adalah bahasa Indonesia
                currentWord = $('.card:visible .german-word').text().replace('❤', '').trim();
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
                        let isFavorite = targetCard.find('.favorite-emote').length ? (targetCard.find('.favorite-emote.black').length ? '<span class="favorite-emote black">❤</span>' : '<span class="favorite-emote">❤</span>') : '';

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
    <script type="module">
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
        let exampleTime = false;
        $('.list-mode table td').on('click', function() {
            if (exampleTime) {
                var scrollPosition = $(document).scrollTop();
                console.log(scrollPosition)
                $('#exampleModal').addClass('show').css('padding-top', (scrollPosition + 100) + 'px');
                let germanWord = $(this).parents('tr').find('td').eq(1).html()
                let exampleText = $(this).parents('tr').find('td').eq(3).html()
                let example_bahasa = $(this).parents('tr').find('td').eq(4).html()

                $('.example-content .word').html(germanWord);
                $('.example-content .example').html(exampleText);
                $('.example-content .example_bahasa').html(example_bahasa);

                setTimeout(() => {
                    $('.example-modal-content').addClass('show');
                }, 50);
            }
            exampleTime = true
            if ($(this).hasClass('hidden-cell')) {
                $(this).removeClass('hidden-cell');
            } else {
                $(this).addClass('hidden-cell');
            }
            setTimeout(() => {
                exampleTime = false
            }, 200);
        });
        let pressTimerList;
        let isPressingList = false;
        let originalRowColor;

        $('.list-mode table td.favorite-list').on('touchstart mousedown', function(e) {

            e.preventDefault();
            let favId = $(this).data('id');
            let favNo = $(this).text();
            let target = $('.card[data-index="' + (parseInt(favNo) - 1) + '"] .german-word');

            // Cek apakah sudah ada favorite-emote
            if (target.find('.favorite-emote').length > 0) {
                // Jika sudah ada favorite, gunakan handler normal
                const currentWord = {
                    id: favId,
                    id_user: '{{ auth()->user()->id }}',
                    _token: '{{ csrf_token() }}'
                };
                sendFavoriteRequestList(currentWord, target, $(this));
                return;
            }

            isPressingList = true;
            let currentCell = $(this);

            // Simpan warna original
            originalRowColor = currentCell.css('background-color');

            // Start the timer
            pressTimerList = setTimeout(() => {
                if (isPressingList) {
                    // Ubah warna jadi hitam ketika hold 1 detik
                    currentCell.css('background-color', 'black');
                    currentCell.css('color', 'white');

                    // Long press detected - send level 2 request
                    const currentWord = {
                        id: favId,
                        id_user: '{{ auth()->user()->id }}',
                        level: 2,
                        _token: '{{ csrf_token() }}'
                    };
                    sendFavoriteRequestList(currentWord, target, currentCell);
                }
            }, 500);
        });

        $('.list-mode table td.favorite-list').on('touchend mouseup mouseleave', function(e) {

            e.preventDefault();
            clearTimeout(pressTimerList);

            let favId = $(this).data('id');
            let favNo = $(this).text();
            let target = $('.card[data-index="' + (parseInt(favNo) - 1) + '"] .german-word');

            // If it was a short press and no favorite-emote exists
            if (isPressingList && e.type !== 'mouseleave' && !target.find('.favorite-emote').length) {
                const currentWord = {
                    id: favId,
                    id_user: '{{ auth()->user()->id }}',
                    _token: '{{ csrf_token() }}'
                };
                sendFavoriteRequestList(currentWord, target, $(this));
            }

            isPressingList = false;
        });

        function sendFavoriteRequestList(data, target, cell) {
            let germanWord = target.text().replace('❤', '').replace("\n", '').trim();

            $.ajax({
                url: '/vocab/favorite',
                method: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function(response) {
                    // Kembalikan warna original setelah ajax selesai
                    if (data.level === 2) {
                        cell.css({
                            'background-color': originalRowColor,
                            'color': ''
                        });
                    }

                    if (response.action == 'add') {
                        // Update card mode
                        target.append(`<span class="favorite-emote">❤</span>`);

                        // Jika response level = 2, set color: unset
                        if (response.level === 2) {
                            target.find('.favorite-emote').addClass('black');
                        }

                        // Update list mode
                        let listCell = $(`.list-mode td[data-id="${data.id}"].german-column`);
                        if (!listCell.hasClass('german-column')) {
                            listCell = listCell.siblings('.german-column');
                        }
                        listCell.addClass('favorite');
                        listCell.append(`<span class="favorite-emote">❤</span>`);

                        // Set color: unset juga di list mode
                        if (response.level === 2) {
                            listCell.find('.favorite-emote').addClass('black');
                        }
                    } else {
                        // Update card mode
                        target.find('.favorite-emote').remove();

                        // Update list mode
                        let listCell = $(`.list-mode td[data-id="${data.id}"]`);
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
                },
                error: function() {
                    // Kembalikan warna original jika terjadi error
                    if (data.level === 2) {
                        cell.css({
                            'background-color': originalRowColor,
                            'color': ''
                        });
                    }
                }
            });
        }

        // Modifikasi fungsi showCard
        function showCard(index) {
            if (isListMode) return;
            $('.card').hide();
            $(`.card[data-index="${index}"]`).show();
            $('.indonesian-word').removeClass('revealed');
        }
    </script>
    <script type="module">
        $(document).ready(function() {
            // Speech synthesis
            const synth = window.speechSynthesis;
            // Example Modal Open
            $('#exampleBtn').on('click', function() {
                $('#exampleModal').addClass('show').removeAttr('style');
                const germanWord = $('.card:visible .german-vocab').text();
                const exampleText = $('.card:visible .example-vocab').text();
                const example_bahasa = $('.card:visible .example_bahasa-vocab').text();

                $('.example-content .word').html(germanWord);
                $('.example-content .example').html(exampleText);
                $('.example-content .example_bahasa').html(example_bahasa);

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
                        $('.container').css('min-height', 'unset');
                    }, 300);
                }
            });

            // Prevent modal content from closing when clicked
            $('.example-modal-content').on('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>

    <script type="module">
        let currentIndex = 0;
        const totalCards = document.querySelectorAll('.card').length;
        let showFavoritesOnly = false;
        let favoriteCards = [];

        function updateFavoritesList() {
            favoriteCards = Array.from(document.querySelectorAll('.card')).filter(card =>
                card.querySelector('.favorite-emote') !== null
            ).map(card => parseInt(card.dataset.index));
        }

        // $('#toggleFavoriteBtn').on('touchstart click', function(e) {
        //     e.preventDefault();
        //     showFavoritesOnly = !showFavoritesOnly;
        //     $(this).toggleClass('active');

        //     updateFavoritesList();
        //     currentIndex = 0;

        //     if (showFavoritesOnly) {
        //         if (favoriteCards.length > 0) {
        //             showNextFavoriteCard();
        //             $('.list-mode tbody tr').hide();
        //             $('.list-mode td .favorite-emote').each(function() {
        //                 $(this).closest('tr').show();
        //             });
        //         } else {
        //             $('.card').hide();
        //             $('.list-mode tbody tr').hide();
        //             $('.score').text('0/0');
        //         }
        //     } else {
        //         showCard(currentIndex);
        //         $('.list-mode tbody tr').show();
        //         updateProgressBar('normal');
        //     }

        //     // Update audio UI for favorites mode
        //     updateAudioUIForFavorites();
        // });
        let pressTimerToggle;
        let isPressingToggle = false;
        let isLongPressToggle = false; // Tambah flag untuk track long press state

        $('#toggleFavoriteBtn').on('touchstart mousedown', function(e) {
            e.preventDefault();
            isPressingToggle = true;
            let btn = $(this);
            btn.removeAttr('style');
            btn.removeClass('isLongPressToggle');

            // Start the timer
            pressTimerToggle = setTimeout(() => {
                if (isPressingToggle) {
                    isLongPressToggle = true; // Set flag bahwa ini long press
                    // Ubah warna jadi hitam ketika hold 1 detik
                    btn.css({
                        'background-color': 'black',
                        'color': 'white',
                        'border-color': 'black'
                    });

                    // Show only black heart favorites
                    showFavoritesOnly = true;
                    btn.addClass('active');
                    btn.addClass('isLongPressToggle');

                    updateFavoritesListBlack(); // New function for black hearts only
                    currentIndex = 0;

                    if (favoriteCards.length > 0) {
                        showNextFavoriteCard();
                        $('.list-mode tbody tr').hide();
                        $('.list-mode td .favorite-emote.black').each(function() {
                            $(this).closest('tr').show();
                        });
                    } else {
                        $('.card').hide();
                        $('.list-mode tbody tr').hide();
                        $('.score').text('0/0');
                    }

                    updateAudioUIForFavorites();
                }
            }, 500);
        });

        $('#toggleFavoriteBtn').on('touchend mouseup mouseleave', function(e) {
            e.preventDefault();
            clearTimeout(pressTimerToggle);

            // Hanya proses short press jika bukan long press dan bukan mouseleave
            if (isPressingToggle && !isLongPressToggle && e.type !== 'mouseleave') {
                let btn = $(this);

                // Original toggle behavior for all favorites
                showFavoritesOnly = !showFavoritesOnly;
                btn.toggleClass('active');

                updateFavoritesList(); // Original function for all hearts
                currentIndex = 0;

                if (showFavoritesOnly) {
                    if (favoriteCards.length > 0) {
                        showNextFavoriteCard();
                        $('.list-mode tbody tr').hide();
                        $('.list-mode td .favorite-emote').each(function() {
                            $(this).closest('tr').show();
                        });
                    } else {
                        $('.card').hide();
                        $('.list-mode tbody tr').hide();
                        $('.score').text('0/0');
                    }
                } else {
                    showCard(currentIndex);
                    $('.list-mode tbody tr').show();
                    updateProgressBar('normal');
                }

                updateAudioUIForFavorites();
            }

            isPressingToggle = false;

            // Reset long press flag hanya jika ini bukan mouseleave
            if (e.type !== 'mouseleave') {
                isLongPressToggle = false;
            }
        });

        // Add new function to update favorites list for black hearts only
        function updateFavoritesListBlack() {
            favoriteCards = Array.from(document.querySelectorAll('.card')).filter(card =>
                card.querySelector('.favorite-emote.black') !== null
            ).map(card => parseInt(card.dataset.index));
        }

        function updateAudioUIForFavorites() {
            const rows = document.querySelectorAll('.list-mode tbody tr');
            const favoriteRows = Array.from(rows).filter(row => row.querySelector('.favorite-emote'));
            const startButton = document.getElementById('startAudio');

            if (showFavoritesOnly && favoriteRows.length === 0) {
                startButton.disabled = true;
                startButton.style.opacity = '0.5';
                document.getElementById('numberError').textContent = 'No favorites available to play';
                document.getElementById('numberError').style.display = 'block';
            } else {
                startButton.disabled = false;
                startButton.style.opacity = '1';
                document.getElementById('numberError').style.display = 'none';
            }
        }

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
        $('#ask-popup').on('click', function(e) {
            if (e.target === this || $(e.target).hasClass('modal')) {
                $('.ask-btn').trigger('click');
            }
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

        let pressTimerAudio;
        let isPressingAudio = false;
        let originalAudioButtonColor;

        $('#favoriteAudioBtn').on('touchstart mousedown', function(e) {
            e.preventDefault();
            let favId = $('.audio-preview-group').find('.jerman').data('id');
            let favNo = $('.audio-preview-group').find('.number').text();
            let target = $('.card[data-index="' + (parseInt(favNo) - 1) + '"] .german-word');

            // Cek apakah sudah ada favorite-emote
            if (target.find('.favorite-emote').length > 0) {
                // Jika sudah ada favorite, gunakan handler normal
                const currentWord = {
                    id: favId,
                    id_user: '{{ auth()->user()->id }}',
                    _token: '{{ csrf_token() }}'
                };
                sendFavoriteRequestAudio(currentWord, target, $(this));
                return;
            }

            isPressingAudio = true;
            let th = $(this);

            // Simpan warna original
            originalAudioButtonColor = th.css('background-color');

            // Start the timer
            pressTimerAudio = setTimeout(() => {
                if (isPressingAudio) {
                    // Ubah warna jadi hitam ketika hold 1 detik
                    th.css('background-color', 'black');

                    // Long press detected - send level 2 request
                    const currentWord = {
                        id: favId,
                        id_user: '{{ auth()->user()->id }}',
                        level: 2,
                        _token: '{{ csrf_token() }}'
                    };
                    sendFavoriteRequestAudio(currentWord, target, th);
                }
            }, 500);
        });

        $('#favoriteAudioBtn').on('touchend mouseup mouseleave', function(e) {
            e.preventDefault();
            clearTimeout(pressTimerAudio);

            let favId = $('.audio-preview-group').find('.jerman').data('id');
            let favNo = $('.audio-preview-group').find('.number').text();
            let target = $('.card[data-index="' + (parseInt(favNo) - 1) + '"] .german-word');

            // If it was a short press and no favorite-emote exists
            if (isPressingAudio && e.type !== 'mouseleave' && !target.find('.favorite-emote').length) {
                const currentWord = {
                    id: favId,
                    id_user: '{{ auth()->user()->id }}',
                    _token: '{{ csrf_token() }}'
                };
                sendFavoriteRequestAudio(currentWord, target, $(this));
            }

            isPressingAudio = false;
        });

        function sendFavoriteRequestAudio(data, target, button) {
            let germanWord = target.text().replace('❤', '').replace("\n", '').trim();

            $.ajax({
                url: '/vocab/favorite',
                method: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function(response) {
                    // Kembalikan warna original setelah ajax selesai
                    if (data.level === 2) {
                        button.css('background-color', originalAudioButtonColor);
                    }

                    button.css('background-color', '#6c5ce7');
                    setTimeout(() => {
                        button.css('background-color', 'white');
                        setTimeout(() => {
                            button.css('background-color', '#6c5ce7');
                            setTimeout(() => {
                                button.css('background-color', 'white');
                                setTimeout(() => {
                                    button.css('background-color', '#6c5ce7');
                                    setTimeout(() => {
                                        button.css('background-color', 'white');
                                    }, 200);
                                }, 200);
                            }, 200);
                        }, 200);
                    }, 200);

                    if (response.action == 'add') {
                        // Update card mode
                        target.append(`<span class="favorite-emote">❤</span>`);

                        // Jika response level = 2, set color: unset
                        if (response.level === 2) {
                            target.find('.favorite-emote').addClass('black');
                        }

                        // Update list mode
                        let listCell = $(`.list-mode td[data-id="${data.id}"].german-column`);
                        if (!listCell.hasClass('german-column')) {
                            listCell = listCell.siblings('.german-column');
                        }
                        listCell.addClass('favorite');
                        listCell.append(`<span class="favorite-emote">❤</span>`);

                        // Set color: unset juga di list mode
                        if (response.level === 2) {
                            listCell.find('.favorite-emote').addClass('black');
                        }
                    } else {
                        // Update card mode
                        target.find('.favorite-emote').remove();

                        // Update list mode
                        let listCell = $(`.list-mode td[data-id="${data.id}"]`);
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
                },
                error: function() {
                    // Kembalikan warna original jika terjadi error
                    if (data.level === 2) {
                        button.css('background-color', originalAudioButtonColor);
                    }
                }
            });
        }
        // $('#favoriteBtn').on('touchstart click', function(e) {
        //     e.preventDefault();
        //     const currentWord = {
        //         id: $('.card:visible .id-vocab').text(),
        //         id_user: '{{ auth()->user()->id }}',
        //         _token: '{{ csrf_token() }}'
        //     };
        //     let target = $('.card:visible .german-word');
        //     let germanWord = target.text().replace('❤', '').replace("\n", '').trim();


        //     $.ajax({
        //         url: '/vocab/favorite',
        //         method: 'POST',
        //         data: JSON.stringify(currentWord),
        //         contentType: 'application/json',
        //         success: function(response) {
        //             $('#favoriteBtn').addClass('animate__animated animate__heartBeat');
        //             setTimeout(() => {
        //                 $('#favoriteBtn').removeClass('animate__animated animate__heartBeat');
        //             }, 1000);
        //             if (response.action == 'add') {
        //                 // Update di card mode
        //                 target.append(`<span class="favorite-emote">❤</span>`);

        //                 // Update di list mode
        //                 let listCell = $(`.list-mode td:contains('${germanWord}')`);
        //                 if (!listCell.hasClass('german-column')) {
        //                     listCell = listCell.siblings('.german-column');
        //                 }
        //                 listCell.addClass('favorite');
        //                 listCell.append(`<span class="favorite-emote">❤</span>`);
        //             } else {
        //                 // Update di card mode
        //                 target.find('.favorite-emote').remove();

        //                 // Update di list mode
        //                 let listCell = $(`.list-mode td:contains('${germanWord}')`);
        //                 console.log(listCell.length, germanWord)
        //                 if (!listCell.hasClass('german-column')) {
        //                     listCell = listCell.siblings('.german-column');
        //                 }
        //                 listCell.removeClass('favorite');
        //                 listCell.find('.favorite-emote').remove();
        //             }

        //             updateFavoritesList();
        //             if (showFavoritesOnly && favoriteCards.length === 0) {
        //                 $('.card').hide();
        //                 $('.list-mode tbody tr').hide();
        //                 $('.score').text('0/0');
        //             }
        //         }
        //     });
        // });
        // Long press timer variable
        let pressTimer;
        let isPressing = false;
        let originalButtonColor;

        $('#favoriteBtn').on('touchstart mousedown', function(e) {
            e.preventDefault();

            // Cek apakah sudah ada favorite-emote
            if ($('.card:visible .german-word .favorite-emote').length > 0) {
                // Jika sudah ada favorite, gunakan handler normal
                const currentWord = {
                    id: $('.card:visible .id-vocab').text(),
                    id_user: '{{ auth()->user()->id }}',
                    _token: '{{ csrf_token() }}'
                };
                sendFavoriteRequest(currentWord);
                return;
            }

            isPressing = true;

            // Simpan warna original
            originalButtonColor = $('#favoriteBtn').css('background-color');

            // Start the timer
            pressTimer = setTimeout(() => {
                if (isPressing) {
                    // Ubah warna jadi hitam ketika hold 1 detik
                    $('#favoriteBtn').css('background-color', 'black');

                    // Long press detected - send level 2 request
                    const currentWord = {
                        id: $('.card:visible .id-vocab').text(),
                        id_user: '{{ auth()->user()->id }}',
                        level: 2,
                        _token: '{{ csrf_token() }}'
                    };
                    sendFavoriteRequest(currentWord);
                }
            }, 500); // 1 second threshold
        });

        $('#favoriteBtn').on('touchend mouseup mouseleave', function(e) {
            e.preventDefault();

            // Clear the timer
            clearTimeout(pressTimer);

            // If it was a short press and no favorite-emote exists
            if (isPressing && e.type !== 'mouseleave' && $('.card:visible .german-word .favorite-emote').length === 0) {
                const currentWord = {
                    id: $('.card:visible .id-vocab').text(),
                    id_user: '{{ auth()->user()->id }}',
                    _token: '{{ csrf_token() }}'
                };
                sendFavoriteRequest(currentWord);
            }

            isPressing = false;
        });

        function sendFavoriteRequest(data) {
            let target = $('.card:visible .german-word');
            let germanWord = target.text().replace('❤', '').replace("\n", '').trim();

            $.ajax({
                url: '/vocab/favorite',
                method: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function(response) {
                    // Kembalikan warna original setelah ajax selesai
                    if (data.level === 2) {
                        $('#favoriteBtn').css('background-color', originalButtonColor);
                    }

                    $('#favoriteBtn').addClass('animate__animated animate__heartBeat');
                    setTimeout(() => {
                        $('#favoriteBtn').removeClass('animate__animated animate__heartBeat');
                    }, 1000);

                    if (response.action == 'add') {
                        // Update card mode
                        target.append(`<span class="favorite-emote">❤</span>`);

                        // Jika response level = 2, set color: unset
                        if (response.level === 2) {
                            target.find('.favorite-emote').addClass('black');
                        }

                        // Update list mode
                        let listCell = $(`.list-mode td:contains('${germanWord}')`);
                        if (!listCell.hasClass('german-column')) {
                            listCell = listCell.siblings('.german-column');
                        }
                        listCell.addClass('favorite');
                        listCell.append(`<span class="favorite-emote">❤</span>`);

                        // Set color: unset juga di list mode
                        if (response.level === 2) {
                            listCell.find('.favorite-emote').addClass('black');
                        }
                    } else {
                        // Update card mode
                        target.find('.favorite-emote').remove();

                        // Update list mode
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
                },
                error: function() {
                    // Kembalikan warna original jika terjadi error
                    if (data.level === 2) {
                        $('#favoriteBtn').css('background-color', originalButtonColor);
                    }
                }
            });
        }

        // Initialize
        updateFavoritesList();
        AOS.init({
            duration: 1000,
            once: true
        });
        updateProgressBar('normal');
        showCard(0);
    </script>
    <script type="module">
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
    <script type="module">
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
    <script type="module">
        // Script untuk audio functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add these variables at the top of your script
            let wakeLock = null;
            let audioContext = null;

            // Function to request wake lock
            async function requestWakeLock() {
                try {
                    // Check if page is visible
                    if ('wakeLock' in navigator && !document.hidden) {
                        wakeLock = await navigator.wakeLock.request('screen');
                        console.log('Wake Lock is active');

                        wakeLock.addEventListener('release', () => {
                            console.log('Wake Lock was released');
                        });
                    }

                    // Initialize audio context for background processing
                    if (!audioContext) {
                        // Create audio context on user interaction
                        audioContext = new(window.AudioContext || window.webkitAudioContext)();

                        // Create a silent audio buffer
                        const buffer = audioContext.createBuffer(1, 44100, 44100);
                        const source = audioContext.createBufferSource();
                        source.buffer = buffer;

                        // Create gain node and set volume to 0
                        const gainNode = audioContext.createGain();
                        gainNode.gain.value = 0;

                        // Connect nodes
                        source.connect(gainNode);
                        gainNode.connect(audioContext.destination);

                        // Start playing silent audio
                        source.loop = true;
                        source.start();
                    }

                    // Resume audio context if suspended
                    if (audioContext.state === 'suspended') {
                        await audioContext.resume();
                    }
                } catch (err) {
                    console.warn(`Wake Lock request failed: ${err.message}`);
                    // Continue with audio context even if wake lock fails
                }
            }

            // Function to release wake lock
            async function releaseWakeLock() {
                try {
                    if (wakeLock) {
                        await wakeLock.release();
                        wakeLock = null;
                    }
                    if (audioContext) {
                        await audioContext.close();
                        audioContext = null;
                    }
                } catch (err) {
                    console.error(`Wake Lock release error: ${err.name}, ${err.message}`);
                }
            }

            // State variables
            let lastPosition = 0;
            const resumeButton = document.getElementById('resumeButton');
            const restartButton = document.getElementById('restartButton');
            const restartFromNumber = document.getElementById('restartFromNumber');
            const controlButtons = document.getElementById('controlButtons');
            const startButton = document.getElementById('startAudio');
            const synth = window.speechSynthesis;
            let isReading = false;
            let currentRow = null;

            // Initialize UI state
            controlButtons.style.display = 'none';
            document.getElementById('rateValue').textContent = '1.0x';
            document.getElementById('pauseValue').textContent = '2x';
            document.getElementById('distanceValue').textContent = '1x';

            // Update slider values on input
            document.getElementById('rateSlider').addEventListener('input', function() {
                document.getElementById('rateValue').textContent = this.value + 'x';
            });

            document.getElementById('pauseSlider').addEventListener('input', function() {
                document.getElementById('pauseValue').textContent = this.value + 'x';
            });
            document.getElementById('distanceSlider').addEventListener('input', function() {
                document.getElementById('distanceValue').textContent = this.value + 'x';
            });

            // Option buttons dengan multiple selection
            let selectedOrder = ['german'];
            let orderCounter = 1;
            // Add click handlers for option buttons
            // Add click handlers for option buttons
            const optionButtons = document.querySelectorAll('.option-button');
            optionButtons.forEach(button => {
                // Add span for order number
                const orderSpan = document.createElement('span');
                orderSpan.className = 'order-number';
                button.appendChild(orderSpan);

                button.addEventListener('click', function() {
                    const option = this.getAttribute('data-option');
                    const orderSpan = this.querySelector('.order-number');

                    if (this.classList.contains('active')) {
                        // Remove from order when deactivated
                        this.classList.remove('active');
                        orderSpan.textContent = '';
                        selectedOrder = selectedOrder.filter(item => item !== option);

                        // Reorder remaining numbers
                        updateOrderNumbers();
                        orderCounter = selectedOrder.length + 1;
                    } else {
                        // Add to order when activated
                        this.classList.add('active');
                        orderSpan.textContent = orderCounter++;
                        selectedOrder.push(option);
                    }
                });
            });
            updateOrderNumbers()
            orderCounter = selectedOrder.length + 1;



            function updateOrderNumbers() {
                const activeButtons = document.querySelectorAll('.option-button.active');
                activeButtons.forEach((button, index) => {
                    const orderSpan = button.querySelector('.order-number');
                    orderSpan.textContent = index + 1;
                });
            }

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
                    let germanText = row.cells[1].innerHTML.replace(/\s+/g, ' ').trim();
                    let indoText = row.cells[2].textContent.trim();
                    let exampleText = row.cells[3]?.textContent.trim();
                    let example_bahasa = row.cells[4]?.textContent.trim();
                    let dataId = row.cells[1].dataset.id;
                    setTimeout(
                        function() {
                            $('.audio-preview-group').find('.jerman').html(germanText)
                            $('.audio-preview-group').find('.indo').text(indoText)
                            $('.audio-preview-group').find('.sample').text(exampleText)
                            $('.audio-preview-group').find('.sample-indo').text(example_bahasa)
                            $('.audio-preview-group').find('.number').text(number)
                            $('.audio-preview-group').find('.jerman').data('id', dataId)
                            console.log($('.audio-preview-group').find('.jerman').data('id'))
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
            let interactionCount = 0
            async function processRow(row) {
                const rate = parseFloat(document.getElementById('rateSlider').value);
                const pause = parseFloat(document.getElementById('pauseSlider').value);
                const distance = parseFloat(document.getElementById('distanceSlider').value);
                if (!isReading) return;

                updateRowState(row, 'reading');
                currentRow = row;

                const germanText = row.cells[1].textContent.replace('❤', '').trim();
                const indoText = row.cells[2].textContent.trim();
                const exampleText = row.cells[3]?.textContent.trim();
                const example_bahasa = row.cells[4]?.textContent.trim();
                const hasFavorite = row.querySelector('.favorite-emote') !== null;

                // Skip if we're in favorites mode and this row isn't a favorite
                if (showFavoritesOnly && !hasFavorite) {
                    return;
                }

                // Process audio in the selected order
                let ci = 0;
                for (const option of selectedOrder) {
                    ci++
                    if (!isReading) break;

                    switch (option) {
                        case 'indonesia':
                            if (document.querySelector('[data-option="indonesia"].active')) {
                                if (ci != 1) {
                                    await sleep(distance * 1000);
                                }
                                await speakText(indoText, 'id-ID', 1.1);
                            }
                            break;
                        case 'german':
                            if (document.querySelector('[data-option="german"].active')) {
                                if (ci != 1) {
                                    await sleep(distance * 1000);
                                }
                                await speakText(germanText, 'de-DE', rate);
                            }
                            break;
                        case 'example':
                            if (document.querySelector('[data-option="example"].active') && exampleText) {
                                if (ci != 1) {
                                    await sleep(distance * 1000);
                                }
                                await speakText(exampleText, 'de-DE', rate);
                            }
                            break;
                        case 'example_bahasa':
                            if (document.querySelector('[data-option="example_bahasa"].active') && example_bahasa) {
                                if (ci != 1) {
                                    await sleep(distance * 1000);
                                }
                                await speakText(example_bahasa, 'id-ID', 1.1);
                            }
                            break;
                    }
                }

                if (isReading) {
                    updateRowState(row, 'read');
                    await sleep(pause * 1000);
                }
            }

            // Modify your startReading function
            async function startReading(fromPosition = 0, force = false) {
                // Request wake lock when starting
                await requestWakeLock();


                const startNumber = parseInt(document.getElementById('startNumber').value) || 1;
                const rows = Array.from(document.querySelectorAll('.list-mode tbody tr'));

                if (startNumber < 1 || startNumber > rows.length) {
                    document.getElementById('numberError').style.display = 'block';
                    releaseWakeLock(); // Release if there's an error
                    return;
                }

                document.getElementById('numberError').style.display = 'none';

                const index = interactionCount;
                let startIndex = Math.max(startNumber - 1, fromPosition);
                if (force) {
                    startIndex = 0;
                }

                try {
                    for (let i = startIndex; i < rows.length; i++) {
                        if (!isReading) break;
                        if (interactionCount != index) break;

                        const row = rows[i];
                        const hasFavorite = row.querySelector('.favorite-emote') !== null;
                        const hasBlackFavorite = row.querySelector('.favorite-emote.black') !== null;
                        const isLongPressToggle = $('#toggleFavoriteBtn').hasClass('isLongPressToggle');

                        // Cek jika dalam mode favorit
                        if (showFavoritesOnly) {
                            // Jika dalam mode long-press (black favorite), hanya proses yang black
                            if (isLongPressToggle && !hasBlackFavorite) {
                                continue;
                            }
                            // Jika dalam mode normal favorite, proses semua favorite
                            else if (!isLongPressToggle && !hasFavorite) {
                                continue;
                            }
                        }

                        lastPosition = i;
                        await processRow(rows[i]);

                        // Reacquire wake lock periodically
                        if (wakeLock === null) {
                            await requestWakeLock();
                        }
                    }
                } finally {
                    if (isReading) {
                        isReading = false;
                        startButton.textContent = 'Start Reading ▶';
                        startButton.style.display = 'block';
                        controlButtons.classList.remove('show');
                    }

                    // Release wake lock when done
                    await releaseWakeLock();
                }
            }
            document.addEventListener('visibilitychange', async () => {
                if (!document.hidden && isReading) {
                    // Try to reacquire wake lock when page becomes visible
                    await requestWakeLock();
                }
            });

            // Add page unload handler
            window.addEventListener('beforeunload', async () => {
                await releaseWakeLock();
            });

            // Add this function to update UI for favorites mode

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

                // Request wake lock when user starts reading
                await requestWakeLock();

                if (selectedOrder.length === 0) {
                    alert('Please select at least one language option');
                    return;
                }

                isReading = true;
                this.textContent = 'Stop Reading ⏹';
                controlButtons.classList.remove('show');
                interactionCount++;
                await startReading(0);
            });
            resumeButton.addEventListener('click', async function() {
                if (selectedOrder.length === 0) {
                    alert('Please select at least one language option');
                    return;
                }
                await requestWakeLock();
                synth.cancel();
                await new Promise(resolve => setTimeout(resolve, 200));
                isReading = true;
                controlButtons.classList.remove('show');
                startButton.style.display = 'block';
                startButton.textContent = 'Stop Reading ⏹';
                interactionCount++
                await startReading(lastPosition);
            });
            restartFromNumber.addEventListener('click', async function() {
                if (selectedOrder.length === 0) {
                    alert('Please select at least one language option');
                    return;
                }
                await requestWakeLock();
                synth.cancel();
                await new Promise(resolve => setTimeout(resolve, 200));
                document.querySelectorAll('.list-mode tbody tr').forEach(row => {
                    row.classList.remove('read', 'reading');
                });
                lastPosition = 0;
                isReading = true;
                controlButtons.classList.remove('show');
                startButton.style.display = 'block';
                startButton.textContent = 'Stop Reading ⏹';
                interactionCount++
                await startReading(0);
            });

            restartButton.addEventListener('click', async function() {
                if (selectedOrder.length === 0) {
                    alert('Please select at least one language option');
                    return;
                }
                await requestWakeLock();
                synth.cancel();
                await new Promise(resolve => setTimeout(resolve, 200));
                document.querySelectorAll('.list-mode tbody tr').forEach(row => {
                    row.classList.remove('read', 'reading');
                });
                lastPosition = 0;
                isReading = true;
                controlButtons.classList.remove('show');
                startButton.style.display = 'block';
                startButton.textContent = 'Stop Reading ⏹';
                interactionCount++
                await startReading(0, true);
            });

            document.getElementById('closeAudioModal').addEventListener('click', function() {
                controlButtons.style.display = 'none';
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
