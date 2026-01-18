<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Staff Management</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Staff</div></li>
                </ul>
            </div>
            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                     <div class="wg-filter flex-grow"></div>
                     <a class="tf-button style-1 w208" href="{{ route('users.create') }}"><i class="icon-plus"></i>Add New Staff</a>
                </div>
                <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li><div class="body-title">Name</div></li>
                        <li><div class="body-title">Email</div></li>
                        <li><div class="body-title">Role</div></li>
                        <li><div class="body-title">Action</div></li>
                    </ul>
                    <ul class="table-list">
                        @foreach ($users as $user)
                        <li class="product-item gap14">
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="body-text">{{ $user->name }}</div>
                                <div class="body-text">{{ $user->email }}</div>
                                <div class="body-text">
                                    <span class="badge {{ $user->role == 'admin' ? 'bg-danger' : ($user->role == 'manager' ? 'bg-warning text-dark' : 'bg-success') }}">
                                        {{ ucfirst($user->role ?? 'staff') }}
                                    </span>
                                </div>
                                <div class="list-icon-function">
                                    <a href="{{ route('users.edit', $user) }}" class="item edit" title="Edit">
                                        <i class="icon-edit-3"></i>
                                    </a>
                                    @if(auth()->id() !== $user->id)
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="item trash border-0 bg-transparent p-0" title="Delete">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>
                                    @endif
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
