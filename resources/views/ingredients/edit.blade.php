<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Edit Ingredient</h3>
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
                        <a href="{{ route('ingredients.index') }}">
                            <div class="text-tiny">Ingredients</div>
                        </a>
                    </li>
                     <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Edit</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{ route('ingredients.update', $ingredient) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <fieldset class="name">
                        <div class="body-title mb-10">Ingredient Name</div>
                        <input class="mb-10" type="text" placeholder="e.g. Coffee Beans" name="name" tabindex="0" value="{{ $ingredient->name }}" aria-required="true" required="">
                    </fieldset>

                    <div class="cols gap22">
                        <fieldset class="unit">
                             <div class="body-title mb-10">Unit</div>
                             <div class="select">
                                <select name="unit" required>
                                    <option value="kg" {{ $ingredient->unit == 'kg' ? 'selected' : '' }}>Kg</option>
                                    <option value="g" {{ $ingredient->unit == 'g' ? 'selected' : '' }}>Grams</option>
                                    <option value="l" {{ $ingredient->unit == 'l' ? 'selected' : '' }}>Liters</option>
                                    <option value="ml" {{ $ingredient->unit == 'ml' ? 'selected' : '' }}>Milliliters</option>
                                    <option value="pcs" {{ $ingredient->unit == 'pcs' ? 'selected' : '' }}>Pieces</option>
                                    <option value="packs" {{ $ingredient->unit == 'packs' ? 'selected' : '' }}>Packs</option>
                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="quantity">
                            <div class="body-title mb-10">Current Quantity</div>
                            <input class="mb-10" type="number" step="0.01" placeholder="0" name="quantity" tabindex="0" value="{{ $ingredient->quantity }}" required="">
                        </fieldset>
                    </div>

                    <div class="cols gap22">
                        <fieldset class="cost">
                            <div class="body-title mb-10">Cost per Unit ($)</div>
                            <input class="mb-10" type="number" step="0.01" placeholder="0.00" name="cost" tabindex="0" value="{{ $ingredient->cost }}" required="">
                        </fieldset>
                        <fieldset class="alert_threshold">
                            <div class="body-title mb-10">Low Stock Alert Level</div>
                            <input class="mb-10" type="number" step="0.01" placeholder="5" name="alert_threshold" tabindex="0" value="{{ $ingredient->alert_threshold }}" required="">
                        </fieldset>
                    </div>

                    <div class="bot">
                        <a href="{{ route('ingredients.index') }}" class="tf-button style-1 w208">Cancel</a>
                        <button class="tf-button w208" type="submit">Update Ingredient</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
