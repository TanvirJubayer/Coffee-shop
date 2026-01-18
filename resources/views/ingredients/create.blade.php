<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add New Ingredient</h3>
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
                        <div class="text-tiny">Add New</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{ route('ingredients.store') }}" method="POST">
                    @csrf
                    
                    <fieldset class="name">
                        <div class="body-title mb-10">Ingredient Name</div>
                        <input class="mb-10" type="text" placeholder="e.g. Coffee Beans" name="name" tabindex="0" value="" aria-required="true" required="">
                    </fieldset>

                    <div class="cols gap22">
                        <fieldset class="unit">
                             <div class="body-title mb-10">Unit</div>
                             <div class="select">
                                <select name="unit" required>
                                    <option value="kg">Kg</option>
                                    <option value="g">Grams</option>
                                    <option value="l">Liters</option>
                                    <option value="ml">Milliliters</option>
                                    <option value="pcs">Pieces</option>
                                    <option value="packs">Packs</option>
                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="quantity">
                            <div class="body-title mb-10">Current Quantity</div>
                            <input class="mb-10" type="number" step="0.01" placeholder="0" name="quantity" tabindex="0" value="0" required="">
                        </fieldset>
                    </div>

                    <div class="cols gap22">
                        <fieldset class="cost">
                            <div class="body-title mb-10">Cost per Unit ($)</div>
                            <input class="mb-10" type="number" step="0.01" placeholder="0.00" name="cost" tabindex="0" value="0" required="">
                        </fieldset>
                        <fieldset class="alert_threshold">
                            <div class="body-title mb-10">Low Stock Alert Level</div>
                            <input class="mb-10" type="number" step="0.01" placeholder="5" name="alert_threshold" tabindex="0" value="5" required="">
                        </fieldset>
                    </div>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save Ingredient</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
