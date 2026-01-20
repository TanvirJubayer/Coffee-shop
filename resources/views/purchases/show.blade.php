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
                    <li><div class="text-tiny">#{{ $purchase->reference_no }}</div></li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between mb-30">
                    <div>
                        <h4>Reference: {{ $purchase->reference_no }}</h4>
                        <div class="text-tiny mt-1">Date: {{ $purchase->purchase_date->format('F d, Y') }}</div>
                        <div class="text-tiny mt-1">Status: <span class="badge {{ $purchase->status === 'received' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($purchase->status) }}</span></div>
                    </div>
                    <div class="text-end">
                        <h4>Supplier: {{ $purchase->supplier->name }}</h4>
                        <div class="text-tiny mt-1">Contact: {{ $purchase->supplier->contact_person ?? 'N/A' }}</div>
                        <div class="text-tiny mt-1">Phone: {{ $purchase->supplier->phone ?? 'N/A' }}</div>
                        <a href="{{ route('purchases.voucher', $purchase) }}" target="_blank" class="tf-button style-1 mt-3">
                            <i class="icon-printer"></i> Generate Voucher
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Type</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-end">Unit Cost</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchase->items as $item)
                                <tr>
                                    <td>
                                        @if($item->product)
                                            {{ $item->product->name }}
                                        @elseif($item->ingredient)
                                            {{ $item->ingredient->name }}
                                        @else
                                            Unknown Item
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->product)
                                            <span class="badge bg-primary">Product</span>
                                        @elseif($item->ingredient)
                                            <span class="badge bg-secondary">Ingredient</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">${{ number_format($item->unit_cost, 2) }}</td>
                                    <td class="text-end">${{ number_format($item->subtotal, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end fw-bold">Grand Total</td>
                                <td class="text-end fw-bold">${{ number_format($purchase->total_amount, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
