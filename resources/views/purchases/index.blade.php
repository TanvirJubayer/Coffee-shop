<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Purchases History</h3>
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
                        <div class="text-tiny">Inventory</div>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Purchases</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search by reference..." class="" name="reference_no"
                                    tabindex="2" value="" aria-required="true">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('purchases.create') }}"><i
                            class="icon-plus"></i>New Purchase</a>
                </div>
                <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">Date</div>
                        </li>
                        <li>
                            <div class="body-title">Reference</div>
                        </li>
                        <li>
                            <div class="body-title">Supplier</div>
                        </li>
                        <li>
                            <div class="body-title">Total Amount</div>
                        </li>
                        <li>
                            <div class="body-title">Status</div>
                        </li>
                        <li>
                            <div class="body-title">Action</div>
                        </li>
                    </ul>
                    <ul class="table-list">
                        @forelse($purchases as $purchase)
                            <li class="product-item gap14">
                                <div class="flex items-center justify-between gap20 flex-grow">
                                    <div class="body-text">{{ $purchase->purchase_date->format('Y-m-d') }}</div>
                                    <div class="body-text">{{ $purchase->reference_no ?? '-' }}</div>
                                    <div class="body-text">{{ $purchase->supplier->name ?? 'Unknown' }}</div>
                                    <div class="body-text fw-bold">${{ number_format($purchase->total_amount, 2) }}</div>
                                    <div>
                                        <div class="block-available">{{ ucfirst($purchase->status) }}</div>
                                    </div>
                                    <div class="list-icon-function">
                                        <a href="{{ route('purchases.show', $purchase) }}" class="item eye">
                                            <i class="icon-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="product-item text-center">No purchase history found.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="divider"></div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
