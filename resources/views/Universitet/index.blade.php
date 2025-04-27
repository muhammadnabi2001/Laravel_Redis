@extends('main')

@section('title', 'Your QR Code')

@section('content')
<div class="row justify-content-center" style="min-height: 100vh; display: flex; align-items: center;">
    <div class="col-lg-6">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header text-center" style="background-color: #50C878; color: white;">
                <h3 class="font-weight-light my-4">This is Statistics</h3>
            </div>
            <div class="card-body text-center">
                <p style="color: #2F4F2F;">This is test for using barchart for universities statistics</p>

                <!-- QR kodni o‘rab turgan kvadratga rang beramiz -->
                <div>
                    <canvas id="myChart"></canvas>
                  </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');

    const myChart = new Chart(ctx, {
        type: 'bar', // bar, pie, doughnut, line - qaysi ko'rinish xohlasang
        data: {
            labels: {!! json_encode($universities) !!}, // 5-6 ta universitet nomi
            datasets: [{
                label: 'Fakultetlar soni',
                data: {!! json_encode($facultyCounts) !!}, // 5-6 ta son
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
