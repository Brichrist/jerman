<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vocab;
use OpenAI;
use Illuminate\Support\Facades\Log;

class helper extends Command
{
    protected $signature = 'app:helper {kapital : The kapital parameter to filter vocabularies}';
    protected $description = 'Process vocabulary using OpenAI with required kapital parameter';

    protected $openai;

    public function __construct()
    {
        parent::__construct();
        $this->openai = OpenAI::client(env('OPENAI_API_KEY'));
    }
    public function handle3()
    {
        $kapital = $this->argument('kapital');

        if (empty($kapital)) {
            $this->error("Kapital parameter is required!");
            return 1;
        }

        $this->info("Starting meaning verification for kapital containing '$kapital'");

        // Process vocabularies in chunks of 50
        $query = Vocab::where('kapital', 'like', "%$kapital%")
            ->where('id_user', 1);

        $count = $query->count();

        if ($count === 0) {
            $this->warn("No vocabularies found for kapital: $kapital");
            return 1;
        }

        $this->info("Found $count vocabularies to verify");

        $query->chunk(50, function ($vocabs) {
            try {
                // Prepare data for OpenAI
                $vocabData = [];
                foreach ($vocabs as $vocab) {
                    $vocabData[$vocab->id] = [
                        'german_word' => $vocab->german_word,
                        'current_meaning' => $vocab->meaning,
                    ];
                }

                $response = $this->openai->chat()->create([
                    'model' => 'gpt-4',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'You are a German-Indonesian translation expert. Verify and correct Indonesian translations of German words.'
                        ],
                        [
                            'role' => 'user',
                            'content' => "Verify and correct these German word translations. Return a JSON where each key is the ID from input:
                                Format:
                                {
                                    'ID': {
                                        'meaning': 'correct Indonesian translation'
                                    }
                                }
                                
                                Requirements:
                                1. Only change meanings that are incorrect
                                2. Keep correct translations as they are
                                3. Ensure natural and accurate Indonesian translations
                                4. Return data for all IDs, even if no correction needed
                                5. For unchanged translations, return the current_meaning
                                
                                Words to verify: " . json_encode($vocabData, JSON_PRETTY_PRINT)
                        ]
                    ],
                    'temperature' => 0.7
                ]);

                $result = json_decode($response->choices[0]->message->content, true);

                if (empty($result)) {
                    throw new \Exception('Empty response from OpenAI');
                }

                // Update based on ID
                foreach ($result as $id => $data) {
                    $vocab = Vocab::find($id);
                    if ($vocab && isset($data['meaning'])) {
                        $vocab->update([
                            'meaning' => $data['meaning']
                        ]);
                    }
                }

                $processedIds = array_keys($vocabData);
                $this->info("Successfully verified meanings for IDs: " . implode(', ', $processedIds));
                Log::info("Successfully verified meanings for IDs: " . implode(', ', $processedIds));
            } catch (\Exception $e) {
                $this->error("Error verifying meanings: " . $e->getMessage());
                Log::error("Error verifying meanings: " . $e->getMessage());
            }
        });

        $this->info("Meaning verification completed!");
        return 0;
    }

    public function handle2()
    {
        $kapital = $this->argument('kapital');

        if (empty($kapital)) {
            $this->error("Kapital parameter is required!");
            return 1;
        }

        $this->info("Starting example translation for kapital containing '$kapital'");

        // Process vocabularies in chunks of 25
        $query = Vocab::where('kapital', 'like', "%$kapital%")
            ->whereNotNull('example')
            ->whereNull('translated_example');

        $count = $query->count();
        $c = 0;
        // dd( $count);
        if ($count === 0) {
            $this->warn("No vocabularies found for translation with kapital: $kapital");
            return 1;
        }

        $this->info("Found $count vocabularies to translate");

        $query->chunk(25, function ($vocabs) use (&$c, $count) {
            try {
                // Menyiapkan data untuk OpenAI
                $vocabData = [];
                foreach ($vocabs as $vocab) {
                    $vocabData[$vocab->id] = [
                        'german_word' => $vocab->german_word,
                        'example' => $vocab->example,
                    ];
                }
                $processedIds = array_keys($vocabData);
                $this->info("Start for IDs: " . implode(', ', $processedIds));
                Log::info("Start for IDs: " . implode(', ', $processedIds));

                $response = $this->openai->chat()->create([
                    'model' => 'gpt-4',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'You are a German-Indonesian translator expert. Translate German sentences to natural Indonesian.'
                        ],
                        [
                            'role' => 'user',
                            'content' => "Translate these German example sentences to Indonesian. Return a JSON where each key is the ID from input, containing the translation:
                                Format example:
                                {
                                    'ID': {
                                        'translated_example': 'Indonesian translation of the example'
                                    }
                                }
                                
                                Please ensure:
                                1. Translations are natural and contextual
                                2. Keep the meaning accurate
                                3. Return data for each ID
                                
                                Sentences to translate: " . json_encode($vocabData, JSON_PRETTY_PRINT)
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
                    if ($vocab && isset($data['translated_example'])) {
                        $vocab->update([
                            'translated_example' => $data['translated_example']
                        ]);
                    }
                }

                $this->info("Successfully translated examples for IDs: " . implode(', ', $processedIds));
                Log::info("Successfully translated examples for IDs: " . implode(', ', $processedIds));
                $c += count($vocabData);
                $this->info("Total: " . $c . "/" . $count);
                Log::info("Total: " . $c . "/" . $count);
            } catch (\Exception $e) {
                $this->error("Error translating examples: " . $e->getMessage());
                Log::error("Error translating examples: " . $e->getMessage());
            }
        });

        $this->info("Translation completed!");
        return 0;
    }

    public function handle1()
    {
        $kapital = $this->argument('kapital');

        if (empty($kapital)) {
            $this->error("Kapital parameter is required!");
            return 1;
        }

        $this->info("Starting vocabulary processing for kapital containing '$kapital'");

        // Process vocabularies in chunks of 25
        $query = Vocab::where('kapital', 'like', "%$kapital%")
            ->where('id_user', 1);

        $count = $query->count();

        if ($count === 0) {
            $this->warn("No vocabularies found for kapital: $kapital");
            return 1;
        }

        $this->info("Found $count vocabularies to process");

        $query->chunk(25, function ($vocabs) {
            try {
                // Menyiapkan data untuk OpenAI
                $vocabData = [];
                foreach ($vocabs as $vocab) {
                    // Kita masukkan ID sebagai key utama
                    $vocabData[$vocab->id] = [
                        'german_word' => $vocab->german_word,
                        'current_meaning' => $vocab->meaning,
                        'current_type' => $vocab->word_type,
                        'current_example' => $vocab->example,
                        'current_translated_example' => $vocab->translated_example,
                    ];
                }

                $response = $this->openai->chat()->create([
                    'model' => 'gpt-4',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'You are a German language expert and translator. Format, verify German vocabulary with proper grammatical information, and provide natural Indonesian translations.'
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
                                            'example': 'example sentence in German',
                                            'translated_example': 'Indonesian translation of the example'
                                        }
                                    }
                                    
                                    2. Special handling rules:
                                    - For verbs: ALWAYS convert to infinitive form
                                    - For nouns: Include article (der/die/das)
                                    - For separable verbs: Use pipe symbol (e.g., 'auf|stehen')
                                    - Mark reflexive verbs appropriately (e.g., 'sich waschen')
                                    - Translate examples naturally to Indonesian
                                    
                                    3. word_type must be one of: Nomen, Verb, Adjektiv, Präposition, Adverb, Konjunktion, null
                                    4. Verify all vocabulary and correct any obvious errors
                                    5. Ensure natural and accurate Indonesian translations
                                    6. IMPORTANT: Keep the ID structure and return data for each ID
                                    
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
                            'translated_example' => $data['translated_example'] ?? null,
                        ]);
                    }
                }

                $processedIds = array_keys($vocabData);
                $this->info("Successfully processed vocabulary batch with IDs: " . implode(', ', $processedIds));
                Log::info("Successfully processed vocabulary batch with IDs: " . implode(', ', $processedIds));
            } catch (\Exception $e) {
                $this->error("Error processing vocabularies: " . $e->getMessage());
                Log::error("Error processing vocabularies: " . $e->getMessage());
            }
        });

        $this->info("Processing completed!");
        return 0;
    }
}
