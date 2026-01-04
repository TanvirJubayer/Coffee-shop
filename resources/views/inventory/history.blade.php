<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Stock History</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('home') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('inventory.index') }}">
                            <div class="text-tiny">Inventory Management</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">History</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                 <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">Date</div>
                        </li>
                        <li>
                            <div class="body-title">Product</div>
                        </li>
                        <li>
                            <div class="body-title">Type</div>
                        </li>
                        <li>
                            <div class="body-title">Quantity</div>
                        </li>
                         <li>
                            <div class="body-title">Balance</div>
                        </li>
                        <li>
                            <div class="body-title">Supplier</div>
                        </li>
                        <li>
                            <div class="body-title">Notes</div>
                        </li>
                    </ul>
                    <ul class="table-list">
                        @foreach ($transactions as $transaction)
                            <li class="product-item gap14">
                                <div class="flex items-center justify-between gap20 flex-grow">
                                    <div class="body-text">{{ $transaction->created_at->format('Y-m-d H:i') }}</div>
                                    <div class="name">
                                        <a href="#" class="body-title-2">{{ $transaction->product->name }}</a>
                                    </div>
                                    <div class="body-text">
                                        @if($transaction->type == 'purchase' || $transaction->type == 'return')
                                            <span class="badge badge-success">{{ ucfirst($transaction->type) }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ ucfirst($transaction->type) }}</span>
                                        @endif
                                    </div>
                                    <div class="body-text">{{ $transaction->quantity }}</div>
                                    <div class="body-text">{{ $transaction->balance }}</div>
                                     <div class="body-text">{{ $transaction->supplier ? $transaction->supplier->name : '-' }}</div>
                                    <div class="body-text">{{ $transaction->notes }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
