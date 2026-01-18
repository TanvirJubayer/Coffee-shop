<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Ingredients List</h3>
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
                        <div class="text-tiny">Ingredients</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search ingredients..." class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('ingredients.create') }}"><i
                            class="icon-plus"></i>Add new</a>
                </div>
                <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">Name</div>
                        </li>
                        <li>
                            <div class="body-title">Stock</div>
                        </li>
                        <li>
                            <div class="body-title">Unit</div>
                        </li>
                        <li>
                            <div class="body-title">Cost</div>
                        </li>
                        <li>
                            <div class="body-title">Status</div>
                        </li>
                        <li>
                            <div class="body-title">Action</div>
                        </li>
                    </ul>
                    <ul class="table-list">
                        @forelse($ingredients as $ingredient)
                            <li class="product-item gap14">
                                <div class="flex items-center justify-between gap20 flex-grow">
                                    <div class="name">
                                        <div class="body-title-2">{{ $ingredient->name }}</div>
                                    </div>
                                    <div class="body-text">{{ $ingredient->quantity }}</div>
                                    <div class="body-text">{{ $ingredient->unit }}</div>
                                    <div class="body-text">${{ number_format($ingredient->cost, 2) }}</div>
                                    <div>
                                        @if($ingredient->is_low_stock)
                                            <div class="block-available">Low Stock</div>
                                        @else
                                            <div class="block-stock">In Stock</div>
                                        @endif
                                    </div>
                                    <div class="list-icon-function">
                                        <a href="{{ route('ingredients.edit', $ingredient) }}" class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </a>
                                        <form action="{{ route('ingredients.destroy', $ingredient) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="item trash" style="border:none; background:none;">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="product-item text-center">No ingredients found.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="divider"></div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
