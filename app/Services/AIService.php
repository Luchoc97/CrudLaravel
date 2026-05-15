use Illuminate\Support\Facades\Http;

class AIService
{
    public function analyzeBug($text)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.env('OPENAI_API_KEY')
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4.1-mini',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $text
                ]
            ]
        ]);

        return $response->json();
    }
}
