@extends('main')
@section('title','surprise')
@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Generate QR Code for Surprise</h3>
    </div>
    <div class="box-body m-2">
        <form action="{{ route('surprise.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Select Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Enter Surprise Message</label>
                <input type="text" name="message" class="form-control" placeholder="Enter your message" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate QR Code</button>
        </form>
    </div>
</div>
@endsection