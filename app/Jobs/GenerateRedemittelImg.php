<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use OpenAI;
use App\Models\Redemittel;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class GenerateRedemittelImg implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function handle(): void
    {
        $pathParts = explode('/', $this->url);
        $kapital = $pathParts[5];
        $url = $this->url;
        // dd($pathParts);

        \Log::info('Processing file: ' . $url);

        try {
            $openai = OpenAI::client(env('OPENAI_API_KEY'));

            // Konversi URL ke path fisik
            $path = public_path(str_replace(url('/'), '', parse_url($url, PHP_URL_PATH)));

            // Cek apakah file ada
            if (!file_exists($path)) {
                throw new \Exception("File tidak ditemukan: " . $path);
            }

            $mimetype = mime_content_type($path);

            if ($mimetype === 'application/pdf') {
                $parser = new \Smalot\PdfParser\Parser();
                $pdf = $parser->parseFile($path);
                $text = $pdf->getText();

                $response = $openai->chat()->create([
                    'model' => 'gpt-4o',
                    'response_format' => ['type' => 'json_object'],
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => "
                                buatkan obj yang berisi list Redemittel dari gambar berikut dalam
                                format JSON beserta artinya dalam bahasa indonesia. ingat anda hanya perlu mengambil 
                                Redemittel nya saja dan hiraukan materi gramatiknya. anda juga perlu memberikan tag (bahasa indoneseia) untuk setiap Redemittel
                                agar user tau ini Redemittel tentang apa. Format yang digunakan: 
                                {'redemittel':{
                                {'de':'Redemittel1','idn':'arti1','tag':'tag1'},
                                {'de':'Redemittel2','idn':'arti2','tag':'tag2'}, ...}}: \n\n" . $text
                        ]
                    ]
                ]);
            } else {
                // Baca file sebagai base64
                $base64File = base64_encode(file_get_contents($path));

                $response = $openai->chat()->create([
                    'model' => 'gpt-4o',
                    'response_format' => ['type' => 'json_object'],
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => [
                                [
                                    'type' => 'text',
                                    'text' => "
                                        buatkan obj yang berisi list Redemittel dari gambar berikut dalam
                                        format JSON beserta artinya dalam bahasa indonesia. ingat anda hanya perlu mengambil 
                                        Redemittel nya saja dan hiraukan materi gramatiknya. anda juga perlu memberikan tag (bahasa indoneseia) untuk setiap Redemittel
                                        agar user tau ini Redemittel tentang apa. Format yang digunakan: 
                                        {'redemittel':{
                                        {'de':'Redemittel1','idn':'arti1','tag':'tag1'},
                                        {'de':'Redemittel2','idn':'arti2','tag':'tag2'}, ...}}"
                                ],
                                [
                                    'type' => 'image_url',
                                    'image_url' => [
                                        'url' => "data:{$mimetype};base64,{$base64File}"
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]);
            }

            $data = json_decode($response->choices[0]->message->content, true);
            \Log::info($data);

            foreach ($data['redemittel'] as $details) {
                $de = $details['de'] ?? null;
                $idn = $details['idn'] ?? null;
                $tag = $details['tag'] ?? null;

                $dataToInsert = [
                    'kapital' => $kapital,
                    'de' => $de,
                    'idn' => $idn,
                    'tag' => $tag,
                ];
                \Log::info($dataToInsert);


                $existingRedemittel = Redemittel::where('de', $de)->first();
                if ($existingRedemittel) {
                    $existingRedemittel->update($dataToInsert);
                } else {
                    Redemittel::create($dataToInsert);
                }
            }

            \Log::info('success: ' . $url);
        } catch (\Exception $e) {
            \Log::error('Error processing file: ' . $url . ' - ' . $e->getMessage());
            throw $e; // Re-throw exception agar job dianggap gagal
        }
    }
}
