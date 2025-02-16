<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vocab;
use OpenAI;
use Illuminate\Support\Facades\Log;

class helper extends Command
{
    protected $signature = 'app:helper';
    protected $description = 'Process vocabulary using OpenAI for specific ID ranges';

    protected $openai;

    public function __construct()
    {
        parent::__construct();
        $this->openai = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function handle()
    {
        // Define problematic ID ranges
        $idRanges = [
            [4186, 4210],
            [4236, 4260]
        ];

        foreach ($idRanges as $range) {
            $this->info("Starting vocabulary processing for ID range {$range[0]} to {$range[1]}");

            try {
                // Get vocabularies for specific ID range
                $vocabs = Vocab::whereBetween('id', $range)->get();

                if ($vocabs->isEmpty()) {
                    $this->warn("No vocabularies found in range {$range[0]} to {$range[1]}");
                    continue;
                }

                // Menyiapkan data untuk OpenAI
                $vocabData = [];
                foreach ($vocabs as $vocab) {
                    $vocabData[$vocab->id] = [
                        'german_word' => $vocab->german_word,
                        'current_meaning' => $vocab->meaning,
                        'current_type' => $vocab->word_type,
                        'current_example' => $vocab->example,
                    ];
                }

                $response = $this->openai->chat()->create([
                    'model' => 'gpt-4',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'You are a German language expert. Format and verify German vocabulary with proper grammatical information.'
                        ],
                        [
                            'role' => 'user',
                            'content' => "Process these German words according to these requirements and maintain the ID structure:
                                1. Format: Return a JSON where each key is the ID from input, containing:
                                {
                                    'ID': {
                                        'german_word': 'corrected German word',
                                        'meaning': 'Indonesian translation',
                                        'word_type': 'grammatical type',
                                        'example': 'example sentence',
                                    }
                                }
                                
                                2. Special handling rules:
                                - For verbs: ALWAYS convert to infinitive form
                                - For nouns: Include article (der/die/das)
                                - For separable verbs: Use pipe symbol (e.g., 'auf|stehen')
                                - Mark reflexive verbs appropriately (e.g., 'sich waschen')
                                
                                3. word_type must be one of: Nomen, Verb, Adjektiv, Präposition, Adverb, Konjunktion, null
                                4. Verify all vocabulary and correct any obvious errors
                                5. IMPORTANT: Keep the ID structure and return data for each ID
                                
                                Words to process: " . json_encode($vocabData, JSON_PRETTY_PRINT)
                        ]
                    ],
                    'temperature' => 0.7
                ]);

                $result = json_decode($response->choices[0]->message->content, true);

                if (empty($result)) {
                    throw new \Exception('Empty response from OpenAI');
                }

                // Update berdasarkan ID
                foreach ($result as $id => $data) {
                    $vocab = Vocab::find($id);
                    if ($vocab) {
                        $vocab->update([
                            'german_word' => $data['german_word'],
                            'meaning' => $data['meaning'],
                            'word_type' => $data['word_type'],
                            'example' => $data['example'] ?? null,
                        ]);
                    }
                }

                $processedIds = array_keys($vocabData);
                $this->info("Successfully processed vocabulary range {$range[0]}-{$range[1]}");
                Log::info("Successfully processed vocabulary range {$range[0]}-{$range[1]}");

            } catch (\Exception $e) {
                $this->error("Error processing range {$range[0]}-{$range[1]}: " . $e->getMessage());
                Log::error("Error processing vocabulary range", [
                    'range' => $range,
                    'error' => $e->getMessage()
                ]);
            }
        }

        $this->info("Processing completed for all ranges!");
        return 0;
    }
}
