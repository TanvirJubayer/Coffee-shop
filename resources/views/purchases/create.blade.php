<x-layouts.app-layout>
    <div class="main-content-inner" x-data="purchaseForm()">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>New Purchase</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('home') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><a href="{{ route('purchases.index') }}"><div class="text-tiny">Purchases</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">New</div></li>
                </ul>
            </div>

            <form action="{{ route('purchases.store') }}" method="POST">
                @csrf
                <div class="wg-box mb-30">
                    <fieldset class="supplier">
                        <div class="body-title mb-10">Supplier <span class="tf-color-1">*</span></div>
                        <div class="select">
                            <select name="supplier_id" required>
                                <option value="">Select Suggestion</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>
                    <div class="cols gap22">
                        <fieldset class="date">
                            <div class="body-title mb-10">Purchase Date <span class="tf-color-1">*</span></div>
                            <input type="date" name="purchase_date" value="{{ date('Y-m-d') }}" required>
                        </fieldset>
                        <fieldset class="ref">
                            <div class="body-title mb-10">Reference No</div>
                            <input type="text" name="reference_no" placeholder="Invoice #">
                        </fieldset>
                    </div>
                    <fieldset class="notes">
                        <div class="body-title mb-10">Notes</div>
                        <textarea name="notes" placeholder="Additional notes..."></textarea>
                    </fieldset>
                </div>

                <div class="wg-box">
                    <div class="flex items-center justify-between mb-20">
                        <h4>Purchase Items</h4>
                        <button type="button" class="tf-button style-1" @click="addItem()">
                            <i class="icon-plus"></i> Add Item
                        </button>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(item, index) in items" :key="index">
                                    <tr>
                                        <td>
                                            <div class="select">
                                                <select :name="'items['+index+'][type]'" x-model="item.type" required>
                                                    <option value="ingredient">Ingredient (Raw)</option>
                                                    <option value="product">Product (Sellable)</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <template x-if="item.type === 'ingredient'">
                                                <div class="select">
                                                    <select :name="'items['+index+'][item_id]'" x-model="item.item_id" required>
                                                        <option value="">Select Ingredient</option>
                                                        @foreach($ingredients as $ing)
                                                            <option value="{{ $ing->id }}">{{ $ing->name }} ({{ $ing->unit }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </template>
                                            <template x-if="item.type === 'product'">
                                                <div class="select">
                                                    <select :name="'items['+index+'][item_id]'" x-model="item.item_id" required>
                                                        <option value="">Select Product</option>
                                                        @foreach($products as $prod)
                                                            <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </template>
                                        </td>
                                        <td>
                                            <input type="number" step="0.01" :name="'items['+index+'][quantity]'" x-model="item.quantity" @input="calculateTotal(index)" class="form-control" placeholder="Qty" required>
                                        </td>
                                        <td>
                                            <input type="number" step="0.01" :name="'items['+index+'][unit_cost]'" x-model="item.unit_cost" @input="calculateTotal(index)" class="form-control" placeholder="Cost" required>
                                        </td>
                                        <td>
                                            $<span x-text="(item.quantity * item.unit_cost).toFixed(2)"></span>
                                        </td>
                                        <td>
                                            <button type="button" class="item trash" @click="removeItem(index)">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-end fw-bold">Grand Total:</td>
                                    <td class="fw-bold">$<span x-text="grandTotal.toFixed(2)"></span></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="bot mt-20">
                        <button class="tf-button w208" type="submit">Complete Purchase</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function purchaseForm() {
            return {
                items: [
                    { type: 'ingredient', item_id: '', quantity: 1, unit_cost: 0 }
                ],
                get grandTotal() {
                    return this.items.reduce((sum, item) => sum + (item.quantity * item.unit_cost), 0);
                },
                addItem() {
                    this.items.push({ type: 'ingredient', item_id: '', quantity: 1, unit_cost: 0 });
                },
                removeItem(index) {
                    if (this.items.length > 1) {
                        this.items = this.items.filter((_, i) => i !== index);
                    }
                },
                calculateTotal(index) {
                    // Logic handled by x-text and computed getter
                }
            }
        }
    </script>
</x-layouts.app-layout>
