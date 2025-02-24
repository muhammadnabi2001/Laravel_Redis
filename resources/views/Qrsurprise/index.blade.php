@extends('main')

@section('title', 'Surprise QR')

@section('content')
<div class="text-center">
    <h3>Scan this QR Code to view the surprise:</h3>
    <div>{!! $qrCode !!}</div>

    <!-- QR kodni skanerlaganida faqat matn va linkni chiqaradi -->
    <div style="margin-top: 20px; padding: 20px;">
        <h4 style="font-size: 20px; color: #333;">Message:</h4>
        <p style="font-size: 18px; font-weight: bold; color: #007BFF;">{{ $validated['message'] }}</p>

        <p style="font-size: 18px; font-weight: bold; color: #007BFF;">Link to the image: <a href="{{ $imageUrl }}" style="color: #007BFF;" target="_blank">Click here to view the image</a></p>
    </div>
</div>
@endsection
