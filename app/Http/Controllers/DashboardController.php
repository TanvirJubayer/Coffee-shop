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
        $totalSales = Order::where('status', 'completed')->sum('total_amount');
        
        // Calculate total cost from order items
        $totalCost = OrderItem::whereHas('order', function($q) {
            $q->where('status', 'completed');
        })->join('products', 'order_items.product_id', '=', 'products.id')
          ->select(DB::raw('SUM(order_items.quantity * products.cost) as total_cost'))
          ->first()->total_cost ?? 0;

        $profit = $totalSales - $totalCost;
        $totalIncome = $totalSales; 
        $ordersPaid = Order::where('status', 'completed')->count();
        $totalVisitor = rand(1000, 5000); 

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
            ->groupBy('date')
            ->orderBy('date')
            ->get();
            
        $dates = $chartData->pluck('date');
        $sales = $chartData->pluck('total');

        return view("pages.admin.dashboard.index", compact(
            'totalSales', 'totalIncome', 'ordersPaid', 'totalVisitor', 
            'recentOrders', 'dates', 'sales', 'profit', 'topProducts'
        ));
    }
}
