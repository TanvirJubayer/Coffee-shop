<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Adjust Stock: {{ $product->name }}</h3>
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
                            <div class="text-tiny">Stock List</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Adjust</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{ route('inventory.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="body-title mb-10">Current Quantity: <span class="tf-color-1">{{ $product->quantity }}</span></div>

                    <fieldset class="category">
                        <div class="body-title mb-10">Transaction Type</div>
                        <div class="select">
                            <select class="" name="type">
                                <option value="purchase">Purchase (Add Stock)</option>
                                <option value="sale">Sale (Reduce Stock)</option>
                                <option value="adjustment">Adjustment (Correction)</option>
                                <option value="return">Return (Add Stock)</option>
                            </select>
                        </div>
                    </fieldset>

                    <fieldset class="name">
                        <div class="body-title mb-10">Quantity to Adjust</div>
                        <input class="mb-10" type="number" placeholder="Enter quantity" name="quantity" tabindex="0" value="" aria-required="true" required="" min="1">
                    </fieldset>

                     <fieldset class="category">
                        <div class="body-title mb-10">Supplier (Optional)</div>
                        <div class="select">
                            <select class="" name="supplier_id">
                                <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>

                    <fieldset class="description">
                        <div class="body-title mb-10">Notes (Optional)</div>
                        <textarea class="mb-10" name="notes" placeholder="Reason for adjustment..." tabindex="0"></textarea>
                    </fieldset>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Update Stock</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
