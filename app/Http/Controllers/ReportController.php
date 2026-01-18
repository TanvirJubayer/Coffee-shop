<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\InventoryTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display the reports dashboard.
     */
    public function index(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->get('end_date', Carbon::now()->toDateString());

        // Summary Statistics
        $stats = [
            'total_sales' => Order::where('status', 'completed')
                ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])
                ->sum('total_amount'),
            'total_orders' => Order::where('status', 'completed')
                ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])
                ->count(),
            'average_order' => Order::where('status', 'completed')
                ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])
                ->avg('total_amount') ?? 0,
            'top_product' => OrderItem::select('product_id', DB::raw('SUM(quantity) as total_qty'))
                ->whereHas('order', function ($q) use ($startDate, $endDate) {
                    $q->where('status', 'completed')
                      ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()]);
                })
                ->groupBy('product_id')
                ->orderByDesc('total_qty')
                ->with('product')
                ->first(),
        ];

        // Daily Sales Chart Data
        $dailySales = Order::selectRaw('DATE(created_at) as date, SUM(total_amount) as total, COUNT(*) as orders')
            ->where('status', 'completed')
            ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Payment Method Breakdown
        $paymentBreakdown = DB::table('payments')
            ->join('orders', 'payments.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->whereBetween('orders.created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])
            ->select('payments.payment_method', DB::raw('SUM(payments.amount) as total'), DB::raw('COUNT(*) as count'))
            ->groupBy('payments.payment_method')
            ->get();

        // Top 5 Products
        $topProducts = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_qty'), DB::raw('SUM(quantity * price) as total_revenue'))
            ->whereHas('order', function ($q) use ($startDate, $endDate) {
                $q->where('status', 'completed')
                  ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()]);
            })
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->with('product')
            ->limit(5)
            ->get();

        // Order Type Breakdown (Dine-in vs Takeaway)
        $orderTypeBreakdown = Order::selectRaw('type, COUNT(*) as count, SUM(total_amount) as total')
            ->where('status', 'completed')
            ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])
            ->groupBy('type')
            ->get();

        return view('reports.index', compact(
            'stats', 'dailySales', 'paymentBreakdown', 'topProducts', 'orderTypeBreakdown',
            'startDate', 'endDate'
        ));
    }

    /**
     * Sales report with detailed breakdown.
     */
    public function sales(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->get('end_date', Carbon::now()->toDateString());
        $groupBy = $request->get('group_by', 'day'); // day, week, month

        $query = Order::where('status', 'completed')
            ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()]);

        // Group by different periods
        switch ($groupBy) {
            case 'week':
                $salesData = $query->selectRaw('YEARWEEK(created_at) as period, MIN(DATE(created_at)) as start_date, SUM(total_amount) as total, COUNT(*) as orders')
                    ->groupBy('period')
                    ->orderBy('period')
                    ->get();
                break;
            case 'month':
                $salesData = $query->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as period, SUM(total_amount) as total, COUNT(*) as orders')
                    ->groupBy('period')
                    ->orderBy('period')
                    ->get();
                break;
            default: // day
                $salesData = $query->selectRaw('DATE(created_at) as period, SUM(total_amount) as total, COUNT(*) as orders')
                    ->groupBy('period')
                    ->orderBy('period')
                    ->get();
        }

        $totals = [
            'sales' => $salesData->sum('total'),
            'orders' => $salesData->sum('orders'),
            'average' => $salesData->count() > 0 ? $salesData->sum('total') / $salesData->sum('orders') : 0,
        ];

        return view('reports.sales', compact('salesData', 'totals', 'startDate', 'endDate', 'groupBy'));
    }

    /**
     * Product performance report.
     */
    public function products(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->get('end_date', Carbon::now()->toDateString());
        $sortBy = $request->get('sort_by', 'quantity'); // quantity, revenue

        $query = OrderItem::select(
                'product_id',
                DB::raw('SUM(quantity) as total_quantity'),
                DB::raw('SUM(quantity * price) as total_revenue'),
                DB::raw('COUNT(DISTINCT order_id) as order_count')
            )
            ->whereHas('order', function ($q) use ($startDate, $endDate) {
                $q->where('status', 'completed')
                  ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()]);
            })
            ->groupBy('product_id')
            ->with('product.category');

        if ($sortBy === 'revenue') {
            $query->orderByDesc('total_revenue');
        } else {
            $query->orderByDesc('total_quantity');
        }

        $productStats = $query->get();

        // Calculate profit if cost is available
        $productStats->each(function ($item) {
            $cost = $item->product->cost ?? 0;
            $item->total_cost = $cost * $item->total_quantity;
            $item->profit = $item->total_revenue - $item->total_cost;
            $item->profit_margin = $item->total_revenue > 0 
                ? round(($item->profit / $item->total_revenue) * 100, 1) 
                : 0;
        });

        // Category breakdown
        $categoryBreakdown = OrderItem::select(
                DB::raw('categories.name as category_name'),
                DB::raw('SUM(order_items.quantity) as total_quantity'),
                DB::raw('SUM(order_items.quantity * order_items.price) as total_revenue')
            )
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->whereHas('order', function ($q) use ($startDate, $endDate) {
                $q->where('status', 'completed')
                  ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()]);
            })
            ->groupBy('categories.name')
            ->orderByDesc('total_revenue')
            ->get();

        return view('reports.products', compact('productStats', 'categoryBreakdown', 'startDate', 'endDate', 'sortBy'));
    }

    /**
     * Staff performance report.
     */
    public function staff(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->get('end_date', Carbon::now()->toDateString());

        $staffStats = Order::select(
                'user_id',
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('SUM(total_amount) as total_sales'),
                DB::raw('AVG(total_amount) as average_order')
            )
            ->where('status', 'completed')
            ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])
            ->whereNotNull('user_id')
            ->groupBy('user_id')
            ->with('user')
            ->orderByDesc('total_sales')
            ->get();

        return view('reports.staff', compact('staffStats', 'startDate', 'endDate'));
    }

    /**
     * Inventory report.
     */
    public function inventory(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->get('end_date', Carbon::now()->toDateString());

        // Current stock levels
        $stockLevels = Product::with('category')
            ->select('*')
            ->selectRaw('quantity <= alert_threshold as is_low_stock')
            ->orderBy('quantity')
            ->get();

        // Stock movements
        $stockMovements = InventoryTransaction::with(['product', 'user', 'supplier'])
            ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])
            ->orderByDesc('created_at')
            ->limit(100)
            ->get();

        // Movement summary by type
        $movementSummary = InventoryTransaction::select('type', DB::raw('SUM(ABS(quantity)) as total_quantity'))
            ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])
            ->groupBy('type')
            ->get();

        // Low stock products
        $lowStockProducts = Product::whereColumn('quantity', '<=', 'alert_threshold')
            ->where('status', true)
            ->with('category')
            ->get();

        return view('reports.inventory', compact('stockLevels', 'stockMovements', 'movementSummary', 'lowStockProducts', 'startDate', 'endDate'));
    }

    /**
     * Export reports to CSV.
     */
    public function export(Request $request, string $type)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->get('end_date', Carbon::now()->toDateString());

        $filename = "report_{$type}_{$startDate}_to_{$endDate}.csv";

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($type, $startDate, $endDate) {
            $file = fopen('php://output', 'w');

            switch ($type) {
                case 'sales':
                    fputcsv($file, ['Date', 'Orders', 'Total Sales']);
                    $data = Order::selectRaw('DATE(created_at) as date, COUNT(*) as orders, SUM(total_amount) as total')
                        ->where('status', 'completed')
                        ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])
                        ->groupBy('date')
                        ->orderBy('date')
                        ->get();
                    foreach ($data as $row) {
                        fputcsv($file, [$row->date, $row->orders, number_format($row->total, 2)]);
                    }
                    break;

                case 'products':
                    fputcsv($file, ['Product', 'Category', 'Quantity Sold', 'Revenue']);
                    $data = OrderItem::select('product_id', DB::raw('SUM(quantity) as qty'), DB::raw('SUM(quantity * price) as revenue'))
                        ->whereHas('order', function ($q) use ($startDate, $endDate) {
                            $q->where('status', 'completed')
                              ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()]);
                        })
                        ->groupBy('product_id')
                        ->with('product.category')
                        ->orderByDesc('qty')
                        ->get();
                    foreach ($data as $row) {
                        fputcsv($file, [
                            $row->product->name,
                            $row->product->category->name ?? 'N/A',
                            $row->qty,
                            number_format($row->revenue, 2)
                        ]);
                    }
                    break;

                case 'inventory':
                    fputcsv($file, ['Product', 'Category', 'Current Stock', 'Alert Threshold', 'Status']);
                    $data = Product::with('category')->orderBy('quantity')->get();
                    foreach ($data as $row) {
                        fputcsv($file, [
                            $row->name,
                            $row->category->name ?? 'N/A',
                            $row->quantity,
                            $row->alert_threshold,
                            $row->quantity <= $row->alert_threshold ? 'Low Stock' : 'OK'
                        ]);
                    }
                    break;
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
