<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use OpenAI;
use App\Models\Vocab;

class GenerateVocabImg implements ShouldQueue
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
                            'content' => "buatkan obj yang berisi list bahasa Jerman dari teks berikut dalam format JSON beserta artinya dalam bahasa indonesia. Format: {'bahasaJerman': {'kata1':{'meaning':'arti1','word_type':'tipe_kata1'}, 'kata2':{'meaning':'arti2','word_type':'tipe_kata2'}, ...}}: \n\n" . $text
                            // 'content' => "buatkan obj yang berisi list bahasa Jerman dari teks berikut (hanya yang distabilo) dalam format JSON beserta artinya dalam bahasa indonesia. Format: {'bahasaJerman': {'kata1':{'meaning':'arti1','word_type':'tipe_kata1'}, 'kata2':{'meaning':'arti2','word_type':'tipe_kata2'}, ...}}: \n\n" . $text
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
                                    'text' => "buatkan obj yang berisi list bahasa Jerman dari file ini dalam format JSON beserta artinya dalam bahasa indonesia. Wajib pastikan ulang semua vocab sudah masuk dalam list. Dengan Format: {'bahasaJerman': {'kata1':{'meaning':'arti1,'word_type':'tipe_kata1(Nomen,Verb,Adjektiv,Präposition,Adverb,Konjunktion,Null)'}, 'kata2':{'meaning':'arti2,'word_type':'tipe_kata2(Nomen,Verb,Adjektiv,Präposition,Adverb,Konjunktion,Null)'}, ...}}:"
                                    // 'text' => "buatkan obj yang berisi list bahasa Jerman dari file ini (hanya yang distabilo) dalam format JSON beserta artinya dalam bahasa indonesia. Wajib pastikan ulang semua vocab (hanya yang distabilo) sudah masuk dalam list. Dengan Format: {'bahasaJerman': {'kata1':{'meaning':'arti1,'word_type':'tipe_kata1(Nomen,Verb,Adjektiv,Präposition,Adverb,Konjunktion,Null)'}, 'kata2':{'meaning':'arti2,'word_type':'tipe_kata2(Nomen,Verb,Adjektiv,Präposition,Adverb,Konjunktion,Null)'}, ...}}:"
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
            // dd($data);

            foreach ($data['bahasaJerman'] as $vocab => $details) {
                $wordType = $details['word_type'] ?? null;
                $meaning = $details['meaning'] ?? null;

                $dataToInsert = [
                    'kapital' => $kapital,
                    'german_word' => $vocab,
                    'word_type' => $wordType,
                    'meaning' => $meaning,
                    // 'id_user' => 1,
                ];

                $existingVocab = Vocab::where('german_word', $vocab)->first();
                if ($existingVocab) {
                    $existingVocab->update($dataToInsert);
                } else {
                    Vocab::create($dataToInsert);
                }
            }
            
            \Log::info('success: ' . $url);
        } catch (\Exception $e) {
            \Log::error('Error processing file: ' . $url . ' - ' . $e->getMessage());
            throw $e; // Re-throw exception agar job dianggap gagal
        }
    }
}