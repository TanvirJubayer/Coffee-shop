<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <!-- Header -->
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Inventory Report</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><a href="{{ route('reports.index') }}"><div class="text-tiny">Reports</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Inventory</div></li>
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
                    <div class="col-md-6 text-end">
                        <button type="submit" class="tf-button style-1">
                            <i class="icon-filter"></i> Apply Filter
                        </button>
                        <a href="{{ route('reports.export', ['type' => 'inventory', 'start_date' => $startDate, 'end_date' => $endDate]) }}" class="tf-button">
                            <i class="icon-download"></i> Export
                        </a>
                    </div>
                </form>
            </div>

            <!-- Low Stock Alert -->
            @if($lowStockProducts->count() > 0)
            <div class="wg-box mb-4 border-danger border-2">
                <h5 class="text-danger mb-3">
                    <i class="icon-alert-triangle me-2"></i>Low Stock Alert ({{ $lowStockProducts->count() }} items)
                </h5>
                <div class="row">
                    @foreach($lowStockProducts as $product)
                    <div class="col-md-4 col-sm-6 mb-2">
                        <div class="d-flex align-items-center p-2 bg-danger bg-opacity-10 rounded">
                            <div class="flex-grow-1">
                                <strong>{{ $product->name }}</strong>
                                <div class="small text-muted">{{ $product->category->name ?? 'N/A' }}</div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-danger">{{ $product->quantity }} left</span>
                                <div class="small text-muted">Alert: {{ $product->alert_threshold }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Movement Summary -->
            <div class="row mb-4">
                @foreach($movementSummary as $movement)
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="wg-box p-4 text-center
                        {{ $movement->type === 'purchase' ? 'bg-success bg-opacity-10' : '' }}
                        {{ $movement->type === 'sale' ? 'bg-primary bg-opacity-10' : '' }}
                        {{ $movement->type === 'adjustment' ? 'bg-warning bg-opacity-10' : '' }}
                        {{ $movement->type === 'return' ? 'bg-info bg-opacity-10' : '' }}
                    ">
                        <h6 class="text-muted mb-2">{{ ucfirst($movement->type) }}</h6>
                        <h3>{{ $movement->total_quantity }}</h3>
                        <small>units</small>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <!-- Stock Levels -->
                <div class="col-lg-6 mb-4">
                    <div class="wg-box">
                        <h5 class="mb-3">Current Stock Levels</h5>
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-sm">
                                <thead class="sticky-top bg-white">
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Stock</th>
                                        <th class="text-center">Alert</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stockLevels as $product)
                                    <tr>
                                        <td>
                                            <strong>{{ $product->name }}</strong>
                                            <div class="small text-muted">{{ $product->category->name ?? 'N/A' }}</div>
                                        </td>
                                        <td class="text-center">{{ $product->quantity }}</td>
                                        <td class="text-center text-muted">{{ $product->alert_threshold }}</td>
                                        <td>
                                            @if($product->quantity <= 0)
                                            <span class="badge bg-danger">Out of Stock</span>
                                            @elseif($product->quantity <= $product->alert_threshold)
                                            <span class="badge bg-warning text-dark">Low Stock</span>
                                            @else
                                            <span class="badge bg-success">OK</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Recent Movements -->
                <div class="col-lg-6 mb-4">
                    <div class="wg-box">
                        <h5 class="mb-3">Recent Stock Movements</h5>
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-sm">
                                <thead class="sticky-top bg-white">
                                    <tr>
                                        <th>Date</th>
                                        <th>Product</th>
                                        <th>Type</th>
                                        <th class="text-center">Qty</th>
                                        <th>By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($stockMovements as $movement)
                                    <tr>
                                        <td class="small">{{ $movement->created_at->format('M d, H:i') }}</td>
                                        <td>{{ $movement->product->name ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge 
                                                {{ $movement->type === 'purchase' ? 'bg-success' : '' }}
                                                {{ $movement->type === 'sale' ? 'bg-primary' : '' }}
                                                {{ $movement->type === 'adjustment' ? 'bg-warning text-dark' : '' }}
                                                {{ $movement->type === 'return' ? 'bg-info' : '' }}
                                            ">{{ ucfirst($movement->type) }}</span>
                                        </td>
                                        <td class="text-center {{ $movement->quantity > 0 ? 'text-success' : 'text-danger' }}">
                                            {{ $movement->quantity > 0 ? '+' : '' }}{{ $movement->quantity }}
                                        </td>
                                        <td class="small">{{ $movement->user->name ?? 'System' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">No movements in this period</td>
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
</x-layouts.app-layout>
