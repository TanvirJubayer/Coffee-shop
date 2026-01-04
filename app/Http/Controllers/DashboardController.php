<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Added for the new logic
use Carbon\Carbon; // Added for the new logic

class DashboardController extends Controller
{
    public function index(){
        $totalSales = Order::where('status', 'completed')->sum('total_amount');
        $totalIncome = $totalSales; // Assuming all completed orders are paid
        $ordersPaid = Order::where('status', 'completed')->count();
        $totalVisitor = rand(1000, 5000); // Mock data for now

        $recentOrders = Order::with('items.product')->latest()->take(5)->get();

        // Chart Data: Sales for last 7 days
        $chartData = Order::selectRaw('DATE(created_at) as date, SUM(total_amount) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
            
        $dates = $chartData->pluck('date');
        $sales = $chartData->pluck('total');

        return view("pages.admin.dashboard.index", compact('totalSales', 'totalIncome', 'ordersPaid', 'totalVisitor', 'recentOrders', 'dates', 'sales'));
    }
}
