<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
             <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add New Staff</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('users.index') }}"><div class="text-tiny">Staff</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Add New</div></li>
                </ul>
            </div>
            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title mb-10">Name</div>
                        <input class="mb-10" type="text" placeholder="Enter name" name="name" required>
                    </fieldset>
                    <fieldset class="email">
                        <div class="body-title mb-10">Email</div>
                        <input class="mb-10" type="email" placeholder="Enter email" name="email" required>
                    </fieldset>
                    <fieldset class="password">
                         <div class="body-title mb-10">Password</div>
                        <input class="mb-10" type="password" placeholder="Enter password" name="password" required>
                    </fieldset>
                    <fieldset class="password_confirmation">
                        <div class="body-title mb-10">Confirm Password</div>
                        <input class="mb-10" type="password" placeholder="Confirm password" name="password_confirmation" required>
                    </fieldset>
                    <div class="bot">
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
