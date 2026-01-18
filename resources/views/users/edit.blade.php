<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
             <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Edit Staff</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><a href="{{ route('users.index') }}"><div class="text-tiny">Staff</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Edit</div></li>
                </ul>
            </div>
            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <fieldset class="name">
                        <div class="body-title mb-10">Name</div>
                        <input class="mb-10" type="text" placeholder="Enter name" name="name" value="{{ old('name', $user->name) }}" required>
                    </fieldset>
                    <fieldset class="email">
                        <div class="body-title mb-10">Email</div>
                        <input class="mb-10" type="email" placeholder="Enter email" name="email" value="{{ old('email', $user->email) }}" required>
                    </fieldset>
                    <fieldset class="role">
                        <div class="body-title mb-10">Role</div>
                        <div class="select mb-10">
                            <select class="" name="role" required>
                                <option value="cashier" {{ (old('role', $user->role) == 'cashier') ? 'selected' : '' }}>Cashier</option>
                                <option value="manager" {{ (old('role', $user->role) == 'manager') ? 'selected' : '' }}>Manager</option>
                                <option value="admin" {{ (old('role', $user->role) == 'admin') ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="password">
                         <div class="body-title mb-10">Password (Leave blank to keep current)</div>
                        <input class="mb-10" type="password" placeholder="Enter new password" name="password">
                    </fieldset>
                    <fieldset class="password_confirmation">
                        <div class="body-title mb-10">Confirm Password</div>
                        <input class="mb-10" type="password" placeholder="Confirm new password" name="password_confirmation">
                    </fieldset>
                    <div class="bot">
                        <button class="tf-button w208" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
