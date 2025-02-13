<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <style>
        :root {
            --primary-color: #6200ee;
            --secondary-color: #9747FF;
            --accent-color: #b794f4;
            --text-color: #202124;
            --bg-color: #ffffff;
            --card-bg: #f8f9fa;
            --shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        .intro-box {
            background-color: var(--accent-color);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
             color: var(--text-color);
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
            margin-bottom: 1rem;
        }

        .prefix-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }

        .prefix-table th,
        .prefix-table td {
            padding: 1rem;
            border: 1px solid #ddd;
            text-align: left;
        }

        .prefix-table th {
            background-color: var(--primary-color);
             color: white;
        }

        .prefix-table tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .example-card {
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1rem 0;
            box-shadow: var(--shadow);
        }

        .info-box {
            background-color: var(--accent-color);
            border-left: 4px solid var(--primary-color);
            padding: 1rem;
            margin: 1rem 0;
             color: var(--text-color);
        }

        .highlight-prefix {
            color: var(--primary-color);
            font-weight: bold;
        }

        li {
            margin-left: 2rem;
            margin-bottom: 1rem;
            line-height: 1.8;
        }

        .section-divider {
            border-top: 2px solid var(--accent-color);
            margin: 2rem 0;
        }

        .usage-example {
            background-color: var(--card-bg);
            padding: 1rem;
            border-radius: 4px;
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Präfixe im Deutschen</h1>
        <p>Panduan Lengkap Prefix dalam Bahasa Jerman</p>
    </header>

    <main>
        <div class="intro-box">
            <h2>Pengenalan Prefix dalam Bahasa Jerman</h2>
            <p>Prefix dalam bahasa Jerman dapat mengubah makna dasar dari sebuah kata kerja. Ada dua jenis utama prefix:</p>
            <ul>
                <li>Trennbare Präfixe (Prefix yang dapat dipisahkan): Dalam kalimat utama, prefix ini dipisahkan dari kata kerja dan diletakkan di akhir kalimat.</li>
                <li>Untrennbare Präfixe (Prefix yang tidak dapat dipisahkan): Prefix ini selalu melekat pada kata kerja dalam semua bentuk kalimat.</li>
            </ul>
        </div>

        <section class="section">
            <h2>A. Trennbare Präfixe (Prefix yang Dapat Dipisahkan)</h2>
            <div class="example-card">
                <table class="prefix-table">
                    <tr>
                        <th>Prefix</th>
                        <th>Arti Dasar</th>
                        <th>Contoh</th>
                        <th>Arti</th>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">ab-</td>
                        <td>
                            - pergi/menjauh<br>
                            - ke bawah<br>
                            - selesai/berhenti<br>
                            - menghapus/membersihkan
                        </td>
                        <td>
                            abfahren<br>
                            abfallen<br>
                            absagen<br>
                            abwaschen
                        </td>
                        <td>
                            berangkat<br>
                            jatuh<br>
                            membatalkan<br>
                            mencuci
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">an-</td>
                        <td>
                            - mulai<br>
                            - mendekat<br>
                            - menempel<br>
                            - menyalakan
                        </td>
                        <td>
                            anfangen<br>
                            ankommen<br>
                            anziehen<br>
                            anmachen
                        </td>
                        <td>
                            memulai<br>
                            tiba<br>
                            mengenakan<br>
                            menyalakan
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">auf-</td>
                        <td>
                            - ke atas<br>
                            - membuka<br>
                            - mulai<br>
                            - menghabiskan
                        </td>
                        <td>
                            aufstehen<br>
                            aufmachen<br>
                            aufhören<br>
                            aufessen
                        </td>
                        <td>
                            bangun<br>
                            membuka<br>
                            berhenti<br>
                            menghabiskan makanan
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">aus-</td>
                        <td>
                            - keluar<br>
                            - selesai<br>
                            - mematikan<br>
                            - hingga selesai
                        </td>
                        <td>
                            ausgehen<br>
                            auslernen<br>
                            ausmachen<br>
                            ausschlafen
                        </td>
                        <td>
                            pergi keluar<br>
                            selesai belajar<br>
                            mematikan<br>
                            tidur puas
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">ein-</td>
                        <td>
                            - masuk<br>
                            - mulai<br>
                            - ke dalam<br>
                            - memahami
                        </td>
                        <td>
                            einsteigen<br>
                            einschlafen<br>
                            einkaufen<br>
                            einsehen
                        </td>
                        <td>
                            naik (kendaraan)<br>
                            tertidur<br>
                            berbelanja<br>
                            memahami
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">mit-</td>
                        <td>
                            - bersama<br>
                            - ikut serta<br>
                            - membawa<br>
                            - berpartisipasi
                        </td>
                        <td>
                            mitgehen<br>
                            mitmachen<br>
                            mitnehmen<br>
                            mitarbeiten
                        </td>
                        <td>
                            ikut pergi<br>
                            berpartisipasi<br>
                            membawa serta<br>
                            bekerja sama
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">nach-</td>
                        <td>
                            - mengikuti<br>
                            - meniru<br>
                            - kemudian<br>
                            - ulang/lagi
                        </td>
                        <td>
                            nachgehen<br>
                            nachmachen<br>
                            nachdenken<br>
                            nachsehen
                        </td>
                        <td>
                            mengikuti<br>
                            meniru<br>
                            memikirkan<br>
                            memeriksa ulang
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">vor-</td>
                        <td>
                            - ke depan<br>
                            - sebelumnya<br>
                            - mendahului<br>
                            - mempersiapkan
                        </td>
                        <td>
                            vorgehen<br>
                            vorbereiten<br>
                            vorlesen<br>
                            vorsingen
                        </td>
                        <td>
                            maju<br>
                            mempersiapkan<br>
                            membaca dengan keras<br>
                            menyanyi di depan
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">zu-</td>
                        <td>
                            - menutup<br>
                            - menambah<br>
                            - ke arah<br>
                            - mendengarkan
                        </td>
                        <td>
                            zumachen<br>
                            zunehmen<br>
                            zugeben<br>
                            zuhören
                        </td>
                        <td>
                            menutup<br>
                            bertambah berat<br>
                            mengakui<br>
                            mendengarkan
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">weg-</td>
                        <td>
                            - menjauh<br>
                            - menghilang<br>
                            - pergi<br>
                            - membuang
                        </td>
                        <td>
                            weggehen<br>
                            wegwerfen<br>
                            weglaufen<br>
                            wegmachen
                        </td>
                        <td>
                            pergi<br>
                            membuang<br>
                            melarikan diri<br>
                            menghilangkan
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="section">
            <h2>B. Untrennbare Präfixe (Prefix yang Tidak Dapat Dipisahkan)</h2>
            <div class="example-card">
                <table class="prefix-table">
                    <tr>
                        <th>Prefix</th>
                        <th>Arti Dasar</th>
                        <th>Contoh</th>
                        <th>Arti</th>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">be-</td>
                        <td>
                            - membuat transitif<br>
                            - mengarahkan<br>
                            - intensifikasi<br>
                            - memberikan sifat
                        </td>
                        <td>
                            besuchen<br>
                            bekommen<br>
                            bedeuten<br>
                            beschreiben
                        </td>
                        <td>
                            mengunjungi<br>
                            mendapatkan<br>
                            berarti<br>
                            mendeskripsikan
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">emp-</td>
                        <td>
                            - menerima<br>
                            - merasakan<br>
                            - mengesankan<br>
                            - menganjurkan
                        </td>
                        <td>
                            empfangen<br>
                            empfehlen<br>
                            empfinden<br>
                            empfühlen
                        </td>
                        <td>
                            menerima<br>
                            merekomendasikan<br>
                            merasakan<br>
                            berempati
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">ent-</td>
                        <td>
                            - menjauh<br>
                            - membebaskan<br>
                            - melawan<br>
                            - menghilangkan
                        </td>
                        <td>
                            entdecken<br>
                            entwickeln<br>
                            entstehen<br>
                            entfernen
                        </td>
                        <td>
                            menemukan<br>
                            mengembangkan<br>
                            terjadi<br>
                            menghapus
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">er-</td>
                        <td>
                            - mencapai<br>
                            - memulai<br>
                            - berhasil<br>
                            - mendapatkan
                        </td>
                        <td>
                            erklären<br>
                            erreichen<br>
                            erleben<br>
                            erhalten
                        </td>
                        <td>
                            menjelaskan<br>
                            mencapai<br>
                            mengalami<br>
                            menerima
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">ge-</td>
                        <td>
                            - selesai<br>
                            - bersama-sama<br>
                            - hasil dari tindakan<br>
                            - keberhasilan
                        </td>
                        <td>
                            gehören<br>
                            gewinnen<br>
                            gefallen<br>
                            gelingen
                        </td>
                        <td>
                            memiliki/termasuk<br>
                            menang<br>
                            menyukai<br>
                            berhasil
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">miss-</td>
                        <td>
                            - salah<br>
                            - buruk<br>
                            - gagal<br>
                            - ketidakberhasilan
                        </td>
                        <td>
                            missverstehen<br>
                            missbrauchen<br>
                            misslingen<br>
                            misstrauen
                        </td>
                        <td>
                            salah paham<br>
                            menyalahgunakan<br>
                            gagal<br>
                            tidak percaya
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">ver-</td>
                        <td>
                            - perubahan<br>
                            - hilang/rusak<br>
                            - salah<br>
                            - penguatan
                        </td>
                        <td>
                            verstehen<br>
                            verlieren<br>
                            vergessen<br>
                            verkaufen
                        </td>
                        <td>
                            mengerti<br>
                            kehilangan<br>
                            melupakan<br>
                            menjual
                        </td>
                    </tr>
                    <tr>
                        <td class="highlight-prefix">zer-</td>
                        <td>
                            - hancur<br>
                            - pecah<br>
                            - terpisah<br>
                            - rusak total
                        </td>
                        <td>
                            zerstören<br>
                            zerbrechen<br>
                            zerfallen<br>
                            zerreißen
                        </td>
                        <td>
                            menghancurkan<br>
                            memecahkan<br>
                            hancur<br>
                            merobek
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="section">
            <h2>C. Aturan Penggunaan dan Pembentukan</h2>
            
            <div class="info-box">
                <h3>1. Trennbare Präfixe (Dapat Dipisahkan)</h3>
                <ul>
                    <li>Dalam kalimat utama (Hauptsatz), prefix dipisahkan dan diletakkan di akhir kalimat
                        <div class="usage-example">
                            Ich stehe um 7 Uhr auf. (aufstehen - bangun)
                        </div>
                    </li>
                    <li>Dalam anak kalimat (Nebensatz), prefix tidak dipisahkan
                        <div class="usage-example">
                            ..., weil ich früh aufstehe.
                        </div>
                    </li>
                    <li>Dalam bentuk Infinitiv mit zu, 'zu' disisipkan di antara prefix dan kata kerja
                        <div class="usage-example">
                            Ich habe keine Zeit auf|zu|stehen.
                        </div>
                    </li>
                </ul>
            </div>

            <div class="info-box">
                <h3>2. Untrennbare Präfixe (Tidak Dapat Dipisahkan)</h3>
                <ul>
                    <li>Prefix selalu melekat pada kata kerja dalam semua bentuk kalimat
                        <div class="usage-example">
                            Ich verstehe die Frage. (verstehen - mengerti)
                        </div>
                    </li>
                    <li>Tidak mendapat ge- dalam bentuk Partizip II
                        <div class="usage-example">
                            Ich habe die Frage verstanden. (bukan: "geversanden")
                        </div>
                    </li>
                    <li>Dalam Infinitiv mit zu, 'zu' diletakkan di depan kata kerja
                        <div class="usage-example">
                            Es ist schwer, alles zu verstehen.
                        </div>
                    </li>
                </ul>
            </div>

            <div class="info-box">
                <h3>3. Partizip II (Kata Kerja Bentuk Lampau)</h3>
                <ul>
                    <li>Trennbare Präfixe: ge- disisipkan di antara prefix dan kata kerja
                        <div class="usage-example">
                            aufstehen → auf|ge|standen
                        </div>
                    </li>
                    <li>Untrennbare Präfixe: tidak menggunakan ge-
                        <div class="usage-example">
                            verstehen → verstanden
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="section">
            <h2>D. Tips Penggunaan</h2>
            <div class="example-card">
                <ul>
                    <li>Pelajari prefix bersama dengan kata kerjanya, karena arti prefix bisa berubah tergantung kata kerja yang digabungkan.</li>
                    <li>Perhatikan perubahan makna yang terjadi ketika prefix ditambahkan pada kata kerja dasar.</li>
                    <li>Latih penggunaan dalam konteks kalimat untuk lebih memahami kapan prefix dipisahkan dan kapan tidak.</li>
                    <li>Ingat bahwa beberapa kata kerja bisa memiliki arti yang sangat berbeda dari kata dasar setelah mendapat prefix.</li>
                    <li>Beberapa kata kerja bisa memiliki lebih dari satu prefix yang berbeda, dengan arti yang berbeda pula.</li>
                </ul>
            </div>
        </section>
    </main>
</body>
</html>