@extends('layouts.app')

@section('content')
<div class="container-fluid" x-data="posApp()">
    <div class="row h-100">
        <!-- Products Column -->
        <div class="col-md-8 p-3" style="height: calc(100vh - 80px); overflow-y: auto;">
            <div class="d-flex justify-content-between mb-3 align-items-center">
                <h3>Products</h3>
                <input type="text" x-model="search" class="form-control w-50" placeholder="Search products...">
            </div>

            <!-- Category Filter -->
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a class="nav-link" :class="{ 'active': selectedCategory === null }" @click.prevent="selectedCategory = null" href="#">All</a>
                </li>
                @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" :class="{ 'active': selectedCategory === {{ $category->id }} }" @click.prevent="selectedCategory = {{ $category->id }}" href="#">{{ $category->name }}</a>
                </li>
                @endforeach
            </ul>

            <!-- Product Grid -->
            <div class="row g-3">
                <template x-for="product in filteredProducts" :key="product.id">
                    <div class="col-md-4 col-sm-6">
                        <div class="card h-100 shadow-sm" @click="addToCart(product)" style="cursor: pointer; transition: transform 0.2s;">
                            <img :src="product.image ? '{{ asset('storage') }}/' + product.image : 'https://placehold.co/200x150'" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">
                            <div class="card-body p-2 text-center">
                                <h6 class="card-title fw-bold" x-text="product.name"></h6>
                                <p class="card-text text-primary mb-0 fw-bold">$<span x-text="parseFloat(product.price).toFixed(2)"></span></p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Cart Column -->
        <div class="col-md-4 bg-white border-start p-0 h-100 d-flex flex-column" style="height: calc(100vh - 80px);">
            <div class="p-3 border-bottom bg-light">
                <h4 class="mb-3">Current Order</h4>
                <div class="row g-2">
                    <div class="col-6">
                        <label class="form-label small">Order Type</label>
                        <select class="form-select form-select-sm" x-model="orderType">
                            <option value="dine_in">Dine In</option>
                            <option value="takeaway">Takeaway</option>
                        </select>
                    </div>
                    <div class="col-6" x-show="orderType === 'dine_in'">
                        <label class="form-label small">Table</label>
                        <select class="form-select form-select-sm" x-model="selectedTable">
                            <option value="">Select Table</option>
                            @foreach($tables as $table)
                                <option value="{{ $table->id }}">{{ $table->name }} ({{ $table->capacity }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Cart Items -->
            <div class="flex-grow-1 overflow-auto p-3">
                <template x-if="cart.length === 0">
                    <div class="text-center text-muted mt-5">
                        <i class="bi bi-cart3 fs-1"></i>
                        <p class="mt-2">Cart is empty</p>
                    </div>
                </template>
                <ul class="list-group list-group-flush">
                    <template x-for="(item, index) in cart" :key="index">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div class="me-auto">
                                <div class="fw-bold" x-text="item.name"></div>
                                <div class="small text-muted">$<span x-text="parseFloat(item.price).toFixed(2)"></span> x <span x-text="item.quantity"></span></div>
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-sm btn-outline-secondary me-2" @click="updateQuantity(index, -1)">-</button>
                                <span class="fw-bold mx-1" x-text="item.quantity"></span>
                                <button class="btn btn-sm btn-outline-secondary ms-2" @click="updateQuantity(index, 1)">+</button>
                            </div>
                            <div class="fw-bold ms-3">$<span x-text="(item.price * item.quantity).toFixed(2)"></span></div>
                            <button class="btn btn-sm text-danger ms-2" @click="removeFromCart(index)"><i class="bi bi-trash"></i></button>
                        </li>
                    </template>
                </ul>
            </div>

            <!-- Totals & Checkout -->
            <div class="p-3 border-top bg-light">
                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal</span>
                    <span class="fw-bold">$<span x-text="subtotal.toFixed(2)"></span></span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Tax ({{ config('app.tax_rate', 10) }}%)</span>
                    <span class="fw-bold">$<span x-text="tax.toFixed(2)"></span></span>
                </div>
                <div class="d-flex justify-content-between mb-3 fs-5">
                    <span class="fw-bold">Total</span>
                    <span class="fw-bold text-success">$<span x-text="total.toFixed(2)"></span></span>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-success btn-lg" :disabled="cart.length === 0" @click="showPaymentModal = true">
                        Pay $<span x-text="total.toFixed(2)"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" :class="{ 'show d-block': showPaymentModal }" x-show="showPaymentModal" style="background: rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment</h5>
                    <button type="button" class="btn-close" @click="showPaymentModal = false"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Total Amount</label>
                        <h3 class="text-center">$<span x-text="total.toFixed(2)"></span></h3>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Payment Method</label>
                        <div class="btn-group w-100" role="group">
                            <input type="radio" class="btn-check" name="payment_method" id="cash" value="cash" x-model="paymentMethod" autocomplete="off" checked>
                            <label class="btn btn-outline-success" for="cash">Cash</label>

                            <input type="radio" class="btn-check" name="payment_method" id="card" value="card" x-model="paymentMethod" autocomplete="off">
                            <label class="btn btn-outline-primary" for="card">Card</label>

                            <input type="radio" class="btn-check" name="payment_method" id="mobile" value="mobile" x-model="paymentMethod" autocomplete="off">
                            <label class="btn btn-outline-info" for="mobile">Mobile</label>
                        </div>
                    </div>
                    <div class="mb-3" x-show="paymentMethod === 'cash'">
                        <label class="form-label">Cash Received</label>
                        <input type="number" class="form-control form-control-lg" x-model="amountReceived" step="0.01">
                        <div class="mt-2 text-muted" x-show="amountReceived > total">
                            Change: <strong>$<span x-text="(amountReceived - total).toFixed(2)"></span></strong>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="showPaymentModal = false">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="processPayment" :disabled="processing || (paymentMethod === 'cash' && amountReceived < total)">
                        <span x-show="processing" class="spinner-border spinner-border-sm me-1"></span>
                        Complete Order
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>
<script>
    function posApp() {
        return {
            products: @json($products),
            categories: @json($categories),
            cart: [],
            search: '',
            selectedCategory: null,
            orderType: 'dine_in',
            selectedTable: '',
            showPaymentModal: false,
            paymentMethod: 'cash',
            amountReceived: 0,
            processing: false,

            get filteredProducts() {
                return this.products.filter(p => {
                    const matchesSearch = p.name.toLowerCase().includes(this.search.toLowerCase());
                    const matchesCategory = this.selectedCategory ? p.category_id === this.selectedCategory : true;
                    return matchesSearch && matchesCategory;
                });
            },

            addToCart(product) {
                const existingItem = this.cart.find(item => item.id === product.id);
                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    this.cart.push({ ...product, quantity: 1 });
                }
            },

            removeFromCart(index) {
                this.cart.splice(index, 1);
            },

            updateQuantity(index, change) {
                const item = this.cart[index];
                item.quantity += change;
                if (item.quantity <= 0) {
                    this.removeFromCart(index);
                }
            },

            get subtotal() {
                return this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            },

            get tax() {
                return this.subtotal * 0.10; // 10% tax
            },

            get total() {
                return this.subtotal + this.tax;
            },

            async processPayment() {
                this.processing = true;
                try {
                    const response = await fetch('{{ route('pos.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            cart: this.cart,
                            total_amount: this.total,
                            payment_method: this.paymentMethod,
                            amount_received: this.amountReceived,
                            table_id: this.selectedTable,
                            order_type: this.orderType
                        })
                    });

                    const result = await response.json();
                    
                    if (result.success) {
                        alert('Order Processed Successfully!');
                        this.resetOrder();
                    } else {
                        alert('Error processing order');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Something went wrong.');
                } finally {
                    this.processing = false;
                }
            },

            resetOrder() {
                this.cart = [];
                this.showPaymentModal = false;
                this.amountReceived = 0;
                this.selectedTable = '';
            }
        };
    }
</script>
<style>
    /* Custom Scrollbar for POS */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: #f1f1f1; }
    ::-webkit-scrollbar-thumb { background: #888; border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: #555; }
</style>
@endsection
