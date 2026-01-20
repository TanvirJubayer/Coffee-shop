<x-layouts.app-layout>
                        <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="tf-section-4 mb-30">
                                    <!-- chart-default -->
                                    <div class="wg-chart-default">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap14">
                                                <div class="image type-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                        height="52" viewBox="0 0 48 52" fill="none">
                                                        <path
                                                            d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                                            fill="#22C55E" />
                                                    </svg>
                                                    <i class="icon-shopping-bag"></i>
                                                </div>
                                                <div>
                                                    <div class="body-text mb-2">Today's Sales</div>
                                                    <h4>${{ number_format($todaySales, 2) }}</h4>
                                                </div>
                                            </div>
                                            <div class="box-icon-trending up">
                                                <i class="icon-trending-up"></i>
                                                <div class="body-title number">1.56%</div>
                                            </div>
                                        </div>
                                        <div class="wrap-chart">
                                            <div id="line-chart-1"></div>
                                        </div>
                                    </div>
                                    <!-- /chart-default -->
                                    <!-- chart-default -->
                                    <div class="wg-chart-default">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap14">
                                                <div class="image type-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                        height="52" viewBox="0 0 48 52" fill="none">
                                                        <path
                                                            d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                                            fill="#FF5200" />
                                                    </svg>
                                                    <i class="icon-dollar-sign"></i>
                                                </div>
                                                <div>
                                                    <div class="body-text mb-2">Monthly Revenue</div>
                                                    <h4>${{ number_format($monthlyRevenue, 2) }}</h4>
                                                </div>
                                            </div>
                                            <div class="box-icon-trending down">
                                                <i class="icon-trending-down"></i>
                                                <div class="body-title number">1.56%</div>
                                            </div>
                                        </div>
                                        <div class="wrap-chart">
                                            <div id="line-chart-2"></div>
                                        </div>
                                    </div>
                                    <!-- /chart-default -->
                                    <!-- chart-default -->
                                    <div class="wg-chart-default">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap14">
                                                <div class="image type-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                        height="52" viewBox="0 0 48 52" fill="none">
                                                        <path
                                                            d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                                            fill="#CBD5E1" />
                                                    </svg>
                                                    <i class="icon-file"></i>
                                                </div>
                                                <div>
                                                    <div class="body-text mb-2">Today's Orders</div>
                                                    <h4>{{ $todayOrders }}</h4>
                                                </div>
                                            </div>
                                            <div class="box-icon-trending {{ $ordersGrowth >= 0 ? 'up' : 'down' }}">
                                                <i class="icon-trending-{{ $ordersGrowth >= 0 ? 'up' : 'down' }}"></i>
                                                <div class="body-title number">{{ number_format(abs($ordersGrowth), 2) }}%</div>
                                            </div>
                                        </div>
                                        <div class="wrap-chart">
                                            <div id="line-chart-3"></div>
                                        </div>
                                    </div>
                                    <!-- /chart-default -->
                                    <!-- chart-default -->
                                    <div class="wg-chart-default">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap14">
                                                <div class="image type-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48"
                                                        height="52" viewBox="0 0 48 52" fill="none">
                                                        <path
                                                            d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                                            fill="#8B5CF6" />
                                                    </svg>
                                                    <i class="icon-dollar-sign"></i>
                                                </div>
                                                <div>
                                                    <div class="body-text mb-2">Avg Order Value</div>
                                                    <h4>${{ number_format($averageOrderValue, 2) }}</h4>
                                                </div>
                                            </div>
                                            <div class="box-icon-trending">
                                                <div class="body-title number">Today</div>
                                            </div>
                                        </div>
                                        <div class="wrap-chart">
                                            <div id="line-chart-4"></div>
                                        </div>
                                    </div>
                                    <!-- /chart-default -->
                                    <!-- /chart-default -->
                                </div>

                                <!-- Daily Report Widget -->
                                <div class="wg-box mb-30">
                                    <div class="flex items-center justify-between">
                                        <h5>Daily Report ({{ \Carbon\Carbon::today()->format('F d, Y') }})</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="p-3 border rounded text-center">
                                                <div class="text-tiny mb-1">Total Sales</div>
                                                <h4 class="text-primary">${{ number_format($todaySales, 2) }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-3 border rounded text-center">
                                                <div class="text-tiny mb-1">Orders</div>
                                                <h4 class="text-info">{{ $todayOrders }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-3 border rounded text-center">
                                                <div class="text-tiny mb-1">Top Selling Item</div>
                                                @if($dailyTopProduct)
                                                    <h5 class="text-success">{{ $dailyTopProduct->product->name }}</h5>
                                                    <div class="text-tiny">Sold: {{ $dailyTopProduct->total_sold }}</div>
                                                @else
                                                    <h5 class="text-muted">-</h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tf-section-5 mb-30">
                                    <!-- chart -->
                                    <div class="wg-box">
                                        <div class="flex items-center justify-between">
                                            <h5>Recent Order</h5>
                                            <div class="dropdown default">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="icon-more"><i
                                                            class="icon-more-horizontal"></i></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="javascript:void(0);">This Week</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Last Week</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="line-chart-5"></div>
                                    </div>
                                    <!-- /chart -->
                                    <!-- top-product -->
                                    <div class="wg-box">
                                        <div class="flex items-center justify-between">
                                            <h5>Top Products</h5>
                                            <div class="dropdown default">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="view-all">View all<i
                                                            class="icon-chevron-down"></i></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="javascript:void(0);">3 days</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">7 days</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="wg-table table-top-product">
                                            <ul class="flex flex-column gap14">
                                                @foreach($topProducts as $top)
                                                @php $p = $top->product; @endphp
                                                <li class="product-item">
                                                    <div class="image">
                                                        <img src="{{ asset('storage/products/' . ($p->image ?? '1.png')) }}"
                                                            alt="{{ $p->name ?? 'Unknown' }}">
                                                    </div>
                                                    <div class="flex items-center justify-between flex-grow">
                                                        <div class="name">
                                                            <a href="{{ route('products.edit', $p->id ?? 0) }}" class="body-title-2">{{ $p->name ?? 'Unknown' }}</a>
                                                            <div class="text-tiny mt-3">{{ $top->total_sold }} Items Sold</div>
                                                        </div>
                                                        <div>
                                                            <div class="text-tiny mb-3">Price</div>
                                                            <div class="body-text">${{ number_format($p->price ?? 0, 2) }}</div>
                                                        </div>
                                                        <div class="country">
                                                            <div class="text-tiny mb-3">Total Revenue</div>
                                                            <div class="body-text">${{ number_format(($p->price ?? 0) * $top->total_sold, 2) }}</div>
                                                        </div>
                                                        <div>
                                                            <div class="body-title-2 mb-3">Stock</div>
                                                            <div class="text-tiny">{{ $p->quantity ?? 0 }} Left</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /top-product -->
                                </div>
                                </div>
                                <div class="tf-section-3">
                                    <!-- orders -->
                                    <div class="wg-box">
                                        <div class="flex items-center justify-between">
                                            <h5>Orders</h5>
                                            <div class="dropdown default">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="icon-more"><i
                                                            class="icon-more-horizontal"></i></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="javascript:void(0);">This Week</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Last Week</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="wg-table table-orders">
                                            <ul class="table-title flex gap10 mb-14">
                                                <li>
                                                    <div class="body-title">Product</div>
                                                </li>
                                                <li>
                                                    <div class="body-title">Price</div>
                                                </li>
                                                <li>
                                                    <div class="body-title">Delivery date</div>
                                                </li>
                                            </ul>
                                            <ul class="flex flex-column gap18">
                                                @foreach($recentOrders as $order)
                                                @php
                                                    $firstItem = $order->items->first();
                                                    $product = $firstItem ? $firstItem->product : null;
                                                @endphp
                                                <li class="product-item gap14">
                                                    <div class="image small">
                                                        @if($product && $product->image)
                                                            <img src="{{ asset('storage/products/' . $product->image) }}" alt="">
                                                        @else
                                                            <img src="{{ asset('storage/products/1.png') }}" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="flex items-center justify-between flex-grow gap10">
                                                        <div class="name">
                                                            <a href="#" class="body-text">{{ $product ? $product->name : 'Unknown Product' }}</a>
                                                            @if($order->items->count() > 1)
                                                                <span class="text-tiny">+ {{ $order->items->count() - 1 }} others</span>
                                                            @endif
                                                        </div>
                                                        <div class="body-text">${{ number_format($order->total_amount, 2) }}</div>
                                                        <div class="body-text">{{ $order->created_at->format('d M Y') }}</div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /orders -->
                                    <!-- earnings -->
                                    <div class="wg-box">
                                        <div class="flex items-center justify-between">
                                            <h5>Earnings</h5>
                                            <div class="dropdown default">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="icon-more"><i
                                                            class="icon-more-horizontal"></i></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="javascript:void(0);">This Week</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Last Week</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap gap40">
                                            <div>
                                                <div class="mb-2">
                                                    <div class="block-legend">
                                                        <div class="dot t1"></div>
                                                        <div class="text-tiny">Revenue</div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap10">
                                                     <h4>${{ number_format($totalSales, 2) }}</h4>
                                                     <div class="box-icon-trending up">
                                                         <i class="icon-trending-up"></i>
                                                         <div class="body-title number">0.00%</div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div>
                                                 <div class="mb-2">
                                                     <div class="block-legend">
                                                         <div class="dot t2"></div>
                                                         <div class="text-tiny">Profit</div>
                                                     </div>
                                                 </div>
                                                 <div class="flex items-center gap10">
                                                     <h4>${{ number_format($profit, 2) }}</h4>
                                                     <div class="box-icon-trending up">
                                                         <i class="icon-trending-up"></i>
                                                         <div class="body-title number">0.00%</div>
                                                     </div>
                                                 </div>
                                             </div>
                                        </div>
                                        <div id="line-chart-6"></div>
                                    </div>
                                    <!-- /earnings -->
                                    <!-- low-stock-alerts -->
                                    <div class="wg-box">
                                        <div class="flex items-center justify-between">
                                            <h5>Low Stock Alerts</h5>
                                            <div class="dropdown default">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="icon-more"><i
                                                            class="icon-more-horizontal"></i></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="{{ route('inventory.index') }}">View All</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="flex flex-column gap20 overflow-h">
                                            @forelse($lowStockProducts as $product)
                                            <li class="product-item gap10">
                                                <div class="image">
                                                    <img src="{{ asset('storage/products/' . ($product->image ?? '1.png')) }}" alt="{{ $product->name }}">
                                                </div>
                                                <div class="flex-grow flex items-center justify-between gap10">
                                                    <div class="name">
                                                        <a href="{{ route('products.edit', $product->id) }}" class="body-title-2">{{ $product->name }}</a>
                                                        <div class="text-tiny mt-1">SKU: {{ $product->sku }}</div>
                                                    </div>
                                                    <div class="body-text text-danger">{{ $product->quantity }} left</div>
                                                </div>
                                                <div>
                                                    <a href="{{ route('inventory.adjust', $product->id) }}" class="btn btn-sm btn-warning">Restock</a>
                                                </div>
                                            </li>
                                            @empty
                                            <li class="text-center text-success">No low stock alerts!</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <!-- /low-stock-alerts -->
                                </div>
                            </div>
                            <!-- /main-content-wrap -->
</x-layouts.app-layout>

<script>
    window.salesData = {
        dates: @json($dates),
        sales: @json($sales)
    };
</script>
