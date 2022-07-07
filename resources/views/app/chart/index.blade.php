@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="col-4">
                <canvas id="chartDepartamentos" width="auto" height="auto"></canvas>        
            </div>
        </div>
    </div>
</div>

<script>
    let cData = JSON.parse(`<?php echo $data; ?>`);

    console.log(cData);

    const ctx = document.getElementById('chartDepartamentos').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: cData.nome_departamento,
            datasets: [{
                label: 'Gasto por Departamentos',
                data: cData.valor_despesa,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
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
            
        }
    });
</script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>