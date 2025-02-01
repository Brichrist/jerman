<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class AiController extends Controller
{
    protected $openai;

    public function __construct()
    {
        $this->openai = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function index()
    {
        return view('be.ai_index');
    }
    public function askAi(Request $request)
    {
        // return response()->json([
        //     'success' => true,
        //     'data' => "{  \n    \"id-user\": 1,  \n    \"question\": \"Bisa tolong jelaskan untuk preposisi bei dan in, apa bedanya, lalu von, dan aus, nach dengan zu, kapan digunakannya?\",  \n    \"answer\": \"Berikut penjelasan mengenai preposisi-preposisi tersebut: \\n\\n1. 'bei' dan 'in': \\n- 'bei' digunakan untuk menunjukkan lokasi seseorang atau sesuatu di dekat lokasi lain. Misalnya: 'Ich bin bei meinem Freund.' (Saya di rumah teman saya). \\n- 'in' digunakan untuk menunjukkan keberadaan di dalam suatu tempat. Misalnya: 'Ich bin in der Schule.' (Saya berada di dalam sekolah). \\n\\n2. 'von' dan 'aus': \\n- 'von' digunakan untuk menunjukkan asal atau kepemilikan. Misalnya: 'Das Geschenk ist von meiner Mutter.' (Hadiah itu dari ibuku). \\n- 'aus' digunakan untuk menunjukkan dari dalam suatu tempat atau bahan dari mana sesuatu dibuat. Misalnya 'Ich komme aus Indonesien.' (Saya berasal dari Indonesia). \\n\\n3. 'nach' dan 'zu': \\n- 'nach' digunakan untuk menunjukkan arah ke suatu tempat atau negara. Misalnya: 'Ich fahre nach Deutschland.' (Saya pergi ke Jerman). \\n- 'zu' digunakan untuk menunjukkan arah ke orang atau tempat yang lebih spesifik atau konkret. Misalnya: 'Ich gehe zu meinem Freund.' (Saya pergi ke rumah teman saya).\",  \n    \"hint\": \"Ingat bahwa masing-masing preposisi digunakan untuk konteks lokasi, asal, atau arah yang berbeda.\"  \n}",
        //     'dollar' => 600,
        //     'conversation' => "[{\"role\":\"system\",\"content\":\"Anda adalah guru bahasa Jerman 'Maria' berumur 28 tahun yang mengajar murid dari Indonesia. Anda suka mendapat pertanyaan dari anak-anak, dan akan menjelaskan secara simpel dan mudah dipahami oleh orang dengan IQ minimal 90. Anda akan memberikan jawaban yang benar dan memberikan hint jika diperlukan bahasa pengantar anda adalah bahasa Indonesia, dengan format JSON yang valid.\\n                    format: {id-user: number, question: 'pertanyaan', answer: 'jawaban', hint: 'hint jika diperlukan jika tidak ada bisa dikosongkan'}\"},{\"role\":\"user\",\"content\":\"halo maria saya ingin tahu preposisi tempat\"},{\"role\":\"system\",\"content\":\"Preposisi tempat dalam bahasa Jerman meliputi kata-kata seperti 'in' (di dalam), 'auf' (di atas), 'unter' (di bawah), 'vor' (di depan), 'hinter' (di belakang), 'neben' (di samping), dan 'zwischen' (di antara). Kata-kata ini digunakan untuk menjelaskan posisi atau lokasi suatu benda atau orang.\"},{\"role\":\"user\",\"content\":\"iya benar bisa tolongjelaskan untuk preposisi bei dan in apa bedanya lalu von, dan aus, nach dengan zu. kapan digunakannya\"},{\"role\":\"system\",\"content\":\"Berikut penjelasan mengenai preposisi-preposisi tersebut: \\n\\n1. 'bei' dan 'in': \\n- 'bei' digunakan untuk menunjukkan lokasi seseorang atau sesuatu di dekat lokasi lain. Misalnya: 'Ich bin bei meinem Freund.' (Saya di rumah teman saya). \\n- 'in' digunakan untuk menunjukkan keberadaan di dalam suatu tempat. Misalnya: 'Ich bin in der Schule.' (Saya berada di dalam sekolah). \\n\\n2. 'von' dan 'aus': \\n- 'von' digunakan untuk menunjukkan asal atau kepemilikan. Misalnya: 'Das Geschenk ist von meiner Mutter.' (Hadiah itu dari ibuku). \\n- 'aus' digunakan untuk menunjukkan dari dalam suatu tempat atau bahan dari mana sesuatu dibuat. Misalnya 'Ich komme aus Indonesien.' (Saya berasal dari Indonesia). \\n\\n3. 'nach' dan 'zu': \\n- 'nach' digunakan untuk menunjukkan arah ke suatu tempat atau negara. Misalnya: 'Ich fahre nach Deutschland.' (Saya pergi ke Jerman). \\n- 'zu' digunakan untuk menunjukkan arah ke orang atau tempat yang lebih spesifik atau konkret. Misalnya: 'Ich gehe zu meinem Freund.' (Saya pergi ke rumah teman saya).\"}]"
        // ]);
        $question = $request->question;
        $conversation = $request->conversation;
        // dd($conversation);
        if ($conversation) {
            $conversation = json_decode($conversation, true);
        } else {
            $conversation = [
                [
                    'role' => 'system',
                    'content' => "Anda adalah guru bahasa Jerman 'Maria' berumur 28 tahun yang mengajar murid dari Indonesia. Anda suka mendapat pertanyaan dari anak-anak, 
                    dan akan menjelaskan secara simpel dan mudah dipahami oleh orang dengan IQ minimal 90. 
                    Anda akan memberikan jawaban yang benar dan memberikan hint jika diperlukan. bahasa pengantar anda adalah bahasa Indonesia, 
                    Anda juga akan memberikan salam jika ada yang berterima kasih kepada anda / menutup percakapan dengan Anda.
                    Anda juga hanya akan membahas seputar bahasa jerman, dan anda akan menjadi marah dan akan tegas menolak apa pun yang berhubungan dangan 'NSFW'.
                    anda akan menjawab dengan format JSON yang valid.
                    format: {id-user: number, question: 'pertanyaan', answer: 'jawaban', hint: 'hint jika diperlukan jika tidak ada bisa dikosongkan'}"
                ],
            ];
        }
        $conversation[] = [
            'role' => 'user',
            'content' => "$question"
        ];

        $response = $this->openai->chat()->create([
            'model' => 'gpt-4o',
            'response_format' => ['type' => 'json_object'],
            'messages' =>  $conversation,
            'temperature' => 1,
            'max_tokens' => 3333
        ]);
        $answer = json_decode($response->choices[0]->message->content);
        $conversation[] = [
            'role' => 'system',
            'content' => $answer->answer
        ];
        \Log::info('AI Response:', ['response' => $response]);

        return response()->json([
            'success' => true,
            'data' => $response->choices[0]->message->content,
            'dollar' => $this->tokensToUSD($response->usage->promptTokens, $response->usage->completionTokens),
            'token' => $response->usage->totalTokens,
            'conversation' => json_encode($conversation)
        ]);
    }
    private function tokensToUSD($inputTokens, $outputTokens)
    {
        $costPerInput1000 = 0.005; // Harga input per 1000 token
        $costPerOutput1000 = 0.015; // Harga output per 1000 token

        // Hitung biaya berdasarkan jumlah token
        $costInput = ($inputTokens / 1000) * $costPerInput1000;
        $costOutput = ($outputTokens / 1000) * $costPerOutput1000;

        $totalCost = $costInput + $costOutput;
        return round($totalCost, 4); // Pembulatan 4 desimal
    }
}
