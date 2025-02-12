<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomen-Verb-Verbindungen</title>
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
            color: #fff;
            padding: 2rem 1rem;
            text-align: center;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        header p {
            font-size: 1.2rem;
            opacity: .9;
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
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }

        .section h3 {
            color: var(--secondary-color);
            margin: 1.5rem 0 1rem;
            font-size: 1.4rem;
        }

        .section p {
            margin-bottom: 1rem;
        }

        .tips-list {
            list-style: none;
            margin: 1rem 0;
        }

        .tips-list li {
            margin: 1rem 0;
            padding-left: 1.5rem;
            position: relative;
        }

        .tips-list li::before {
            content: "💡";
            position: absolute;
            left: 0;
            top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }

        td,
        th {
            padding: 1rem;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: var(--primary-color);
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .level-tag {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .level-a1 {
            background-color: #e3f2fd;
            color: #1565c0;
        }

        .level-a2 {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .level-b1 {
            background-color: #fff3e0;
            color: #ef6c00;
        }

        .level-b2 {
            background-color: #ffefe1;
            color: #ef1c00;
        }

        #searchInput {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            font-size: 1rem;
        }

        .verb-combo {
            font-weight: 500;
        }

        .example-box {
            background-color: #f0f4f8;
            border-left: 4px solid var(--accent-color);
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0 4px 4px 0;
        }
    </style>
</head>

<body>
    <header>
        <h1>Nomen-Verb-Verbindungen</h1>
        <p>German Noun-Verb Combinations with Translations</p>
    </header>
    <main>
        <section class="section">
            <h2>Apa itu Nomen-Verb-Verbindungen?</h2>
            <p>Nomen-Verb-Verbindungen (kombinasi kata benda dan kata kerja) adalah gabungan kata benda dan kata kerja yang sering digunakan bersama dalam bahasa Jerman. Kombinasi ini membentuk ungkapan yang memiliki makna khusus dan sering kali tidak bisa diterjemahkan kata per kata.</p>

            <div class="example-box">
                Contoh: "eine Entscheidung treffen" = mengambil keputusan<br>
                (bukan sekadar "mengambil" + "keputusan")
            </div>

            <h3>Pentingnya Nomen-Verb-Verbindungen</h3>
            <p>Kombinasi ini sangat penting dalam bahasa Jerman karena:</p>
            <ul class="tips-list">
                <li>Merupakan ungkapan yang sering digunakan dalam percakapan sehari-hari</li>
                <li>Membantu Anda berbicara lebih alami seperti penutur asli</li>
                <li>Banyak digunakan dalam konteks formal dan informal</li>
                <li>Memiliki makna khusus yang berbeda dari terjemahan harfiah</li>
            </ul>
        </section>

        <section class="section">
            <h2>Tips Mempelajari Nomen-Verb-Verbindungen</h2>
            <ul class="tips-list">
                <li>Pelajari kombinasi sebagai satu kesatuan, bukan kata per kata</li>
                <li>Perhatikan artikel (der/die/das) yang menyertai kata benda</li>
                <li>Praktikkan dalam kalimat lengkap untuk memahami konteksnya</li>
                <li>Kelompokkan berdasarkan kata kerja yang sering digunakan (seperti "machen", "haben", "nehmen")</li>
                <li>Buatlah kartu flash dengan kombinasi di satu sisi dan artinya di sisi lain</li>
            </ul>
        </section>

        <section class="section">
            <h2>Daftar Nomen-Verb-Verbindungen</h2>
            <input type="text" id="searchInput" placeholder="Suchen Sie nach Kombinationen oder Übersetzungen...">
            <table>
                <thead>
                    <tr>
                        <th>Level</th>
                        <th>Kombination</th>
                        <th>Bedeutung</th>
                        <th>Biespiel</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">eine Frage stellen</span></td>
                        <td>mengajukan pertanyaan</td>
                        <td>Ich mochte eine Frage stellen.<br>(aku ingin menanyakan pertanyaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">einen Termin machen</span></td>
                        <td>membuat janji</td>
                        <td>Ich möchte einen Termin beim Arzt machen.<br>(Saya ingin membuat janji dengan dokter)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Entscheidung treffen</span></td>
                        <td>mengambil keputusan</td>
                        <td>Wir müssen heute eine wichtige Entscheidung treffen.<br>(Kita harus mengambil keputusan penting hari ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Reise machen</span></td>
                        <td>melakukan perjalanan</td>
                        <td>Nächste Woche mache ich eine Reise nach Berlin.<br>(Minggu depan saya akan melakukan perjalanan ke Berlin)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Verantwortung übernehmen</span></td>
                        <td>mengambil tanggung jawab</td>
                        <td>Er muss für seine Fehler Verantwortung übernehmen.<br>(Dia harus mengambil tanggung jawab atas kesalahannya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">einen Spaziergang machen</span></td>
                        <td>berjalan-jalan</td>
                        <td>Am Wochenende mache ich gerne einen Spaziergang im Park.<br>(Di akhir pekan saya suka berjalan-jalan di taman)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Vorschlag machen</span></td>
                        <td>membuat saran</td>
                        <td>Ich möchte einen Vorschlag für das Projekt machen.<br>(Saya ingin membuat saran untuk proyek ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Maßnahmen ergreifen</span></td>
                        <td>mengambil tindakan</td>
                        <td>Die Firma muss sofort Maßnahmen ergreifen.<br>(Perusahaan harus segera mengambil tindakan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Konsequenzen nach sich ziehen</span></td>
                        <td>menimbulkan konsekuensi</td>
                        <td>Diese Entscheidung wird Konsequenzen nach sich ziehen.<br>(Keputusan ini akan menimbulkan konsekuensi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kritik üben</span></td>
                        <td>memberikan kritik</td>
                        <td>Er übt konstruktive Kritik an dem Vorschlag.<br>(Dia memberikan kritik konstruktif terhadap usulan tersebut)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Schlussfolgerungen ableiten</span></td>
                        <td>menarik kesimpulan</td>
                        <td>Aus den Daten können wir wichtige Schlussfolgerungen ableiten.<br>(Dari data ini kita dapat menarik kesimpulan penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verhandlungen aufnehmen</span></td>
                        <td>memulai negosiasi</td>
                        <td>Wir werden nächste Woche Verhandlungen aufnehmen.<br>(Kita akan memulai negosiasi minggu depan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Überlegungen anstellen</span></td>
                        <td>melakukan pertimbangan</td>
                        <td>Wir müssen gründliche Überlegungen anstellen.<br>(Kita harus melakukan pertimbangan yang menyeluruh)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vorkehrungen treffen</span></td>
                        <td>mengambil tindakan pencegahan</td>
                        <td>Wir müssen Vorkehrungen für den Winter treffen.<br>(Kita harus mengambil tindakan pencegahan untuk musim dingin)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Voraussetzungen schaffen</span></td>
                        <td>menciptakan prasyarat</td>
                        <td>Das Team muss die nötigen Voraussetzungen schaffen.<br>(Tim harus menciptakan prasyarat yang diperlukan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verantwortung tragen</span></td>
                        <td>memikul tanggung jawab</td>
                        <td>Der Manager trägt die Verantwortung für das Team.<br>(Manajer memikul tanggung jawab untuk tim)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Bedingungen stellen</span></td>
                        <td>memberikan persyaratan</td>
                        <td>Der Kunde stellt neue Bedingungen für den Vertrag.<br>(Pelanggan memberikan persyaratan baru untuk kontrak)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Prioritäten setzen</span></td>
                        <td>menetapkan prioritas</td>
                        <td>Wir müssen klare Prioritäten setzen.<br>(Kita harus menetapkan prioritas yang jelas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vergleiche anstellen</span></td>
                        <td>membuat perbandingan</td>
                        <td>Lass uns einen Vergleich zwischen den Angeboten anstellen.<br>(Mari kita membuat perbandingan antara penawaran-penawaran)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kompromisse eingehen</span></td>
                        <td>membuat kompromi</td>
                        <td>Beide Seiten müssen Kompromisse eingehen.<br>(Kedua belah pihak harus membuat kompromi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Erkenntnisse gewinnen</span></td>
                        <td>memperoleh wawasan</td>
                        <td>Aus der Studie können wir wichtige Erkenntnisse gewinnen.<br>(Dari studi ini kita dapat memperoleh wawasan penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Rücksicht nehmen</span></td>
                        <td>mempertimbangkan</td>
                        <td>Wir müssen auf die Bedürfnisse anderer Rücksicht nehmen.<br>(Kita harus mempertimbangkan kebutuhan orang lain)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Beweise erbringen</span></td>
                        <td>memberikan bukti</td>
                        <td>Sie muss Beweise für ihre Behauptungen erbringen.<br>(Dia harus memberikan bukti untuk klaimnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Forderungen stellen</span></td>
                        <td>mengajukan tuntutan</td>
                        <td>Die Mitarbeiter stellen neue Forderungen.<br>(Para karyawan mengajukan tuntutan baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Einschränkungen vornehmen</span></td>
                        <td>membuat pembatasan</td>
                        <td>Wir müssen einige Einschränkungen vornehmen.<br>(Kita harus membuat beberapa pembatasan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Entwicklungen vorhersehen</span></td>
                        <td>memprediksi perkembangan</td>
                        <td>Experten können zukünftige Entwicklungen vorhersehen.<br>(Para ahli dapat memprediksi perkembangan masa depan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Beziehungen pflegen</span></td>
                        <td>memelihara hubungan</td>
                        <td>Es ist wichtig, gute Beziehungen zu Kunden zu pflegen.<br>(Penting untuk memelihara hubungan baik dengan pelanggan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Unterstützung gewähren</span></td>
                        <td>memberikan dukungan</td>
                        <td>Die Regierung gewährt finanzielle Unterstützung.<br>(Pemerintah memberikan dukungan finansial)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Differenzen beilegen</span></td>
                        <td>menyelesaikan perbedaan</td>
                        <td>Die beiden Parteien konnten ihre Differenzen beilegen.<br>(Kedua belah pihak dapat menyelesaikan perbedaan mereka)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Parallelen ziehen</span></td>
                        <td>membuat persamaan</td>
                        <td>Man kann Parallelen zwischen beiden Situationen ziehen.<br>(Orang dapat membuat persamaan antara kedua situasi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kontakte knüpfen</span></td>
                        <td>menjalin kontak</td>
                        <td>Auf der Konferenz können wir neue Kontakte knüpfen.<br>(Di konferensi kita dapat menjalin kontak baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vorbereitungen treffen</span></td>
                        <td>melakukan persiapan</td>
                        <td>Wir müssen Vorbereitungen für die Konferenz treffen.<br>(Kita harus melakukan persiapan untuk konferensi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Beobachtungen anstellen</span></td>
                        <td>melakukan pengamatan</td>
                        <td>Die Wissenschaftler stellen genaue Beobachtungen an.<br>(Para ilmuwan melakukan pengamatan yang teliti)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Zusammenhänge herstellen</span></td>
                        <td>membuat hubungan</td>
                        <td>Wir müssen die Zusammenhänge zwischen den Ereignissen herstellen.<br>(Kita harus membuat hubungan antara kejadian-kejadian)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Recherchen durchführen</span></td>
                        <td>melakukan penelitian</td>
                        <td>Der Journalist muss gründliche Recherchen durchführen.<br>(Jurnalis harus melakukan penelitian yang menyeluruh)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Fortschritte erzielen</span></td>
                        <td>membuat kemajuan</td>
                        <td>Das Team hat bedeutende Fortschritte erzielt.<br>(Tim telah membuat kemajuan yang signifikan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Erwartungen erfüllen</span></td>
                        <td>memenuhi harapan</td>
                        <td>Das Produkt erfüllt alle unsere Erwartungen.<br>(Produk ini memenuhi semua harapan kita)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Anpassungen vornehmen</span></td>
                        <td>melakukan penyesuaian</td>
                        <td>Wir müssen einige Anpassungen am Plan vornehmen.<br>(Kita harus melakukan beberapa penyesuaian pada rencana)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Auswirkungen abschätzen</span></td>
                        <td>memperkirakan dampak</td>
                        <td>Wir müssen die Auswirkungen dieser Entscheidung abschätzen.<br>(Kita harus memperkirakan dampak dari keputusan ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Untersuchungen durchführen</span></td>
                        <td>melakukan penyelidikan</td>
                        <td>Die Polizei führt gründliche Untersuchungen durch.<br>(Polisi melakukan penyelidikan yang menyeluruh)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Lösungsansätze entwickeln</span></td>
                        <td>mengembangkan solusi</td>
                        <td>Das Team muss neue Lösungsansätze entwickeln.<br>(Tim harus mengembangkan pendekatan solusi baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Leistungen erbringen</span></td>
                        <td>memberikan kinerja</td>
                        <td>Die Mitarbeiter erbringen hervorragende Leistungen.<br>(Para karyawan memberikan kinerja yang luar biasa)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vereinbarungen treffen</span></td>
                        <td>membuat kesepakatan</td>
                        <td>Die Parteien haben wichtige Vereinbarungen getroffen.<br>(Para pihak telah membuat kesepakatan penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Rücksprache halten</span></td>
                        <td>melakukan konsultasi</td>
                        <td>Ich muss erst Rücksprache mit meinem Chef halten.<br>(Saya harus berkonsultasi dulu dengan atasan saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Befugnisse übertragen</span></td>
                        <td>mendelegasikan wewenang</td>
                        <td>Der Manager überträgt wichtige Befugnisse an seine Mitarbeiter.<br>(Manajer mendelegasikan wewenang penting kepada stafnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Qualifikationen erwerben</span></td>
                        <td>memperoleh kualifikasi</td>
                        <td>Sie möchte weitere Qualifikationen im IT-Bereich erwerben.<br>(Dia ingin memperoleh kualifikasi tambahan di bidang IT)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verbesserungen vornehmen</span></td>
                        <td>melakukan perbaikan</td>
                        <td>Wir müssen einige Verbesserungen am System vornehmen.<br>(Kita harus melakukan beberapa perbaikan pada sistem)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Argumente vorbringen</span></td>
                        <td>mengajukan argumen</td>
                        <td>Sie brachte überzeugende Argumente vor.<br>(Dia mengajukan argumen yang meyakinkan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Bedingungen erfüllen</span></td>
                        <td>memenuhi persyaratan</td>
                        <td>Der Bewerber erfüllt alle Bedingungen für die Stelle.<br>(Pelamar memenuhi semua persyaratan untuk posisi tersebut)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Schwerpunkte setzen</span></td>
                        <td>menetapkan fokus</td>
                        <td>Wir müssen klare Schwerpunkte in der Arbeit setzen.<br>(Kita harus menetapkan fokus yang jelas dalam pekerjaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ressourcen bereitstellen</span></td>
                        <td>menyediakan sumber daya</td>
                        <td>Das Unternehmen muss die nötigen Ressourcen bereitstellen.<br>(Perusahaan harus menyediakan sumber daya yang diperlukan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kriterien festlegen</span></td>
                        <td>menetapkan kriteria</td>
                        <td>Wir müssen die Kriterien für die Auswahl festlegen.<br>(Kita harus menetapkan kriteria untuk seleksi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Konzepte entwickeln</span></td>
                        <td>mengembangkan konsep</td>
                        <td>Das Team entwickelt innovative Konzepte.<br>(Tim mengembangkan konsep-konsep inovatif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Stellung beziehen</span></td>
                        <td>mengambil posisi</td>
                        <td>Der Politiker muss zu dieser Frage Stellung beziehen.<br>(Politikus harus mengambil posisi terhadap masalah ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Perspektiven aufzeigen</span></td>
                        <td>menunjukkan perspektif</td>
                        <td>Der Berater zeigt neue Perspektiven für das Projekt auf.<br>(Konsultan menunjukkan perspektif baru untuk proyek tersebut)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ziele definieren</span></td>
                        <td>menentukan tujuan</td>
                        <td>Wir müssen klare Ziele für das nächste Jahr definieren.<br>(Kita harus menentukan tujuan yang jelas untuk tahun depan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Strukturen aufbauen</span></td>
                        <td>membangun struktur</td>
                        <td>Das Unternehmen muss neue Strukturen aufbauen.<br>(Perusahaan harus membangun struktur baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Potenziale erschließen</span></td>
                        <td>mengembangkan potensi</td>
                        <td>Wir müssen neue Potenziale für das Wachstum erschließen.<br>(Kita harus mengembangkan potensi baru untuk pertumbuhan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Optionen abwägen</span></td>
                        <td>mempertimbangkan pilihan</td>
                        <td>Sie müssen alle Optionen sorgfältig abwägen.<br>(Mereka harus mempertimbangkan semua pilihan dengan hati-hati)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Erfahrung sammeln</span></td>
                        <td>mengumpulkan pengalaman</td>
                        <td>Ich möchte mehr Erfahrung im Marketing sammeln.<br>(Saya ingin mengumpulkan lebih banyak pengalaman di bidang pemasaran)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Fehler machen</span></td>
                        <td>membuat kesalahan</td>
                        <td>Jeder Mensch kann einen Fehler machen.<br>(Setiap orang bisa membuat kesalahan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Kontakt aufnehmen</span></td>
                        <td>menjalin kontak</td>
                        <td>Ich werde morgen mit dem Kunden Kontakt aufnehmen.<br>(Saya akan menjalin kontak dengan pelanggan besok)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">einen Kaffee trinken</span></td>
                        <td>minum kopi</td>
                        <td>Lass uns einen Kaffee trinken gehen.<br>(Mari kita pergi minum kopi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Zeit haben</span></td>
                        <td>punya waktu</td>
                        <td>Hast du morgen Zeit für ein Treffen?<br>(Apakah kamu punya waktu untuk bertemu besok?)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Musik hören</span></td>
                        <td>mendengarkan musik</td>
                        <td>Ich höre gerne klassische Musik.<br>(Saya suka mendengarkan musik klasik)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Rolle spielen</span></td>
                        <td>memainkan peran</td>
                        <td>Geld spielt keine wichtige Rolle für mich.<br>(Uang tidak memainkan peran penting bagi saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Pause machen</span></td>
                        <td>beristirahat</td>
                        <td>Lass uns eine kurze Pause machen.<br>(Mari kita beristirahat sebentar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Abschied nehmen</span></td>
                        <td>mengucapkan selamat tinggal</td>
                        <td>Es fällt mir schwer, Abschied zu nehmen.<br>(Sulit bagi saya untuk mengucapkan selamat tinggal)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Hunger haben</span></td>
                        <td>merasa lapar</td>
                        <td>Ich habe großen Hunger.<br>(Saya sangat lapar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Wunsch äußern</span></td>
                        <td>mengungkapkan keinginan</td>
                        <td>Sie möchte einen Wunsch äußern.<br>(Dia ingin mengungkapkan sebuah keinginan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Erfolg haben</span></td>
                        <td>meraih kesuksesan</td>
                        <td>Das Projekt wird sicher Erfolg haben.<br>(Proyek ini pasti akan meraih kesuksesan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">ein Foto machen</span></td>
                        <td>mengambil foto</td>
                        <td>Können Sie ein Foto von uns machen?<br>(Bisakah Anda mengambil foto kami?)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Gespräch führen</span></td>
                        <td>melakukan pembicaraan</td>
                        <td>Ich muss ein wichtiges Gespräch mit dir führen.<br>(Saya harus melakukan pembicaraan penting denganmu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Interesse zeigen</span></td>
                        <td>menunjukkan minat</td>
                        <td>Er zeigt großes Interesse an dem Projekt.<br>(Dia menunjukkan minat besar pada proyek tersebut)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Deutsch lernen</span></td>
                        <td>belajar bahasa Jerman</td>
                        <td>Ich lerne seit einem Jahr Deutsch.<br>(Saya belajar bahasa Jerman sejak satu tahun)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Prüfung bestehen</span></td>
                        <td>lulus ujian</td>
                        <td>Sie hat die Prüfung mit sehr gut bestanden.<br>(Dia lulus ujian dengan nilai sangat baik)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Hilfe leisten</span></td>
                        <td>memberikan bantuan</td>
                        <td>Wir müssen den Opfern Hilfe leisten.<br>(Kita harus memberikan bantuan kepada para korban)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Fernsehen schauen</span></td>
                        <td>menonton televisi</td>
                        <td>Ich schaue abends gerne Fernsehen.<br>(Saya suka menonton televisi di malam hari)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Entschuldigung annehmen</span></td>
                        <td>menerima permintaan maaf</td>
                        <td>Ich nehme deine Entschuldigung an.<br>(Saya menerima permintaan maafmu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Rücksicht nehmen</span></td>
                        <td>mempertimbangkan (orang lain)</td>
                        <td>Wir müssen auf die Nachbarn Rücksicht nehmen.<br>(Kita harus mempertimbangkan tetangga)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Sport treiben</span></td>
                        <td>berolahraga</td>
                        <td>Ich treibe jeden Morgen Sport.<br>(Saya berolahraga setiap pagi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Vertrag unterschreiben</span></td>
                        <td>menandatangani kontrak</td>
                        <td>Morgen werde ich den Vertrag unterschreiben.<br>(Besok saya akan menandatangani kontrak)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Zweifel haben</span></td>
                        <td>memiliki keraguan</td>
                        <td>Ich habe Zweifel an seinem Plan.<br>(Saya punya keraguan tentang rencananya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Geld ausgeben</span></td>
                        <td>menghabiskan uang</td>
                        <td>Ich gebe viel Geld für Bücher aus.<br>(Saya menghabiskan banyak uang untuk buku)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Wohnung suchen</span></td>
                        <td>mencari apartemen</td>
                        <td>Ich suche eine Wohnung in Berlin.<br>(Saya mencari apartemen di Berlin)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ausgleich schaffen</span></td>
                        <td>menciptakan keseimbangan</td>
                        <td>Das Unternehmen versucht, einen Ausgleich zwischen Arbeit und Freizeit zu schaffen.<br>(Perusahaan berusaha menciptakan keseimbangan antara kerja dan waktu luang)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Bedingungen formulieren</span></td>
                        <td>merumuskan persyaratan</td>
                        <td>Die Verhandlungspartner formulieren neue Bedingungen.<br>(Para mitra negosiasi merumuskan persyaratan baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Richtlinien entwickeln</span></td>
                        <td>mengembangkan pedoman</td>
                        <td>Das Team entwickelt neue Richtlinien für Projektmanagement.<br>(Tim mengembangkan pedoman baru untuk manajemen proyek)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Feedback integrieren</span></td>
                        <td>mengintegrasikan umpan balik</td>
                        <td>Wir integrieren das Feedback unserer Kunden in unsere Produktentwicklung.<br>(Kami mengintegrasikan umpan balik pelanggan kami ke dalam pengembangan produk)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Anforderungen definieren</span></td>
                        <td>menentukan persyaratan</td>
                        <td>Das Projektteam definiert klare Anforderungen für die neue Software.<br>(Tim proyek menentukan persyaratan jelas untuk perangkat lunak baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Wachstum generieren</span></td>
                        <td>menghasilkan pertumbuhan</td>
                        <td>Unser Unternehmen versucht, neues Wachstum auf internationalen Märkten zu generieren.<br>(Perusahaan kami mencoba menghasilkan pertumbuhan baru di pasar internasional)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Transparenz gewährleisten</span></td>
                        <td>menjamin transparansi</td>
                        <td>Die Geschäftsführung gewährleistet vollständige Transparenz in allen Entscheidungen.<br>(Manajemen menjamin transparansi penuh dalam semua keputusan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Forschung betreiben</span></td>
                        <td>melakukan penelitian</td>
                        <td>Unser Institut betreibt intensive Forschung im Bereich der künstlichen Intelligenz.<br>(Institut kami melakukan penelitian intensif di bidang kecerdasan buatan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Zusammenhänge erkennen</span></td>
                        <td>mengenali hubungan</td>
                        <td>Durch sorgfältige Analyse können wir wichtige Zusammenhänge erkennen.<br>(Melalui analisis cermat, kami dapat mengenali hubungan penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Führungsrolle übernehmen</span></td>
                        <td>mengambil peran kepemimpinan</td>
                        <td>Sie übernimmt die Führungsrolle in diesem schwierigen Projekt.<br>(Dia mengambil peran kepemimpinan dalam proyek sulit ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Einfluss nehmen</span></td>
                        <td>memberikan pengaruh</td>
                        <td>Die Politik versucht, Einfluss auf die Wirtschaftsentwicklung zu nehmen.<br>(Politik berusaha memberikan pengaruh pada perkembangan ekonomi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Beziehungen aufbauen</span></td>
                        <td>membangun hubungan</td>
                        <td>Als Geschäftsmann muss man kontinuierlich neue Beziehungen aufbauen.<br>(Sebagai pengusaha, seseorang harus terus-menerus membangun hubungan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verhandlungen führen</span></td>
                        <td>melakukan negosiasi</td>
                        <td>Die Diplomaten führen schwierige Verhandlungen über Handelsabkommen.<br>(Para diplomat melakukan negosiasi sulit tentang perjanjian perdagangan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Konzepte entwickeln</span></td>
                        <td>mengembangkan konsep</td>
                        <td>Unser Team entwickelt innovative Konzepte für nachhaltige Stadtplanung.<br>(Tim kami mengembangkan konsep inovatif untuk perencanaan kota berkelanjutan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ziele erreichen</span></td>
                        <td>mencapai tujuan</td>
                        <td>Nach harter Arbeit können wir endlich unsere gesteckten Ziele erreichen.<br>(Setelah kerja keras, kami akhirnya dapat mencapai tujuan yang ditetapkan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Standards etablieren</span></td>
                        <td>menetapkan standar</td>
                        <td>Die Firma will neue Qualitätsstandards in der Branche etablieren.<br>(Perusahaan ingin menetapkan standar kualitas baru di industri)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Engagement zeigen</span></td>
                        <td>menunjukkan keterlibatan</td>
                        <td>Die Mitarbeiter zeigen großes Engagement für das Unternehmensziel.<br>(Para karyawan menunjukkan keterlibatan besar pada tujuan perusahaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Nachhaltigkeit fördern</span></td>
                        <td>mendorong keberlanjutan</td>
                        <td>Unser Unternehmen möchte Nachhaltigkeit in allen Geschäftsbereichen fördern.<br>(Perusahaan kami ingin mendorong keberlanjutan di semua bidang bisnis)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Qualität steigern</span></td>
                        <td>meningkatkan kualitas</td>
                        <td>Wir arbeiten kontinuierlich daran, die Qualität unserer Produkte zu steigern.<br>(Kami terus-menerus bekerja untuk meningkatkan kualitas produk kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Strategie implementieren</span></td>
                        <td>mengimplementasikan strategi</td>
                        <td>Das Management beginnt, die neue Marketingstrategie zu implementieren.<br>(Manajemen mulai mengimplementasikan strategi pemasaran baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verantwortung wahrnehmen</span></td>
                        <td>mengambil tanggung jawab</td>
                        <td>Als Führungskraft muss man Verantwortung für das Team wahrnehmen.<br>(Sebagai pemimpin, seseorang harus mengambil tanggung jawab untuk tim)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Wettbewerb analysieren</span></td>
                        <td>menganalisis persaingan</td>
                        <td>Regelmäßig analysieren wir den Wettbewerb, um wettbewerbsfähig zu bleiben.<br>(Secara berkala kami menganalisis persaingan untuk tetap kompetitif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Handlungsspielraum erweitern</span></td>
                        <td>memperluas ruang gerak</td>
                        <td>Das Unternehmen versucht, seinen Handlungsspielraum auf neue Märkte zu erweitern.<br>(Perusahaan berusaha memperluas ruang geraknya ke pasar baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Synergie herstellen</span></td>
                        <td>menciptakan sinergi</td>
                        <td>Durch die Zusammenarbeit verschiedener Abteilungen wollen wir Synergien herstellen.<br>(Melalui kerja sama berbagai departemen, kami ingin menciptakan sinergi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kompetenzen bündeln</span></td>
                        <td>menggabungkan kompetensi</td>
                        <td>In diesem Projekt bündeln wir unsere Kompetenzen.<br>(Dalam proyek ini kami menggabungkan kompetensi kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Innovation vorantreiben</span></td>
                        <td>mendorong inovasi</td>
                        <td>Unser Unternehmen treibt ständig Innovationen voran.<br>(Perusahaan kami terus-menerus mendorong inovasi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Potenziale erschließen</span></td>
                        <td>membuka potensi</td>
                        <td>Wir wollen die Potenziale unserer jungen Mitarbeiter erschließen.<br>(Kami ingin membuka potensi karyawan muda kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Effizienz optimieren</span></td>
                        <td>mengoptimalkan efisiensi</td>
                        <td>Das Team arbeitet daran, die Effizienz der Produktionsprozesse zu optimieren.<br>(Tim bekerja untuk mengoptimalkan efisiensi proses produksi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Strukturen anpassen</span></td>
                        <td>menyesuaikan struktur</td>
                        <td>In Zeiten des Wandels müssen wir unsere Unternehmensstrukturen anpassen.<br>(Di masa perubahan, kami harus menyesuaikan struktur perusahaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Marktposition stärken</span></td>
                        <td>memperkuat posisi pasar</td>
                        <td>Durch innovative Strategien wollen wir unsere Marktposition stärken.<br>(Melalui strategi inovatif, kami ingin memperkuat posisi pasar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Zielgruppe definieren</span></td>
                        <td>mendefinisikan target grup</td>
                        <td>Für unsere Marketingkampagne müssen wir zunächst die Zielgruppe definieren.<br>(Untuk kampanye pemasaran kami, pertama-tama kami harus mendefinisikan target grup)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Schwerpunkte setzen</span></td>
                        <td>menetapkan prioritas</td>
                        <td>In unserem Projekt müssen wir klare Schwerpunkte setzen.<br>(Dalam proyek kami, kami harus menetapkan prioritas yang jelas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Netzwerk erweitern</span></td>
                        <td>memperluas jaringan</td>
                        <td>Auf der Konferenz versuche ich, mein berufliches Netzwerk zu erweitern.<br>(Di konferensi, saya mencoba memperluas jaringan profesional saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Qualitätsstandards erfüllen</span></td>
                        <td>memenuhi standar kualitas</td>
                        <td>Unser Produkt muss alle internationalen Qualitätsstandards erfüllen.<br>(Produk kami harus memenuhi semua standar kualitas internasional)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Strategie entwickeln</span></td>
                        <td>mengembangkan strategi</td>
                        <td>Das Management entwickelt eine neue Strategie für das kommende Geschäftsjahr.<br>(Manajemen mengembangkan strategi baru untuk tahun bisnis mendatang)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Prozesse gestalten</span></td>
                        <td>membentuk proses</td>
                        <td>Wir müssen unsere Geschäftsprozesse effizienter gestalten.<br>(Kami harus membentuk proses bisnis kami menjadi lebih efisien)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ressourcen planen</span></td>
                        <td>merencanakan sumber daya</td>
                        <td>Für das Großprojekt müssen wir sorgfältig unsere Ressourcen planen.<br>(Untuk proyek besar, kami harus merencanakan sumber daya kami dengan cermat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ergebnisse evaluieren</span></td>
                        <td>mengevaluasi hasil</td>
                        <td>Nach Abschluss des Projekts werden wir die Ergebnisse gründlich evaluieren.<br>(Setelah proyek selesai, kami akan mengevaluasi hasilnya secara menyeluruh)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Maßstäbe setzen</span></td>
                        <td>menetapkan standar</td>
                        <td>Unser Unternehmen will neue Maßstäbe in der Branche setzen.<br>(Perusahaan kami ingin menetapkan standar baru di industri)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Erfolg messen</span></td>
                        <td>mengukur keberhasilan</td>
                        <td>Wir müssen definieren, wie wir den Erfolg unseres Projekts messen werden.<br>(Kami harus menentukan bagaimana kami akan mengukur keberhasilan proyek kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Fortschritt dokumentieren</span></td>
                        <td>mendokumentasikan kemajuan</td>
                        <td>In unserem Projekt ist es wichtig, den Fortschritt regelmäßig zu dokumentieren.<br>(Dalam proyek kami, penting untuk mendokumentasikan kemajuan secara berkala)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Leistung bewerten</span></td>
                        <td>menilai kinerja</td>
                        <td>Jährlich bewerten wir die Leistung unserer Mitarbeiter.<br>(Setiap tahun kami menilai kinerja karyawan kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Konzepte präsentieren</span></td>
                        <td>mempresentasikan konsep</td>
                        <td>In der Besprechung werden wir unsere neuen Konzepte präsentieren.<br>(Dalam rapat, kami akan mempresentasikan konsep-konsep baru kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Wissen vermitteln</span></td>
                        <td>menyampaikan pengetahuan</td>
                        <td>Als Trainer ist es meine Aufgabe, Wissen effektiv zu vermitteln.<br>(Sebagai pelatih, tugas saya adalah menyampaikan pengetahuan secara efektif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ziele vereinbaren</span></td>
                        <td>menyepakati tujuan</td>
                        <td>In unserem Mitarbeitergespräch werden wir die Ziele für das nächste Jahr vereinbaren.<br>(Dalam pembicaraan dengan karyawan, kami akan menyepakati tujuan untuk tahun depan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Strukturen optimieren</span></td>
                        <td>mengoptimalkan struktur</td>
                        <td>Um effizienter zu werden, müssen wir unsere Unternehmensstrukturen optimieren.<br>(Untuk menjadi lebih efisien, kami harus mengoptimalkan struktur perusahaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Qualität sichern</span></td>
                        <td>menjamin kualitas</td>
                        <td>Wir haben strenge Kontrollen, um die Qualität unserer Produkte zu sichern.<br>(Kami memiliki kontrol ketat untuk menjamin kualitas produk kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Prozesse verbessern</span></td>
                        <td>meningkatkan proses</td>
                        <td>Unser Ziel ist es, kontinuierlich unsere Geschäftsprozesse zu verbessern.<br>(Tujuan kami adalah terus-menerus meningkatkan proses bisnis kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Erfolge erzielen</span></td>
                        <td>mencapai keberhasilan</td>
                        <td>Durch harte Arbeit können wir bedeutende Erfolge erzielen.<br>(Melalui kerja keras, kami dapat mencapai keberhasilan yang signifikan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ergebnisse dokumentieren</span></td>
                        <td>mendokumentasikan hasil</td>
                        <td>Nach jedem Projekt ist es wichtig, die Ergebnisse sorgfältig zu dokumentieren.<br>(Setelah setiap proyek, penting untuk mendokumentasikan hasil secara cermat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Standards einhalten</span></td>
                        <td>mematuhi standar</td>
                        <td>Unser Unternehmen muss strenge internationale Standards einhalten.<br>(Perusahaan kami harus mematuhi standar internasional yang ketat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ziele definieren</span></td>
                        <td>mendefinisikan tujuan</td>
                        <td>Wir müssen klare Ziele für das nächste Geschäftsjahr definieren.<br>(Kami harus mendefinisikan tujuan yang jelas untuk tahun bisnis berikutnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Mut fassen</span></td>
                        <td>mengumpulkan keberanian</td>
                        <td>Ich fasste Mut und sprach mit meinem Chef.<br>(Saya mengumpulkan keberanian dan berbicara dengan atasan saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Spaß haben</span></td>
                        <td>bersenang-senang</td>
                        <td>Wir haben viel Spaß beim Spielen.<br>(Kami bersenang-senang saat bermain)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Termin vereinbaren</span></td>
                        <td>membuat janji temu</td>
                        <td>Können wir einen Termin für nächste Woche vereinbaren?<br>(Bisakah kita membuat janji temu untuk minggu depan?)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Kritik üben</span></td>
                        <td>memberikan kritik</td>
                        <td>Er übt konstruktive Kritik an dem Projektvorschlag.<br>(Dia memberikan kritik konstruktif terhadap usulan proyek)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Angst haben</span></td>
                        <td>merasa takut</td>
                        <td>Ich habe Angst vor Spinnen.<br>(Saya takut pada laba-laba)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Antwort geben</span></td>
                        <td>memberikan jawaban</td>
                        <td>Kannst du mir eine Antwort auf meine Frage geben?<br>(Bisakah kamu memberikan jawaban atas pertanyaanku?)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Verständnis zeigen</span></td>
                        <td>menunjukkan pengertian</td>
                        <td>Mein Lehrer zeigt Verständnis für meine Situation.<br>(Guru saya menunjukkan pengertian terhadap situasi saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Urlaub machen</span></td>
                        <td>berlibur</td>
                        <td>Wir machen dieses Jahr Urlaub in Spanien.<br>(Kami berlibur di Spanyol tahun ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Plan machen</span></td>
                        <td>membuat rencana</td>
                        <td>Lass uns einen Plan für das Wochenende machen.<br>(Mari kita membuat rencana untuk akhir pekan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Einfluss nehmen</span></td>
                        <td>memberikan pengaruh</td>
                        <td>Die Regierung versucht, Einfluss auf die Wirtschaft zu nehmen.<br>(Pemerintah berusaha memberikan pengaruh pada ekonomi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Durst haben</span></td>
                        <td>merasa haus</td>
                        <td>Ich habe großen Durst nach dem Sport.<br>(Saya sangat haus setelah olahraga)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Problem lösen</span></td>
                        <td>memecahkan masalah</td>
                        <td>Wir müssen gemeinsam dieses Problem lösen.<br>(Kita harus bersama-sama memecahkan masalah ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Stellung nehmen</span></td>
                        <td>mengambil posisi</td>
                        <td>Der Politiker nimmt zu der aktuellen Situation Stellung.<br>(Politikus itu mengambil posisi tentang situasi saat ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Radio hören</span></td>
                        <td>mendengarkan radio</td>
                        <td>Ich höre gerne Radio beim Frühstück.<br>(Saya suka mendengarkan radio saat sarapan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Rechnung bezahlen</span></td>
                        <td>membayar tagihan</td>
                        <td>Ich muss heute die Stromrechnung bezahlen.<br>(Saya harus membayar tagihan listrik hari ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Schritt halten</span></td>
                        <td>mengikuti perkembangan</td>
                        <td>In der schnelllebigen Technologiebranche ist es schwierig, Schritt zu halten.<br>(Di industri teknologi yang cepat berubah, sulit untuk mengikuti perkembangan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Glück haben</span></td>
                        <td>beruntung</td>
                        <td>Heute habe ich großes Glück!<br>(Hari ini saya sangat beruntung!)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Meinung haben</span></td>
                        <td>memiliki pendapat</td>
                        <td>Jeder hat seine eigene Meinung zu diesem Thema.<br>(Setiap orang memiliki pendapatnya sendiri tentang topik ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Maßnahmen treffen</span></td>
                        <td>mengambil tindakan</td>
                        <td>Die Regierung trifft Maßnahmen gegen die Umweltverschmutzung.<br>(Pemerintah mengambil tindakan melawan pencemaran lingkungan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Frühstück machen</span></td>
                        <td>membuat sarapan</td>
                        <td>Ich mache jeden Morgen ein schnelles Frühstück.<br>(Saya membuat sarapan cepat setiap pagi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Kurs besuchen</span></td>
                        <td>mengikuti kursus</td>
                        <td>Ich besuche einen Deutschkurs an der Volkshochschule.<br>(Saya mengikuti kursus bahasa Jerman di pusat pendidikan masyarakat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Distanz wahren</span></td>
                        <td>menjaga jarak</td>
                        <td>In schwierigen Situationen ist es wichtig, professionelle Distanz zu wahren.<br>(Dalam situasi sulit, penting untuk menjaga jarak profesional)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Zeit verbringen</span></td>
                        <td>menghabiskan waktu</td>
                        <td>Ich verbringe gerne Zeit mit meiner Familie.<br>(Saya suka menghabiskan waktu dengan keluarga saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Mail schreiben</span></td>
                        <td>menulis email</td>
                        <td>Ich werde eine Mail an meinen Kollegen schreiben.<br>(Saya akan menulis email kepada rekan saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Folge leisten</span></td>
                        <td>mematuhi</td>
                        <td>Wir müssen den Anweisungen der Behörden Folge leisten.<br>(Kita harus mematuhi instruksi pihak berwenang)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Hausaufgaben machen</span></td>
                        <td>mengerjakan PR</td>
                        <td>Ich mache meine Hausaufgaben nach dem Abendessen.<br>(Saya mengerjakan PR setelah makan malam)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Fehler korrigieren</span></td>
                        <td>memperbaiki kesalahan</td>
                        <td>Kannst du mir helfen, meinen Fehler zu korrigieren?<br>(Bisakah kamu membantuku memperbaiki kesalahan?)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Rat geben</span></td>
                        <td>memberi nasihat</td>
                        <td>Mein Freund gibt mir immer guten Rat.<br>(Teman saya selalu memberi nasihat bagus)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Fieber haben</span></td>
                        <td>demam</td>
                        <td>Ich habe Fieber und fühle mich nicht gut.<br>(Saya demam dan tidak merasa baik)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Party organisieren</span></td>
                        <td>mengorganisir pesta</td>
                        <td>Wir organisieren eine Party zum Geburtstag.<br>(Kami mengorganisir pesta ulang tahun)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Gestalt annehmen</span></td>
                        <td>mengambil bentuk</td>
                        <td>Der Plan beginnt Gestalt anzunehmen.<br>(Rencana mulai mengambil bentuk)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">einen Film sehen</span></td>
                        <td>menonton film</td>
                        <td>Wir sehen heute Abend einen Film.<br>(Kami menonton film malam ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Geschichte erzählen</span></td>
                        <td>menceritakan kisah</td>
                        <td>Mein Opa erzählt immer spannende Geschichten.<br>(Kakek saya selalu menceritakan kisah menarik)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Bericht erstatten</span></td>
                        <td>membuat laporan</td>
                        <td>Der Journalist erstattet Bericht über die Ereignisse.<br>(Jurnalis membuat laporan tentang peristiwa-peristiwa)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Geburtstag feiern</span></td>
                        <td>merayakan ulang tahun</td>
                        <td>Ich feiere meinen Geburtstag mit Freunden.<br>(Saya merayakan ulang tahun dengan teman-teman)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Unfall haben</span></td>
                        <td>mengalami kecelakaan</td>
                        <td>Zum Glück hatte er nur einen kleinen Unfall.<br>(Untungnya dia hanya mengalami kecelakaan kecil)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Kraft gewinnen</span></td>
                        <td>mendapatkan kekuatan</td>
                        <td>Nach der Krankheit gewinnt er langsam wieder Kraft.<br>(Setelah sakit, dia perlahan mendapatkan kekuatan kembali)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Brot kaufen</span></td>
                        <td>membeli roti</td>
                        <td>Ich kaufe frisches Brot beim Bäcker.<br>(Saya membeli roti segar di toko roti)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Krankheit bekommen</span></td>
                        <td>terkena penyakit</td>
                        <td>Im Winter bekomme ich oft eine Erkältung.<br>(Di musim dingin, saya sering terkena flu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Beweis führen</span></td>
                        <td>memberikan bukti</td>
                        <td>Der Anwalt versucht, seine Unschuld zu beweisen.<br>(Pengacara berusaha memberikan bukti ketidakbersalahan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Wasser trinken</span></td>
                        <td>minum air</td>
                        <td>Ich trinke jeden Tag viel Wasser.<br>(Saya minum banyak air setiap hari)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Lösung finden</span></td>
                        <td>menemukan solusi</td>
                        <td>Wir müssen gemeinsam eine Lösung finden.<br>(Kita harus bersama-sama menemukan solusi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Protokoll führen</span></td>
                        <td>membuat notulen</td>
                        <td>In der Sitzung führt der Sekretär Protokoll.<br>(Dalam rapat, sekretaris membuat notulen)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Bücher lesen</span></td>
                        <td>membaca buku</td>
                        <td>Ich lese gerne Bücher am Wochenende.<br>(Saya suka membaca buku di akhir pekan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Ziel erreichen</span></td>
                        <td>mencapai tujuan</td>
                        <td>Nach harter Arbeit erreichte er sein Ziel.<br>(Setelah kerja keras, dia mencapai tujuannya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Stellung beziehen</span></td>
                        <td>mengambil posisi</td>
                        <td>Der Politiker bezieht klar Stellung zu diesem Thema.<br>(Politikus itu mengambil posisi jelas tentang topik ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Zeitung lesen</span></td>
                        <td>membaca koran</td>
                        <td>Ich lese jeden Morgen die Zeitung.<br>(Saya membaca koran setiap pagi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Unterschied machen</span></td>
                        <td>membuat perbedaan</td>
                        <td>Kleine Handlungen können einen großen Unterschied machen.<br>(Tindakan kecil dapat membuat perbedaan besar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Kenntnis nehmen</span></td>
                        <td>mencatat</td>
                        <td>Ich nehme von der Situation Kenntnis.<br>(Saya mencatat situasi ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Karten spielen</span></td>
                        <td>bermain kartu</td>
                        <td>Wir spielen am Wochenende gerne Karten.<br>(Kami suka bermain kartu di akhir pekan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Versprechen halten</span></td>
                        <td>menepati janji</td>
                        <td>Er hält immer seine Versprechen.<br>(Dia selalu menepati janjinya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Ordnung schaffen</span></td>
                        <td>menciptakan keteraturan</td>
                        <td>Ich muss endlich Ordnung in meinem Zimmer schaffen.<br>(Saya harus akhirnya menciptakan keteraturan di kamar saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Fußball spielen</span></td>
                        <td>bermain sepak bola</td>
                        <td>Am Samstag spielen wir Fußball.<br>(Pada hari Sabtu kami bermain sepak bola)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Idee entwickeln</span></td>
                        <td>mengembangkan ide</td>
                        <td>Wir entwickeln eine neue Idee für das Projekt.<br>(Kami mengembangkan ide baru untuk proyek)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Wert legen</span></td>
                        <td>memberi nilai</td>
                        <td>Ich lege großen Wert auf Ehrlichkeit.<br>(Saya memberi nilai besar pada kejujuran)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Freunde treffen</span></td>
                        <td>bertemu teman</td>
                        <td>Ich treffe meine Freunde am Wochenende.<br>(Saya bertemu teman-teman di akhir pekan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Hobby haben</span></td>
                        <td>memiliki hobi</td>
                        <td>Mein Hobby ist Fotografieren.<br>(Hobi saya adalah fotografi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Daten analysieren</span></td>
                        <td>menganalisis data</td>
                        <td>Das Team wird die Umfrageergebnisse analysieren.<br>(Tim akan menganalisis hasil survei)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Trends erkennen</span></td>
                        <td>mengenali tren</td>
                        <td>Experten können neue Markttrends erkennen.<br>(Para ahli dapat mengenali tren pasar baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Projekte koordinieren</span></td>
                        <td>mengoordinasikan proyek</td>
                        <td>Sie koordiniert mehrere internationale Projekte.<br>(Dia mengoordinasikan beberapa proyek internasional)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Protokoll führen</span></td>
                        <td>membuat notulen</td>
                        <td>Der Sekretär führt Protokoll während der Besprechung.<br>(Sekretaris membuat notulen selama rapat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Bericht verfassen</span></td>
                        <td>menyusun laporan</td>
                        <td>Ich werde einen ausführlichen Bericht über das Projekt verfassen.<br>(Saya akan menyusun laporan terperinci tentang proyek)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verbesserungen einführen</span></td>
                        <td>menerapkan perbaikan</td>
                        <td>Das Unternehmen führt neue Verbesserungen in der Produktion ein.<br>(Perusahaan menerapkan perbaikan baru dalam produksi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kooperation eingehen</span></td>
                        <td>menjalin kerja sama</td>
                        <td>Wir gehen eine strategische Kooperation mit einem neuen Partner ein.<br>(Kami menjalin kerja sama strategis dengan mitra baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Führungskräfte entwickeln</span></td>
                        <td>mengembangkan pemimpin</td>
                        <td>Das Unternehmen entwickelt gezielt Führungskräfte für die Zukunft.<br>(Perusahaan secara sengaja mengembangkan pemimpin untuk masa depan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Dokumentation erstellen</span></td>
                        <td>membuat dokumentasi</td>
                        <td>Wir müssen eine vollständige Dokumentation des Projekts erstellen.<br>(Kami harus membuat dokumentasi lengkap proyek)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Beratung anbieten</span></td>
                        <td>menawarkan konsultasi</td>
                        <td>Unsere Experten bieten kostenlose Beratung an.<br>(Para ahli kami menawarkan konsultasi gratis)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Leitung übernehmen</span></td>
                        <td>mengambil alih kepemimpinan</td>
                        <td>Er wird die Leitung des neuen Projekts übernehmen.<br>(Dia akan mengambil alih kepemimpinan proyek baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Schwächen ausgleichen</span></td>
                        <td>mengimbangi kelemahan</td>
                        <td>Ein gutes Team kann die Schwächen einzelner Mitglieder ausgleichen.<br>(Tim yang bagus dapat mengimbangi kelemahan anggota individual)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Stärken ausbauen</span></td>
                        <td>mengembangkan kekuatan</td>
                        <td>Wir wollen unsere Stärken im Kundenservice ausbauen.<br>(Kami ingin mengembangkan kekuatan kami di layanan pelanggan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vision entwickeln</span></td>
                        <td>mengembangkan visi</td>
                        <td>Das Unternehmen entwickelt eine langfristige Vision für Nachhaltigkeit.<br>(Perusahaan mengembangkan visi jangka panjang untuk keberlanjutan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Mission definieren</span></td>
                        <td>mendefinisikan misi</td>
                        <td>Wir haben unsere Mission klar definiert: Kunden bestmöglich zu unterstützen.<br>(Kami telah mendefinisikan misi kami dengan jelas: mendukung pelanggan sebaik mungkin)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Werte vermitteln</span></td>
                        <td>menyampaikan nilai-nilai</td>
                        <td>Die Unternehmenskultur hilft, wichtige Werte zu vermitteln.<br>(Budaya perusahaan membantu menyampaikan nilai-nilai penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kultur prägen</span></td>
                        <td>membentuk budaya</td>
                        <td>Gute Führungskräfte prägen eine positive Unternehmenskultur.<br>(Pemimpin yang baik membentuk budaya perusahaan yang positif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Identität stiften</span></td>
                        <td>membangun identitas</td>
                        <td>Ein starkes Leitbild hilft, Identität zu stiften.<br>(Visi yang kuat membantu membangun identitas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Motivation steigern</span></td>
                        <td>meningkatkan motivasi</td>
                        <td>Regelmäßiges Feedback kann die Motivation der Mitarbeiter steigern.<br>(Umpan balik berkala dapat meningkatkan motivasi karyawan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Engagement fördern</span></td>
                        <td>mendorong keterlibatan</td>
                        <td>Das Unternehmen fördert das Engagement seiner Mitarbeiter.<br>(Perusahaan mendorong keterlibatan karyawannya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Innovation treiben</span></td>
                        <td>mendorong inovasi</td>
                        <td>Wir wollen die Innovationskraft unseres Teams treiben.<br>(Kami ingin mendorong kekuatan inovasi tim kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Fortschritt erzielen</span></td>
                        <td>mencapai kemajuan</td>
                        <td>Durch systematische Arbeit können wir bedeutende Fortschritte erzielen.<br>(Melalui kerja sistematis, kami dapat mencapai kemajuan signifikan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Entwicklung vorantreiben</span></td>
                        <td>mendorong perkembangan</td>
                        <td>Das Forschungsteam treibt die Entwicklung neuer Technologien voran.<br>(Tim penelitian mendorong perkembangan teknologi baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Wachstum sichern</span></td>
                        <td>memastikan pertumbuhan</td>
                        <td>Strategische Investitionen helfen, nachhaltiges Wachstum zu sichern.<br>(Investasi strategis membantu memastikan pertumbuhan berkelanjutan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Nachhaltigkeit gewährleisten</span></td>
                        <td>menjamin keberlanjutan</td>
                        <td>Unser Unternehmen will Nachhaltigkeit in allen Geschäftsbereichen gewährleisten.<br>(Perusahaan kami ingin menjamin keberlanjutan di semua bidang bisnis)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Zukunft gestalten</span></td>
                        <td>membentuk masa depan</td>
                        <td>Innovative Unternehmen gestalten aktiv ihre Zukunft.<br>(Perusahaan inovatif secara aktif membentuk masa depannya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Perspektiven schaffen</span></td>
                        <td>menciptakan perspektif</td>
                        <td>Die Weiterbildungsprogramme schaffen neue berufliche Perspektiven.<br>(Program pelatihan lanjutan menciptakan perspektif karier baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Chancen nutzen</span></td>
                        <td>memanfaatkan kesempatan</td>
                        <td>Erfolgreiche Unternehmer nutzen neue Marktchancen schnell.<br>(Pengusaha sukses dengan cepat memanfaatkan kesempatan pasar baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Risiken minimieren</span></td>
                        <td>meminimalkan risiko</td>
                        <td>Eine gute Strategie hilft, unternehmerische Risiken zu minimieren.<br>(Strategi yang baik membantu meminimalkan risiko bisnis)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Herausforderungen meistern</span></td>
                        <td>menguasai tantangan</td>
                        <td>Nur wer Herausforderungen meistert, kann erfolgreich sein.<br>(Hanya yang menguasai tantangan dapat berhasil)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Probleme lösen</span></td>
                        <td>memecahkan masalah</td>
                        <td>Ein kreatives Team kann komplexe Probleme schnell lösen.<br>(Tim kreatif dapat dengan cepat memecahkan masalah kompleks)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Konflikte bewältigen</span></td>
                        <td>mengatasi konflik</td>
                        <td>Professionelle Kommunikation hilft, Konflikte konstruktiv zu bewältigen.<br>(Komunikasi profesional membantu mengatasi konflik secara konstruktif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Krisen managen</span></td>
                        <td>mengelola krisis</td>
                        <td>Erfahrene Manager können Unternehmenskrisen effektiv managen.<br>(Manajer berpengalaman dapat mengelola krisis perusahaan secara efektif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Veränderungen steuern</span></td>
                        <td>mengendalikan perubahan</td>
                        <td>Erfolgreiche Unternehmen können Veränderungsprozesse gezielt steuern.<br>(Perusahaan sukses dapat mengendalikan proses perubahan secara terarah)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Transformation begleiten</span></td>
                        <td>mendampingi transformasi</td>
                        <td>Gute Führungskräfte begleiten Mitarbeiter durch Transformationsprozesse.<br>(Pemimpin yang baik mendampingi karyawan melalui proses transformasi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Wandel gestalten</span></td>
                        <td>membentuk perubahan</td>
                        <td>Innovative Unternehmen gestalten aktiv den digitalen Wandel.<br>(Perusahaan inovatif secara aktif membentuk perubahan digital)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Anpassung vornehmen</span></td>
                        <td>melakukan penyesuaian</td>
                        <td>Wir müssen ständig Anpassungen an unserer Strategie vornehmen.<br>(Kami harus terus-menerus melakukan penyesuaian pada strategi kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Optimierung durchführen</span></td>
                        <td>melakukan optimisasi</td>
                        <td>Das Technikteam führt eine umfassende Systemoptimierung durch.<br>(Tim teknis melakukan optimasi sistem menyeluruh)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Effizienz steigern</span></td>
                        <td>meningkatkan efisiensi</td>
                        <td>Neue Arbeitsmethoden helfen, die Effizienz zu steigern.<br>(Metode kerja baru membantu meningkatkan efisiensi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Produktivität erhöhen</span></td>
                        <td>meningkatkan produktivitas</td>
                        <td>Moderne Technologien können die Produktivität deutlich erhöhen.<br>(Teknologi modern dapat secara signifikan meningkatkan produktivitas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Qualität verbessern</span></td>
                        <td>meningkatkan kualitas</td>
                        <td>Kontinuierliche Schulungen helfen, die Produktqualität zu verbessern.<br>(Pelatihan berkelanjutan membantu meningkatkan kualitas produk)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Leistung optimieren</span></td>
                        <td>mengoptimalkan kinerja</td>
                        <td>Das Team arbeitet daran, die Leistung zu optimieren.<br>(Tim bekerja untuk mengoptimalkan kinerja)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Erfolg sicherstellen</span></td>
                        <td>memastikan keberhasilan</td>
                        <td>Wir müssen alle Maßnahmen ergreifen, um den Erfolg zu sicherstellen.<br>(Kami harus mengambil semua tindakan untuk memastikan keberhasilan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ziele erreichen</span></td>
                        <td>mencapai tujuan</td>
                        <td>Mit Engagement und Strategie können wir unsere Ziele erreichen.<br>(Dengan dedikasi dan strategi, kami dapat mencapai tujuan kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vorgaben erfüllen</span></td>
                        <td>memenuhi persyaratan</td>
                        <td>Das Projekt muss alle vorgegebenen Kriterien erfüllen.<br>(Proyek harus memenuhi semua kriteria yang ditetapkan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Erwartungen übertreffen</span></td>
                        <td>melampaui harapan</td>
                        <td>Unser Ziel ist es, die Kundenerwartungen zu übertreffen.<br>(Tujuan kami adalah melampaui harapan pelanggan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Standards setzen</span></td>
                        <td>menetapkan standar</td>
                        <td>In unserem Bereich wollen wir neue Qualitätsstandards setzen.<br>(Di bidang kami, kami ingin menetapkan standar kualitas baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Maßstäbe definieren</span></td>
                        <td>mendefinisikan tolok ukur</td>
                        <td>Die Geschäftsleitung definiert klare Maßstäbe für den Unternehmenserfolg.<br>(Manajemen mendefinisikan tolok ukur jelas untuk keberhasilan perusahaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kriterien festlegen</span></td>
                        <td>menetapkan kriteria</td>
                        <td>Wir müssen gemeinsam die Auswahlkriterien festlegen.<br>(Kami harus bersama-sama menetapkan kriteria seleksi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Richtlinien etablieren</span></td>
                        <td>menetapkan pedoman</td>
                        <td>Das Unternehmen etabliert neue Richtlinien für Nachhaltigkeit.<br>(Perusahaan menetapkan pedoman baru untuk keberlanjutan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vorgehen bestimmen</span></td>
                        <td>menentukan prosedur</td>
                        <td>Für jedes Projekt müssen wir das Vorgehen im Team bestimmen.<br>(Untuk setiap proyek, kami harus menentukan prosedur dalam tim)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Methoden entwickeln</span></td>
                        <td>mengembangkan metode</td>
                        <td>Unser Forschungsteam entwickelt innovative Methoden zur Datenanalyse.<br>(Tim penelitian kami mengembangkan metode inovatif untuk analisis data)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Konzepte erarbeiten</span></td>
                        <td>mengembangkan konsep</td>
                        <td>Wir erarbeiten gemeinsam neue Marketingkonzepte.<br>(Kami mengembangkan konsep pemasaran baru bersama-sama)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Strategien formulieren</span></td>
                        <td>merumuskan strategi</td>
                        <td>Das Management muss klare Wachstumsstrategien formulieren.<br>(Manajemen harus merumuskan strategi pertumbuhan yang jelas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Pläne erstellen</span></td>
                        <td>membuat rencana</td>
                        <td>Für das kommende Geschäftsjahr müssen wir detaillierte Pläne erstellen.<br>(Untuk tahun bisnis mendatang, kami harus membuat rencana terperinci)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ansätze definieren</span></td>
                        <td>mendefinisikan pendekatan</td>
                        <td>Wir müssen klare Ansätze für die Problemlösung definieren.<br>(Kami harus mendefinisikan pendekatan jelas untuk pemecahan masalah)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Lösungen entwickeln</span></td>
                        <td>mengembangkan solusi</td>
                        <td>Unser Team entwickelt innovative Lösungen für komplexe Herausforderungen.<br>(Tim kami mengembangkan solusi inovatif untuk tantangan kompleks)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ideen generieren</span></td>
                        <td>menghasilkan ide</td>
                        <td>In unserem Brainstorming wollen wir neue Ideen generieren.<br>(Dalam brainstorming kami, kami ingin menghasilkan ide baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Innovation fördern</span></td>
                        <td>mendorong inovasi</td>
                        <td>Das Unternehmen fördert aktiv die Innovationskultur.<br>(Perusahaan secara aktif mendorong budaya inovasi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kreativität entfalten</span></td>
                        <td>mengembangkan kreativitas</td>
                        <td>In Workshops können Mitarbeiter ihre Kreativität entfalten.<br>(Dalam lokakarya, karyawan dapat mengembangkan kreativitas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Potenziale erschließen</span></td>
                        <td>membuka potensi</td>
                        <td>Wir müssen die verborgenen Potenziale unseres Teams erschließen.<br>(Kami harus membuka potensi tersembunyi tim kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Talente fördern</span></td>
                        <td>mengembangkan bakat</td>
                        <td>Unser Unternehmen fördert aktiv die Talente junger Mitarbeiter.<br>(Perusahaan kami secara aktif mengembangkan bakat karyawan muda)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kompetenzen aufbauen</span></td>
                        <td>membangun kompetensi</td>
                        <td>Durch gezielte Weiterbildung bauen wir wichtige Kompetenzen auf.<br>(Melalui pelatihan lanjutan yang terarah, kami membangun kompetensi penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Fähigkeiten entwickeln</span></td>
                        <td>mengembangkan kemampuan</td>
                        <td>In Trainings können Mitarbeiter ihre Kommunikationsfähigkeiten entwickeln.<br>(Dalam pelatihan, karyawan dapat mengembangkan kemampuan komunikasi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kenntnisse vertiefen</span></td>
                        <td>memperdalam pengetahuan</td>
                        <td>Regelmäßige Schulungen helfen, die Fachkenntnisse zu vertiefen.<br>(Pelatihan berkala membantu memperdalam pengetahuan teknis)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Erfahrungen sammeln</span></td>
                        <td>mengumpulkan pengalaman</td>
                        <td>In internationalen Projekten können wir wertvolle Erfahrungen sammeln.<br>(Dalam proyek internasional, kami dapat mengumpulkan pengalaman berharga)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Expertise entwickeln</span></td>
                        <td>mengembangkan keahlian</td>
                        <td>Durch kontinuierliches Lernen entwickeln wir unsere Expertise.<br>(Melalui pembelajaran berkelanjutan, kami mengembangkan keahlian)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Wissen erweitern</span></td>
                        <td>memperluas pengetahuan</td>
                        <td>Durch Fachliteratur können wir unser Wissen ständig erweitern.<br>(Melalui literatur teknis, kami dapat terus memperluas pengetahuan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Qualifikation erhöhen</span></td>
                        <td>meningkatkan kualifikasi</td>
                        <td>Zusätzliche Kurse helfen, die berufliche Qualifikation zu erhöhen.<br>(Kursus tambahan membantu meningkatkan kualifikasi profesional)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Technologien einsetzen</span></td>
                        <td>menerapkan teknologi</td>
                        <td>Moderne Unternehmen setzen innovative Technologien gezielt ein.<br>(Perusahaan modern menerapkan teknologi inovatif secara terarah)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Systeme implementieren</span></td>
                        <td>mengimplementasikan sistem</td>
                        <td>Wir werden ein neues Managementsystem implementieren.<br>(Kami akan mengimplementasikan sistem manajemen baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Infrastruktur aufbauen</span></td>
                        <td>membangun infrastruktur</td>
                        <td>Das Unternehmen baut eine moderne digitale Infrastruktur auf.<br>(Perusahaan membangun infrastruktur digital modern)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ressourcen einsetzen</span></td>
                        <td>menggunakan sumber daya</td>
                        <td>Wir müssen unsere Ressourcen effizient einsetzen.<br>(Kami harus menggunakan sumber daya kami secara efisien)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kapazitäten nutzen</span></td>
                        <td>memanfaatkan kapasitas</td>
                        <td>Unser Ziel ist es, die vorhandenen Kapazitäten optimal zu nutzen.<br>(Tujuan kami adalah memanfaatkan kapasitas yang ada secara optimal)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Prozesse digitalisieren</span></td>
                        <td>mendigitalkan proses</td>
                        <td>Wir digitalisieren unsere Geschäftsprozesse Schritt für Schritt.<br>(Kami mendigitalkan proses bisnis kami selangkah demi selangkah)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Daten verarbeiten</span></td>
                        <td>memproses data</td>
                        <td>Moderne Algorithmen helfen uns, große Datenmengen zu verarbeiten.<br>(Algoritma modern membantu kami memproses volume data besar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Information generieren</span></td>
                        <td>menghasilkan informasi</td>
                        <td>Unser Analyseteam generiert wertvolle Marktinformationen.<br>(Tim analisis kami menghasilkan informasi pasar berharga)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Wissen transferieren</span></td>
                        <td>mentransfer pengetahuan</td>
                        <td>In Workshops transferieren wir das Wissen zwischen Abteilungen.<br>(Dalam lokakarya, kami mentransfer pengetahuan antar departemen)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ergebnisse kommunizieren</span></td>
                        <td>mengkomunikasikan hasil</td>
                        <td>Es ist wichtig, Projektergebnisse transparent zu kommunizieren.<br>(Penting untuk mengkomunikasikan hasil proyek secara transparan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Botschaften vermitteln</span></td>
                        <td>menyampaikan pesan</td>
                        <td>Unsere Marketingkampagne vermittelt klare Botschaften.<br>(Kampanye pemasaran kami menyampaikan pesan yang jelas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Dialog führen</span></td>
                        <td>memimpin dialog</td>
                        <td>Es ist wichtig, einen offenen Dialog mit Mitarbeitern zu führen.<br>(Penting untuk memimpin dialog terbuka dengan karyawan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Austausch fördern</span></td>
                        <td>mendorong pertukaran</td>
                        <td>Wir fördern den Wissensaustausch in unserem Unternehmen.<br>(Kami mendorong pertukaran pengetahuan di perusahaan kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Netzwerke aufbauen</span></td>
                        <td>membangun jaringan</td>
                        <td>Auf Konferenzen bauen wir wichtige berufliche Netzwerke auf.<br>(Di konferensi, kami membangun jaringan profesional penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Beziehungen pflegen</span></td>
                        <td>memelihara hubungan</td>
                        <td>Gute Kundenbeziehungen müssen kontinuierlich gepflegt werden.<br>(Hubungan pelanggan yang baik harus terus-menerus dipelihara)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kontakte knüpfen</span></td>
                        <td>menjalin kontak</td>
                        <td>Auf der Messe können wir wichtige Geschäftskontakte knüpfen.<br>(Di pameran, kami dapat menjalin kontak bisnis penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verbindungen herstellen</span></td>
                        <td>membuat koneksi</td>
                        <td>Erfolgreiche Manager können schnell wichtige Verbindungen herstellen.<br>(Manajer sukses dapat dengan cepat membuat koneksi penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Partnerschaften entwickeln</span></td>
                        <td>mengembangkan kemitraan</td>
                        <td>Unser Unternehmen entwickelt strategische Partnerschaften.<br>(Perusahaan kami mengembangkan kemitraan strategis)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kooperationen aufbauen</span></td>
                        <td>membangun kerja sama</td>
                        <td>Wir bauen internationale Kooperationen auf.<br>(Kami membangun kerja sama internasional)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Allianzen schmieden</span></td>
                        <td>membentuk aliansi</td>
                        <td>In der Technologiebranche schmieden Unternehmen neue Allianzen.<br>(Di industri teknologi, perusahaan membentuk aliansi baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Synergien nutzen</span></td>
                        <td>memanfaatkan sinergi</td>
                        <td>Durch Zusammenarbeit können wir Synergien besser nutzen.<br>(Melalui kerja sama, kami dapat lebih baik memanfaatkan sinergi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Mehrwert schaffen</span></td>
                        <td>menciptakan nilai tambah</td>
                        <td>Unser Ziel ist es, für Kunden echten Mehrwert zu schaffen.<br>(Tujuan kami adalah menciptakan nilai tambah nyata bagi pelanggan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Nutzen generieren</span></td>
                        <td>menghasilkan manfaat</td>
                        <td>Innovative Lösungen helfen uns, zusätzlichen Nutzen zu generieren.<br>(Solusi inovatif membantu kami menghasilkan manfaat tambahan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Werte schaffen</span></td>
                        <td>menciptakan nilai</td>
                        <td>Unser Unternehmen will langfristig Werte für alle Stakeholder schaffen.<br>(Perusahaan kami ingin menciptakan nilai jangka panjang untuk semua pemangku kepentingan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Qualität sichern</span></td>
                        <td>menjamin kualitas</td>
                        <td>Wir setzen strenge Maßnahmen ein, um die Produktqualität zu sichern.<br>(Kami menerapkan tindakan ketat untuk menjamin kualitas produk)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Standards gewährleisten</span></td>
                        <td>menjamin standar</td>
                        <td>Unsere Produktion gewährleistet höchste internationale Standards.<br>(Produksi kami menjamin standar internasional tertinggi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Normen einhalten</span></td>
                        <td>mematuhi norma</td>
                        <td>Das Unternehmen muss alle geltenden Umweltnormen einhalten.<br>(Perusahaan harus mematuhi semua norma lingkungan yang berlaku)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vorgaben erfüllen</span></td>
                        <td>memenuhi persyaratan</td>
                        <td>Wir müssen alle gesetzlichen Vorgaben für Sicherheit erfüllen.<br>(Kami harus memenuhi semua persyaratan hukum untuk keselamatan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Richtlinien befolgen</span></td>
                        <td>mengikuti pedoman</td>
                        <td>Alle Mitarbeiter müssen die Unternehmensrichtlinien befolgen.<br>(Semua karyawan harus mengikuti pedoman perusahaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Regeln einhalten</span></td>
                        <td>mematuhi aturan</td>
                        <td>In teamarbeit ist es wichtig, gemeinsame Regeln einzuhalten.<br>(Dalam kerja tim, penting untuk mematuhi aturan bersama)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Gesetze beachten</span></td>
                        <td>mematuhi hukum</td>
                        <td>Unternehmen müssen alle relevanten Gesetze beachten.<br>(Perusahaan harus mematuhi semua hukum yang relevan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vorschriften umsetzen</span></td>
                        <td>menerapkan peraturan</td>
                        <td>Wir müssen die neuen Datenschutzvorschriften korrekt umsetzen.<br>(Kami harus menerapkan peraturan perlindungan data baru dengan benar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Schaden nehmen</span></td>
                        <td>mengalami kerusakan</td>
                        <td>Die Reputation des Unternehmens könnte Schaden nehmen.<br>(Reputasi perusahaan bisa mengalami kerusakan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Kuchen backen</span></td>
                        <td>memanggang kue</td>
                        <td>Ich backe am Wochenende einen Kuchen.<br>(Saya memanggang kue di akhir pekan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Kurs machen</span></td>
                        <td>mengambil kursus</td>
                        <td>Ich mache einen Deutschkurs an der Volkshochschule.<br>(Saya mengambil kursus bahasa Jerman di pusat pendidikan masyarakat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Abstand halten</span></td>
                        <td>menjaga jarak</td>
                        <td>In der Pandemie mussten wir Abstand halten.<br>(Selama pandemi, kami harus menjaga jarak)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Einkäufe machen</span></td>
                        <td>berbelanja</td>
                        <td>Ich mache am Samstag Einkäufe im Supermarkt.<br>(Saya berbelanja di supermarket pada hari Sabtu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Rat befolgen</span></td>
                        <td>mengikuti saran</td>
                        <td>Ich werde den Rat meines Freundes befolgen.<br>(Saya akan mengikuti saran teman saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Form annehmen</span></td>
                        <td>mengambil bentuk</td>
                        <td>Der Plan beginnt langsam Form anzunehmen.<br>(Rencana mulai perlahan mengambil bentuk)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Medikamente nehmen</span></td>
                        <td>minum obat</td>
                        <td>Ich muss täglich meine Medikamente nehmen.<br>(Saya harus minum obat setiap hari)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Interview geben</span></td>
                        <td>memberikan wawancara</td>
                        <td>Der Sportler gibt ein kurzes Interview nach dem Spiel.<br>(Atlet tersebut memberikan wawancara singkat setelah pertandingan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Rache nehmen</span></td>
                        <td>membalas dendam</td>
                        <td>Er wollte Rache für die erlittene Ungerechtigkeit nehmen.<br>(Dia ingin membalas dendam atas ketidakadilan yang dialami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Probleme haben</span></td>
                        <td>memiliki masalah</td>
                        <td>Ich habe ein Problem mit meinem Computer.<br>(Saya memiliki masalah dengan komputer saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Diskussion führen</span></td>
                        <td>memimpin diskusi</td>
                        <td>Wir führen eine interessante Diskussion über Umweltschutz.<br>(Kami memimpin diskusi menarik tentang perlindungan lingkungan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Platz finden</span></td>
                        <td>menemukan tempat</td>
                        <td>Es ist schwierig, in der Innenstadt einen Parkplatz zu finden.<br>(Sulit menemukan tempat parkir di pusat kota)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Geschenke bekommen</span></td>
                        <td>menerima hadiah</td>
                        <td>Ich bekomme zum Geburtstag viele Geschenke.<br>(Saya menerima banyak hadiah di hari ulang tahun)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Test schreiben</span></td>
                        <td>mengerjakan tes</td>
                        <td>Morgen schreiben wir einen wichtigen Test in Mathematik.<br>(Besok kami mengerjakan tes penting dalam matematika)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Prioritäten setzen</span></td>
                        <td>menetapkan prioritas</td>
                        <td>In der Arbeit muss man klare Prioritäten setzen.<br>(Dalam pekerjaan, seseorang harus menetapkan prioritas yang jelas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Nachrichten sehen</span></td>
                        <td>menonton berita</td>
                        <td>Ich sehe jeden Abend die Nachrichten.<br>(Saya menonton berita setiap malam)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Instrument spielen</span></td>
                        <td>memainkan alat musik</td>
                        <td>Meine Schwester spielt Gitarre.<br>(Adik perempuan saya memainkan gitar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Geduld haben</span></td>
                        <td>memiliki kesabaran</td>
                        <td>Bei der Erziehung von Kindern braucht man viel Geduld.<br>(Dalam mendidik anak, seseorang membutuhkan banyak kesabaran)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Post bekommen</span></td>
                        <td>menerima surat</td>
                        <td>Ich bekomme heute Post von meiner Großmutter.<br>(Saya menerima surat dari nenek saya hari ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Dokument unterschreiben</span></td>
                        <td>menandatangani dokumen</td>
                        <td>Ich muss diesen Vertrag unterschreiben.<br>(Saya harus menandatangani kontrak ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Schule schwänzen</span></td>
                        <td>membolos sekolah</td>
                        <td>Es ist nicht gut, die Schule zu schwänzen.<br>(Tidak baik membolos sekolah)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Bier trinken</span></td>
                        <td>minum bir</td>
                        <td>Wir trinken ein kaltes Bier nach der Arbeit.<br>(Kami minum bir dingin setelah bekerja)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Bestellung aufgeben</span></td>
                        <td>melakukan pemesanan</td>
                        <td>Ich möchte eine Bestellung im Restaurant aufgeben.<br>(Saya ingin melakukan pemesanan di restoran)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Balance halten</span></td>
                        <td>menjaga keseimbangan</td>
                        <td>In stressigen Zeiten ist es wichtig, die Balance zu halten.<br>(Di waktu yang menegangkan, penting untuk menjaga keseimbangan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Fahrrad fahren</span></td>
                        <td>mengendarai sepeda</td>
                        <td>Ich fahre gerne Fahrrad am Wochenende.<br>(Saya suka mengendarai sepeda di akhir pekan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Witz machen</span></td>
                        <td>membuat lelucon</td>
                        <td>Mein Freund macht oft Witze, um uns zum Lachen zu bringen.<br>(Teman saya sering membuat lelucon untuk membuat kami tertawa)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Maß nehmen</span></td>
                        <td>mengambil ukuran</td>
                        <td>Der Schneider nimmt Maß für einen neuen Anzug.<br>(Penjahit mengambil ukuran untuk setelan baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Telefon benutzen</span></td>
                        <td>menggunakan telepon</td>
                        <td>Ich benutze mein Telefon, um mit Freunden zu chatten.<br>(Saya menggunakan telepon untuk mengobrol dengan teman)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Ausnahme machen</span></td>
                        <td>membuat pengecualian</td>
                        <td>Manchmal kann man eine Ausnahme machen.<br>(Kadang-kadang seseorang bisa membuat pengecualian)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Tempo machen</span></td>
                        <td>mempercepat</td>
                        <td>Wir müssen jetzt Tempo machen, um den Termin zu erreichen.<br>(Kita harus mempercepat sekarang untuk mencapai tenggat waktu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Fotos machen</span></td>
                        <td>mengambil foto</td>
                        <td>Ich mache gerne Fotos von meiner Familie.<br>(Saya suka mengambil foto keluarga saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Zusage geben</span></td>
                        <td>memberikan persetujuan</td>
                        <td>Der Chef gibt seine Zusage für das Projekt.<br>(Kepala memberikan persetujuan untuk proyek tersebut)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Zeugnis ablegen</span></td>
                        <td>memberikan kesaksian</td>
                        <td>Der Zeuge legte vor Gericht Zeugnis ab.<br>(Saksi memberikan kesaksian di pengadilan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Suppe kochen</span></td>
                        <td>memasak sup</td>
                        <td>Ich koche heute Abend eine leckere Suppe.<br>(Saya akan memasak sup lezat malam ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Traum haben</span></td>
                        <td>memiliki mimpi</td>
                        <td>Ich habe den Traum, einmal um die Welt zu reisen.<br>(Saya memiliki mimpi untuk berkeliling dunia suatu saat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Bilanz ziehen</span></td>
                        <td>membuat kesimpulan</td>
                        <td>Am Ende des Jahres ziehen wir eine Bilanz unserer Arbeit.<br>(Di akhir tahun, kami membuat kesimpulan dari pekerjaan kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Auto fahren</span></td>
                        <td>mengendarai mobil</td>
                        <td>Ich lerne gerade Auto fahren.<br>(Saya sedang belajar mengendarai mobil)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Kompliment machen</span></td>
                        <td>memberikan pujian</td>
                        <td>Er macht ihr ein Kompliment für ihr neues Kleid.<br>(Dia memberikan pujian padanya untuk gaun barunya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Kurs halten</span></td>
                        <td>mempertahankan arah</td>
                        <td>Das Unternehmen muss seinen strategischen Kurs halten.<br>(Perusahaan harus mempertahankan arah strategisnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Tee trinken</span></td>
                        <td>minum teh</td>
                        <td>Ich trinke gerne Tee am Nachmittag.<br>(Saya suka minum teh di sore hari)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Warnung geben</span></td>
                        <td>memberikan peringatan</td>
                        <td>Der Lehrer gibt uns eine Warnung vor der Prüfung.<br>(Guru memberikan kami peringatan sebelum ujian)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Schuld tragen</span></td>
                        <td>bertanggung jawab</td>
                        <td>Niemand will die Schuld für den Fehler tragen.<br>(Tidak ada yang ingin bertanggung jawab atas kesalahan tersebut)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Filme sehen</span></td>
                        <td>menonton film</td>
                        <td>Ich sehe gerne Filme am Wochenende.<br>(Saya suka menonton film di akhir pekan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Risiko eingehen</span></td>
                        <td>mengambil risiko</td>
                        <td>Manchmal muss man ein Risiko eingehen, um erfolgreich zu sein.<br>(Kadang-kadang seseorang harus mengambil risiko untuk sukses)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Überhand nehmen</span></td>
                        <td>mengambil alih</td>
                        <td>Die Situation beginnt, Überhand zu nehmen.<br>(Situasi mulai mengambil alih)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Schach spielen</span></td>
                        <td>bermain catur</td>
                        <td>Ich spiele gerne Schach mit meinem Großvater.<br>(Saya suka bermain catur dengan kakek saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Vereinbarung treffen</span></td>
                        <td>membuat kesepakatan</td>
                        <td>Wir treffen eine Vereinbarung über die Zusammenarbeit.<br>(Kami membuat kesepakatan tentang kerja sama)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Stärke zeigen</span></td>
                        <td>menunjukkan kekuatan</td>
                        <td>In schwierigen Situationen muss man Stärke zeigen.<br>(Dalam situasi sulit, seseorang harus menunjukkan kekuatan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Brief schreiben</span></td>
                        <td>menulis surat</td>
                        <td>Ich schreibe einen Brief an meine Großeltern.<br>(Saya menulis surat kepada kakek-nenek saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Antrag stellen</span></td>
                        <td>mengajukan permohonan</td>
                        <td>Ich stelle einen Antrag auf Urlaub.<br>(Saya mengajukan permohonan cuti)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Flagge zeigen</span></td>
                        <td>menunjukkan pendirian</td>
                        <td>In schwierigen Situationen muss man Flagge zeigen.<br>(Dalam situasi sulit, seseorang harus menunjukkan pendirian)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Bett machen</span></td>
                        <td>merapikan tempat tidur</td>
                        <td>Ich mache jeden Morgen mein Bett.<br>(Saya merapikan tempat tidur setiap pagi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Empfehlung geben</span></td>
                        <td>memberikan rekomendasi</td>
                        <td>Der Arzt gibt mir eine Empfehlung für ein Medikament.<br>(Dokter memberikan saya rekomendasi untuk obat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Bezug nehmen</span></td>
                        <td>merujuk pada</td>
                        <td>In meinem Bericht nehme ich Bezug auf frühere Studien.<br>(Dalam laporan saya, saya merujuk pada studi-studi sebelumnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Musik machen</span></td>
                        <td>membuat musik</td>
                        <td>Wir machen zusammen Musik in der Band.<br>(Kami membuat musik bersama-sama dalam band)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Beziehung haben</span></td>
                        <td>memiliki hubungan</td>
                        <td>Sie haben eine gute Beziehung.<br>(Mereka memiliki hubungan yang baik)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Stellung beziehen</span></td>
                        <td>mengambil posisi</td>
                        <td>Der Politiker bezieht klar Stellung zu dieser Frage.<br>(Politikus itu mengambil posisi jelas terhadap pertanyaan ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Pause haben</span></td>
                        <td>memiliki istirahat</td>
                        <td>Wir haben eine kurze Pause von der Arbeit.<br>(Kami memiliki istirahat singkat dari pekerjaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Unfall bauen</span></td>
                        <td>mengalami kecelakaan</td>
                        <td>Er hat leider einen Unfall mit dem Auto gebaut.<br>(Sayangnya dia mengalami kecelakaan dengan mobil)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Wurzeln schlagen</span></td>
                        <td>berakar</td>
                        <td>Nach Jahren im Land hat er endlich Wurzeln geschlagen.<br>(Setelah bertahun-tahun di negara ini, dia akhirnya berakar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Geld wechseln</span></td>
                        <td>menukar uang</td>
                        <td>Ich muss Euros in lokale Währung wechseln.<br>(Saya harus menukar euro ke mata uang lokal)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Geheimnis haben</span></td>
                        <td>memiliki rahasia</td>
                        <td>Sie hat ein Geheimnis, das niemand kennt.<br>(Dia memiliki rahasia yang tidak diketahui siapa pun)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Profil zeigen</span></td>
                        <td>menunjukkan karakter</td>
                        <td>In dieser Situation zeigt er wahres Profil.<br>(Dalam situasi ini, dia menunjukkan karakter sebenarnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Spaß machen</span></td>
                        <td>membuat kesenangan</td>
                        <td>Das Spielen macht mir großen Spaß.<br>(Bermain membuat saya sangat senang)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Einladung annehmen</span></td>
                        <td>menerima undangan</td>
                        <td>Ich nehme gerne die Einladung zum Abendessen an.<br>(Saya dengan senang hati menerima undangan makan malam)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Quartier nehmen</span></td>
                        <td>mencari penginapan</td>
                        <td>Wir nehmen Quartier in einem kleinen Hotel.<br>(Kami mencari penginapan di hotel kecil)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Bilder malen</span></td>
                        <td>melukis gambar</td>
                        <td>Ich male gerne bunte Bilder.<br>(Saya suka melukis gambar berwarna)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Chance nutzen</span></td>
                        <td>memanfaatkan kesempatan</td>
                        <td>Er nutzt jede Chance, um zu lernen.<br>(Dia memanfaatkan setiap kesempatan untuk belajar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Haltung bewahren</span></td>
                        <td>menjaga sikap</td>
                        <td>Auch in schwierigen Situationen bewahrt er seine Haltung.<br>(Bahkan dalam situasi sulit, dia menjaga sikapnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Wäsche waschen</span></td>
                        <td>mencuci pakaian</td>
                        <td>Ich wasche heute meine Wäsche.<br>(Saya mencuci pakaian hari ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Ziel haben</span></td>
                        <td>memiliki tujuan</td>
                        <td>Ich habe das Ziel, Deutsch zu lernen.<br>(Saya memiliki tujuan untuk belajar bahasa Jerman)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Sorge tragen</span></td>
                        <td>bertanggung jawab</td>
                        <td>Er trägt Sorge für seine alte Mutter.<br>(Dia bertanggung jawab untuk ibunya yang sudah tua)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Bus fahren</span></td>
                        <td>naik bus</td>
                        <td>Ich fahre jeden Tag mit dem Bus zur Arbeit.<br>(Saya naik bus ke kantor setiap hari)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Auftrag erhalten</span></td>
                        <td>menerima tugas</td>
                        <td>Der Künstler erhält einen wichtigen Auftrag.<br>(Seniman itu menerima tugas penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Fuß fassen</span></td>
                        <td>memantapkan posisi</td>
                        <td>Als Fremder in einer neuen Stadt Fuß zu fassen, ist nicht leicht.<br>(Memantapkan posisi sebagai orang asing di kota baru tidaklah mudah)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Pizza essen</span></td>
                        <td>makan pizza</td>
                        <td>Wir essen heute Abend Pizza.<br>(Kami makan pizza malam ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Vorschlag machen</span></td>
                        <td>membuat usulan</td>
                        <td>Ich möchte einen Vorschlag für unser Projekt machen.<br>(Saya ingin membuat usulan untuk proyek kita)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Gefahr laufen</span></td>
                        <td>berisiko</td>
                        <td>Wir laufen Gefahr, den Termin zu verpassen.<br>(Kami berisiko melewatkan tenggat waktu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Fenster öffnen</span></td>
                        <td>membuka jendela</td>
                        <td>Ich öffne das Fenster, um frische Luft hereinzulassen.<br>(Saya membuka jendela untuk memasukkan udara segar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Reise buchen</span></td>
                        <td>memesan perjalanan</td>
                        <td>Ich buche eine Reise nach Spanien.<br>(Saya memesan perjalanan ke Spanyol)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Anlauf nehmen</span></td>
                        <td>mengambil ancang-ancang</td>
                        <td>Der Läufer nimmt Anlauf vor dem Sprung.<br>(Pelari mengambil ancang-ancang sebelum melompat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Tür schließen</span></td>
                        <td>menutup pintu</td>
                        <td>Ich schließe die Tür, wenn ich das Haus verlasse.<br>(Saya menutup pintu saat meninggalkan rumah)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Vertrag kündigen</span></td>
                        <td>membatalkan kontrak</td>
                        <td>Ich möchte meinen Handyvertrag kündigen.<br>(Saya ingin membatalkan kontrak telepon genggam)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Einfluss ausüben</span></td>
                        <td>memberikan pengaruh</td>
                        <td>Die Medien üben großen Einfluss auf die öffentliche Meinung aus.<br>(Media memberikan pengaruh besar pada opini publik)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Zimmer aufräumen</span></td>
                        <td>merapikan kamar</td>
                        <td>Ich räume mein Zimmer jeden Samstag auf.<br>(Saya merapikan kamar setiap Sabtu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Bestellung stornieren</span></td>
                        <td>membatalkan pesanan</td>
                        <td>Ich möchte meine Bestellung stornieren.<br>(Saya ingin membatalkan pesanan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Recht haben</span></td>
                        <td>benar</td>
                        <td>In diesem Fall hast du Recht.<br>(Dalam kasus ini, kamu benar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Zähne putzen</span></td>
                        <td>menggosok gigi</td>
                        <td>Ich putze meine Zähne morgens und abends.<br>(Saya menggosok gigi pagi dan malam)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Konto eröffnen</span></td>
                        <td>membuka rekening</td>
                        <td>Ich möchte ein Bankkonto eröffnen.<br>(Saya ingin membuka rekening bank)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Gefahr drohen</span></td>
                        <td>mengancam bahaya</td>
                        <td>Der Umwelt droht große Gefahr durch Klimawandel.<br>(Lingkungan terancam bahaya besar akibat perubahan iklim)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Hände waschen</span></td>
                        <td>mencuci tangan</td>
                        <td>Ich wasche meine Hände vor dem Essen.<br>(Saya mencuci tangan sebelum makan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Antrag ablehnen</span></td>
                        <td>menolak permohonan</td>
                        <td>Die Bank lehnt seinen Kreditantrag ab.<br>(Bank menolak permohonan kredit)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Macht ausüben</span></td>
                        <td>menjalankan kekuasaan</td>
                        <td>Der Präsident übt seine Macht verantwortungsvoll aus.<br>(Presiden menjalankan kekuasaannya dengan bertanggung jawab)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Küche putzen</span></td>
                        <td>membersihkan dapur</td>
                        <td>Ich putze die Küche nach dem Kochen.<br>(Saya membersihkan dapur setelah memasak)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Bewerbung schreiben</span></td>
                        <td>menulis lamaran</td>
                        <td>Ich schreibe eine Bewerbung für diesen Job.<br>(Saya menulis lamaran untuk pekerjaan ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Last tragen</span></td>
                        <td>memikul beban</td>
                        <td>Die Familie trägt die Last der Verantwortung.<br>(Keluarga memikul beban tanggung jawab)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Geschirr spülen</span></td>
                        <td>mencuci piring</td>
                        <td>Ich spüle das Geschirr nach dem Abendessen.<br>(Saya mencuci piring setelah makan malam)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Geschäft eröffnen</span></td>
                        <td>membuka toko</td>
                        <td>Mein Bruder will ein Café eröffnen.<br>(Saudara laki-laki saya ingin membuka kafe)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Position beziehen</span></td>
                        <td>mengambil posisi</td>
                        <td>Der Politiker bezieht klar Position zu diesem Thema.<br>(Politikus itu mengambil posisi jelas tentang topik ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Rückschlüsse ziehen</span></td>
                        <td>menarik kesimpulan</td>
                        <td>Aus den Daten können wir wichtige Rückschlüsse ziehen.<br>(Dari data ini, kita dapat menarik kesimpulan penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Bilanz ziehen</span></td>
                        <td>membuat evaluasi</td>
                        <td>Am Ende des Jahres ziehen wir Bilanz über unsere Leistungen.<br>(Di akhir tahun, kami membuat evaluasi atas pencapaian kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Abhilfe schaffen</span></td>
                        <td>mencari solusi</td>
                        <td>Wir müssen schnell Abhilfe für dieses Problem schaffen.<br>(Kita harus segera mencari solusi untuk masalah ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Rechenschaft ablegen</span></td>
                        <td>mempertanggungjawabkan</td>
                        <td>Die Geschäftsführung muss Rechenschaft über die Finanzen ablegen.<br>(Manajemen harus mempertanggungjawabkan keuangan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Anwendung finden</span></td>
                        <td>menemukan penerapan</td>
                        <td>Die neue Technologie findet breite Anwendung in der Industrie.<br>(Teknologi baru ini menemukan penerapan luas di industri)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Handlungsbedarf bestehen</span></td>
                        <td>memerlukan tindakan</td>
                        <td>In diesem Bereich besteht dringender Handlungsbedarf.<br>(Di area ini terdapat kebutuhan mendesak untuk bertindak)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Geltung verschaffen</span></td>
                        <td>menegakkan (hukum/aturan)</td>
                        <td>Die Regierung muss dem Gesetz Geltung verschaffen.<br>(Pemerintah harus menegakkan hukum)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Rechnung tragen</span></td>
                        <td>mempertimbangkan</td>
                        <td>Wir müssen den neuen Herausforderungen Rechnung tragen.<br>(Kita harus mempertimbangkan tantangan baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ausdruck verleihen</span></td>
                        <td>mengekspresikan</td>
                        <td>Er verlieh seiner Frustration Ausdruck.<br>(Dia mengekspresikan rasa frustrasinya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Überhand gewinnen</span></td>
                        <td>menguasai situasi</td>
                        <td>Die Situation beginnt, Überhand zu gewinnen.<br>(Situasi mulai menguasai)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Einblick gewähren</span></td>
                        <td>memberikan wawasan</td>
                        <td>Die Präsentation gewährt einen tiefen Einblick in das Projekt.<br>(Presentasi memberikan wawasan mendalam tentang proyek)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Beachtung schenken</span></td>
                        <td>memberikan perhatian</td>
                        <td>Wir müssen diesen Details mehr Beachtung schenken.<br>(Kita harus memberikan lebih banyak perhatian pada detail-detail ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Berücksichtigung finden</span></td>
                        <td>mendapat pertimbangan</td>
                        <td>Ihre Vorschläge finden große Berücksichtigung.<br>(Usulan Anda mendapat pertimbangan besar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Aufschluss geben</span></td>
                        <td>memberikan penjelasan</td>
                        <td>Die Studie gibt wichtige Aufschlüsse über den Markt.<br>(Studi memberikan penjelasan penting tentang pasar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Eingang finden</span></td>
                        <td>diterima/dimasukkan</td>
                        <td>Die neuen Ideen finden langsam Eingang in unsere Strategie.<br>(Ide-ide baru perlahan diterima dalam strategi kita)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Gestalt annehmen</span></td>
                        <td>mengambil bentuk</td>
                        <td>Der Plan beginnt konkrete Gestalt anzunehmen.<br>(Rencana mulai mengambil bentuk konkret)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Klarheit schaffen</span></td>
                        <td>menciptakan kejelasan</td>
                        <td>Wir müssen Klarheit über die nächsten Schritte schaffen.<br>(Kita harus menciptakan kejelasan tentang langkah selanjutnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Gewicht beimessen</span></td>
                        <td>memberikan bobot/nilai</td>
                        <td>Wir messen diesem Aspekt besonderes Gewicht bei.<br>(Kami memberikan bobot khusus pada aspek ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ausdruck finden</span></td>
                        <td>menemukan ungkapan</td>
                        <td>Seine Gefühle finden keinen rechten Ausdruck.<br>(Perasaannya tidak menemukan ungkapan yang tepat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Bestand haben</span></td>
                        <td>bertahan/berlaku</td>
                        <td>Diese Regel hat auch in Zukunft Bestand.<br>(Aturan ini akan tetap bertahan di masa depan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Bedeutung beimessen</span></td>
                        <td>memberikan makna</td>
                        <td>Wir messen diesem Projekt große Bedeutung bei.<br>(Kami memberikan makna besar pada proyek ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Anerkennung zollen</span></td>
                        <td>memberikan pengakuan</td>
                        <td>Der Chef zollt den Mitarbeitern Anerkennung für ihre Leistung.<br>(Kepala memberikan pengakuan kepada karyawan atas kinerja mereka)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Einfluss ausüben</span></td>
                        <td>memberikan pengaruh</td>
                        <td>Die Politik übt großen Einfluss auf die Wirtschaft aus.<br>(Politik memberikan pengaruh besar pada ekonomi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Zugang verschaffen</span></td>
                        <td>memberikan akses</td>
                        <td>Das neue Gesetz verschafft mehr Menschen Zugang zur Bildung.<br>(Undang-undang baru memberikan akses lebih banyak orang ke pendidikan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Widerstand leisten</span></td>
                        <td>memberikan perlawanan</td>
                        <td>Die Bevölkerung leistet Widerstand gegen die Unterdrückung.<br>(Penduduk memberikan perlawanan terhadap penindasan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Zweifel anmelden</span></td>
                        <td>mengungkapkan keraguan</td>
                        <td>Experten melden Zweifel an der Strategie an.<br>(Para ahli mengungkapkan keraguan tentang strategi tersebut)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Prägung erfahren</span></td>
                        <td>mendapat pengaruh</td>
                        <td>Seine Persönlichkeit wurde stark von seiner Kindheit geprägt.<br>(Kepribadiannya sangat dipengaruhi oleh masa kecilnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verwendung finden</span></td>
                        <td>menemukan penggunaan</td>
                        <td>Die neue Technologie findet breite Verwendung in der Industrie.<br>(Teknologi baru ini menemukan penggunaan luas di industri)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Grundlage schaffen</span></td>
                        <td>menciptakan dasar</td>
                        <td>Die Forschung schafft eine solide Grundlage für weitere Entwicklungen.<br>(Penelitian menciptakan landasan solid untuk pengembangan lebih lanjut)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Erwähnung finden</span></td>
                        <td>mendapat penyebutan</td>
                        <td>Sein Name findet in der Studie lobende Erwähnung.<br>(Namanya mendapat penyebutan terpuji dalam studi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Gehör verschaffen</span></td>
                        <td>mendapat perhatian</td>
                        <td>Die Jugend versucht, ihren Anliegen Gehör zu verschaffen.<br>(Kaum muda berusaha mendapatkan perhatian untuk kepentingan mereka)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Zustimmung finden</span></td>
                        <td>mendapat persetujuan</td>
                        <td>Der Vorschlag findet breite Zustimmung im Team.<br>(Usulan tersebut mendapat persetujuan luas dalam tim)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Bedenken anmelden</span></td>
                        <td>mengungkapkan keberatan</td>
                        <td>Einige Mitglieder melden Bedenken gegen den Plan an.<br>(Beberapa anggota mengungkapkan keberatan terhadap rencana)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Niederschlag finden</span></td>
                        <td>tercermin/terwujud</td>
                        <td>Die neuen Ideen finden im Projektplan Niederschlag.<br>(Ide-ide baru tercermin dalam rencana proyek)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Resonanz erzeugen</span></td>
                        <td>menciptakan respons</td>
                        <td>Die Kampagne erzeugt große Resonanz in den Medien.<br>(Kampanye menciptakan respons besar di media)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verbreitung finden</span></td>
                        <td>mendapat penyebaran</td>
                        <td>Die neue Technologie findet schnelle Verbreitung.<br>(Teknologi baru mendapatkan penyebaran cepat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ausprägung erfahren</span></td>
                        <td>mengalami perkembangan</td>
                        <td>Die Idee erfährt eine neue Ausprägung im digitalen Zeitalter.<br>(Ide mengalami perkembangan baru di era digital)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Anwendung finden</span></td>
                        <td>menemukan penerapan</td>
                        <td>Die Forschungsergebnisse finden breite Anwendung.<br>(Hasil penelitian menemukan penerapan luas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Bestätigung erfahren</span></td>
                        <td>mendapat konfirmasi</td>
                        <td>Die Theorie erfährt durch neue Studien Bestätigung.<br>(Teori mendapat konfirmasi melalui studi baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Klärung herbeiführen</span></td>
                        <td>membawa kejelasan</td>
                        <td>Das Gespräch führt endlich eine Klärung der Situation herbei.<br>(Pembicaraan akhirnya membawa kejelasan situasi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Bedeutung erlangen</span></td>
                        <td>memperoleh makna</td>
                        <td>Das Projekt erlangt zunehmend größere Bedeutung.<br>(Proyek tersebut semakin memperoleh makna yang lebih besar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verwirklichung finden</span></td>
                        <td>menemukan perwujudan</td>
                        <td>Die Vision findet langsam ihre Verwirklichung.<br>(Visi perlahan menemukan perwujudannya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Klavier üben</span></td>
                        <td>berlatih piano</td>
                        <td>Ich übe jeden Tag Klavier.<br>(Saya berlatih piano setiap hari)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Termin absagen</span></td>
                        <td>membatalkan janji</td>
                        <td>Ich muss leider den Termin absagen.<br>(Saya terpaksa membatalkan janji)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Schritt fassen</span></td>
                        <td>mengambil langkah</td>
                        <td>Wir müssen einen ersten Schritt fassen.<br>(Kita harus mengambil langkah pertama)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Gitarre spielen</span></td>
                        <td>bermain gitar</td>
                        <td>Ich spiele gerne Gitarre in meiner Freizeit.<br>(Saya suka bermain gitar di waktu luang)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Referat halten</span></td>
                        <td>memberikan presentasi</td>
                        <td>Morgen muss ich ein Referat in der Klasse halten.<br>(Besok saya harus memberikan presentasi di kelas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Zugang finden</span></td>
                        <td>mendapatkan akses</td>
                        <td>Es ist nicht einfach, Zugang zu dieser Information zu finden.<br>(Tidak mudah mendapatkan akses ke informasi ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Computer benutzen</span></td>
                        <td>menggunakan komputer</td>
                        <td>Ich benutze den Computer für meine Hausaufgaben.<br>(Saya menggunakan komputer untuk PR saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Wohnung mieten</span></td>
                        <td>menyewa apartemen</td>
                        <td>Wir wollen eine neue Wohnung mieten.<br>(Kami ingin menyewa apartemen baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Risiko eingehen</span></td>
                        <td>mengambil risiko</td>
                        <td>Er geht ein großes Risiko ein, indem er seinen Job kündigt.<br>(Dia mengambil risiko besar dengan mengundurkan diri dari pekerjaannya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Handy benutzen</span></td>
                        <td>menggunakan ponsel</td>
                        <td>Ich benutze mein Handy, um mit Freunden zu chatten.<br>(Saya menggunakan ponsel saya untuk mengobrol dengan teman-teman)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Auto reparieren</span></td>
                        <td>memperbaiki mobil</td>
                        <td>Mein Vater kann selbst ein Auto reparieren.<br>(Ayah saya bisa memperbaiki mobil sendiri)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Grenzen setzen</span></td>
                        <td>menentukan batas</td>
                        <td>Eltern müssen ihren Kindern klare Grenzen setzen.<br>(Orang tua harus menentukan batas yang jelas untuk anak-anak mereka)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Bad putzen</span></td>
                        <td>membersihkan kamar mandi</td>
                        <td>Ich putze das Bad jeden Samstag.<br>(Saya membersihkan kamar mandi setiap hari Sabtu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Buch veröffentlichen</span></td>
                        <td>menerbitkan buku</td>
                        <td>Der Autor hat endlich sein erstes Buch veröffentlicht.<br>(Penulis itu akhirnya menerbitkan buku pertamanya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Hoffnung machen</span></td>
                        <td>memberi harapan</td>
                        <td>Die guten Nachrichten machen uns Hoffnung auf eine bessere Zukunft.<br>(Berita baik itu memberi kami harapan untuk masa depan yang lebih baik)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Bank besuchen</span></td>
                        <td>mengunjungi bank</td>
                        <td>Ich muss morgen die Bank besuchen, um Geld abzuheben.<br>(Saya harus mengunjungi bank besok untuk mengambil uang)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Projekt leiten</span></td>
                        <td>memimpin proyek</td>
                        <td>Sie leitet das neue Marketingprojekt in unserer Firma.<br>(Dia memimpin proyek pemasaran baru di perusahaan kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Freude bereiten</span></td>
                        <td>memberi kegembiraan</td>
                        <td>Dein Besuch bereitet mir große Freude.<br>(Kunjunganmu memberi saya kegembiraan besar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Tasche packen</span></td>
                        <td>mengemas tas</td>
                        <td>Ich packe meine Tasche für die Reise.<br>(Saya mengemas tas saya untuk perjalanan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Präsentation vorbereiten</span></td>
                        <td>mempersiapkan presentasi</td>
                        <td>Sie bereitet eine wichtige Präsentation für morgen vor.<br>(Dia mempersiapkan presentasi penting untuk besok)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Schluss machen</span></td>
                        <td>mengakhiri</td>
                        <td>Nach drei Jahren haben sie beschlossen, Schluss zu machen.<br>(Setelah tiga tahun, mereka memutuskan untuk mengakhiri [hubungan])</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Koffer packen</span></td>
                        <td>mengemas koper</td>
                        <td>Ich packe meinen Koffer für den Urlaub.<br>(Saya mengemas koper saya untuk liburan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Lied komponieren</span></td>
                        <td>mengarang lagu</td>
                        <td>Der Musiker komponiert ein neues Lied für sein Album.<br>(Musisi itu mengarang lagu baru untuk albumnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Trost spenden</span></td>
                        <td>memberikan penghiburan</td>
                        <td>Seine Worte spendeten ihr in schweren Zeiten Trost.<br>(Kata-katanya memberikan penghiburan kepadanya di masa-masa sulit)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Blumen gießen</span></td>
                        <td>menyiram bunga</td>
                        <td>Ich gieße jeden Morgen die Blumen im Garten.<br>(Saya menyiram bunga di taman setiap pagi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Rezept ausprobieren</span></td>
                        <td>mencoba resep</td>
                        <td>Heute Abend probiere ich ein neues Rezept aus.<br>(Malam ini saya akan mencoba resep baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Leben retten</span></td>
                        <td>menyelamatkan nyawa</td>
                        <td>Der Arzt hat mit seiner schnellen Reaktion ein Leben gerettet.<br>(Dokter itu menyelamatkan nyawa dengan reaksi cepatnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Obst essen</span></td>
                        <td>makan buah</td>
                        <td>Ich esse jeden Tag frisches Obst zum Frühstück.<br>(Saya makan buah segar setiap hari untuk sarapan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Nachricht senden</span></td>
                        <td>mengirim pesan</td>
                        <td>Ich sende dir eine Nachricht, wenn ich zu Hause bin.<br>(Saya akan mengirim pesan kepadamu ketika saya sampai di rumah)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Schmerz empfinden</span></td>
                        <td>merasakan sakit</td>
                        <td>Nach dem Unfall empfand er starke Schmerzen im Rücken.<br>(Setelah kecelakaan, dia merasakan sakit yang kuat di punggung)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Kleidung kaufen</span></td>
                        <td>membeli pakaian</td>
                        <td>Am Wochenende gehe ich Kleidung kaufen.<br>(Pada akhir pekan, saya akan pergi membeli pakaian)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Diät machen</span></td>
                        <td>melakukan diet</td>
                        <td>Sie macht eine Diät, um Gewicht zu verlieren.<br>(Dia melakukan diet untuk menurunkan berat badan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Wort halten</span></td>
                        <td>menepati kata</td>
                        <td>Er hält immer sein Wort, wenn er etwas verspricht.<br>(Dia selalu menepati katanya ketika dia berjanji sesuatu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Schuhe anziehen</span></td>
                        <td>memakai sepatu</td>
                        <td>Ich ziehe meine Schuhe an, bevor ich das Haus verlasse.<br>(Saya memakai sepatu sebelum meninggalkan rumah)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Versprechen brechen</span></td>
                        <td>mengingkari janji</td>
                        <td>Er hat sein Versprechen gebrochen und ist nicht gekommen.<br>(Dia mengingkari janjinya dan tidak datang)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Ruhe bewahren</span></td>
                        <td>menjaga ketenangan</td>
                        <td>In schwierigen Situationen ist es wichtig, Ruhe zu bewahren.<br>(Dalam situasi sulit, penting untuk menjaga ketenangan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Tabletten nehmen</span></td>
                        <td>minum tablet</td>
                        <td>Ich nehme jeden Morgen meine Tabletten ein.<br>(Saya minum tablet saya setiap pagi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Film drehen</span></td>
                        <td>membuat film</td>
                        <td>Der Regisseur dreht gerade einen neuen Film.<br>(Sutradara itu sedang membuat film baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Schaden zufügen</span></td>
                        <td>menyebabkan kerusakan</td>
                        <td>Das Unwetter hat dem Haus großen Schaden zugefügt.<br>(Badai itu menyebabkan kerusakan besar pada rumah)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Salat essen</span></td>
                        <td>makan salad</td>
                        <td>Ich esse jeden Tag einen frischen Salat zum Mittagessen.<br>(Saya makan salad segar setiap hari untuk makan siang)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Lied singen</span></td>
                        <td>menyanyikan lagu</td>
                        <td>Sie singt ein schönes Lied auf der Bühne.<br>(Dia menyanyikan lagu yang indah di atas panggung)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Nutzen ziehen</span></td>
                        <td>mengambil manfaat</td>
                        <td>Wir sollten aus dieser Erfahrung Nutzen ziehen.<br>(Kita harus mengambil manfaat dari pengalaman ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Jacke tragen</span></td>
                        <td>memakai jaket</td>
                        <td>Im Winter trage ich immer eine warme Jacke.<br>(Di musim dingin, saya selalu memakai jaket hangat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Operation durchführen</span></td>
                        <td>melakukan operasi</td>
                        <td>Der Chirurg führt morgen eine komplizierte Operation durch.<br>(Ahli bedah akan melakukan operasi rumit besok)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Glauben schenken</span></td>
                        <td>mempercayai</td>
                        <td>Ich schenke seinen Worten keinen Glauben mehr.<br>(Saya tidak lagi mempercayai kata-katanya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Brot schneiden</span></td>
                        <td>memotong roti</td>
                        <td>Kannst du bitte das Brot für das Frühstück schneiden?<br>(Bisakah kamu memotong roti untuk sarapan?)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Urlaub planen</span></td>
                        <td>merencanakan liburan</td>
                        <td>Wir planen unseren Sommerurlaub in Italien.<br>(Kami merencanakan liburan musim panas kami di Italia)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Schande machen</span></td>
                        <td>membuat malu</td>
                        <td>Sein Verhalten macht der Familie Schande.<br>(Perilakunya membuat malu keluarga)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Taxi nehmen</span></td>
                        <td>naik taksi</td>
                        <td>Ich nehme ein Taxi zum Flughafen.<br>(Saya naik taksi ke bandara)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Party organisieren</span></td>
                        <td>mengorganisir pesta</td>
                        <td>Wir organisieren eine Überraschungsparty für ihren Geburtstag.<br>(Kami mengorganisir pesta kejutan untuk ulang tahunnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Macht gewinnen</span></td>
                        <td>memperoleh kekuasaan</td>
                        <td>Die Partei gewann bei den Wahlen an Macht.<br>(Partai itu memperoleh kekuasaan dalam pemilihan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Saft trinken</span></td>
                        <td>minum jus</td>
                        <td>Ich trinke jeden Morgen frisch gepressten Orangensaft.<br>(Saya minum jus jeruk segar setiap pagi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Haus bauen</span></td>
                        <td>membangun rumah</td>
                        <td>Sie bauen ein neues Haus am Stadtrand.<br>(Mereka membangun rumah baru di pinggiran kota)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Lehre ziehen</span></td>
                        <td>mengambil pelajaran</td>
                        <td>Wir sollten aus unseren Fehlern eine Lehre ziehen.<br>(Kita harus mengambil pelajaran dari kesalahan kita)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Ball spielen</span></td>
                        <td>bermain bola</td>
                        <td>Die Kinder spielen Ball im Park.<br>(Anak-anak bermain bola di taman)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Bild malen</span></td>
                        <td>melukis gambar</td>
                        <td>Sie malt ein schönes Bild von der Landschaft.<br>(Dia melukis gambar indah pemandangan alam)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Schritt halten</span></td>
                        <td>mengikuti langkah</td>
                        <td>Es ist schwer, mit den technologischen Entwicklungen Schritt zu halten.<br>(Sulit untuk mengikuti langkah perkembangan teknologi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Eis essen</span></td>
                        <td>makan es krim</td>
                        <td>Im Sommer esse ich gerne Eis.<br>(Di musim panas, saya suka makan es krim)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Prüfung ablegen</span></td>
                        <td>mengikuti ujian</td>
                        <td>Nächste Woche muss ich eine wichtige Prüfung ablegen.<br>(Minggu depan saya harus mengikuti ujian penting)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Rache üben</span></td>
                        <td>membalas dendam</td>
                        <td>Er wollte Rache üben für das, was ihm angetan wurde.<br>(Dia ingin membalas dendam atas apa yang telah dilakukan kepadanya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Brille tragen</span></td>
                        <td>memakai kacamata</td>
                        <td>Ich trage eine Brille zum Lesen.<br>(Saya memakai kacamata untuk membaca)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Stelle suchen</span></td>
                        <td>mencari pekerjaan</td>
                        <td>Nach dem Studium suche ich eine Stelle als Ingenieur.<br>(Setelah kuliah, saya mencari pekerjaan sebagai insinyur)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Sinn machen</span></td>
                        <td>masuk akal</td>
                        <td>Seine Erklärung macht für mich keinen Sinn.<br>(Penjelasannya tidak masuk akal bagi saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Tisch decken</span></td>
                        <td>menata meja</td>
                        <td>Kannst du bitte den Tisch für das Abendessen decken?<br>(Bisakah kamu menata meja untuk makan malam?)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Übung machen</span></td>
                        <td>melakukan latihan</td>
                        <td>Ich mache jeden Tag Übungen, um fit zu bleiben.<br>(Saya melakukan latihan setiap hari untuk tetap bugar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Platz schaffen</span></td>
                        <td>membuat ruang</td>
                        <td>Wir müssen Platz für die neuen Möbel schaffen.<br>(Kita harus membuat ruang untuk furnitur baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Karte schreiben</span></td>
                        <td>menulis kartu</td>
                        <td>Ich schreibe eine Karte an meine Großeltern.<br>(Saya menulis kartu untuk kakek-nenek saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Geschäft führen</span></td>
                        <td>menjalankan bisnis</td>
                        <td>Meine Eltern führen ein kleines Geschäft in der Innenstadt.<br>(Orang tua saya menjalankan bisnis kecil di pusat kota)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Verdacht schöpfen</span></td>
                        <td>mencurigai</td>
                        <td>Die Polizei schöpfte Verdacht aufgrund seines seltsamen Verhaltens.<br>(Polisi mencurigai karena perilakunya yang aneh)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Mathe lernen</span></td>
                        <td>belajar matematika</td>
                        <td>Ich muss jeden Tag Mathe lernen, um die Prüfung zu bestehen.<br>(Saya harus belajar matematika setiap hari untuk lulus ujian)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Feier veranstalten</span></td>
                        <td>mengadakan perayaan</td>
                        <td>Wir veranstalten eine große Feier zum Firmenjubiläum.<br>(Kami mengadakan perayaan besar untuk ulang tahun perusahaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Zweifel hegen</span></td>
                        <td>meragukan</td>
                        <td>Ich hege Zweifel an der Richtigkeit seiner Aussage.<br>(Saya meragukan kebenaran pernyataannya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Bahn fahren</span></td>
                        <td>naik kereta</td>
                        <td>Ich fahre jeden Tag mit der Bahn zur Arbeit.<br>(Saya naik kereta ke tempat kerja setiap hari)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Geheimnis verraten</span></td>
                        <td>membocorkan rahasia</td>
                        <td>Bitte verrate niemandem mein Geheimnis.<br>(Tolong jangan bocorkan rahasiaku kepada siapa pun)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Druck ausüben</span></td>
                        <td>memberikan tekanan</td>
                        <td>Der Chef übt Druck auf seine Mitarbeiter aus, um die Deadline einzuhalten.<br>(Bos memberikan tekanan pada karyawannya untuk memenuhi tenggat waktu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Schokolade essen</span></td>
                        <td>makan cokelat</td>
                        <td>Ich esse gerne dunkle Schokolade als Snack.<br>(Saya suka makan cokelat hitam sebagai camilan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Sprache beherrschen</span></td>
                        <td>menguasai bahasa</td>
                        <td>Sie beherrscht drei Fremdsprachen fließend.<br>(Dia menguasai tiga bahasa asing dengan lancar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Folge tragen</span></td>
                        <td>menanggung akibat</td>
                        <td>Jeder muss die Folgen seiner Handlungen tragen.<br>(Setiap orang harus menanggung akibat dari tindakannya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Milch trinken</span></td>
                        <td>minum susu</td>
                        <td>Ich trinke jeden Morgen ein Glas Milch.<br>(Saya minum segelas susu setiap pagi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Praktikum machen</span></td>
                        <td>melakukan magang</td>
                        <td>Sie macht ein Praktikum bei einer großen Firma.<br>(Dia melakukan magang di sebuah perusahaan besar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Atem holen</span></td>
                        <td>mengambil nafas</td>
                        <td>Nach dem langen Lauf musste er tief Atem holen.<br>(Setelah berlari lama, dia harus mengambil nafas dalam-dalam)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Musik spielen</span></td>
                        <td>memainkan musik</td>
                        <td>Er spielt Gitarre in einer Band.<br>(Dia memainkan gitar dalam sebuah band)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Wunsch äußern</span></td>
                        <td>mengungkapkan keinginan</td>
                        <td>Sie äußerte den Wunsch, ans Meer zu fahren.<br>(Dia mengungkapkan keinginan untuk pergi ke laut)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Konsequenzen ziehen</span></td>
                        <td>mengambil konsekuensi</td>
                        <td>Wir müssen aus dieser Situation Konsequenzen ziehen.<br>(Kita harus mengambil konsekuensi dari situasi ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Deutsch sprechen</span></td>
                        <td>berbicara bahasa Jerman</td>
                        <td>Ich lerne Deutsch zu sprechen.<br>(Saya belajar berbicara bahasa Jerman)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Workshop leiten</span></td>
                        <td>memimpin workshop</td>
                        <td>Sie leitet nächste Woche einen Workshop über kreatives Schreiben.<br>(Dia akan memimpin workshop tentang menulis kreatif minggu depan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Freundschaft schließen</span></td>
                        <td>menjalin pertemanan</td>
                        <td>In der neuen Stadt konnte er schnell Freundschaft schließen.<br>(Di kota baru, dia bisa cepat menjalin pertemanan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Haare waschen</span></td>
                        <td>mencuci rambut</td>
                        <td>Ich wasche meine Haare jeden zweiten Tag.<br>(Saya mencuci rambut saya setiap dua hari sekali)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Ticket buchen</span></td>
                        <td>memesan tiket</td>
                        <td>Ich muss noch ein Ticket für den Zug buchen.<br>(Saya masih harus memesan tiket untuk kereta)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Achtung schenken</span></td>
                        <td>memberikan perhatian</td>
                        <td>Wir sollten den Details mehr Achtung schenken.<br>(Kita harus memberikan lebih banyak perhatian pada detail-detail)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Rad fahren</span></td>
                        <td>bersepeda</td>
                        <td>Im Sommer fahre ich gerne Rad im Park.<br>(Di musim panas, saya suka bersepeda di taman)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Wette gewinnen</span></td>
                        <td>memenangkan taruhan</td>
                        <td>Er hat die Wette über das Fußballspiel gewonnen.<br>(Dia memenangkan taruhan tentang pertandingan sepak bola)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Gnade walten</span></td>
                        <td>memberikan pengampunan</td>
                        <td>Der Richter ließ Gnade walten und milderte die Strafe.<br>(Hakim memberikan pengampunan dan meringankan hukuman)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Zeitung kaufen</span></td>
                        <td>membeli koran</td>
                        <td>Ich kaufe jeden Morgen eine Zeitung am Kiosk.<br>(Saya membeli koran setiap pagi di kios)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Dokument scannen</span></td>
                        <td>memindai dokumen</td>
                        <td>Können Sie bitte dieses Dokument für mich scannen?<br>(Bisakah Anda memindai dokumen ini untuk saya?)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Interesse bekunden</span></td>
                        <td>menunjukkan ketertarikan</td>
                        <td>Sie bekundete Interesse an dem Jobangebot.<br>(Dia menunjukkan ketertarikan pada tawaran pekerjaan itu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Kaffee kochen</span></td>
                        <td>membuat kopi</td>
                        <td>Jeden Morgen koche ich frischen Kaffee.<br>(Setiap pagi saya membuat kopi segar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine Datei speichern</span></td>
                        <td>menyimpan file</td>
                        <td>Vergiss nicht, die Datei zu speichern, bevor du den Computer ausschaltest.<br>(Jangan lupa menyimpan file sebelum mematikan komputer)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Kraft schöpfen</span></td>
                        <td>mengumpulkan kekuatan</td>
                        <td>Nach dem Urlaub konnte sie neue Kraft schöpfen.<br>(Setelah liburan, dia bisa mengumpulkan kekuatan baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Suppe essen</span></td>
                        <td>makan sup</td>
                        <td>An kalten Tagen esse ich gerne heiße Suppe.<br>(Pada hari-hari dingin, saya suka makan sup panas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Video hochladen</span></td>
                        <td>mengunggah video</td>
                        <td>Sie hat ein neues Video auf YouTube hochgeladen.<br>(Dia telah mengunggah video baru di YouTube)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Bedenken äußern</span></td>
                        <td>mengungkapkan keraguan</td>
                        <td>Er äußerte Bedenken bezüglich des neuen Projekts.<br>(Dia mengungkapkan keraguan mengenai proyek baru tersebut)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Wein trinken</span></td>
                        <td>minum anggur</td>
                        <td>Am Wochenende trinke ich gerne ein Glas Wein.<br>(Pada akhir pekan, saya suka minum segelas anggur)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Passwort ändern</span></td>
                        <td>mengubah kata sandi</td>
                        <td>Du solltest regelmäßig dein Passwort ändern.<br>(Kamu harus secara teratur mengubah kata sandimu)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Einwände erheben</span></td>
                        <td>mengajukan keberatan</td>
                        <td>Die Anwohner erhoben Einwände gegen den Bau des neuen Einkaufszentrums.<br>(Para penduduk mengajukan keberatan terhadap pembangunan pusat perbelanjaan baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Gemüse kochen</span></td>
                        <td>memasak sayuran</td>
                        <td>Ich koche jeden Tag frisches Gemüse zum Abendessen.<br>(Saya memasak sayuran segar setiap hari untuk makan malam)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Analysen durchführen</span></td>
                        <td>melakukan analisis</td>
                        <td>Das Team führt gründliche Analysen der Marktdaten durch.<br>(Tim melakukan analisis menyeluruh terhadap data pasar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Alternativen erwägen</span></td>
                        <td>mempertimbangkan alternatif</td>
                        <td>Wir müssen alle möglichen Alternativen erwägen, bevor wir eine Entscheidung treffen.<br>(Kita harus mempertimbangkan semua alternatif yang mungkin sebelum mengambil keputusan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Aufgaben delegieren</span></td>
                        <td>mendelegasikan tugas</td>
                        <td>Ein guter Manager muss lernen, Aufgaben effektiv zu delegieren.<br>(Seorang manajer yang baik harus belajar mendelegasikan tugas secara efektif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Prozesse optimieren</span></td>
                        <td>mengoptimalkan proses</td>
                        <td>Wir arbeiten daran, unsere Produktionsprozesse zu optimieren.<br>(Kami bekerja untuk mengoptimalkan proses produksi kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Risiken minimieren</span></td>
                        <td>meminimalkan risiko</td>
                        <td>Es ist wichtig, potenzielle Risiken zu identifizieren und zu minimieren.<br>(Penting untuk mengidentifikasi dan meminimalkan risiko potensial)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ansätze verfolgen</span></td>
                        <td>mengikuti pendekatan</td>
                        <td>In der Forschung verfolgen wir innovative Ansätze.<br>(Dalam penelitian, kami mengikuti pendekatan inovatif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kompetenzen erweitern</span></td>
                        <td>memperluas kompetensi</td>
                        <td>Durch Weiterbildungen können Mitarbeiter ihre Kompetenzen erweitern.<br>(Melalui pelatihan lanjutan, karyawan dapat memperluas kompetensi mereka)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Strategien entwickeln</span></td>
                        <td>mengembangkan strategi</td>
                        <td>Das Unternehmen muss neue Strategien entwickeln, um wettbewerbsfähig zu bleiben.<br>(Perusahaan harus mengembangkan strategi baru untuk tetap kompetitif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Lösungen erarbeiten</span></td>
                        <td>mengembangkan solusi</td>
                        <td>Wir müssen gemeinsam Lösungen für dieses komplexe Problem erarbeiten.<br>(Kita harus bersama-sama mengembangkan solusi untuk masalah kompleks ini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Thesen aufstellen</span></td>
                        <td>membuat tesis</td>
                        <td>Der Wissenschaftler stellte eine kontroverse These zur Klimaentwicklung auf.<br>(Ilmuwan itu membuat tesis kontroversial tentang perkembangan iklim)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Aspekte berücksichtigen</span></td>
                        <td>mempertimbangkan aspek</td>
                        <td>Bei der Planung müssen wir alle relevanten Aspekte berücksichtigen.<br>(Dalam perencanaan, kita harus mempertimbangkan semua aspek yang relevan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verfahren einleiten</span></td>
                        <td>memulai prosedur</td>
                        <td>Die Behörde hat ein rechtliches Verfahren gegen das Unternehmen eingeleitet.<br>(Otoritas telah memulai prosedur hukum terhadap perusahaan tersebut)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Methoden anwenden</span></td>
                        <td>menerapkan metode</td>
                        <td>Wir wenden moderne Methoden zur Datenanalyse an.<br>(Kami menerapkan metode modern untuk analisis data)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Standards etablieren</span></td>
                        <td>menetapkan standar</td>
                        <td>Das Unternehmen möchte neue Qualitätsstandards in der Branche etablieren.<br>(Perusahaan ingin menetapkan standar kualitas baru di industri)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Prognosen erstellen</span></td>
                        <td>membuat perkiraan</td>
                        <td>Experten erstellen Prognosen für die wirtschaftliche Entwicklung.<br>(Para ahli membuat perkiraan untuk perkembangan ekonomi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Tendenzen erkennen</span></td>
                        <td>mengenali kecenderungan</td>
                        <td>Es ist wichtig, frühzeitig Markttendenzen zu erkennen.<br>(Penting untuk mengenali kecenderungan pasar sejak dini)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kapazitäten ausbauen</span></td>
                        <td>meningkatkan kapasitas</td>
                        <td>Die Fabrik plant, ihre Produktionskapazitäten auszubauen.<br>(Pabrik tersebut berencana untuk meningkatkan kapasitas produksinya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Systeme implementieren</span></td>
                        <td>mengimplementasikan sistem</td>
                        <td>Wir müssen neue IT-Systeme implementieren, um effizienter zu arbeiten.<br>(Kita harus mengimplementasikan sistem IT baru untuk bekerja lebih efisien)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Hypothesen überprüfen</span></td>
                        <td>menguji hipotesis</td>
                        <td>Wissenschaftler überprüfen ihre Hypothesen durch Experimente.<br>(Para ilmuwan menguji hipotesis mereka melalui eksperimen)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Funktionen übernehmen</span></td>
                        <td>mengambil alih fungsi</td>
                        <td>Der neue Manager wird wichtige Funktionen in der Abteilung übernehmen.<br>(Manajer baru akan mengambil alih fungsi penting di departemen)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kompetenzen aufbauen</span></td>
                        <td>membangun kompetensi</td>
                        <td>Durch gezielte Schulungen können wir neue Kompetenzen aufbauen.<br>(Melalui pelatihan yang terarah, kita dapat membangun kompetensi baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Fakten zusammentragen</span></td>
                        <td>mengumpulkan fakta</td>
                        <td>Bevor wir eine Entscheidung treffen, müssen wir alle relevanten Fakten zusammentragen.<br>(Sebelum kita mengambil keputusan, kita harus mengumpulkan semua fakta yang relevan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kontrollen durchführen</span></td>
                        <td>melakukan kontrol</td>
                        <td>Das Qualitätsmanagement führt regelmäßige Kontrollen durch.<br>(Manajemen kualitas melakukan kontrol secara teratur)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Defizite ausgleichen</span></td>
                        <td>menyeimbangkan defisit</td>
                        <td>Wir müssen Strategien entwickeln, um die finanziellen Defizite auszugleichen.<br>(Kita harus mengembangkan strategi untuk menyeimbangkan defisit keuangan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Potenziale nutzen</span></td>
                        <td>memanfaatkan potensi</td>
                        <td>Es ist wichtig, die Potenziale unserer Mitarbeiter voll zu nutzen.<br>(Penting untuk memanfaatkan potensi karyawan kita sepenuhnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Statistiken auswerten</span></td>
                        <td>mengevaluasi statistik</td>
                        <td>Die Marketingabteilung wertet die Verkaufsstatistiken aus.<br>(Departemen pemasaran mengevaluasi statistik penjualan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Engagement zeigen</span></td>
                        <td>menunjukkan keterlibatan</td>
                        <td>Die Mitarbeiter zeigen großes Engagement für das neue Projekt.<br>(Para karyawan menunjukkan keterlibatan besar dalam proyek baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kooperation aufbauen</span></td>
                        <td>membangun kerja sama</td>
                        <td>Wir möchten eine engere Kooperation mit unseren Partnern aufbauen.<br>(Kami ingin membangun kerja sama yang lebih erat dengan mitra kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Effizienz steigern</span></td>
                        <td>meningkatkan efisiensi</td>
                        <td>Durch neue Technologien können wir die Effizienz unserer Prozesse steigern.<br>(Melalui teknologi baru, kita dapat meningkatkan efisiensi proses kita)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Qualität sicherstellen</span></td>
                        <td>memastikan kualitas</td>
                        <td>Unser Team arbeitet hart daran, die Qualität unserer Produkte sicherzustellen.<br>(Tim kami bekerja keras untuk memastikan kualitas produk kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Innovation fördern</span></td>
                        <td>mendorong inovasi</td>
                        <td>Das Unternehmen investiert viel, um Innovation zu fördern.<br>(Perusahaan berinvestasi banyak untuk mendorong inovasi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Projekte koordinieren</span></td>
                        <td>mengkoordinasikan proyek</td>
                        <td>Als Projektmanager muss sie verschiedene Projekte gleichzeitig koordinieren.<br>(Sebagai manajer proyek, dia harus mengkoordinasikan berbagai proyek secara bersamaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Motivation steigern</span></td>
                        <td>meningkatkan motivasi</td>
                        <td>Gute Führungskräfte wissen, wie sie die Motivation ihrer Mitarbeiter steigern können.<br>(Pemimpin yang baik tahu cara meningkatkan motivasi karyawan mereka)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Konflikte bewältigen</span></td>
                        <td>mengatasi konflik</td>
                        <td>Es ist wichtig, Konflikte im Team konstruktiv zu bewältigen.<br>(Penting untuk mengatasi konflik dalam tim secara konstruktif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Transparenz schaffen</span></td>
                        <td>menciptakan transparansi</td>
                        <td>Wir müssen mehr Transparenz in unseren Entscheidungsprozessen schaffen.<br>(Kita harus menciptakan lebih banyak transparansi dalam proses pengambilan keputusan kita)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Konsequenzen tragen</span></td>
                        <td>menanggung konsekuensi</td>
                        <td>Jeder muss die Konsequenzen seines Handelns tragen.<br>(Setiap orang harus menanggung konsekuensi dari tindakannya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Wettbewerb fördern</span></td>
                        <td>mendorong persaingan</td>
                        <td>Diese Maßnahmen sollen den fairen Wettbewerb im Markt fördern.<br>(Langkah-langkah ini dimaksudkan untuk mendorong persaingan yang adil di pasar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Erfahrungen einbringen</span></td>
                        <td>membawa pengalaman</td>
                        <td>Sie kann wertvolle Erfahrungen aus ihrem vorherigen Job einbringen.<br>(Dia dapat membawa pengalaman berharga dari pekerjaan sebelumnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Expertise entwickeln</span></td>
                        <td>mengembangkan keahlian</td>
                        <td>Durch kontinuierliche Weiterbildung können wir unsere Expertise entwickeln.<br>(Melalui pendidikan berkelanjutan, kita dapat mengembangkan keahlian kita)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kapital einsetzen</span></td>
                        <td>menginvestasikan modal</td>
                        <td>Das Unternehmen plant, mehr Kapital in Forschung und Entwicklung einzusetzen.<br>(Perusahaan berencana untuk menginvestasikan lebih banyak modal dalam penelitian dan pengembangan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Synergien nutzen</span></td>
                        <td>memanfaatkan sinergi</td>
                        <td>Durch die Fusion können wir Synergien zwischen den Abteilungen besser nutzen.<br>(Melalui merger, kita dapat memanfaatkan sinergi antar departemen dengan lebih baik)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Netzwerke aufbauen</span></td>
                        <td>membangun jaringan</td>
                        <td>Es ist wichtig, berufliche Netzwerke aufzubauen und zu pflegen.<br>(Penting untuk membangun dan memelihara jaringan profesional)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Beratung anbieten</span></td>
                        <td>menawarkan konsultasi</td>
                        <td>Unsere Experten bieten kostenlose Beratung an.<br>(Para ahli kami menawarkan konsultasi gratis)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vorschriften einhalten</span></td>
                        <td>mematuhi peraturan</td>
                        <td>Unser Unternehmen muss alle gesetzlichen Vorschriften einhalten.<br>(Perusahaan kami harus mematuhi semua peraturan hukum)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Image pflegen</span></td>
                        <td>menjaga citra</td>
                        <td>Es ist wichtig, das Unternehmensimage sorgfältig zu pflegen.<br>(Penting untuk menjaga citra perusahaan dengan hati-hati)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Führung übernehmen</span></td>
                        <td>mengambil kepemimpinan</td>
                        <td>In schwierigen Situationen muss jemand die Führung übernehmen.<br>(Dalam situasi sulit, seseorang harus mengambil kepemimpinan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Budget verwalten</span></td>
                        <td>mengelola anggaran</td>
                        <td>Der Finanzmanager muss das Unternehmensbudget sorgfältig verwalten.<br>(Manajer keuangan harus mengelola anggaran perusahaan dengan cermat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Daten auswerten</span></td>
                        <td>mengevaluasi data</td>
                        <td>Das Marketingteam wird die Umfrageergebnisse gründlich auswerten.<br>(Tim pemasaran akan mengevaluasi hasil survei secara menyeluruh)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Talente fördern</span></td>
                        <td>mengembangkan bakat</td>
                        <td>Unser Unternehmen will junge Talente aktiv fördern.<br>(Perusahaan kami ingin secara aktif mengembangkan bakat muda)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Prozesse steuern</span></td>
                        <td>mengendalikan proses</td>
                        <td>Die Geschäftsleitung muss die Unternehmensprozesse effizient steuern.<br>(Manajemen harus mengendalikan proses perusahaan secara efisien)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Nachhaltigkeit gewährleisten</span></td>
                        <td>menjamin keberlanjutan</td>
                        <td>Wir müssen Nachhaltigkeit in allen Geschäftsbereichen gewährleisten.<br>(Kami harus menjamin keberlanjutan di semua bidang bisnis)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Update installieren</span></td>
                        <td>menginstal pembaruan</td>
                        <td>Ich muss das Betriebssystem auf meinem Computer updaten.<br>(Saya harus menginstal pembaruan sistem operasi di komputer saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Vertrauen gewinnen</span></td>
                        <td>mendapatkan kepercayaan</td>
                        <td>Ein guter Geschäftspartner muss schnell Vertrauen gewinnen.<br>(Mitra bisnis yang baik harus cepat mendapatkan kepercayaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Wasser kochen</span></td>
                        <td>mendidihkan air</td>
                        <td>Ich koche Wasser für den Tee.<br>(Saya mendidihkan air untuk teh)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Foto bearbeiten</span></td>
                        <td>mengedit foto</td>
                        <td>Ich möchte mein Urlaubsfoto ein bisschen bearbeiten.<br>(Saya ingin sedikit mengedit foto liburan saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Anerkennung finden</span></td>
                        <td>mendapat pengakuan</td>
                        <td>Seine Leistungen finden endlich die verdiente Anerkennung.<br>(Prestasinya akhirnya mendapat pengakuan yang layak)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Tee kochen</span></td>
                        <td>menyeduh teh</td>
                        <td>Ich koche jeden Abend einen Tee.<br>(Saya menyeduh teh setiap malam)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Programm starten</span></td>
                        <td>menjalankan program</td>
                        <td>Kannst du mir helfen, das Programm zu starten?<br>(Bisakah kamu membantuku menjalankan program?)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Beachtung finden</span></td>
                        <td>mendapat perhatian</td>
                        <td>Seine Vorschläge finden große Beachtung in der Firma.<br>(Usulannya mendapat perhatian besar di perusahaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Fernseher einschalten</span></td>
                        <td>menyalakan televisi</td>
                        <td>Ich schalte den Fernseher ein, um die Nachrichten zu sehen.<br>(Saya menyalakan televisi untuk menonton berita)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Link teilen</span></td>
                        <td>membagikan tautan</td>
                        <td>Ich teile den interessanten Link mit meinen Freunden.<br>(Saya membagikan tautan menarik dengan teman-teman saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Würdigung erfahren</span></td>
                        <td>mendapat penghargaan</td>
                        <td>Seine langjährige Arbeit erfährt endlich die verdiente Würdigung.<br>(Pekerjaannya yang bertahun-tahun akhirnya mendapat penghargaan yang layak)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Radio ausschalten</span></td>
                        <td>mematikan radio</td>
                        <td>Ich schalte das Radio aus, wenn ich schlafen will.<br>(Saya mematikan radio ketika ingin tidur)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">ein Backup erstellen</span></td>
                        <td>membuat cadangan</td>
                        <td>Ich erstelle ein Backup meiner wichtigen Dateien.<br>(Saya membuat cadangan file-file penting saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Anklang finden</span></td>
                        <td>mendapat sambutan</td>
                        <td>Die neue Musikband findet großen Anklang bei jungen Zuhörern.<br>(Band musik baru itu mendapat sambutan besar dari pendengar muda)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Licht anmachen</span></td>
                        <td>menyalakan lampu</td>
                        <td>Ich mache das Licht an, wenn es dunkel wird.<br>(Saya menyalakan lampu ketika mulai gelap)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">eine App herunterladen</span></td>
                        <td>mengunduh aplikasi</td>
                        <td>Ich lade eine neue Spiele-App auf mein Handy herunter.<br>(Saya mengunduh aplikasi game baru di ponsel saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Zuspruch erhalten</span></td>
                        <td>mendapat dukungan</td>
                        <td>Das Projekt erhält großen Zuspruch von allen Beteiligten.<br>(Proyek itu mendapat dukungan besar dari semua pihak yang terlibat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a1">A1</span></td>
                        <td><span class="verb-combo">Musik ausmachen</span></td>
                        <td>mematikan musik</td>
                        <td>Ich mache die Musik aus, wenn meine Eltern nach Hause kommen.<br>(Saya mematikan musik ketika orang tua saya pulang)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-a2">A2</span></td>
                        <td><span class="verb-combo">einen Blog schreiben</span></td>
                        <td>menulis blog</td>
                        <td>Ich schreibe einen Blog über meine Reiseerfahrungen.<br>(Saya menulis blog tentang pengalaman perjalanan saya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b1">B1</span></td>
                        <td><span class="verb-combo">Bestätigung finden</span></td>
                        <td>mendapat konfirmasi</td>
                        <td>Seine Theorie findet durch neue Forschungsergebnisse Bestätigung.<br>(Teorinya mendapat konfirmasi melalui hasil penelitian baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Chancen wahrnehmen</span></td>
                        <td>memanfaatkan kesempatan</td>
                        <td>Erfolgreiche Unternehmer nehmen neue Marktchancen schnell wahr.<br>(Pengusaha sukses dengan cepat memanfaatkan kesempatan pasar baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Bilanz erstellen</span></td>
                        <td>membuat neraca</td>
                        <td>Am Ende des Geschäftsjahres muss die Bilanz erstellt werden.<br>(Di akhir tahun bisnis, neraca harus dibuat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Veränderungen herbeiführen</span></td>
                        <td>membawa perubahan</td>
                        <td>Innovative Unternehmen führen aktiv Veränderungen in ihrer Organisation herbei.<br>(Perusahaan inovatif secara aktif membawa perubahan dalam organisasinya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kosten reduzieren</span></td>
                        <td>mengurangi biaya</td>
                        <td>Das Unternehmen arbeitet daran, die Produktionskosten zu reduzieren.<br>(Perusahaan berupaya mengurangi biaya produksi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Strukturen schaffen</span></td>
                        <td>menciptakan struktur</td>
                        <td>Wir müssen klare Unternehmensstrukturen schaffen.<br>(Kami harus menciptakan struktur perusahaan yang jelas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Konzepte umsetzen</span></td>
                        <td>menerapkan konsep</td>
                        <td>Das Entwicklungsteam setzt innovative Konzepte in die Praxis um.<br>(Tim pengembangan menerapkan konsep inovatif ke dalam praktik)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Leistung steigern</span></td>
                        <td>meningkatkan kinerja</td>
                        <td>Durch kontinuierliche Schulungen können wir unsere Leistung steigern.<br>(Melalui pelatihan berkelanjutan, kami dapat meningkatkan kinerja)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Überblick verschaffen</span></td>
                        <td>mendapatkan gambaran</td>
                        <td>In komplexen Projekten ist es wichtig, sich einen schnellen Überblick zu verschaffen.<br>(Dalam proyek kompleks, penting untuk segera mendapatkan gambaran)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vertrauen aufbauen</span></td>
                        <td>membangun kepercayaan</td>
                        <td>Zwischen Geschäftspartnern muss kontinuierlich Vertrauen aufgebaut werden.<br>(Antara mitra bisnis, kepercayaan harus terus-menerus dibangun)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Wissen vermitteln</span></td>
                        <td>menyampaikan pengetahuan</td>
                        <td>In Workshops können Experten ihr Wissen effektiv vermitteln.<br>(Dalam lokakarya, para ahli dapat menyampaikan pengetahuan secara efektif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Meinung bilden</span></td>
                        <td>membentuk pendapat</td>
                        <td>Es ist wichtig, sich durch verschiedene Informationsquellen eine eigene Meinung zu bilden.<br>(Penting untuk membentuk pendapat sendiri melalui berbagai sumber informasi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ergebnisse präsentieren</span></td>
                        <td>mempresentasikan hasil</td>
                        <td>Das Forschungsteam wird seine Ergebnisse auf der Konferenz präsentieren.<br>(Tim penelitian akan mempresentasikan hasilnya di konferensi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Entwicklung vorantreiben</span></td>
                        <td>mendorong perkembangan</td>
                        <td>Innovative Unternehmen treiben die technologische Entwicklung aktiv voran.<br>(Perusahaan inovatif secara aktif mendorong perkembangan teknologi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Vergleiche ziehen</span></td>
                        <td>membuat perbandingan</td>
                        <td>In der Analyse können wir wichtige Vergleiche zwischen verschiedenen Strategien ziehen.<br>(Dalam analisis, kami dapat membuat perbandingan penting antara berbagai strategi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Diskussion moderieren</span></td>
                        <td>memimpin diskusi</td>
                        <td>Ein guter Moderator kann eine konstruktive Diskussion leiten.<br>(Seorang moderator yang baik dapat memimpin diskusi konstruktif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Qualifikation nachweisen</span></td>
                        <td>membuktikan kualifikasi</td>
                        <td>Für diese Position müssen Sie Ihre Qualifikation durch Zeugnisse nachweisen.<br>(Untuk posisi ini, Anda harus membuktikan kualifikasi melalui sertifikat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verantwortung delegieren</span></td>
                        <td>mendelegasikan tanggung jawab</td>
                        <td>Ein guter Manager kann Verantwortung effektiv an sein Team delegieren.<br>(Seorang manajer yang baik dapat mendelegasikan tanggung jawab secara efektif kepada timnya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Erfolg messen</span></td>
                        <td>mengukur keberhasilan</td>
                        <td>Wir müssen klare Kriterien definieren, um den Erfolg zu messen.<br>(Kami harus mendefinisikan kriteria jelas untuk mengukur keberhasilan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Zusammenarbeit intensivieren</span></td>
                        <td>mengintensifkan kerja sama</td>
                        <td>Unser Ziel ist es, die Zusammenarbeit mit internationalen Partnern zu intensivieren.<br>(Tujuan kami adalah mengintensifkan kerja sama dengan mitra internasional)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Lösungen generieren</span></td>
                        <td>menghasilkan solusi</td>
                        <td>In Brainstorming-Sessions können wir kreative Lösungen für komplexe Probleme generieren.<br>(Dalam sesi brainstorming, kami dapat menghasilkan solusi kreatif untuk masalah kompleks)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Aufgaben priorisieren</span></td>
                        <td>memprioritaskan tugas</td>
                        <td>Um effizient zu arbeiten, müssen wir unsere Aufgaben richtig priorisieren.<br>(Untuk bekerja secara efisien, kita harus memprioritaskan tugas dengan benar)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Teamgeist fördern</span></td>
                        <td>mendorong semangat tim</td>
                        <td>Gemeinsame Aktivitäten können den Teamgeist in der Firma fördern.<br>(Kegiatan bersama dapat mendorong semangat tim di perusahaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Produktivität erhöhen</span></td>
                        <td>meningkatkan produktivitas</td>
                        <td>Moderne Technologien helfen uns, die Produktivität zu erhöhen.<br>(Teknologi modern membantu kami meningkatkan produktivitas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kommunikation verbessern</span></td>
                        <td>meningkatkan komunikasi</td>
                        <td>Regelmäßige Meetings können die interne Kommunikation verbessern.<br>(Rapat berkala dapat meningkatkan komunikasi internal)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Fortbildung absolvieren</span></td>
                        <td>menyelesaikan pelatihan lanjutan</td>
                        <td>Mitarbeiter sollten regelmäßig Fortbildungen absolvieren.<br>(Karyawan harus secara berkala menyelesaikan pelatihan lanjutan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Qualitätsstandards einhalten</span></td>
                        <td>mematuhi standar kualitas</td>
                        <td>Unser Unternehmen muss strenge internationale Qualitätsstandards einhalten.<br>(Perusahaan kami harus mematuhi standar kualitas internasional yang ketat)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kreativität entfalten</span></td>
                        <td>mengembangkan kreativitas</td>
                        <td>In Workshops können Mitarbeiter ihre Kreativität frei entfalten.<br>(Dalam lokakarya, karyawan dapat mengembangkan kreativitas mereka secara bebas)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Grundsätze formulieren</span></td>
                        <td>merumuskan prinsip-prinsip</td>
                        <td>Die Geschäftsführung muss klare ethische Grundsätze für das Unternehmen formulieren.<br>(Manajemen harus merumuskan prinsip-prinsip etika yang jelas untuk perusahaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Perspektiven eröffnen</span></td>
                        <td>membuka perspektif</td>
                        <td>Innovative Bildungsprogramme eröffnen jungen Menschen neue berufliche Perspektiven.<br>(Program pendidikan inovatif membuka perspektif karier baru bagi generasi muda)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Fähigkeiten ausbauen</span></td>
                        <td>mengembangkan kemampuan</td>
                        <td>Durch gezielte Weiterbildungen können Mitarbeiter ihre Fähigkeiten kontinuierlich ausbauen.<br>(Melalui pelatihan terarah, karyawan dapat terus-menerus mengembangkan kemampuan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Entscheidungen rechtfertigen</span></td>
                        <td>membenarkan keputusan</td>
                        <td>Ein guter Manager kann seine strategischen Entscheidungen überzeugend rechtfertigen.<br>(Seorang manajer yang baik dapat membenarkan keputusan strategisnya secara meyakinkan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Herausforderungen bewältigen</span></td>
                        <td>mengatasi tantangan</td>
                        <td>Nur wer Herausforderungen konstruktiv bewältigt, kann langfristig erfolgreich sein.<br>(Hanya mereka yang mengatasi tantangan secara konstruktif yang dapat berhasil jangka panjang)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Atmosphäre schaffen</span></td>
                        <td>menciptakan suasana</td>
                        <td>Gute Führungskräfte können eine positive Arbeitsatmosphäre schaffen.<br>(Pemimpin yang baik dapat menciptakan suasana kerja yang positif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Verständnis fördern</span></td>
                        <td>mendorong pemahaman</td>
                        <td>Offene Kommunikation kann das gegenseitige Verständnis im Team fördern.<br>(Komunikasi terbuka dapat mendorong pemahaman timbal balik dalam tim)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Dynamik entwickeln</span></td>
                        <td>mengembangkan dinamika</td>
                        <td>Ein erfolgreiches Team entwickelt eine positive Arbeitsdinamik.<br>(Sebuah tim sukses mengembangkan dinamika kerja positif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kompetenz nachweisen</span></td>
                        <td>membuktikan kompetensi</td>
                        <td>In Vorstellungsgesprächen müssen Bewerber ihre Kompetenz überzeugend nachweisen.<br>(Dalam wawancara, para pelamar harus membuktikan kompetensi mereka secara meyakinkan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Tradition pflegen</span></td>
                        <td>melestarikan tradisi</td>
                        <td>Traditionelle Unternehmen pflegen ihre historischen Wurzeln.<br>(Perusahaan tradisional melestarikan akar sejarah mereka)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Akzente setzen</span></td>
                        <td>memberi penekanan</td>
                        <td>Die Marketingkampagne setzt neue inhaltliche Akzente.<br>(Kampanye pemasaran memberi penekanan konten baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Potenzial ausschöpfen</span></td>
                        <td>memanfaatkan potensi</td>
                        <td>Wir müssen das volle Potenzial unserer Mitarbeiter ausschöpfen.<br>(Kami harus memanfaatkan potensi penuh karyawan kami)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Qualität gewährleisten</span></td>
                        <td>menjamin kualitas</td>
                        <td>Das Qualitätsmanagement muss die höchsten Standards gewährleisten.<br>(Manajemen kualitas harus menjamin standar tertinggi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Impulse geben</span></td>
                        <td>memberikan dorongan</td>
                        <td>Innovative Unternehmen geben wichtige Impulse für wirtschaftliche Entwicklungen.<br>(Perusahaan inovatif memberikan dorongan penting untuk perkembangan ekonomi)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Grenzen überwinden</span></td>
                        <td>mengatasi batasan</td>
                        <td>Internationale Zusammenarbeit hilft, kulturelle Grenzen zu überwinden.<br>(Kerja sama internasional membantu mengatasi batasan budaya)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Ressourcen bündeln</span></td>
                        <td>menggabungkan sumber daya</td>
                        <td>Um effizient zu arbeiten, müssen wir unsere Ressourcen gezielt bündeln.<br>(Untuk bekerja secara efisien, kita harus menggabungkan sumber daya secara terarah)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Kreativität fördern</span></td>
                        <td>mendorong kreativitas</td>
                        <td>Ein offenes Arbeitsumfeld kann die Kreativität der Mitarbeiter fördern.<br>(Lingkungan kerja terbuka dapat mendorong kreativitas karyawan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Stabilität sichern</span></td>
                        <td>menjamin stabilitas</td>
                        <td>Das Management muss die finanzielle Stabilität des Unternehmens sichern.<br>(Manajemen harus menjamin stabilitas finansial perusahaan)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Netzwerke pflegen</span></td>
                        <td>memelihara jaringan</td>
                        <td>Erfolgreiche Geschäftsleute pflegen kontinuierlich ihre beruflichen Netzwerke.<br>(Pengusaha sukses terus-menerus memelihara jaringan profesional mereka)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Innovation umsetzen</span></td>
                        <td>menerapkan inovasi</td>
                        <td>Nur wer Innovationen konsequent umsetzt, bleibt wettbewerbsfähig.<br>(Hanya mereka yang konsisten menerapkan inovasi yang tetap kompetitif)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Prozesse gestalten</span></td>
                        <td>merancang proses</td>
                        <td>Moderne Unternehmen müssen ihre Geschäftsprozesse kontinuierlich neu gestalten.<br>(Perusahaan modern harus terus-menerus merancang ulang proses bisnis mereka)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Standards setzen</span></td>
                        <td>menetapkan standar</td>
                        <td>Marktführer setzen neue Qualitäts- und Innovationsstandards.<br>(Pemimpin pasar menetapkan standar kualitas dan inovasi baru)</td>
                    </tr>
                    <tr>
                        <td><span class="level-tag level-b2">B2</span></td>
                        <td><span class="verb-combo">Werte vermitteln</span></td>
                        <td>menyampaikan nilai-nilai</td>
                        <td>Eine starke Unternehmenskultur vermittelt klare Unternehmenswerte.<br>(Budaya perusahaan yang kuat menyampaikan nilai-nilai perusahaan yang jelas)</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const combination = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const meaning = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

                if (combination.includes(searchTerm) || meaning.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
