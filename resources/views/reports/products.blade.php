<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <!-- Header -->
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Product Performance Report</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><a href="{{ route('reports.index') }}"><div class="text-tiny">Reports</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Products</div></li>
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
                        <label class="form-label">Sort By</label>
                        <select name="sort_by" class="form-select">
                            <option value="quantity" {{ $sortBy === 'quantity' ? 'selected' : '' }}>Quantity Sold</option>
                            <option value="revenue" {{ $sortBy === 'revenue' ? 'selected' : '' }}>Revenue</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="tf-button style-1">
                            <i class="icon-filter"></i> Apply
                        </button>
                        <a href="{{ route('reports.export', ['type' => 'products', 'start_date' => $startDate, 'end_date' => $endDate]) }}" class="tf-button">
                            <i class="icon-download"></i> Export
                        </a>
                    </div>
                </form>
            </div>

            <div class="row">
                <!-- Category Breakdown -->
                <div class="col-lg-4 mb-4">
                    <div class="wg-box h-100">
                        <h5 class="mb-3">Sales by Category</h5>
                        <canvas id="categoryChart" height="250"></canvas>
                        <div class="mt-3">
                            @foreach($categoryBreakdown as $cat)
                            <div class="d-flex justify-content-between mb-2">
                                <span>{{ $cat->category_name }}</span>
                                <strong>${{ number_format($cat->total_revenue, 2) }}</strong>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Product Table -->
                <div class="col-lg-8 mb-4">
                    <div class="wg-box">
                        <h5 class="mb-3">Product Performance</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th class="text-center">Qty Sold</th>
                                        <th class="text-end">Revenue</th>
                                        <th class="text-end">Profit</th>
                                        <th class="text-end">Margin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($productStats as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $item->product->name ?? 'N/A' }}</strong>
                                        </td>
                                        <td>{{ $item->product->category->name ?? 'N/A' }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-primary">{{ $item->total_quantity }}</span>
                                        </td>
                                        <td class="text-end">${{ number_format($item->total_revenue, 2) }}</td>
                                        <td class="text-end {{ $item->profit >= 0 ? 'text-success' : 'text-danger' }}">
                                            ${{ number_format($item->profit, 2) }}
                                        </td>
                                        <td class="text-end">
                                            <span class="badge {{ $item->profit_margin >= 30 ? 'bg-success' : ($item->profit_margin >= 15 ? 'bg-warning' : 'bg-danger') }}">
                                                {{ $item->profit_margin }}%
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">No product data for this period</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('categoryChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: @json($categoryBreakdown->pluck('category_name')),
                    datasets: [{
                        data: @json($categoryBreakdown->pluck('total_revenue')),
                        backgroundColor: [
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 206, 86)',
                            'rgb(255, 99, 132)',
                            'rgb(153, 102, 255)',
                            'rgb(255, 159, 64)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            display: false
                        }
                    }
                }
            });
        });
    </script>
</x-layouts.app-layout>
