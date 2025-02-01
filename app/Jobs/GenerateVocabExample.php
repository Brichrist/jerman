<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use OpenAI;
use App\Models\Vocab;

class GenerateVocabExample implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle(): void
    {
        $data = $this->data;
        // dd($data);

        \Log::info('Processing file: ' . $data);

        try {
            $openai = OpenAI::client(env('OPENAI_API_KEY'));

            $response = $openai->chat()->create([
                'model' => 'gpt-4o',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => "buatkan object JSON yang berisi id bahasa jerman yang saya berikan dengan contoh penggunaannya, 
                                contoh penggunaanya buat sesingkat mungkin maximal 1 kalimat pendek, dan beri tag <u> pada contoh pengguanaanya untuk kata jerman yang saya berikan. Dengan Format: {'german_word_id': 'german_word_example', ...} : \n\n" . $data
                            ],
                        ]
                    ]
                ]
            ]);

            $result = json_decode($response->choices[0]->message->content, true);
            \Log::info('Result file: ' .$response->choices[0]->message->content);

            foreach ($result as $key => $value) {
                $dataToInsert = [
                    'example' => $value,
                ];
                Vocab::where('id', $key)->update($dataToInsert);
            }
            \Log::info('success: ' . $data);
        } catch (\Exception $e) {
            \Log::error('Error processing file: ' . $data . ' - ' . $e->getMessage());
            throw $e; // Re-throw exception agar job dianggap gagal
        }
    }
}
