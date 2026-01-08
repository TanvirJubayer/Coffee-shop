<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Product List</h3>
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
                        <div class="text-tiny">Menu Management</div>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Product List</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('products.create') }}"><i
                            class="icon-plus"></i>Add new</a>
                </div>
                <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">Product</div>
                        </li>
                        <li>
                            <div class="body-title">Price</div>
                        </li>
                        <li>
                            <div class="body-title">Category</div>
                        </li>
                         <li>
                            <div class="body-title">Stock</div>
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
                                    </div>
                                    <div class="body-text">{{ number_format($product->price, 2) }}</div>
                                    <div class="body-text">{{ $product->category->name }}</div>
                                     <div class="body-text">In Stock</div>
                                    <div class="list-icon-function">
                                        <a href="{{ route('products.edit', $product->id) }}" class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="item trash" style="border:none; background:none;">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    
                </div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
