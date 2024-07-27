@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-chart">
            @if(empty($labels))
                <p class="text-center p-3">No checkout data available for the past 30 days.</p>
            @else
                <div class="card-header">
                   <h3 class="text-center pt-3">Line Chart for Checkouts</h3>
                </div>
                <canvas id="myLineChart"></canvas>
            @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    <h3 class="pt-3">Total Backend Data</h3>
                </div>
                <div class="card-body mb-5">
                   <p class="mb-2" style="font-size: 1rem;">Total Products: {{$product}} </p>
                   <p class="mb-2" style="font-size: 1rem;">Total Categories: {{$cat}}</p>
                   <p class="mb-2" style="font-size: 1rem;">Total Subcategories: {{$subcat}}</p>
                   <p class="mb-2" style="font-size: 1rem;">Total Users: {{$user}} </p>
                   <p class="mb-2" style="font-size: 1rem;">Total Webusers: {{$webuser}}</p>
                   <p class="mb-2" style="font-size: 1rem;">Total Checkouts: {{$checkout}}</p>
                   <p class="mb-2" style="font-size: 1rem;">Total Trusted Partners: {{$trusted}}</p>
                   <p class="mb-2" style="font-size: 1rem;">Total Attributes: {{$attr}}</p>
                   <p class="mb-2" style="font-size: 1rem;">Total Banners: {{$banner}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>

<script>
    // Get the data from Laravel
    var labels = @json($labels);
        var data = @json($data);

        var ctx = document.getElementById('myLineChart').getContext('2d');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Daily Checkouts',
                    data: data, // Use the data directly
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
</script>
@endpush
