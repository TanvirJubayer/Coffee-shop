<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Stock List</h3>
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
                        <div class="text-tiny">Inventory Management</div>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Stock List</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search product..." class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">Product</div>
                        </li>
                        <li>
                            <div class="body-title">Category</div>
                        </li>
                        <li>
                            <div class="body-title">Current Stock</div>
                        </li>
                         <li>
                            <div class="body-title">Status</div>
                        </li>
                        <li>
                            <div class="body-title">Action</div>
                        </li>
                    </ul>
                    <ul class="table-list">
                        @foreach ($products as $product)
                            <li class="product-item gap14">
                                <div class="image no-bg">
                                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
                                </div>
                                <div class="flex items-center justify-between gap20 flex-grow">
                                    <div class="name">
                                        <a href="#" class="body-title-2">{{ $product->name }}</a>
                                        <div class="text-tiny mt-3">SKU: {{ $product->sku }}</div>
                                    </div>
                                    <div class="body-text">{{ $product->category->name }}</div>
                                    <div class="body-text">{{ $product->quantity }}</div>
                                    <div class="body-text">
                                        @if($product->quantity <= $product->alert_threshold)
                                            <span class="block-available bad">Low Stock</span>
                                        @else
                                            <span class="block-available">In Stock</span>
                                        @endif
                                    </div>
                                    <div class="list-icon-function">
                                        <a href="{{ route('inventory.adjust', $product->id) }}" class="tf-button style-1 w-full text-center">
                                            Adjust Stock
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
