<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use ZipArchive;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class SurpriseController extends Controller
{
    public function index()
    {
        return view('Surprise.index');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|max:2048', // Maksimal 2MB rasm
            'message' => 'required|string|max:500',
        ]);
        
        // 📌 1. Rasmni yuklash
        $image = $request->file('image');
        $imagePath = $image->getRealPath();
        
        // 📌 2. ImgBB API tokenini qo‘shish
        $apiKey = '8070993fc71ad77ff69c647da2fb1562';  // Sizning API token
        
        // 📌 3. Rasmni ImgBB'ga yuklash
        $response = Http::attach(
            'image', file_get_contents($imagePath), $image->getClientOriginalName()
        )->post('https://api.imgbb.com/1/upload', [
            'key' => $apiKey,
        ]);
        
        if (!$response->successful()) {
            return back()->with('error', 'Rasmni ImgBB serveriga yuklab bo‘lmadi.');
        }
        
        // 📌 4. Rasmning URL manzilini olish
        $imageData = $response->json();
        $imageUrl = $imageData['data']['url']; // Rasm URLi
        
        // 📌 5. QR kod ichiga HTML qo‘shish
        $htmlContent = "
            <html>
            <body style='text-align:center;'>
                <h2>{$validated['message']}</h2>
                <a href='{$imageUrl}' style='font-size:20px; font-weight:bold; color:#FF5733;'>Rasmni yuklash uchun bosing👇</a>
            </body>
            </html>
        ";
        
        // 📌 6. HTML kodini base64 formatga o‘girish
        $htmlBase64 = base64_encode($htmlContent);
        
        // 📌 7. `data:` formatida QR kod yaratish (Local server kerak emas!)
        $qrCode = QrCode::format('svg')
            ->size(300)
            ->generate("data:text/html;base64,{$htmlBase64}");
        
        return view('Qrsurprise.index', compact('qrCode', 'imageUrl', 'validated'));
        
        
    }
}
