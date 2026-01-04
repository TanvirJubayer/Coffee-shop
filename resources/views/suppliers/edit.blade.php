<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Edit Supplier</h3>
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
                        <a href="{{ route('suppliers.index') }}">
                            <div class="text-tiny">Suppliers</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Edit Supplier</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <fieldset class="name">
                        <div class="body-title mb-10">Supplier Name</div>
                        <input class="mb-10" type="text" placeholder="Enter supplier name" name="name" tabindex="0" value="{{ $supplier->name }}" aria-required="true" required="">
                    </fieldset>

                    <fieldset class="name">
                        <div class="body-title mb-10">Contact Person</div>
                        <input class="mb-10" type="text" placeholder="Contact person name" name="contact_person" tabindex="0" value="{{ $supplier->contact_person }}">
                    </fieldset>

                     <div class="cols gap22">
                        <fieldset class="name">
                            <div class="body-title mb-10">Email</div>
                            <input class="mb-10" type="email" placeholder="Email address" name="email" tabindex="0" value="{{ $supplier->email }}">
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">Phone</div>
                            <input class="mb-10" type="text" placeholder="Phone number" name="phone" tabindex="0" value="{{ $supplier->phone }}">
                        </fieldset>
                    </div>

                    <fieldset class="description">
                        <div class="body-title mb-10">Address</div>
                        <textarea class="mb-10" name="address" placeholder="Address" tabindex="0">{{ $supplier->address }}</textarea>
                    </fieldset>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
