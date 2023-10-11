<?php

namespace App\Http\Controllers\API;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\DiagnosisHistory;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Controllers\Controller;

class OpenAiController extends Controller {

    function diagnosa() {
        return view('chat');
    }

    function getDiagnosa(Request $request) {
        $user_id = $request->input('user_id');
        $anonymous_id = $request->input('anonymous_id');

        $question = $request->query('question');
        $responses = [];

        if (!$user_id && !$anonymous_id) {
            return response()->json(['message' => 'Silahkan Isi Data Diri Kembali!']);
        }
    
        return response()->stream(function () use ($question, &$responses) {
            $stream = OpenAI::completions()->createStreamed([
                'model' => 'gpt-3.5-turbo-instruct',
                'prompt' => $question . 'posisikan sebagai dokter di wilayah negara Indonesia, jadi Ketika saya(user) memberikan keluhan gejala-gejala yang saya alami, maka berikan lah urutan kemungkinan penyakit yang saya derita berdasarkan hasil analisis dari gejala yang dikeluhkan serta berikan. pastikan response yang dikirim terstruktur dengan baik dan mudah dipahami oleh user',
                'max_tokens' => 1024,
            ]);
    
            foreach ($stream as $response) {
                $text = $response->choices[0]->text;
                if (connection_aborted()) {
                    break;
                }
    
                echo "event: update\n";
                echo 'data: ' . $text;
            echo "\n\n";
                ob_flush();
                flush();
    
                $responses[] = $text;
            }
    
            echo "event: update\n";
            echo 'data: <END_STREAMING_SSE>';
            echo "\n\n";
            ob_flush();
            flush();
        }, 200, [
            'Cache-Control' => 'no-cache',
            'X-Accel-Buffering' => 'no',
            'Content-Type' => 'text/event-stream',
        ]);
    }

    function storeDiagnosa(Request $request) {
        $user_id = $request->input('user_id');
        $anonymous_id = $request->input('anonymous_id');

        if ($user_id && $anonymous_id) {
            $anonymous_id = null;
        }

        $question = $request->query('question');
        $client = new Client();
        $summarizeResponse = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer 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',
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'buatlah rangkuman pernyataan yang diberikan menjadi terstruktur dan singkat. rangkuman dibagi menjadi "Sakit Apa:", "Gejala yang dialami:", "Seberapa Sering:", "Solusi yang diberikan:". jika ada kategori yang tidak ada, maka tidak perlu diisi'
                    ],
                    [
                        'role' => 'user',
                        'content' => $question
                    ]
                ],
                'max_tokens' => 526,
                'top_p' => 1,
                'frequency_penalty' => 0,
                'presence_penalty' => 0
            ],
        ]);

        $summarizeBody = $summarizeResponse->getBody();
        $result = json_decode($summarizeBody, true);
        $summerizeResult = $result['choices'][0]['message']['content'];

        $summarize = DiagnosisHistory::create([
            'user_id' => $user_id,
            'anonymous_id' => $anonymous_id,
            'diagnosis_history' => json_encode($summerizeResult),
        ]);
        $summarize->save();
    }
}

