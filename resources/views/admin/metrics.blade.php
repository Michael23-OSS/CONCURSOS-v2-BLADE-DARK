@extends('layouts.admin')

@section('title', 'Métricas y Reportes')

@section('content')
<h2 class="fw-bold mb-4" style="color: #e60000;">Métricas y Reportes</h2>
<p class="text-light mb-5">Estadísticas actuales del sistema de concursos</p>

<!-- Volver -->
<a href="/admin/dashboard" class="btn btn-red mb-4">
    Volver al panel
</a>

<!-- Gráfico de barras -->
<div class="card mb-5 shadow-sm border-0" style="background-color: #1f1f1f;">
    <div class="card-body">
        <h5 class="card-title" style="color: #e60000;">Participantes por Concurso</h5>
        <canvas id="participantsChart"></canvas>
    </div>
</div>

<!-- Tabla ranking -->
<div class="card shadow-sm border-0" style="background-color: #1f1f1f;">
    <div class="card-body">
        <h5 class="card-title" style="color: #e60000;">Ranking de Concursos</h5>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="color: #fff;">
                <thead style="background-color: #2a2a2a; color: #e60000;">
                    <tr>
                        <th>#</th>
                        <th>Concurso</th>
                        <th>Participantes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ranking as $index => $contest)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $contest->title }}</td>
                            <td>{{ $contest->participants_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('participantsChart').getContext('2d');
    const participantsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Participantes',
                data: @json($data),
                backgroundColor: 'rgba(230, 0, 0, 0.7)', // barras rojas
                borderColor: 'rgba(230, 0, 0, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Participantes por Concurso',
                    color: '#e60000',
                    font: { size: 16 }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0,
                    ticks: { color: '#fff' } // color de los números del eje Y
                },
                x: {
                    ticks: { color: '#fff' } // color de los nombres del eje X
                }
            }
        }
    });
</script>
@endsection
