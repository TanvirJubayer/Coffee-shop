<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Order List</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Orders</div></li>
                </ul>
            </div>
            <div class="wg-box">
                <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li><div class="body-title">Order ID</div></li>
                        <li><div class="body-title">Customer</div></li>
                        <li><div class="body-title">Total</div></li>
                        <li><div class="body-title">Status</div></li>
                        <li><div class="body-title">Date</div></li>
                        <li><div class="body-title">Action</div></li>
                    </ul>
                    <ul class="table-list">
                        @foreach ($orders as $order)
                        <li class="product-item gap14">
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="body-text">#{{ $order->id }}</div>
                                <div class="body-text">{{ $order->user->name ?? 'Guest' }}</div>
                                <div class="body-text">${{ number_format($order->total_amount, 2) }}</div>
                                <div>
                                    <span class="badge {{ $order->status == 'completed' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($order->status) }}</span>
                                </div>
                                <div class="body-text">{{ $order->created_at->format('Y-m-d H:i') }}</div>
                                <div class="list-icon-function">
                                    <a href="{{ route('orders.show', $order) }}" class="item" title="View Details">
                                        <i class="icon-file-text"></i>
                                    </a>
                                    <a href="{{ route('pos.invoice', $order->id) }}" class="item" target="_blank" title="Print Invoice">
                                        <i class="icon-printer"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10">
                    <div class="text-tiny">Showing {{ $orders->count() }} entries</div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
