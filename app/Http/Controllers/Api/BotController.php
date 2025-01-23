<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BotController extends Controller
{
    public function store(string $text, int $chat_id)
    {
        $token = "https://api.telegram.org/bot8167179489:AAFI7HhD4K1af9K8Tb5rSfTIIYyyidYJ9u8";

        if ($text == '/start') {
            $response = Http::post($token . '/sendMessage', [
                'parse_mode' => 'HTML',
                'chat_id' => $chat_id,
                'text' => "Assalom, siz Shazam botidan foydalanyapsiz! Iltimos, musiqa nomini kiriting."
            ]);
        // } else {
        //     $curl = curl_init();
        //     $encoded_text = urlencode($text);

        //     curl_setopt_array($curl, [
        //         CURLOPT_URL => "https://shazam-api6.p.rapidapi.com/shazam/search_track/?query=$encoded_text&limit=10",
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_ENCODING => "",
        //         CURLOPT_MAXREDIRS => 10,
        //         CURLOPT_TIMEOUT => 30,
        //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //         CURLOPT_CUSTOMREQUEST => "GET",
        //         CURLOPT_HTTPHEADER => [
        //             "x-rapidapi-host: shazam-api6.p.rapidapi.com",
        //             "x-rapidapi-key: a3b441db73mshe140b520d5f6245p152662jsnd4c1402259b8"
        //         ],
        //     ]);

        //     $response = curl_exec($curl);
        //     $err = curl_error($curl);

        //     curl_close($curl);

        //     if ($err) {
        //         Log::error('cURL Error #:  ' . $err);
        //     } else {
        //         $response_data = json_decode($response, true);
        //         if (!$response_data) {
        //             Log::error("JSON decoding failed: " . json_last_error_msg());
        //             return response()->json(['error' => 'Serverda xatolik yuz berdi.'], 500);
        //         }

        //         // Log::info($response_data);
        //         if (isset($response_data['result']['tracks']['hits'][0]['stores']['apple']['previewurl'])) {
        //             $song = $response_data['result']['tracks']['hits'][0]['stores']['apple']['previewurl'];
        //         } else {
        //             Log::error('Shazam API response structure changed or no result found.', $response_data);
        //             $song = null;
        //         }


        //         $message = "Musiqa topildi: " . $song['title'] . " by " . $song['subtitle'] . "\n";
        //         // $message .= "Video linki: " . $song['url'];

        //         $response = Http::post($token . '/sendAudio', [
        //             'audio' => $song,
        //             'chat_id' => $chat_id,
        //             'caption' => $message,
        //             'parse_mode' => 'HTML',
        //         ]);
        //     }
        }
    }
    public function index(Request $request)
    {
        try {
            $data = $request->all();
            $chat_id = $data['message']['chat']['id'];
            $text = $data['message']['text'];
            $this->store($text, $chat_id);
            Log::info('Telegram: ', $data);
            return response()->json(['status' => 'success'], 200);
        } catch (Exception $e) {
            Log::error('Telegram webhook error: ' . $e->getMessage());
        }
    }
}
