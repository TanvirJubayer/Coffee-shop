<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Table List</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Management</div></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Table List</div></li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow"></div>
                    <a class="tf-button style-1 w208" href="{{ route('tables.create') }}"><i class="icon-plus"></i>Add new table</a>
                </div>
                <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li class="flex-grow"><div class="body-title">Name</div></li>
                        <li><div class="body-title">Capacity</div></li>
                        <li><div class="body-title">Status</div></li>
                        <li><div class="body-title" style="width: 150px;">Action</div></li>
                    </ul>
                    <ul class="table-list">
                        @foreach ($tables as $table)
                            <li class="product-item gap14">
                                <div class="flex items-center justify-between gap20 flex-grow">
                                    <div class="name flex-grow">
                                        <a href="#" class="body-title-2">{{ $table->name }}</a>
                                    </div>
                                    <div class="body-text">{{ $table->capacity }} Persons</div>
                                    <div>
                                        @if($table->status == 'available')
                                            <span class="badge bg-success" style="padding: 5px 10px; border-radius: 4px; color: white;">Available</span>
                                        @elseif($table->status == 'occupied')
                                            <span class="badge bg-danger" style="padding: 5px 10px; border-radius: 4px; color: white;">Occupied</span>
                                        @else
                                            <span class="badge bg-warning" style="padding: 5px 10px; border-radius: 4px; color: white;">Reserved</span>
                                        @endif
                                    </div>
                                    <div class="list-icon-function" style="width: 150px; justify-content: flex-end;">
                                        @if($table->status !== 'available')
                                        <form action="{{ route('tables.updateStatus', $table->id) }}" method="POST" style="margin: 0;">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="available">
                                            <button type="submit" class="item" title="Mark Available" style="color: green; border:none; background:none; cursor: pointer;">
                                                <i class="icon-check" style="font-size: 1.2rem; font-weight: bold;"></i>
                                            </button>
                                        </form>
                                        @endif
                                        <a href="{{ route('tables.edit', $table->id) }}" class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </a>
                                        <form action="{{ route('tables.destroy', $table->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="margin: 0;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="item trash" style="border:none; background:none; cursor: pointer;">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </form>
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
