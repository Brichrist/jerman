<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use OpenAI;

class ReportController extends Controller
{
    protected $openai;

    public function __construct()
    {
        $this->openai = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function multiple(Request $request)
    {
        $rules = [
            'id_user' => ['required', 'integer'],
            'type' => ['required', 'in:report,saran'],
            'subject' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ];

        $request->validate($rules);

        $data = [
            'id_user' => $request->input('id_user'),
            'type' => $request->input('type'),
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
        ];

        $existingReport = Report::where('subject', $data['subject'])->first();
        if ($existingReport) {
            $existingReport->update($data);
        } else {
            Report::create($data);
        }

        $request->session()->flash('notif', ["success" => 'Data Saved']);
        return redirect('/report');
    }

    public function dataAi(Request $request)
    {
        $subject = $request->subject;

        $promptData = [
            'model' => 'gpt-4',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are an expert. Analyze the subject and provide detailed information in JSON format.'
                ],
                [
                    'role' => 'user',
                    'content' => "Provide detailed information for this subject in JSON format: " . $subject
                ]
            ],
            'temperature' => 1
        ];

        try {
            $response = $this->openai->chat()->create($promptData);
            $result = json_decode($response->choices[0]->message->content, true);

            Report::create($result);

            return response()->json([
                'status' => 'success',
                'message' => 'Data processed successfully',
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
                            'content' => "Extract information from the following text in JSON format: \n\n" . $text
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
                                    'text' => "Extract information from this file in JSON format."
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
        $reports = Report::when(request('subject'), function ($query) {
            $query->where('subject', "like", "%" . request('subject') . "%");
        })
        ->when(auth()->user()->role !== 'owner', function ($query) {
            $query->where('id_user', auth()->id());
        })
        ->orderBy('created_at')
        ->with(['linkUser'])
        ->paginate(50);
        return view('be.report_index', compact('reports'));
    }

    public function store(Request $request)
    {
        $rules = [
            'id_user' => ['required', 'integer'],
            'type' => ['required', 'in:report,saran'],
            'subject' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ];

        $request->validate($rules);

        $data = $request->except(['id', '_token']);

        if ($request->id ?? null) {
            Report::where('id', $request->id)->update($data);
        } else {
            Report::create($data);
        }

        $request->session()->flash('notif', ["success" => 'Data Saved']);
        return redirect('/report');
    }

    public function destroy(Request $request, $id)
    {
        Report::where('id', $id)->delete();
        $request->session()->flash('notif', ["success" => 'Data Deleted']);

        return redirect('/report');
    }
}
