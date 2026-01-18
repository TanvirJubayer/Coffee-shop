<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Discounts & Coupons</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Discounts</div></li>
                </ul>
            </div>

            <div class="wg-box">
                @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
                @endif
                
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow"></div>
                    <button class="tf-button style-1 w208" data-bs-toggle="modal" data-bs-target="#addDiscountModal">
                        <i class="icon-plus"></i> Add New Discount
                    </button>
                </div>
                
                <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li><div class="body-title">Name</div></li>
                        <li><div class="body-title">Code</div></li>
                        <li><div class="body-title">Value</div></li>
                        <li><div class="body-title">Status</div></li>
                        <li><div class="body-title">Validity</div></li>
                        <li><div class="body-title">Action</div></li>
                    </ul>
                    <ul class="table-list">
                        @foreach ($discounts as $discount)
                        <li class="product-item gap14">
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="body-text fw-bold">{{ $discount->name }}</div>
                                <div class="body-text">
                                    <span class="badge bg-light text-dark border">{{ $discount->code }}</span>
                                </div>
                                <div class="body-text">
                                    @if($discount->type == 'percentage')
                                        {{ $discount->value }}%
                                    @else
                                        ${{ number_format($discount->value, 2) }}
                                    @endif
                                    @if($discount->min_order > 0)
                                        <div class="small text-muted">Min: ${{ number_format($discount->min_order, 2) }}</div>
                                    @endif
                                </div>
                                <div class="body-text">
                                    @if($discount->is_active && $discount->isValid())
                                        <span class="badge bg-success">Active</span>
                                    @elseif(!$discount->is_active)
                                        <span class="badge bg-danger">Inactive</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Expired</span>
                                    @endif
                                </div>
                                <div class="body-text small">
                                    @if($discount->start_date || $discount->end_date)
                                        {{ $discount->start_date ? $discount->start_date->format('M d') : 'Any' }} 
                                        - 
                                        {{ $discount->end_date ? $discount->end_date->format('M d, Y') : 'Forever' }}
                                    @else
                                        Always Valid
                                    @endif
                                </div>
                                <div class="list-icon-function">
                                    <button class="item edit" data-bs-toggle="modal" data-bs-target="#editDiscountModal{{ $discount->id }}">
                                        <i class="icon-edit-3"></i>
                                    </button>
                                    <form action="{{ route('discounts.destroy', $discount) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this discount?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="item trash border-0 bg-transparent p-0">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editDiscountModal{{ $discount->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form class="modal-content" action="{{ route('discounts.update', $discount) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Discount</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $discount->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Code</label>
                                            <input type="text" class="form-control" name="code" value="{{ $discount->code }}" required>
                                        </div>
                                        <div class="row g-2 mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Type</label>
                                                <select class="form-select" name="type">
                                                    <option value="percentage" {{ $discount->type == 'percentage' ? 'selected' : '' }}>Percentage (%)</option>
                                                    <option value="fixed" {{ $discount->type == 'fixed' ? 'selected' : '' }}>Fixed Amount ($)</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Value</label>
                                                <input type="number" step="0.01" class="form-control" name="value" value="{{ $discount->value }}" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Minimum Order ($)</label>
                                            <input type="number" step="0.01" class="form-control" name="min_order" value="{{ $discount->min_order }}">
                                        </div>
                                        <div class="row g-2 mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Start Date</label>
                                                <input type="date" class="form-control" name="start_date" value="{{ $discount->start_date ? $discount->start_date->format('Y-m-d') : '' }}">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">End Date</label>
                                                <input type="date" class="form-control" name="end_date" value="{{ $discount->end_date ? $discount->end_date->format('Y-m-d') : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="hidden" name="is_active" value="0">
                                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ $discount->is_active ? 'checked' : '' }}>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Discount</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="addDiscountModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('discounts.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Discount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Summer Sale" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Code</label>
                        <input type="text" class="form-control" name="code" placeholder="SUMMER2026" required>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label">Type</label>
                            <select class="form-select" name="type">
                                <option value="percentage">Percentage (%)</option>
                                <option value="fixed">Fixed Amount ($)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Value</label>
                            <input type="number" step="0.01" class="form-control" name="value" placeholder="10" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Minimum Order ($)</label>
                        <input type="number" step="0.01" class="form-control" name="min_order" value="0">
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="col-6">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                    </div>
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Discount</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app-layout>
