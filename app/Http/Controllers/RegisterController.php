<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
class RegisterController extends Controller
{
    public function index()
    {
        return view('Register.index');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Foydalanuvchini yaratamiz
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Foydalanuvchi ma'lumotlarini QR kodga joylash (URL EMAS!)
        $qrData = "👤 Name: {$user->name}\n📧 Email: {$user->email}\n📅 Registered: {$user->created_at}";

        // QR kodni yaratish (SVG formatda, Imagick kerak emas)
        $qrCode = QrCode::format('svg')
            ->size(300)
            ->color(50, 205, 50) // **Ochroq yashil** (LimeGreen)
            ->backgroundColor(200, 255, 200) // **Yashilga mos orqa fon (och yashil)**
            ->encoding('UTF-8')
            ->generate($qrData);

        return view('Qrcode.index', compact('user', 'qrCode'));
    }
   
}
