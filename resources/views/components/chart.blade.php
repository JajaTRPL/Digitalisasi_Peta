<!-- resources/views/components/chart.blade.php -->
<div class="bg-white shadow-lg rounded-lg p-4 flex flex-col items-center">
    <h2 class="text-lg font-semibold mb-4">{{ $title }}</h2>
    <canvas id="{{ $id }}"></canvas>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('{{ $id }}').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: '{{ $title }}',
                    data: @json($data['data']),
                    backgroundColor: @json($colors),
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                let total = @json($data['data']).reduce((sum, value) => sum + value, 0);
                                let percentage = (tooltipItem.raw / total * 100).toFixed(2);
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });
    });
</script>