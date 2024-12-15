@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h1>Detail KANO</h1>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Analisis</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if(session('success'))
                                <div>{{ session('success') }}</div>
                            @endif
                            <div>
                                <canvas id="quadrantChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Data dari Controller
        const chartData = @json($data);

        function getRandomColor() {
            const r = Math.floor(Math.random() * 255);
            const g = Math.floor(Math.random() * 255);
            const b = Math.floor(Math.random() * 255);
            return `rgba(${r}, ${g}, ${b}, 0.8)`; // Transparansi 0.8
        }

        // Tambahkan warna random ke setiap titik dalam data
        const dataWithColors = chartData.map(point => ({
            ...point,
            backgroundColor: getRandomColor()
        }));

        const ctx = document.getElementById('quadrantChart').getContext('2d');
        new Chart(ctx, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: '',
                    data: dataWithColors,
                    pointBackgroundColor: dataWithColors.map(point => point.backgroundColor),
                    radius: 10,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        min: -6,
                        max: 6,
                        title: {
                            display: true,
                            text: 'Puas (X-Axis)'
                        },
                        grid: {
                            drawBorder: true,
                            color: function(context) {
                                return context.tick.value === 0 ? '#000' : '#ddd';
                            }
                        }
                    },
                    y: {
                        min: -6,
                        max: 6,
                        title: {
                            display: true,
                            text: 'Penting (Y-Axis)'
                        },
                        grid: {
                            drawBorder: true,
                            color: function(context) {
                                return context.tick.value === 0 ? '#000' : '#ddd';
                            }
                        }
                    }
                },
                plugins: {
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.8)', // Warna background tooltip
                titleColor: '#ffffff', // Warna judul
                bodyColor: '#ffffff', // Warna isi teks
                titleFont: { size: 16, weight: 'bold' }, // Styling font title
                bodyFont: { size: 14 }, // Styling font body
                padding: 12, // Padding dalam tooltip
                cornerRadius: 8, // Sudut melengkung tooltip
                boxShadow: '0px 4px 6px rgba(0, 0, 0, 0.3)', // Bayangan (custom CSS)
                callbacks: {
                    label: function(context) {
                        const dataPoint = context.raw;
                        return [
                            `Attribute: ${dataPoint.label}`,
                            `Penting: ${dataPoint.y}`,
                            `Puas: ${dataPoint.x}`
                        ];
                    }
                }
            }
        },
        hover: {
            mode: 'nearest',
            intersect: true
        }
    }
});
    </script>
@endsection
