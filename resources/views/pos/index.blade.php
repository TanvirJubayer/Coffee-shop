<x-layouts.app-layout>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="container-fluid px-0" x-data="posApp()">
    <!-- Mobile Cart Toggle Button -->
    <button class="btn btn-primary cart-toggle d-md-none" 
            @click="showMobileCart = !showMobileCart"
            x-show="cart.length > 0">
        <i class="icon-shopping-cart"></i>
        <span class="badge bg-danger" x-text="cart.length"></span>
    </button>

    <div class="row g-0 pos-container">
        <!-- Products Column -->
        <div class="col-12 col-md-8 pos-products p-3" style="height: calc(100vh - 80px); overflow-y: auto;">
            <div class="d-flex flex-column flex-sm-row justify-content-between mb-3 align-items-start align-items-sm-center gap-2">
                <h3 class="mb-0">Products</h3>
                <input type="text" x-model="search" class="form-control" style="max-width: 300px;" placeholder="Search products...">
            </div>

            <!-- Category Filter -->
            <div class="category-pills mb-3" style="overflow-x: auto; white-space: nowrap; -webkit-overflow-scrolling: touch;">
                <ul class="nav nav-pills flex-nowrap">
                    <li class="nav-item">
                        <a class="nav-link" :class="{ 'active': selectedCategory === null }" @click.prevent="selectedCategory = null" href="#">All</a>
                    </li>
                    @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" :class="{ 'active': selectedCategory === {{ $category->id }} }" @click.prevent="selectedCategory = {{ $category->id }}" href="#">{{ $category->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Product Grid -->
            <div class="row g-2 g-md-3">
                <template x-for="product in filteredProducts" :key="product.id">
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="card h-100 shadow-sm product-card" 
                             @click="addToCart(product)" 
                             :class="{ 'out-of-stock': product.quantity < 1 }">
                            <div class="position-relative">
                                <img :src="product.image_url || '{{ asset('images/placeholder.svg') }}'" 
                                     class="card-img-top" 
                                     alt="Product" 
                                     style="height: 120px; object-fit: cover;"
                                     onerror="this.src='{{ asset('images/placeholder.svg') }}'">
                                <span class="badge bg-danger position-absolute top-0 end-0 m-1" 
                                      x-show="product.quantity < 5 && product.quantity > 0"
                                      x-text="'Only ' + product.quantity + ' left'"></span>
                                <span class="badge bg-secondary position-absolute top-0 end-0 m-1" 
                                      x-show="product.quantity < 1">Out of Stock</span>
                            </div>
                            <div class="card-body p-2 text-center">
                                <h6 class="card-title fw-bold mb-1 text-truncate" x-text="product.name"></h6>
                                <p class="card-text text-primary mb-0 fw-bold">$<span x-text="parseFloat(product.price).toFixed(2)"></span></p>
                            </div>
                        </div>
                    </div>
                </template>
                <template x-if="filteredProducts.length === 0">
                    <div class="col-12 text-center py-5">
                        <i class="icon-search fs-1 text-muted"></i>
                        <p class="text-muted mt-2">No products found</p>
                    </div>
                </template>
            </div>
        </div>

        <!-- Cart Column (Desktop) / Slide-up Panel (Mobile) -->
        <div class="col-12 col-md-4 pos-cart bg-white border-start d-flex flex-column" 
             :class="{ 'show-mobile': showMobileCart }"
             style="height: calc(100vh - 80px);">
            
            <!-- Cart Header -->
            <div class="p-3 border-bottom bg-light">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="mb-0">Current Order</h4>
                    <button class="btn btn-sm btn-outline-secondary d-md-none" @click="showMobileCart = false">
                        <i class="icon-x"></i>
                    </button>
                </div>
                
                <!-- Held Orders Badge -->
                <div class="mb-2" x-show="heldOrders.length > 0">
                    <button class="btn btn-sm btn-warning w-100" @click="showHeldOrders = !showHeldOrders">
                        <i class="icon-clock"></i> Held Orders (<span x-text="heldOrders.length"></span>)
                    </button>
                </div>
                
                <!-- Held Orders List -->
                <div class="held-orders-list mb-2" x-show="showHeldOrders && heldOrders.length > 0" x-collapse>
                    <template x-for="(held, idx) in heldOrders" :key="idx">
                        <div class="d-flex justify-content-between align-items-center p-2 bg-warning-subtle rounded mb-1">
                            <small x-text="'Order #' + (idx + 1) + ' - ' + held.cart.length + ' items'"></small>
                            <button class="btn btn-sm btn-outline-primary" @click="recallOrder(idx)">Recall</button>
                        </div>
                    </template>
                </div>

                <div class="row g-2">
                    <div class="col-6">
                        <label class="form-label small mb-1">Order Type</label>
                        <select class="form-select form-select-sm" x-model="orderType">
                            <option value="dine_in">Dine In</option>
                            <option value="takeaway">Takeaway</option>
                        </select>
                    </div>
                    <div class="col-6" x-show="orderType === 'dine_in'" x-transition>
                        <label class="form-label small mb-1">Table</label>
                        <select class="form-select form-select-sm" x-model="selectedTable">
                            <option value="">Select Table</option>
                            @foreach($tables as $table)
                                <option value="{{ $table->id }}" 
                                    {{ $table->status !== 'available' ? 'disabled' : '' }}
                                    class="{{ $table->status !== 'available' ? 'text-muted' : '' }}">
                                    {{ $table->name }} ({{ $table->capacity }} Persons)
                                    @if($table->status !== 'available')
                                         - [{{ ucfirst($table->status) }}]
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <!-- Customer Name -->
                <div class="mt-2">
                    <input type="text" class="form-control form-control-sm" x-model="customerName" placeholder="Customer Name (optional)">
                </div>
            </div>

            <!-- Cart Items -->
            <div class="flex-grow-1 overflow-auto p-3">
                <template x-if="cart.length === 0">
                    <div class="text-center text-muted mt-5">
                        <i class="icon-shopping-cart fs-1"></i>
                        <p class="mt-2">Cart is empty</p>
                        <p class="small">Click on products to add them</p>
                    </div>
                </template>
                <ul class="list-group list-group-flush">
                    <template x-for="(item, index) in cart" :key="index">
                        <li class="list-group-item px-0 py-2">
                            <div class="d-flex align-items-center">
                                <img :src="item.image_url || '{{ asset('images/placeholder.svg') }}'" 
                                     class="rounded me-2" 
                                     style="width: 40px; height: 40px; object-fit: cover;">
                                <div class="flex-grow-1 me-2">
                                    <div class="fw-bold small" x-text="item.name"></div>
                                    <div class="text-muted" style="font-size: 0.75rem;">
                                        $<span x-text="parseFloat(item.price).toFixed(2)"></span> each
                                    </div>
                                </div>
                                <div class="d-flex align-items-center me-2">
                                    <button class="btn btn-sm btn-outline-secondary px-2 py-0" @click="updateQuantity(index, -1)">
                                        <i class="icon-minus"></i>
                                    </button>
                                    <span class="fw-bold mx-2" style="min-width: 20px; text-align: center;" x-text="item.quantity"></span>
                                    <button class="btn btn-sm btn-outline-secondary px-2 py-0" @click="updateQuantity(index, 1)">
                                        <i class="icon-plus"></i>
                                    </button>
                                </div>
                                <div class="text-end me-2" style="min-width: 60px;">
                                    <strong>$<span x-text="(item.price * item.quantity).toFixed(2)"></span></strong>
                                </div>
                                <button class="btn btn-sm text-danger p-0" @click="removeFromCart(index)">
                                    <i class="icon-trash-2"></i>
                                </button>
                            </div>
                        </li>
                    </template>
                </ul>
            </div>

            <!-- Order Notes -->
            <div class="px-3 pb-2" x-show="cart.length > 0">
                <textarea class="form-control form-control-sm" x-model="orderNotes" rows="2" placeholder="Order notes / special instructions..."></textarea>
            </div>

            <!-- Coupon Code -->
            <div class="px-3 pb-2" x-show="cart.length > 0">
                <label class="form-label small mb-1">Coupon Code</label>
                <div class="input-group input-group-sm flex-nowrap">
                    <input type="text" class="form-control" x-model="discountCode" placeholder="Enter code" :disabled="discountAmount > 0" @keydown.enter="applyCoupon">
                    <button class="btn btn-outline-secondary" type="button" @click="applyCoupon" x-show="discountAmount === 0" :disabled="!discountCode || processing">
                        <span x-show="processing" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span x-show="!processing">Apply</span>
                    </button>
                    <button class="btn btn-outline-danger" type="button" @click="removeCoupon" x-show="discountAmount > 0">Remove</button>
                </div>
                <div class="small mt-1" :class="discountMessage.includes('successfully') ? 'text-success' : 'text-danger'" x-text="discountMessage" x-show="discountMessage" x-transition></div>
            </div>

            <!-- Totals & Checkout -->
            <div class="p-3 border-top bg-light">
                <div class="d-flex justify-content-between mb-1">
                    <span>Subtotal</span>
                    <span class="fw-bold">$<span x-text="subtotal.toFixed(2)"></span></span>
                </div>
                <div class="d-flex justify-content-between mb-1" x-show="discountAmount > 0">
                    <span class="text-success">Discount</span>
                    <span class="fw-bold text-success">-$<span x-text="discountAmount.toFixed(2)"></span></span>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <span>Tax ({{ config('app.tax_rate', 10) }}%)</span>
                    <span class="fw-bold">$<span x-text="tax.toFixed(2)"></span></span>
                </div>
                <div class="d-flex justify-content-between mb-3 fs-5">
                    <span class="fw-bold">Total</span>
                    <span class="fw-bold text-success">$<span x-text="total.toFixed(2)"></span></span>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-outline-warning flex-grow-1" 
                            :disabled="cart.length === 0" 
                            @click="holdOrder"
                            title="Hold Order">
                        <i class="icon-pause"></i>
                        <span class="d-none d-lg-inline">Hold</span>
                    </button>
                    <button class="btn btn-outline-danger" 
                            :disabled="cart.length === 0" 
                            @click="clearCart"
                            title="Clear Cart">
                        <i class="icon-trash-2"></i>
                    </button>
                    <button class="btn btn-success flex-grow-1" 
                            :disabled="cart.length === 0" 
                            @click="openPaymentModal">
                        <i class="icon-credit-card me-1"></i>
                        Pay $<span x-text="total.toFixed(2)"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" 
         :class="{ 'show d-block': showPaymentModal }" 
         x-show="showPaymentModal" 
         @keydown.escape.window="showPaymentModal = false"
         style="background: rgba(0,0,0,0.5)"
         x-transition>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="icon-credit-card me-2"></i>Payment</h5>
                    <button type="button" class="btn-close btn-close-white" @click="showPaymentModal = false"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Order Summary -->
                            <h6 class="border-bottom pb-2 mb-3">Order Summary</h6>
                            <div class="mb-3" style="max-height: 200px; overflow-y: auto;">
                                <template x-for="item in cart" :key="item.id">
                                    <div class="d-flex justify-content-between small mb-1">
                                        <span x-text="item.name + ' x' + item.quantity"></span>
                                        <span>$<span x-text="(item.price * item.quantity).toFixed(2)"></span></span>
                                    </div>
                                </template>
                            </div>
                            <div class="border-top pt-2">
                                <div class="d-flex justify-content-between">
                                    <span>Subtotal</span>
                                    <span>$<span x-text="subtotal.toFixed(2)"></span></span>
                                </div>
                                <div class="d-flex justify-content-between" x-show="discountAmount > 0">
                                    <span class="text-success">Discount</span>
                                    <span class="text-success">-$<span x-text="discountAmount.toFixed(2)"></span></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Tax</span>
                                    <span>$<span x-text="tax.toFixed(2)"></span></span>
                                </div>
                                <div class="d-flex justify-content-between fs-5 fw-bold mt-2">
                                    <span>Total</span>
                                    <span class="text-success">$<span x-text="total.toFixed(2)"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Payment Method -->
                            <h6 class="border-bottom pb-2 mb-3">Payment Method</h6>
                            <div class="btn-group w-100 mb-3" role="group">
                                <input type="radio" class="btn-check" name="payment_method" id="cash" value="cash" x-model="paymentMethod">
                                <label class="btn btn-outline-success" for="cash">
                                    <i class="icon-dollar-sign d-block fs-4"></i>
                                    Cash
                                </label>

                                <input type="radio" class="btn-check" name="payment_method" id="card" value="card" x-model="paymentMethod">
                                <label class="btn btn-outline-primary" for="card">
                                    <i class="icon-credit-card d-block fs-4"></i>
                                    Card
                                </label>

                                <input type="radio" class="btn-check" name="payment_method" id="mobile" value="mobile" x-model="paymentMethod">
                                <label class="btn btn-outline-info" for="mobile">
                                    <i class="icon-smartphone d-block fs-4"></i>
                                    Mobile
                                </label>
                            </div>

                            <!-- Cash Payment Options -->
                            <div x-show="paymentMethod === 'cash'" x-transition>
                                <label class="form-label">Quick Cash</label>
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <button type="button" class="btn btn-outline-secondary" @click="quickCash(5)">$5</button>
                                    <button type="button" class="btn btn-outline-secondary" @click="quickCash(10)">$10</button>
                                    <button type="button" class="btn btn-outline-secondary" @click="quickCash(20)">$20</button>
                                    <button type="button" class="btn btn-outline-secondary" @click="quickCash(50)">$50</button>
                                    <button type="button" class="btn btn-outline-secondary" @click="quickCash(100)">$100</button>
                                    <button type="button" class="btn btn-outline-success" @click="quickCash(Math.ceil(total))">Exact</button>
                                </div>
                                <label class="form-label">Cash Received</label>
                                <input type="number" class="form-control form-control-lg text-center" x-model.number="amountReceived" step="0.01" min="0">
                                <div class="mt-2 p-2 rounded" 
                                     :class="amountReceived >= total ? 'bg-success-subtle' : 'bg-danger-subtle'"
                                     x-show="amountReceived > 0">
                                    <div class="d-flex justify-content-between">
                                        <span>Change:</span>
                                        <strong :class="amountReceived >= total ? 'text-success' : 'text-danger'">
                                            $<span x-text="Math.max(0, amountReceived - total).toFixed(2)"></span>
                                        </strong>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Payment Options -->
                            <div x-show="paymentMethod === 'card'" x-transition>
                                <label class="form-label">Card Reference Number</label>
                                <input type="text" class="form-control" x-model="cardReference" placeholder="Last 4 digits or reference">
                                <div class="alert alert-info mt-2 py-2 small">
                                    <i class="icon-info me-1"></i>
                                    Process card payment on terminal, then complete order.
                                </div>
                            </div>

                            <!-- Mobile Payment Options -->
                            <div x-show="paymentMethod === 'mobile'" x-transition>
                                <label class="form-label">Transaction ID</label>
                                <input type="text" class="form-control" x-model="mobileTransactionId" placeholder="Enter transaction ID">
                                <div class="alert alert-info mt-2 py-2 small">
                                    <i class="icon-info me-1"></i>
                                    Verify mobile payment received, then complete order.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="showPaymentModal = false">Cancel</button>
                    <button type="button" class="btn btn-success btn-lg" 
                            @click="processPayment" 
                            :disabled="processing || !canCompletePayment">
                        <span x-show="processing" class="spinner-border spinner-border-sm me-1"></span>
                        <i class="icon-check me-1" x-show="!processing"></i>
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
            customerName: '',
            orderNotes: '',
            discountCode: '',
            discountAmount: 0,
            discountMessage: '',
            showPaymentModal: false,
            showMobileCart: false,
            showHeldOrders: false,
            paymentMethod: 'cash',
            amountReceived: 0,
            cardReference: '',
            mobileTransactionId: '',
            processing: false,
            heldOrders: JSON.parse(localStorage.getItem('heldOrders') || '[]'),

            get filteredProducts() {
                return this.products.filter(p => {
                    const matchesSearch = p.name.toLowerCase().includes(this.search.toLowerCase());
                    const matchesCategory = this.selectedCategory ? p.category_id === this.selectedCategory : true;
                    return matchesSearch && matchesCategory;
                });
            },

            addToCart(product) {
                if (product.quantity < 1) {
                    this.showToast('Product is out of stock!', 'error');
                    return;
                }
                
                const existingItem = this.cart.find(item => item.id === product.id);
                if (existingItem) {
                    if (existingItem.quantity + 1 > product.quantity) {
                        this.showToast('Insufficient stock!', 'error');
                        return;
                    }
                    existingItem.quantity++;
                } else {
                    this.cart.push({ ...product, quantity: 1 });
                }
                this.showMobileCart = true; // Auto show cart on mobile when item added
            },

            removeFromCart(index) {
                this.cart.splice(index, 1);
            },

            updateQuantity(index, change) {
                const item = this.cart[index];
                const product = this.products.find(p => p.id === item.id);
                
                if (change > 0 && item.quantity + change > product.quantity) {
                    this.showToast('Insufficient stock! Only ' + product.quantity + ' available.', 'error');
                    return;
                }

                item.quantity += change;
                if (item.quantity <= 0) {
                    this.removeFromCart(index);
                }
            },

            clearCart() {
                if (confirm('Clear all items from cart?')) {
                    this.cart = [];
                    this.orderNotes = '';
                    this.discountCode = '';
                    this.discountAmount = 0;
                    this.customerName = '';
                }
            },

            holdOrder() {
                if (this.cart.length === 0) return;
                
                this.heldOrders.push({
                    cart: [...this.cart],
                    orderType: this.orderType,
                    selectedTable: this.selectedTable,
                    notes: this.orderNotes,
                    customerName: this.customerName,
                    discountAmount: this.discountAmount,
                    timestamp: new Date().toISOString()
                });
                
                // Save to localStorage for persistence
                localStorage.setItem('heldOrders', JSON.stringify(this.heldOrders));
                
                this.resetOrder();
                this.showToast('Order held successfully!', 'success');
            },

            recallOrder(index) {
                const held = this.heldOrders[index];
                this.cart = held.cart;
                this.orderType = held.orderType;
                this.selectedTable = held.selectedTable;
                this.orderNotes = held.notes;
                this.customerName = held.customerName || '';
                this.discountAmount = held.discountAmount || 0;
                
                this.heldOrders.splice(index, 1);
                localStorage.setItem('heldOrders', JSON.stringify(this.heldOrders));
                
                this.showHeldOrders = false;
                this.showToast('Order recalled!', 'success');
            },

            async applyDiscount() {
                // Manual discount now, but keeping function signature empty for safety if called elsewhere (unlikely)
            },

            quickCash(amount) {
                this.amountReceived = amount;
            },

            openPaymentModal() {
                this.amountReceived = Math.ceil(this.total); // Pre-fill with rounded total
                this.showPaymentModal = true;
            },

            get subtotal() {
                return this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            },

            get tax() {
                return (this.subtotal - this.discountAmount) * ({{ config('app.tax_rate', 10) }} / 100);
            },

            get total() {
                return Math.max(0, this.subtotal - this.discountAmount + this.tax);
            },

            get canCompletePayment() {
                if (this.paymentMethod === 'cash') {
                    return this.amountReceived >= this.total;
                }
                return true; // Card and mobile don't require amount input
            },

            applyCoupon() {
                this.discountMessage = '';
                if (!this.discountCode) return;

                fetch('{{ route('discounts.verify') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        code: this.discountCode,
                        total: this.subtotal
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.valid) {
                        this.discountAmount = parseFloat(data.amount);
                        this.discountMessage = data.message;
                        this.showToast('Coupon applied successfully', 'success');
                    } else {
                        this.discountAmount = 0;
                        this.discountMessage = data.message;
                        this.showToast(data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.showToast('Error applying coupon', 'error');
                });
            },

            removeCoupon() {
                this.discountCode = '';
                this.discountAmount = 0;
                this.discountMessage = '';
                this.showToast('Coupon removed', 'info');
            },

            async processPayment() {
                this.processing = true;
                try {
                    if (this.orderType === 'dine_in' && !this.selectedTable) {
                        this.showToast('Please select a table for Dine In orders.', 'error');
                        this.processing = false;
                        return;
                    }

                    // For card/mobile, set amount received to total
                    let finalAmountReceived = this.paymentMethod === 'cash' 
                        ? this.amountReceived 
                        : this.total;

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
                            amount_received: finalAmountReceived,
                            table_id: this.selectedTable,
                            order_type: this.orderType,
                            customer_name: this.customerName,
                            notes: this.orderNotes,
                            discount_amount: this.discountAmount,
                            card_reference: this.cardReference,
                            transaction_id: this.mobileTransactionId
                        })
                    });

                    const result = await response.json();
                    
                    if (result.success) {
                        // Redirect to the invoice page
                        window.location.href = result.redirect;
                    } else {
                        this.showToast(result.message || 'Error processing order', 'error');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    this.showToast('Something went wrong. Please try again.', 'error');
                } finally {
                    this.processing = false;
                }
            },

            resetOrder() {
                this.cart = [];
                this.showPaymentModal = false;
                this.showMobileCart = false;
                this.amountReceived = 0;
                this.selectedTable = '';
                this.orderNotes = '';
                this.customerName = '';
                this.discountCode = '';
                this.discountAmount = 0;
                this.cardReference = '';
                this.mobileTransactionId = '';
            },

            showToast(message, type = 'info') {
                // Simple alert fallback - can be replaced with a proper toast library
                if (type === 'error') {
                    alert('⚠️ ' + message);
                } else {
                    console.log(message);
                }
            }
        };
    }
</script>

<style>
    /* POS Specific Styles */
    .pos-container {
        min-height: calc(100vh - 80px);
    }

    .product-card {
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
    }

    .product-card.out-of-stock {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .category-pills::-webkit-scrollbar {
        height: 4px;
    }

    .category-pills::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 2px;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: #f1f1f1; }
    ::-webkit-scrollbar-thumb { background: #888; border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: #555; }

    /* Mobile Cart Toggle Button */
    .cart-toggle {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1050;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        font-size: 1.5rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .cart-toggle .badge {
        position: absolute;
        top: -5px;
        right: -5px;
    }

    /* Mobile Cart Panel */
    @media (max-width: 767.98px) {
        .pos-products {
            height: auto !important;
            min-height: calc(100vh - 80px);
            padding-bottom: 80px !important;
        }

        .pos-cart {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 70vh !important;
            max-height: 70vh;
            border-radius: 20px 20px 0 0;
            box-shadow: 0 -5px 20px rgba(0,0,0,0.15);
            transform: translateY(100%);
            transition: transform 0.3s ease-in-out;
            z-index: 1040;
        }

        .pos-cart.show-mobile {
            transform: translateY(0);
        }
    }

    /* Tablet adjustments */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .product-card .card-img-top {
            height: 100px;
        }
    }

    /* Modal on mobile */
    @media (max-width: 576px) {
        .modal-dialog {
            margin: 0;
            max-width: 100%;
            height: 100%;
        }

        .modal-content {
            border-radius: 0;
            height: 100%;
        }
    }
</style>

            </div>
        </div>
    </div>
</x-layouts.app-layout>
