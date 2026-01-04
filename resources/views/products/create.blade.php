<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add Product</h3>
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
                        <a href="{{ route('products.index') }}">
                            <div class="text-tiny">Products</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Add Product</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title mb-10">Product name</div>
                        <input class="mb-10" type="text" placeholder="Enter product name" name="name" tabindex="0" value="" aria-required="true" required="">
                    </fieldset>

                    <fieldset class="category">
                        <div class="body-title mb-10">Category</div>
                        <div class="select">
                            <select class="" name="category_id">
                                <option value="">Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>

                     <div class="cols gap22">
                        <fieldset class="price">
                            <div class="body-title mb-10">Price</div>
                            <input class="mb-10" type="number" step="0.01" placeholder="Enter price" name="price" tabindex="0" value="" aria-required="true" required="">
                        </fieldset>
                        <fieldset class="cost">
                            <div class="body-title mb-10">Cost (Optional)</div>
                            <input class="mb-10" type="number" step="0.01" placeholder="Enter cost" name="cost" tabindex="0" value="">
                        </fieldset>
                    </div>

                    <fieldset class="description">
                        <div class="body-title mb-10">Description</div>
                        <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" aria-required="true"></textarea>
                    </fieldset>

                    <fieldset>
                        <div class="body-title mb-10">Upload Image</div>
                        <div class="upload-image mb-16">
                            <div class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="myFile" name="image" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
