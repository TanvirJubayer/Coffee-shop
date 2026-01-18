<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Order #{{ $order->id }}</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><a href="{{ route('orders.index') }}"><div class="text-tiny">Orders</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Details</div></li>
                </ul>
            </div>

            <div class="row">
                <!-- Order Details -->
                <div class="col-lg-8">
                    <div class="wg-box mb-4">
                        <h5 class="mb-4">Order Items</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $item->product->image_url }}" alt="" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                                <div>
                                                    <div class="fw-bold">{{ $item->product->name ?? 'Unknown item' }}</div>
                                                    @if($item->notes)
                                                        <small class="text-muted">Note: {{ $item->notes }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">${{ number_format($item->price, 2) }}</td>
                                        <td class="text-center">{{ $item->quantity }}</td>
                                        <td class="text-end font-bold">${{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end">Subtotal</td>
                                        <td class="text-end">${{ number_format($order->total_amount, 2) }}</td>
                                    </tr>
                                    <!-- Add tax info here if stored in order -->
                                    <tr class="table-light">
                                        <td colspan="3" class="text-end fw-bold">Total</td>
                                        <td class="text-end fw-bold fs-5">${{ number_format($order->total_amount, 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="wg-box">
                        <h5 class="mb-4">Payment Information</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Method</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($order->payments as $payment)
                                    <tr>
                                        <td>{{ ucfirst($payment->payment_method) }}</td>
                                        <td>${{ number_format($payment->amount, 2) }}</td>
                                        <td>
                                            <span class="badge {{ $payment->status == 'completed' ? 'bg-success' : 'bg-warning' }}">
                                                {{ ucfirst($payment->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $payment->created_at->format('M d, Y H:i') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No payment records found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Actions -->
                <div class="col-lg-4">
                    <!-- Status Card -->
                    <div class="wg-box mb-4">
                        <h5 class="mb-3">Order Status</h5>
                        
                        <div class="mb-4 text-center">
                            <span class="badge fs-5 mb-2
                                {{ $order->status === 'completed' ? 'bg-success' : '' }}
                                {{ $order->status === 'pending' ? 'bg-warning text-dark' : '' }}
                                {{ $order->status === 'cancelled' ? 'bg-danger' : '' }}
                                {{ $order->status === 'preparing' ? 'bg-info' : '' }}
                                {{ $order->status === 'ready' ? 'bg-primary' : '' }}
                            ">
                                {{ ucfirst($order->status) }}
                            </span>
                            <div class="text-muted small">
                                Created {{ $order->created_at->diffForHumans() }}
                            </div>
                        </div>

                        <form action="{{ route('orders.updateStatus', $order) }}" method="POST" class="mb-3">
                            @csrf
                            @method('PATCH')
                            <label class="form-label">Update Status</label>
                            <div class="input-group">
                                <select name="status" class="form-select">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="preparing" {{ $order->status == 'preparing' ? 'selected' : '' }}>Preparing</option>
                                    <option value="ready" {{ $order->status == 'ready' ? 'selected' : '' }}>Ready</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                        @if(!in_array($order->status, ['cancelled', 'refunded']))
                        <hr>
                        <form action="{{ route('orders.cancel', $order) }}" method="POST" onsubmit="return confirm('Are you sure? This will restore stock.');">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="icon-x-circle me-2"></i> Cancel Order
                            </button>
                        </form>
                        @endif
                    </div>

                    <!-- Customer Info -->
                    <div class="wg-box mb-4">
                        <h5 class="mb-3">Customer</h5>
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-light p-3 me-3">
                                <i class="icon-user fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">{{ $order->user->name ?? 'Guest' }}</h6>
                                <small class="text-muted">{{ $order->user->email ?? 'No email' }}</small>
                            </div>
                        </div>
                        @if($order->table)
                        <div class="p-3 bg-light rounded text-center">
                            <small class="text-muted">Table</small>
                            <h5 class="mb-0">{{ $order->table->name }}</h5>
                        </div>
                        @else
                        <div class="p-3 bg-light rounded text-center">
                            <h5 class="mb-0">{{ ucfirst($order->type) }}</h5>
                        </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="wg-box">
                        <h5 class="mb-3">Actions</h5>
                        <a href="{{ route('pos.invoice', $order->id) }}" target="_blank" class="btn btn-outline-primary w-100 mb-2">
                            <i class="icon-printer me-2"></i> Print Invoice
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
