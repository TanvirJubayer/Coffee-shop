<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <!-- Header -->
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Sales Report</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><a href="{{ route('reports.index') }}"><div class="text-tiny">Reports</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Sales</div></li>
                </ul>
            </div>

            <!-- Filters -->
            <div class="wg-box mb-4">
                <form method="GET" class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Group By</label>
                        <select name="group_by" class="form-select">
                            <option value="day" {{ $groupBy === 'day' ? 'selected' : '' }}>Daily</option>
                            <option value="week" {{ $groupBy === 'week' ? 'selected' : '' }}>Weekly</option>
                            <option value="month" {{ $groupBy === 'month' ? 'selected' : '' }}>Monthly</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="tf-button style-1">
                            <i class="icon-filter"></i> Apply
                        </button>
                        <a href="{{ route('reports.export', ['type' => 'sales', 'start_date' => $startDate, 'end_date' => $endDate]) }}" class="tf-button">
                            <i class="icon-download"></i> Export
                        </a>
                    </div>
                </form>
            </div>

            <!-- Summary -->
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <div class="wg-box p-4 text-center bg-success bg-opacity-10">
                        <div class="text-muted mb-2">Total Sales</div>
                        <h2 class="text-success">${{ number_format($totals['sales'], 2) }}</h2>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="wg-box p-4 text-center bg-primary bg-opacity-10">
                        <div class="text-muted mb-2">Total Orders</div>
                        <h2 class="text-primary">{{ $totals['orders'] }}</h2>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="wg-box p-4 text-center bg-info bg-opacity-10">
                        <div class="text-muted mb-2">Average Order Value</div>
                        <h2 class="text-info">${{ number_format($totals['average'], 2) }}</h2>
                    </div>
                </div>
            </div>

            <!-- Chart -->
            <div class="wg-box mb-4">
                <h5 class="mb-3">Sales Trend</h5>
                <canvas id="salesChart" height="100"></canvas>
            </div>

            <!-- Data Table -->
            <div class="wg-box">
                <h5 class="mb-3">Sales Data</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th class="text-center">Orders</th>
                                <th class="text-end">Total Sales</th>
                                <th class="text-end">Avg Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($salesData as $row)
                            <tr>
                                <td>{{ $row->period }}</td>
                                <td class="text-center">{{ $row->orders }}</td>
                                <td class="text-end">${{ number_format($row->total, 2) }}</td>
                                <td class="text-end">${{ number_format($row->orders > 0 ? $row->total / $row->orders : 0, 2) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">No sales data for this period</td>
                            </tr>
                            @endforelse
                        </tbody>
                        @if($salesData->count() > 0)
                        <tfoot class="table-dark">
                            <tr>
                                <th>Total</th>
                                <th class="text-center">{{ $totals['orders'] }}</th>
                                <th class="text-end">${{ number_format($totals['sales'], 2) }}</th>
                                <th class="text-end">${{ number_format($totals['average'], 2) }}</th>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($salesData->pluck('period')),
                    datasets: [{
                        label: 'Sales ($)',
                        data: @json($salesData->pluck('total')),
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderColor: 'rgb(75, 192, 192)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: value => '$' + value
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-layouts.app-layout>
