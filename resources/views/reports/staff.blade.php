<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <!-- Header -->
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Staff Performance Report</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><a href="{{ route('reports.index') }}"><div class="text-tiny">Reports</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Staff</div></li>
                </ul>
            </div>

            <!-- Filters -->
            <div class="wg-box mb-4">
                <form method="GET" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="tf-button style-1">
                            <i class="icon-filter"></i> Apply Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Staff Cards -->
            <div class="row mb-4">
                @forelse($staffStats as $index => $staff)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="wg-box h-100 {{ $index === 0 ? 'border-success border-2' : '' }}">
                        @if($index === 0)
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-success">Top Performer</span>
                        </div>
                        @endif
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                                <i class="icon-user fs-4 text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $staff->user->name ?? 'Unknown' }}</h5>
                                <small class="text-muted">{{ $staff->user->email ?? '' }}</small>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="p-2 bg-light rounded">
                                    <h4 class="mb-0 text-primary">{{ $staff->total_orders }}</h4>
                                    <small class="text-muted">Orders</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="p-2 bg-light rounded">
                                    <h4 class="mb-0 text-success">${{ number_format($staff->total_sales, 0) }}</h4>
                                    <small class="text-muted">Sales</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="p-2 bg-light rounded">
                                    <h4 class="mb-0 text-info">${{ number_format($staff->average_order, 0) }}</h4>
                                    <small class="text-muted">Avg Order</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="wg-box text-center py-5">
                        <i class="icon-users fs-1 text-muted"></i>
                        <p class="text-muted mt-3">No staff data available for this period</p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Comparison Table -->
            @if($staffStats->count() > 0)
            <div class="wg-box">
                <h5 class="mb-3">Staff Comparison</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Staff Member</th>
                                <th class="text-center">Orders</th>
                                <th class="text-end">Total Sales</th>
                                <th class="text-end">Average Order</th>
                                <th>Performance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $maxSales = $staffStats->max('total_sales'); @endphp
                            @foreach($staffStats as $index => $staff)
                            <tr>
                                <td>
                                    @if($index === 0)
                                    <span class="badge bg-warning text-dark">🥇 1st</span>
                                    @elseif($index === 1)
                                    <span class="badge bg-secondary">🥈 2nd</span>
                                    @elseif($index === 2)
                                    <span class="badge bg-danger">🥉 3rd</span>
                                    @else
                                    {{ $index + 1 }}
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $staff->user->name ?? 'Unknown' }}</strong>
                                </td>
                                <td class="text-center">{{ $staff->total_orders }}</td>
                                <td class="text-end">${{ number_format($staff->total_sales, 2) }}</td>
                                <td class="text-end">${{ number_format($staff->average_order, 2) }}</td>
                                <td style="width: 200px;">
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-success" 
                                             role="progressbar" 
                                             style="width: {{ $maxSales > 0 ? ($staff->total_sales / $maxSales) * 100 : 0 }}%">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-layouts.app-layout>
