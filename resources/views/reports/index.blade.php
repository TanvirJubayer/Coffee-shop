<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <!-- Header -->
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Reports Dashboard</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Reports</div></li>
                </ul>
            </div>

            <!-- Date Filter -->
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
                        <button type="submit" class="tf-button style-1">
                            <i class="icon-filter"></i> Apply Filter
                        </button>
                    </div>
                    <div class="col-md-3 text-end">
                        <div class="dropdown">
                            <button class="tf-button" type="button" data-bs-toggle="dropdown">
                                <i class="icon-download"></i> Export
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('reports.export', ['type' => 'sales', 'start_date' => $startDate, 'end_date' => $endDate]) }}">Sales Report (CSV)</a></li>
                                <li><a class="dropdown-item" href="{{ route('reports.export', ['type' => 'products', 'start_date' => $startDate, 'end_date' => $endDate]) }}">Products Report (CSV)</a></li>
                                <li><a class="dropdown-item" href="{{ route('reports.export', ['type' => 'inventory', 'start_date' => $startDate, 'end_date' => $endDate]) }}">Inventory Report (CSV)</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Summary Cards -->
            <div class="row mb-4">
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="wg-box p-4 text-center">
                        <div class="text-muted mb-2">Total Sales</div>
                        <h2 class="text-success">${{ number_format($stats['total_sales'], 2) }}</h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="wg-box p-4 text-center">
                        <div class="text-muted mb-2">Total Orders</div>
                        <h2>{{ $stats['total_orders'] }}</h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="wg-box p-4 text-center">
                        <div class="text-muted mb-2">Average Order</div>
                        <h2>${{ number_format($stats['average_order'], 2) }}</h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="wg-box p-4 text-center">
                        <div class="text-muted mb-2">Top Product</div>
                        <h5>{{ $stats['top_product']->product->name ?? 'N/A' }}</h5>
                        @if($stats['top_product'])
                            <small class="text-muted">{{ $stats['top_product']->total_qty }} sold</small>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row mb-4">
                <!-- Daily Sales Chart -->
                <div class="col-lg-8 mb-3">
                    <div class="wg-box">
                        <div class="flex items-center justify-between mb-3">
                            <h5>Daily Sales</h5>
                            <a href="{{ route('reports.sales', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="text-primary">View Details →</a>
                        </div>
                        <canvas id="dailySalesChart" height="300"></canvas>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="col-lg-4 mb-3">
                    <div class="wg-box">
                        <h5 class="mb-3">Payment Methods</h5>
                        <canvas id="paymentChart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- Top Products & Order Types -->
            <div class="row mb-4">
                <!-- Top Products -->
                <div class="col-lg-6 mb-3">
                    <div class="wg-box">
                        <div class="flex items-center justify-between mb-3">
                            <h5>Top 5 Products</h5>
                            <a href="{{ route('reports.products', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="text-primary">View All →</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Qty Sold</th>
                                    <th class="text-end">Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topProducts as $item)
                                <tr>
                                    <td>{{ $item->product->name ?? 'N/A' }}</td>
                                    <td class="text-center">{{ $item->total_qty }}</td>
                                    <td class="text-end">${{ number_format($item->total_revenue, 2) }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">No data available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Order Types -->
                <div class="col-lg-6 mb-3">
                    <div class="wg-box">
                        <h5 class="mb-3">Order Types</h5>
                        <div class="row">
                            @forelse($orderTypeBreakdown as $type)
                            <div class="col-6 mb-3">
                                <div class="p-3 rounded {{ $type->type === 'dine_in' ? 'bg-primary' : 'bg-info' }} bg-opacity-10">
                                    <h6>{{ $type->type === 'dine_in' ? 'Dine In' : 'Takeaway' }}</h6>
                                    <h3>{{ $type->count }}</h3>
                                    <small class="text-muted">${{ number_format($type->total, 2) }}</small>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center text-muted">No data available</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('reports.sales', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="wg-box p-4 d-block text-center text-decoration-none">
                        <i class="icon-trending-up fs-1 text-success"></i>
                        <h6 class="mt-2">Sales Report</h6>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('reports.products', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="wg-box p-4 d-block text-center text-decoration-none">
                        <i class="icon-shopping-cart fs-1 text-primary"></i>
                        <h6 class="mt-2">Products Report</h6>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('reports.staff', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="wg-box p-4 d-block text-center text-decoration-none">
                        <i class="icon-users fs-1 text-info"></i>
                        <h6 class="mt-2">Staff Report</h6>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('reports.inventory', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="wg-box p-4 d-block text-center text-decoration-none">
                        <i class="icon-layers fs-1 text-warning"></i>
                        <h6 class="mt-2">Inventory Report</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Daily Sales Chart
            const salesCtx = document.getElementById('dailySalesChart').getContext('2d');
            new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: @json($dailySales->pluck('date')),
                    datasets: [{
                        label: 'Sales ($)',
                        data: @json($dailySales->pluck('total')),
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.1)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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

            // Payment Methods Chart
            const paymentCtx = document.getElementById('paymentChart').getContext('2d');
            new Chart(paymentCtx, {
                type: 'doughnut',
                data: {
                    labels: @json($paymentBreakdown->pluck('payment_method')->map(fn($m) => ucfirst($m))),
                    datasets: [{
                        data: @json($paymentBreakdown->pluck('total')),
                        backgroundColor: [
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });
    </script>
</x-layouts.app-layout>
