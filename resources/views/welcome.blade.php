
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #6200ee;
            --secondary-color: #9747FF;
            --accent-color: #b794f4;
            --text-color: #202124;
            --bg-color: #ffffff;
            --card-bg: #f8f9fa;
            --shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--bg-color);
        }

        header {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 1rem;
            text-align: center;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .section {
            background-color: var(--card-bg);
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
        }

        .section h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 0.5rem;
        }

        .example-card {
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1rem 0;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }

        .example-card:hover {
            transform: translateY(-5px);
        }

        .example-card h3 {
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .grammar-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }

        .grammar-table th,
        .grammar-table td {
            padding: 1rem;
            border: 1px solid #ddd;
            text-align: left;
        }

        .grammar-table th {
            background-color: var(--primary-color);
            color: white;
        }

        .grammar-table tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .info-box {
            background-color: #f3e5f5;
            border-left: 4px solid var(--primary-color);
            padding: 1rem;
            margin: 1rem 0;
        }

        .tips {
            background-color: #ede7f6;
            border-left: 4px solid var(--accent-color);
            padding: 1rem;
            margin: 1rem 0;
        }

        .strong {
            font-weight: bold;
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2rem;
            }

            .section {
                padding: 1.5rem;
            }

            .grammar-table {
                display: block;
                overflow-x: auto;
            }
        }

        li {
            margin: 0.8rem 3rem;
            padding: 0.5rem 0;
            line-height: 1.8;
        }
    </style>

    <header>
        <h1>Deutsche Präpositionen</h1>
        <p>Preposisi dalam Bahasa Jerman</p>
    </header>

    <main>
        <section class="section">
            <h2>Wechselpräpositionen (Akkusativ & Dativ)</h2>
            <div class="example-card">
                <table class="grammar-table">
                    <tr>
                        <th>Preposisi</th>
                        <th>Akkusativ (Wohin?)</th>
                        <th>Dativ (Wo?)</th>
                        <th>Penggunaan</th>
                    </tr>
                    <tr>
                        <td>an</td>
                        <td>Ich fahre an das Meer.</td>
                        <td>Ich bin am Meer.</td>
                        <td>Untuk menunjukkan lokasi di tepi/pinggir air (laut, sungai, danau) atau menempel pada permukaan vertikal</td>
                    </tr>
                    <tr>
                        <td>auf</td>
                        <td>Ich gehe auf den Markt.</td>
                        <td>Ich bin auf dem Markt.</td>
                        <td>Untuk menunjukkan lokasi di atas permukaan terbuka (pulau kecil, gunung, podium, pasar) dengan kontak langsung</td>
                    </tr>
                    <tr>
                        <td>in</td>
                        <td>Ich gehe in die Schule.</td>
                        <td>Ich bin in der Schule.</td>
                        <td>Untuk menunjukkan lokasi di dalam bangunan, negara dengan artikel, atau ruang tertutup</td>
                    </tr>
                    <tr>
                        <td>hinter</td>
                        <td>Ich gehe hinter das Haus.</td>
                        <td>Ich bin hinter dem Haus.</td>
                        <td>Untuk menunjukkan posisi atau pergerakan ke belakang suatu objek</td>
                    </tr>
                    <tr>
                        <td>über</td>
                        <td>Ich springe über den Zaun.</td>
                        <td>Die Lampe hängt über dem Tisch.</td>
                        <td>Untuk menunjukkan posisi atau pergerakan di atas sesuatu tanpa kontak langsung</td>
                    </tr>
                    <tr>
                        <td>unter</td>
                        <td>Ich lege die Tasche unter den Tisch.</td>
                        <td>Die Katze schläft unter dem Tisch.</td>
                        <td>Untuk menunjukkan posisi atau pergerakan ke bawah suatu objek</td>
                    </tr>
                    <tr>
                        <td>neben</td>
                        <td>Ich stelle den Stuhl neben den Tisch.</td>
                        <td>Der Stuhl steht neben dem Tisch.</td>
                        <td>Untuk menunjukkan posisi atau pergerakan ke sisi/sebelah suatu objek</td>
                    </tr>
                    <tr>
                        <td>vor</td>
                        <td>Ich stelle das Auto vor das Haus.</td>
                        <td>Das Auto steht vor dem Haus.</td>
                        <td>Untuk menunjukkan posisi atau pergerakan ke depan suatu objek</td>
                    </tr>
                    <tr>
                        <td>zwischen</td>
                        <td>Ich stelle den Tisch zwischen die Stühle.</td>
                        <td>Der Tisch steht zwischen den Stühlen.</td>
                        <td>Untuk menunjukkan posisi atau pergerakan ke antara dua objek</td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="section">
            <h2>Preposisi + Dativ</h2>
            <div class="example-card">
                <table class="grammar-table">
                    <tr>
                        <th>Preposisi</th>
                        <th>Contoh</th>
                        <th>Penggunaan</th>
                    </tr>
                    <tr>
                        <td>bei</td>
                        <td>Ich bin bei meinem Freund.</td>
                        <td>Untuk menunjukkan keberadaan di lokasi seseorang atau institusi</td>
                    </tr>
                    <tr>
                        <td>von</td>
                        <td>Ich komme von der Arbeit.</td>
                        <td>Untuk menunjukkan asal dari tempat terbuka atau orang</td>
                    </tr>
                    <tr>
                        <td>aus</td>
                        <td>Ich komme aus dem Kino.</td>
                        <td>Untuk menunjukkan asal dari dalam suatu tempat tertutup</td>
                    </tr>
                    <tr>
                        <td>nach</td>
                        <td>Ich fahre nach Deutschland.</td>
                        <td>Untuk menunjukkan tujuan ke kota, negara tanpa artikel, atau arah mata angin</td>
                    </tr>
                    <tr>
                        <td>zu</td>
                        <td>Ich gehe zu meinem Freund.</td>
                        <td>Untuk menunjukkan tujuan ke tempat spesifik, orang, atau acara</td>
                    </tr>
                    <tr>
                        <td>gegenüber</td>
                        <td>Die Bank ist gegenüber der Schule.</td>
                        <td>Untuk menunjukkan posisi di seberang atau berhadapan dengan suatu objek</td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="section">
            <h2>Preposisi + Genitiv</h2>
            <div class="example-card">
                <table class="grammar-table">
                    <tr>
                        <th>Preposisi</th>
                        <th>Contoh</th>
                        <th>Penggunaan</th>
                    </tr>
                    <tr>
                        <td>innerhalb</td>
                        <td>Innerhalb der Stadt gibt es viele Parks.</td>
                        <td>Untuk menunjukkan posisi di dalam batasan atau lingkup suatu tempat atau waktu</td>
                    </tr>
                    <tr>
                        <td>außerhalb</td>
                        <td>Außerhalb der Stadt ist es ruhiger.</td>
                        <td>Untuk menunjukkan posisi di luar batasan atau lingkup suatu tempat atau waktu</td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="section">
            <h2>Tips Penggunaan</h2>
            <div class="tips">
                <ul>
                    <li>Wechselpräpositionen menggunakan <span class="strong">Akkusativ</span> untuk menunjukkan pergerakan (wohin?)</li>
                    <li>Wechselpräpositionen menggunakan <span class="strong">Dativ</span> untuk menunjukkan posisi (wo?)</li>
                    <li>Preposisi seperti bei, zu, aus, von, nach, dan gegenüber selalu menggunakan <span class="strong">Dativ</span></li>
                    <li>Preposisi innerhalb dan außerhalb selalu menggunakan <span class="strong">Genitiv</span></li>
                    <li>Perhatikan perubahan artikel sesuai dengan kasus yang digunakan</li>
                </ul>
            </div>
        </section>
    </main>

