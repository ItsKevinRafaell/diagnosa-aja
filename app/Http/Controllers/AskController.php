<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AskController extends Controller
{
    public function __invoke(Request $request) {
        $question = $request->query('question');
        $responses = [];
    
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
    
                // Simpan respons ke dalam array
                $responses[] = $text;
            }
    
            // Simpan respons ke dalam database
            $this->storeResponseInDatabase($responses);
    
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
    
    private function storeResponseInDatabase(array $responses) {
        foreach ($responses as $response) {
            // Simpan $response ke dalam database
            // Contoh: DB::table('responses')->insert(['text' => $response]);
        }
    }
    
}
