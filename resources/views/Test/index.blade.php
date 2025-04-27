@extends('main')

@section('title', 'University Statistics Form')

@section('content')
<div class="row justify-content-center" style="min-height: 100vh; display: flex; align-items: center;">
    <div class="col-lg-6">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header text-center" style="background-color: #50C878; color: white;">
                <h3 class="font-weight-light my-4">Enter University Statistics</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="university_name" class="form-label">University Name</label>
                        <input type="text" class="form-control" id="university_name" name="university_name" placeholder="Enter university name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="students_count" class="form-label">Number of Students</label>
                        <input type="number" class="form-control" id="students_count" name="students_count" placeholder="Enter number of students" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="graduates_count" class="form-label">Number of Graduates</label>
                        <input type="number" class="form-control" id="graduates_count" name="graduates_count" placeholder="Enter number of graduates" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" class="form-control" id="year" name="year" placeholder="Enter year" required>
                    </div>
                    
                    <div class="h-captcha mt-3" data-sitekey="2bcaa4a6-ed92-4338-a336-7358a83cb8f4"></div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Save Statistics</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://js.hcaptcha.com/1/api.js" async defer></script>
@endsection
