<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
{
    /* ==========================================
     | Dashboard Statistics
     ========================================== */

    $totalOrders = Order::count();

    $totalRevenue = Order::where(
        'payment_status',
        Order::PAYMENT_STATUS_COMPLETED
    )->sum('total');

    $totalCustomers = User::count();

    $pendingOrders = Order::where(
        'status',
        Order::STATUS_PENDING
    )->count();


    /* ==========================================
     | Recent Orders
     ========================================== */

    $recentOrders = Order::with('user')
        ->latest()
        ->take(10)
        ->get();


    /* ==========================================
     | Monthly Revenue Chart (Chart 1)
     ========================================== */

    $monthlySales = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total) as total')
        )
        ->whereYear('created_at', now()->year)
        ->where('payment_status', Order::PAYMENT_STATUS_COMPLETED)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->pluck('total', 'month');

    $salesData = [];

    for ($month = 1; $month <= 12; $month++) {
        $salesData[] = (float) ($monthlySales[$month] ?? 0);
    }


    /* ==========================================
     | Order Status Chart (Chart 4)
     ========================================== */

    $completedOrders = Order::where(
        'status',
        Order::STATUS_DELIVERED
    )->count();

    $processingOrders = Order::where(
        'status',
        Order::STATUS_PROCESSING
    )->count();

    $statusData = [
        $completedOrders,
        $pendingOrders,
        $processingOrders,
    ];


    /* ==========================================
     | Monthly Orders Chart (Chart 5)
     ========================================== */

    $monthlyOrders = Order::selectRaw(
            'MONTH(created_at) as month, COUNT(*) as total'
        )
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->pluck('total', 'month');

    $orderData = [];

    for ($month = 1; $month <= 12; $month++) {
        $orderData[] = $monthlyOrders[$month] ?? 0;
    }


    /* ==========================================
     | Payment Methods Chart (Chart 3)
     ========================================== */

    $paymentData = [
        Order::where('payment_method', Order::PAYMENT_METHOD_COD)->count(),
        Order::where('payment_method', Order::PAYMENT_METHOD_MOMO)->count(),
        Order::where('payment_method', Order::PAYMENT_METHOD_VNPAY)->count(),
    ];


    /* ==========================================
     | Low Stock Products
     ========================================== */

    $lowStockProducts = Product::where('quantity', '<=', 10)
        ->orderBy('quantity')
        ->take(5)
        ->get();


    /* ==========================================
     | Top Selling Categories
     ========================================== */

    $topCategories = Category::select(
            'categories.id',
            'categories.name',
            DB::raw('SUM(order_product.quantity) as total_sold')
        )
        ->join('products', 'categories.id', '=', 'products.category_id')
        ->join('order_product', 'products.id', '=', 'order_product.product_id')
        ->groupBy('categories.id', 'categories.name')
        ->orderByDesc('total_sold')
        ->take(5)
        ->get();


    /* ==========================================
     | Orders Summary
     ========================================== */

    $toDayOrders = Order::whereDate(
        'created_at',
        Carbon::today()
    )->get();

    $yesterdayOrders = Order::whereDate(
        'created_at',
        Carbon::yesterday()
    )->get();

    $monthOrders = Order::whereMonth(
        'created_at',
        Carbon::now()->month
    )->get();

    $yearOrders = Order::whereYear(
        'created_at',
        Carbon::now()->year
    )->get();


    /* ==========================================
     | Trending Products
     ========================================== */

    $trendingProducts = Product::select(
            'products.id',
            'products.name',
            'products.thumbnail',
            DB::raw('SUM(order_product.quantity) as total_sold')
        )
        ->join('order_product', 'products.id', '=', 'order_product.product_id')
        ->groupBy(
            'products.id',
            'products.name',
            'products.thumbnail'
        )
        ->orderByDesc('total_sold')
        ->take(5)
        ->get();


    /* ==========================================
     | Return View
     ========================================== */

    return view('admin.dashboard', compact(
        'toDayOrders',
        'yesterdayOrders',
        'monthOrders',
        'yearOrders',

        'totalOrders',
        'totalRevenue',
        'totalCustomers',
        'pendingOrders',

        'recentOrders',
        'trendingProducts',

        'salesData',

        'completedOrders',
        'processingOrders',
        'statusData',

        'orderData',
        'paymentData',

        'lowStockProducts',
        'topCategories'
    ));
}
}
