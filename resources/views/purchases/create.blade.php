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
                    <div class="flex items-center justify-between flex-wrap gap10 mb-20">
                        <h4>Purchase Items</h4>
                        <button type="button" class="tf-button style-1" @click="addItem()">
                            <i class="icon-plus"></i> Add Item
                        </button>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th style="width: 20%;">Type</th>
                                    <th style="width: 30%;">Item</th>
                                    <th style="width: 15%;">Quantity</th>
                                    <th style="width: 15%;">Unit Cost</th>
                                    <th style="width: 15%;">Subtotal</th>
                                    <th style="width: 5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="tf-table-body">
                                <template x-for="(item, index) in items" :key="index">
                                    <tr class="align-middle">
                                        <td class="p-2">
                                            <div class="select">
                                                <select :name="'items['+index+'][type]'" x-model="item.type" @change="item.item_id = ''" required class="form-select w-100">
                                                    <option value="ingredient">Ingredient (Raw)</option>
                                                    <option value="product">Product (Sellable)</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <template x-if="item.type === 'ingredient'">
                                                <div class="select">
                                                    <select :name="'items['+index+'][item_id]'" x-model="item.item_id" @change="updateCost(index)" required class="form-select w-100">
                                                        <option value="">Select Ingredient</option>
                                                        @foreach($ingredients as $ing)
                                                            <option value="{{ $ing->id }}">{{ $ing->name }} ({{ $ing->unit }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </template>
                                            <template x-if="item.type === 'product'">
                                                <div class="select">
                                                    <select :name="'items['+index+'][item_id]'" x-model="item.item_id" @change="updateCost(index)" required class="form-select w-100">
                                                        <option value="">Select Product</option>
                                                        @foreach($products as $prod)
                                                            <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </template>
                                        </td>
                                        <td class="p-2">
                                            <input type="number" step="0.01" :name="'items['+index+'][quantity]'" x-model="item.quantity" class="form-control w-100" placeholder="Qty" required>
                                        </td>
                                        <td class="p-2">
                                            <input type="number" step="0.01" :name="'items['+index+'][unit_cost]'" x-model="item.unit_cost" class="form-control w-100" placeholder="Cost" required>
                                        </td>
                                        <td class="p-2 fw-bold">
                                            $<span x-text="(parseFloat(item.quantity || 0) * parseFloat(item.unit_cost || 0)).toFixed(2)"></span>
                                        </td>
                                        <td class="p-2 text-center">
                                            <button type="button" class="btn btn-sm btn-outline-danger" @click="removeItem(index)">
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
        document.addEventListener('alpine:init', () => {
            Alpine.data('purchaseForm', () => ({
                items: [
                    { type: 'ingredient', item_id: '', quantity: 1, unit_cost: 0 }
                ],
                ingredientsData: @json($ingredients),
                productsData: @json($products),
                get grandTotal() {
                    return this.items.reduce((sum, item) => sum + (parseFloat(item.quantity || 0) * parseFloat(item.unit_cost || 0)), 0);
                },
                addItem() {
                    this.items.push({ type: 'ingredient', item_id: '', quantity: 1, unit_cost: 0 });
                },
                removeItem(index) {
                    if (this.items.length > 1) {
                        this.items = this.items.filter((_, i) => i !== index);
                    }
                },
                updateCost(index) {
                    let item = this.items[index];
                    if (!item.item_id) return;

                    if (item.type === 'ingredient') {
                        let ing = this.ingredientsData.find(i => i.id == item.item_id);
                        if (ing) {
                             // Assuming 'cost' or 'alert_threshold' isn't the cost. Migration said 'cost'.
                             // Ingredient migration: cost. Seeder didn't set cost, so it's 0. 
                             // I should update seeder? No, let's use what we have. Default is 0.
                             item.unit_cost = ing.cost || 0; 
                        }
                    } else if (item.type === 'product') {
                        let prod = this.productsData.find(p => p.id == item.item_id);
                        if (prod) {
                            item.unit_cost = prod.cost || 0;
                        }
                    }
                }
            }));
        });
    </script>
</x-layouts.app-layout>
