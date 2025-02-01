<?php

namespace App\Http\Controllers;

use App\Models\Redemittel;
use Illuminate\Http\Request;
use OpenAI;

class RedemittelController extends Controller
{
    protected $openai;

    public function __construct()
    {
        $this->openai = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function multiple(Request $request)
    {
        $rules = [
            'kapital' => ['nullable', 'string'],
            'de.*' => ['required', 'string'],
            'idn.*' => ['nullable', 'string'],
            'tag.*' => ['nullable', 'string'],
        ];

        $request->validate($rules);

        $des = $request->input('de', []);
        $idns = $request->input('idn', []);
        $tags = $request->input('tag', []);

        foreach ($des as $index => $de) {
            $data = [
                'kapital' => $request->input('kapital'),
                'de' => $de,
                'idn' => $idns[$index] ?? null,
                'tag' => $tags[$index] ?? null,
            ];

            $existingRedemittel = Redemittel::where('de', $de)->first();
            if ($existingRedemittel) {
                $existingRedemittel->update($data);
            } else {
                Redemittel::create($data);
            }
        }

        $request->session()->flash('notif', ["success" => 'Data Saved']);
        return redirect('/redemittel');
    }

    public function dataAi(Request $request)
    {
        $des = $request->de;

        $promptData = [
            'model' => 'gpt-4',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a German language expert. Analyze the German words and provide detailed grammatical information in JSON format.'
                ],
                [
                    'role' => 'user',
                    'content' => "Provide grammatical details for these German words in JSON array format with these fields: kapital, de, idn, tag. Words: " . implode(', ', $des)
                ]
            ],
            'temperature' => 1
        ];

        try {
            $response = $this->openai->chat()->create($promptData);
            $result = json_decode($response->choices[0]->message->content, true);

            foreach ($result as $redemittel) {
                Redemittel::create($redemittel);
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
        $request->validate([
            'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:4096'
        ]);

        $file = $request->file('document');

        try {
            if ($file->getMimeType() === 'application/pdf') {
                $parser = new \Smalot\PdfParser\Parser();
                $pdf = $parser->parseFile($file->path());
                $text = $pdf->getText();

                $response = $this->openai->chat()->create([
                    'model' => 'gpt-4',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => "buatkan obj yang berisi list bahasa Jerman dari teks berikut dalam format JSON beserta artinya dalam bahasa indonesia. Format: {'bahasaJerman': {'kata1':{'meaning':'arti1','tag':'tag1'}, 'kata2':{'meaning':'arti2','tag':'tag2'}, ...}}: \n\n" . $text
                        ]
                    ]
                ]);
            } else {
                $base64File = base64_encode(file_get_contents($file->path()));
                $response = $this->openai->chat()->create([
                    'model' => 'gpt-4',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => [
                                [
                                    'type' => 'text',
                                    'text' => "buatkan obj yang berisi list bahasa Jerman dari file ini dalam format JSON beserta artinya dalam bahasa indonesia. Wajib pastikan ulang semua vocab sudah masuk dalam list. Dengan Format: {'bahasaJerman': {'kata1':{'meaning':'arti1','tag':'tag1'}, 'kata2':{'meaning':'arti2','tag':'tag2'}, ...}}:"
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

    public function index()
    {
        $redemittels = Redemittel::when(request('kapital'), function ($query) {
            $query->where('kapital', "like", "%" . request('kapital') . "%");
        })->orderBy('created_at')->paginate(50);
        return view('be.redemittel_index', compact('redemittels'));
    }

    public function store(Request $request)
    {
        $rules = [
            'kapital' => ['nullable', 'string'],
            'de' => ['required', 'string'],
            'idn' => ['nullable', 'string'],
            'tag' => ['nullable', 'string'],
        ];

        $request->validate($rules);

        $data = $request->except(['id', '_token']);

        if ($request->id ?? null) {
            Redemittel::where('id', $request->id)->update($data);
        } else {
            Redemittel::create($data);
        }

        $request->session()->flash('notif', ["success" => 'Data Saved']);
        return redirect('/redemittel');
    }

    public function destroy(Request $request, $id)
    {
        Redemittel::where('id', $id)->delete();
        $request->session()->flash('notif', ["success" => 'Data Deleted']);

        return redirect('/redemittel');
    }
}
