<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Added for the new logic
use Carbon\Carbon; // Added for the new logic

use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        // 1. Today's Sales
        $todaySales = Order::where('status', 'completed')
            ->whereDate('created_at', Carbon::today())
            ->sum('total_amount');

        // 2. Monthly Revenue
        $monthlyRevenue = Order::where('status', 'completed')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_amount');

        // 3. Total Orders Today
        $todayOrders = Order::whereDate('created_at', Carbon::today())->count();
        $yesterdayOrders = Order::whereDate('created_at', Carbon::yesterday())->count();
        
        if ($yesterdayOrders > 0) {
            $ordersGrowth = (($todayOrders - $yesterdayOrders) / $yesterdayOrders) * 100;
        } else {
            $ordersGrowth = $todayOrders > 0 ? 100 : 0;
        }
        
        // 4. Average Order Value (Today)
        $averageOrderValue = $todayOrders > 0 ? $todaySales / $todayOrders : 0;
        
        // Daily Report Data
        $dailyTopProduct = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->whereDate('created_at', Carbon::today())
            ->groupBy('product_id')
            ->orderBy('total_sold', 'desc')
            ->with('product')
            ->first();

        // 4. Low Stock Alerts (Keep existing logic or improve as needed)
        // Ingredients
        $lowStockIngredients = \App\Models\Ingredient::whereColumn('quantity', '<=', 'alert_threshold')
             ->take(5)
             ->get();

        // Products (Default threshold 10 for now since no column)
        $lowStockProducts = \App\Models\Product::where('quantity', '<=', 10)
            ->where('status', true)
            ->take(5)
            ->get();

        // All-time stats
        $totalSales = Order::where('status', 'completed')->sum('total_amount'); 
        $ordersPaid = Order::where('status', 'completed')->count(); 
        $totalVisitor = rand(100, 500); // Placeholder

        // Calculate Cost and Profit
        $totalCost = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.status', 'completed')
            ->sum(DB::raw('order_items.quantity * COALESCE(products.cost, 0)'));

        $profit = $totalSales - $totalCost;

        $recentOrders = Order::with('items.product')->latest()->take(5)->get();

        // Top Products
        $topProducts = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderBy('total_sold', 'desc')
            ->with('product')
            ->take(5)
            ->get();

        // Chart Data: Sales for last 7 days
        $chartData = Order::selectRaw('DATE(created_at) as date, SUM(total_amount) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->where('status', 'completed')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
            
        $dates = $chartData->pluck('date');
        $sales = $chartData->pluck('total');

        return view("pages.admin.dashboard.index", compact(
            'todaySales', 'monthlyRevenue', 'todayOrders', 'lowStockProducts',
            'totalSales', 'profit', 'ordersPaid', 'totalVisitor', 
            'recentOrders', 'dates', 'sales', 'topProducts',
            'dailyTopProduct', 'chartData', 'averageOrderValue', 'ordersGrowth'
        ));
    }
}
