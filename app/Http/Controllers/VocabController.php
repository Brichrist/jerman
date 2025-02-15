<?php

namespace App\Http\Controllers;

use App\Models\Vocab;
use Illuminate\Http\Request;
use OpenAI;

class VocabController extends Controller
{
    protected $openai;




    public function __construct()
    {
        // dd(env('OPENAI_API_KEY'));
        $this->openai = OpenAI::client(env('OPENAI_API_KEY'));
    }
    public function generateVocabComma(Request $request)
    {
        // Validasi input
        $request->validate([
            'words' => 'required|array'
        ]);

        $words = $request->words;

        $promptData = [
            'model' => 'gpt-4',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a German language expert. For each German word, provide the meaning in Indonesian and basic information. Return ONLY a valid JSON array.'
                ],
                [
                    'role' => 'user',
                    'content' => "Analyze these German words with these requirements:
                        1. Check for spelling mistakes and correct them
                        2. For verbs: ALWAYS convert to infinitive form (e.g., 'gegessen' → 'essen', 'schreibt' → 'schreiben')
                        3. Return a JSON array where each object has:
                            - german_word: correct spelling in infinitive form for verbs
                            - original_word: the word as provided (only if different from german_word)
                            - spelling_correction: explanation if corrected
                            - meaning: Indonesian translation
                            - word_type: type (Verben, Nomen, Adjektiv, etc.)
                            - example: simple German sentence using the word
                        
                        Words to analyze: " . implode(', ', $words)
                ],
            ],
            'temperature' => 0.7
        ];

        try {
            $response = $this->openai->chat()->create($promptData);
            $result = json_decode($response->choices[0]->message->content, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Invalid JSON response from OpenAI');
            }

            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error generating vocabulary: ' . $e->getMessage()
            ], 500);
        }
    }
    public function multiple(Request $request)
    {
        // dd($request->all());
        $rules = [
            'kapital' => ['nullable', 'string'],
            'vocab.*' => ['required', 'string'],
            'word_type.*' => ['nullable'],
            'meaning.*' => ['required', 'string'],
            'example.*' => ['nullable', 'string'],
        ];

        $request->validate($rules);

        $vocabs = $request->input('vocab', []);
        $meanings = $request->input('meaning', []);
        $wordTypes = $request->input('word_type', []);
        $examples = $request->input('example', []);
        // dd($request->all(), $vocabs, $meanings, $wordTypes, $examples); 

        foreach ($vocabs as $index => $vocab) {
            $data = [
                'kapital' => $request->input('kapital'),
                'german_word' => $vocab,
                'word_type' => $wordTypes[$index] ?? null,
                'meaning' => $meanings[$index] ?? null,
                'example' => $examples[$index] ?? null,
                'id_user' => auth()->user()->id,
            ];

            $existingVocab = Vocab::where('german_word', $vocab)->where('id_user', auth()->user()->id)->first();
            if ($existingVocab) {
                $existingVocab->update($data);
            } else {
                Vocab::create($data);
            }
        }

        $request->session()->flash('notif', ["success" => 'Data Saved']);
        return redirect('/vocab?' . http_build_query([
            'kapital' => $request->kapital ?? null,
            'favorite' => $request->favorite ?? null,
            'owner' => $request->owner ?? null
        ]));
    }
    public function dataAi(Request $request)
    {
        $vocabs = $request->vocab;
        // dd($vocabs);

        $promptData = [
            'model' => 'gpt-4',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a German language expert. Analyze the German words and provide detailed grammatical information in JSON format.'
                ],
                [
                    'role' => 'user',
                    'content' => "Provide grammatical details for these German words in JSON array format with these fields: kapital, german_word, word_type (Nomen/Verb/Adjektiv/Präposition/Adverb/Konjunktion), artikel, meaning (in Indonesian), plural_form, present_form (for verbs), partizip_2, hilfsverb (sein/haben), case (Akkusativ/Dativ/Genitiv), preposition, is_reflexive (boolean), is_separable (boolean), is_countable (boolean), example (in German), additional_notes. Words: " . implode(', ', $vocabs)
                ]
            ],
            'temperature' => 1
        ];

        try {
            $response = $this->openai->chat()->create($promptData);
            $result = json_decode($response->choices[0]->message->content, true);
            dd($response);


            foreach ($result as $vocab) {
                Vocab::create($vocab);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Vocabulary processed successfully',
                'data' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function extract(Request $request)
    {

        // return response()->json([
        //     'success' => true,
        //     'data' => "{\"bahasaJerman\": {\n  \"geboren sein\": {\"meaning\": \"lahir\", \"word_type\": \"null\"},\n  \"geschieden\": {\"meaning\": \"bercerai\", \"word_type\": \"null\"},\n  \"heiraten\": {\"meaning\": \"menikah\", \"word_type\": \"Verb\"},\n  \"die Hochzeit\": {\"meaning\": \"pernikahan\", \"word_type\": \"Nomen\"},\n  \"romantisch\": {\"meaning\": \"romantis\", \"word_type\": \"Adjektiv\"},\n  \"der Rentner\": {\"meaning\": \"pensiunan (pria)\", \"word_type\": \"Nomen\"},\n  \"die Rentnerin\": {\"meaning\": \"pensiunan (wanita)\", \"word_type\": \"Nomen\"},\n  \n  \"die Ausbildung\": {\"meaning\": \"pendidikan\", \"word_type\": \"Nomen\"},\n  \"abschließen\": {\"meaning\": \"menyelesaikan\", \"word_type\": \"Verb\"},\n  \"beenden\": {\"meaning\": \"mengakhiri\", \"word_type\": \"Verb\"},\n  \"die Arbeit\": {\"meaning\": \"pekerjaan\", \"word_type\": \"Nomen\"},\n  \"die Überstunde\": {\"meaning\": \"lembur\", \"word_type\": \"Nomen\"},\n  \"der Augenoptiker\": {\"meaning\": \"optik\", \"word_type\": \"Nomen\"},\n  \"die Augenoptikerin\": {\"meaning\": \"optik (wanita)\", \"word_type\": \"Nomen\"},\n  \"der Bankkaufmann\": {\"meaning\": \"pegawai bank (pria)\", \"word_type\": \"Nomen\"},\n  \"die Bankkauffrau\": {\"meaning\": \"pegawai bank (wanita)\", \"word_type\": \"Nomen\"},\n  \"Biologie\": {\"meaning\": \"biologi\", \"word_type\": \"Nomen\"},\n  \"Mathematik\": {\"meaning\": \"matematika\", \"word_type\": \"Nomen\"},\n  \"die Note\": {\"meaning\": \"nilai\", \"word_type\": \"Nomen\"},\n  \n  \"mieten\": {\"meaning\": \"menyewa\", \"word_type\": \"Verb\"},\n  \"renovieren\": {\"meaning\": \"merenovasi\", \"word_type\": \"Verb\"},\n  \"das Stadtzentrum\": {\"meaning\": \"pusat kota\", \"word_type\": \"Nomen\"},\n  \"auf dem Land leben\": {\"meaning\": \"hidup di pedesaan\", \"word_type\": \"null\"},\n  \"weiter|suchen\": {\"meaning\": \"mencari lebih lanjut\", \"word_type\": \"Verb\"},\n  \"zusammen|leben\": {\"meaning\": \"hidup bersama\", \"word_type\": \"Verb\"},\n  \n  \"vorschlagen\": {\"meaning\": \"mengusulkan\", \"word_type\": \"Verb\"},\n  \"absagen\": {\"meaning\": \"membatalkan\", \"word_type\": \"Verb\"},\n  \"zusagen\": {\"meaning\": \"mengatakan ya\", \"word_type\": \"Verb\"},\n  \"einverstanden sein\": {\"meaning\": \"setuju\", \"word_type\": \"null\"},\n  \"einen Plan ändern\": {\"meaning\": \"mengubah rencana\", \"word_type\": \"null\"},\n  \"der Verein\": {\"meaning\": \"klub\", \"word_type\": \"Nomen\"},\n  \"an|melden\": {\"meaning\": \"mendaftar\", \"word_type\": \"Verb\"},\n  \"teilnehmen\": {\"meaning\": \"berpartisipasi\", \"word_type\": \"Verb\"},\n  \"gemeinsam\": {\"meaning\": \"bersama\", \"word_type\": \"Adverb\"},\n  \"organisieren\": {\"meaning\": \"mengorganisir\", \"word_type\": \"Verb\"},\n  \"der Flohmarkt\": {\"meaning\": \"pasar loak\", \"word_type\": \"Nomen\"},\n  \"liegen\": {\"meaning\": \"berbaring\", \"word_type\": \"Verb\"},\n  \"das Pferd\": {\"meaning\": \"kuda\", \"word_type\": \"Nomen\"},\n  \"reiten\": {\"meaning\": \"menunggang\", \"word_type\": \"Verb\"},\n  \"spannend\": {\"meaning\": \"menarik\", \"word_type\": \"Adjektiv\"},\n  \n  \"der Aufenthalt\": {\"meaning\": \"masa tinggal\", \"word_type\": \"Nomen\"},\n  \"der Eingang\": {\"meaning\": \"pintu masuk\", \"word_type\": \"Nomen\"},\n  \"empfangen\": {\"meaning\": \"menerima\", \"word_type\": \"Verb\"},\n  \"der Platz\": {\"meaning\": \"tempat/duduk\", \"word_type\": \"Nomen\"},\n  \"informieren\": {\"meaning\": \"menginformasi\", \"word_type\": \"Verb\"},\n  \"aus|wählen\": {\"meaning\": \"memilih\", \"word_type\": \"Verb\"},\n  \"die Reservierung\": {\"meaning\": \"reservasi\", \"word_type\": \"Nomen\"},\n  \"spätestens\": {\"meaning\": \"paling lambat\", \"word_type\": \"Adverb\"},\n  \"bitter\": {\"meaning\": \"pahit\", \"word_type\": \"Adjektiv\"},\n  \"salzig\": {\"meaning\": \"asin\", \"word_type\": \"Adjektiv\"},\n  \"sauer\": {\"meaning\": \"asam\", \"word_type\": \"Adjektiv\"},\n  \"scharf\": {\"meaning\": \"pedas\", \"word_type\": \"Adjektiv\"},\n  \"das WC\": {\"meaning\": \"toilet\", \"word_type\": \"Nomen\"},\n  \"weiter|helfen\": {\"meaning\": \"membantu lebih lanjut\", \"word_type\": \"Verb\"},\n  \"aus sein\": {\"meaning\": \"mati, padam\", \"word_type\": \"null\"},\n  \"die Zigarette\": {\"meaning\": \"rokok\", \"word_type\": \"Nomen\"}\n}}"
        // ]);
        $request->validate([
            'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:4096'
        ]);

        $file = $request->file('document');

        try {
            if ($file->getMimeType() === 'application/pdf') {
                // Gunakan parser PDF untuk mengekstrak teks
                $parser = new \Smalot\PdfParser\Parser();
                $pdf = $parser->parseFile($file->path());
                $text = $pdf->getText();

                $response = $this->openai->chat()->create([
                    'model' => 'gpt-4o',
                    'response_format' => ['type' => 'json_object'],
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => "Extract German vocabulary from the following text and create a JSON object with these requirements:
                                1. Format: {
                                    'bahasaJerman': {
                                        'word1': {
                                            'meaning': 'Indonesian translation',
                                            'word_type': 'grammatical type',
                                            'example': 'example sentence',
                                            'notes': 'additional information'
                                        },
                                        ...
                                    }
                                }
                                
                                2. Special handling rules:
                                - For verbs: ALWAYS convert to infinitive form
                                - For nouns: Include article (der/die/das)
                                - For separable verbs: Use pipe symbol (e.g., 'auf|stehen')
                                - Mark reflexive verbs appropriately (e.g., 'sich waschen')
                                
                                3. word_type must be one of: Nomen, Verb, Adjektiv, Präposition, Adverb, Konjunktion, null
                                
                                Text to analyze:\n\n" . $text
                        ]
                    ]
                ]);
            } else {
                // Kode untuk gambar tetap sama
                $base64File = base64_encode(file_get_contents($file->path()));
                $response = $this->openai->chat()->create([
                    'model' => 'gpt-4o',
                    'response_format' => ['type' => 'json_object'],
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => [
                                [
                                    'type' => 'text',
                                    'text' => "Extract highlighted German vocabulary from this image and create a JSON object with these requirements:
                                        1. Format: {
                                            'bahasaJerman': {
                                                'word1': {
                                                    'meaning': 'Indonesian translation',
                                                    'word_type': 'grammatical type',
                                                    'example': 'example sentence',
                                                    'notes': 'additional information'
                                                },
                                                ...
                                            }
                                        }
                                        
                                        2. Special handling rules:
                                        - For verbs: ALWAYS convert to infinitive form
                                        - For nouns: Include article (der/die/das)
                                        - For separable verbs: Use pipe symbol (e.g., 'auf|stehen')
                                        - Mark reflexive verbs appropriately (e.g., 'sich waschen')
                                        
                                        3. word_type must be one of: Nomen, Verb, Adjektiv, Präposition, Adverb, Konjunktion, null
                                        4. Only process orange highlighted words from the image
                                        5. Verify all vocabulary and correct any obvious errors
                                        6. Make sure all highlighted words are included"
                                ],
                                [
                                    'type' => 'image_url',
                                    'image_url' => [
                                        'url' => "data:{$file->getMimeType()};base64,{$base64File}"
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]);
            }

            return response()->json([
                'success' => true,
                'data' => $response->choices[0]->message->content
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vocabs = Vocab::when(request('kapital'), function ($query) {
            $query->where('kapital', request('kapital'));
        })->when(request()->has('word_type') && request('word_type') != 'all', function ($query) {
            $query->where('word_type', request('word_type'));
        })->when(request('german_word'), function ($query) {
            $query->where('german_word', 'like', '%' . request('german_word') . '%');
        })->when(request('meaning'), function ($query) {
            $query->where('meaning', 'like', '%' . request('meaning') . '%');
        })->when(request('favorite') == 'yes', function ($query) {
            $query->whereHas('linkFavorite');
        })
            ->when(auth()->user()->role == 'owner', function ($query) {
                if ((request('owner') ?? null) == 'default') {
                    $query->whereNull('id_user');
                } elseif ((request('owner') ?? null) == 'me') {
                    $query->where('id_user', auth()->user()->id);
                }
            })->when(auth()->user()->role == 'user', function ($query) {
                if ((request('owner') ?? null) == 'default') {
                    $query->whereNull('id_user');
                } elseif ((request('owner') ?? null) == 'me') {
                    $query->where('id_user', auth()->user()->id);
                } else {
                    $query->where(function ($q) {
                        $q->whereNull('id_user')
                            ->orWhere('id_user', auth()->id());
                    });
                }
            })
            ->orderBy('word_type')->with(['linkFavorite'])->paginate(50);

        $word_types = Vocab::select('word_type')->distinct()->get()->pluck('word_type')->toArray();
        return view('be.vocab_index', compact('vocabs', 'word_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'kapital' => ['nullable', 'string'],
            'german_word' => ['required', 'string'],
            'word_type' => ['nullable'],
            'meaning' => ['required', 'string'],
            'example' => ['nullable', 'string'],
            'additional_notes' => ['nullable', 'string'],
        ];

        $request->validate($rules);

        $data = $request->except(['id', '_token']);

        if ($request->id ?? null) {
            Vocab::where('id', $request->id)->update($data);
        } else {
            if (auth()->user()->role == 'user') {
                $data['id_user'] = auth()->user()->id;
            }
            Vocab::create($data);
        }

        $request->session()->flash('notif', ["success" => 'Data Saved']);
        return redirect('/vocab');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vocab $vocab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vocab $vocab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vocab $vocab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        Vocab::where('id', $id)->delete();
        $request->session()->flash('notif', ["success" => 'Data Deleted']);

        return redirect('/vocab');
    }
}
