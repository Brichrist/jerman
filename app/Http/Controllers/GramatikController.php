<?php

namespace App\Http\Controllers;

use App\Models\Gramatik;
use Illuminate\Http\Request;
use OpenAI;

class GramatikController extends Controller
{
    protected $openai;

    public function __construct()
    {
        $this->openai = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function practice(Request $request)
    {
        // dd($request->all());
        $type = $request->type; // 'short' or 'multiple'
        $materi = $request->materi;
        $kapital = $request->kapital;
        $level = $request->level ?? 10;

        // $format = $type === 'short'
        //     ? 'Dengan format: {id: number, question: "Ich ... nach ... Schule.", answers: ["gehe", "der"], blanks: 2, fullSentence: "Ich gehe nach der Schule."}'
        //     : 'Dengan format: {id: number, question: "Ich ... aus Deutschland.", options: ["komme", "kommst", "kommen", "kommt"], correctAnswer: 0, fullSentence: "Ich komme aus Deutschland."}';
        // $other = $type === 'short'
        //     ? ', Anda juga dapat menggunakan format ini : {id: number, question: "Mein Bruder ... Deutsch.", answers: ["lernt"], blanks: 1, fullSentence: "Mein Bruder lernt Deutsch." },'
        //     : ', Anda juga dapat menggunakan format ini : {id: number, question: "Ich ... nach ... Schule.", options: ["gehen, die", "geht,dem", "gehe, die", "gehe, der"], correctAnswer: 3, fullSentence: "Ich gehe nach der Schule."}';

        $format = $type === 'short'
            ? 'Dengan format: {id: number, question: "pertanyaan1(murid akan mengisi ... jangan lupa jika jawaban bisa random anda wajib memberikan hint arti kata dalam bahasa indonesia contoh "...(makanan)")", answers: ["jawaban_pertama"], blanks: "(contoh disini adalah 1, karena murid harus isi 1 titik-titik saja,anda bisa memberika hingga 3 titik-titik )", fullSentence: "kalimat setelah titik-titik diisi"}'
            : 'Dengan format: {id: number, question: "pertanyaan1(murid akan mengisi ... jangan lupa jika jawaban bisa random anda wajib memberikan hint arti kata dalam bahasa indonesia contoh "...(makanan)")", options: ["pilihan ke-0", "pilihan ke-1", "pilihan ke-2", "pilihan ke-3"], correctAnswer: "(contoh 0, maka pilihan ke-0 adalah jawaban yang benar)", fullSentence: ""kalimat setelah titik-titik diisi"}';
        $other = null;
        $response = $this->openai->chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => "Anda adalah guru bahasa Jerman yang mengajar murid dari Indonesia. Anda ahli dalam membuat latihan tata bahasa (gramatik) untuk anak yang sedang belajar {$kapital}. Selalu tampilkan array JSON yang valid dengan tepat 3 pertanyaan."
                ],
                [
                    'role' => 'user',
                    'content' => "Hasilkan 3 pertanyaan gramatik Jerman tentang materi ini '{$materi}'. Dengan tingkat kesulitan {$level}/10 dari perspektif orang Indonesia. {$format} {$other}"
                ]
            ],
            'temperature' => 0.5,
        ]);

        // $questions = json_decode($response->choices[0]->message->content, true);
        // dd($questions, $response->choices[0]->message->content);

        return response()->json([
            'success' => true,
            'data' => $response->choices[0]->message->content
        ]);
    }


    public function preview(Request $request)
    {
        $gramatik = Gramatik::where('id', $request->id)->first();
        return view('be.gramatik_preview', compact('gramatik'));
    }

    public function multiple(Request $request)
    {
        $rules = [
            'kapital' => ['nullable', 'string'],
            'title' => ['nullable', 'string'],
            'desc' => ['nullable', 'string'],
            'html' => ['nullable', 'string'],
        ];

        $request->validate($rules);

        $data = $request->only(['kapital', 'title', 'desc', 'html']);

        Gramatik::create($data);

        $request->session()->flash('notif', ["success" => 'Data Saved']);
        return redirect('/gramatik');
    }

    public function dataAi(Request $request)
    {
        // Your existing dataAi method code
    }

    public function extract(Request $request)
    {
        // Your existing extract method code
    }

    public function index()
    {
        // $gramatiks = Gramatik::orderBy('kapital')->orderBy('created_at')->get();
        // $gramatiks = Gramatik::orderByDesc('created_at')->get();
        $gramatiks = Gramatik::when(request('kapital'), function ($query) {
            $query->where('kapital', "like", "%" . request('kapital') . "%");
        })->orderBy('order')->paginate(25);

        return view('be.gramatik_index', compact('gramatiks'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'kapital' => ['nullable', 'string'],
            'title' => ['nullable', 'string'],
            'desc' => ['nullable', 'string'],
            'html' => ['nullable', 'string'],
        ];

        $request->validate($rules);

        $data = $request->only(['kapital', 'title', 'desc', 'html']);

        if ($request->id ?? null) {
            Gramatik::where('id', $request->id)->update($data);
        } else {
            Gramatik::create($data);
        }

        $request->session()->flash('notif', ["success" => 'Data Saved']);
        return redirect('/gramatik');
    }

    public function show(Gramatik $gramatik)
    {
        //
    }

    public function edit(Gramatik $gramatik)
    {
        //
    }

    public function update(Request $request, Gramatik $gramatik)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        Gramatik::where('id', $id)->delete();
        $request->session()->flash('notif', ["success" => 'Data Deleted']);

        return redirect('/gramatik');
    }
}
