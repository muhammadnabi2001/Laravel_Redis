@extends('main')

@section('title', 'Your QR Code')

@section('content')
<div class="row justify-content-center" style="min-height: 100vh; display: flex; align-items: center;">
    <div class="col-lg-6">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header text-center" style="background-color: #50C878; color: white;">
                <h3 class="font-weight-light my-4">Your QR Code</h3>
            </div>
            <div class="card-body text-center">
                <p style="color: #2F4F2F;">Scan this QR code to view your details.</p>

                <!-- QR kodni o‘rab turgan kvadratga rang beramiz -->
                <div style="display: inline-block; padding: 20px; background-color: #A7E9AF; border-radius: 10px;">
                    {!! $qrCode !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
