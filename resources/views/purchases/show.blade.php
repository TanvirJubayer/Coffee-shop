<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Purchase Details</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('home') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><a href="{{ route('purchases.index') }}"><div class="text-tiny">Purchases</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Details</div></li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="row mb-30">
                    <div class="col-md-6">
                        <h5 class="mb-10">Purchase Info</h5>
                        <p><strong>Date:</strong> {{ $purchase->purchase_date->format('Y-m-d') }}</p>
                        <p><strong>Reference:</strong> {{ $purchase->reference_no ?? '-' }}</p>
                        <p><strong>Status:</strong> <span class="badge {{ $purchase->status == 'received' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($purchase->status) }}</span></p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="mb-10">Supplier Info</h5>
                        <p><strong>Name:</strong> {{ $purchase->supplier->name ?? 'Unknown' }}</p>
                        <p><strong>Contact:</strong> {{ $purchase->supplier->contact_person ?? '-' }}</p>
                        <p><strong>Phone:</strong> {{ $purchase->supplier->phone ?? '-' }}</p>
                    </div>
                </div>

                <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li><div class="body-title">Item</div></li>
                        <li><div class="body-title">Type</div></li>
                        <li><div class="body-title">Quantity</div></li>
                        <li><div class="body-title">Unit Cost</div></li>
                        <li><div class="body-title">Subtotal</div></li>
                    </ul>
                    <ul class="table-list">
                        @foreach($purchase->items as $item)
                        <li class="product-item gap14">
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="body-text fw-bold">
                                    {{ $item->product ? $item->product->name : ($item->ingredient ? $item->ingredient->name : 'Unknown') }}
                                </div>
                                <div class="body-text">{{ $item->product ? 'Product' : 'Ingredient' }}</div>
                                <div class="body-text">{{ $item->quantity }}</div>
                                <div class="body-text">${{ number_format($item->unit_cost, 2) }}</div>
                                <div class="body-text fw-bold">${{ number_format($item->subtotal, 2) }}</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="flex justify-end mt-20">
                    <h4>Total Amount: ${{ number_format($purchase->total_amount, 2) }}</h4>
                </div>

                <div class="bot mt-20">
                    <a href="{{ route('purchases.index') }}" class="tf-button style-1">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
