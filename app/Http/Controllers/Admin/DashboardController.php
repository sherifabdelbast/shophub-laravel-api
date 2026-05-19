<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Admin dashboard stats with previous-period deltas.
     *
     * @group Admin - Dashboard
     */
    public function index(): JsonResponse
    {
        $now = Carbon::now();
        $startToday = $now->copy()->startOfDay();
        $startMonth = $now->copy()->startOfMonth();
        $startPrevMonth = $now->copy()->subMonthNoOverflow()->startOfMonth();
        $endPrevMonth = $startMonth->copy()->subSecond();

        // Revenue (paid orders only). Orders have no paid_at column, so the
        // "today" / "this month" windows are based on created_at among paid orders.
        $paidQuery = fn () => Order::query()->where('payment_status', 'paid');

        $totalRevenue = (float) $paidQuery()->sum('total');
        $todayRevenue = (float) $paidQuery()->where('created_at', '>=', $startToday)->sum('total');
        $thisMonthRevenue = (float) $paidQuery()->where('created_at', '>=', $startMonth)->sum('total');
        $prevMonthRevenue = (float) $paidQuery()
            ->whereBetween('created_at', [$startPrevMonth, $endPrevMonth])
            ->sum('total');

        // Orders count by status
        $countsByStatus = Order::query()
            ->selectRaw('status, COUNT(*) as c')
            ->groupBy('status')
            ->pluck('c', 'status')
            ->all();

        $totalOrders = Order::query()->count();
        $thisMonthOrders = Order::query()->where('created_at', '>=', $startMonth)->count();
        $prevMonthOrders = Order::query()
            ->whereBetween('created_at', [$startPrevMonth, $endPrevMonth])
            ->count();

        // Customers
        $totalCustomers = User::query()->where('role', 'customer')->count();
        $thisMonthCustomers = User::query()->where('role', 'customer')
            ->where('created_at', '>=', $startMonth)->count();
        $prevMonthCustomers = User::query()->where('role', 'customer')
            ->whereBetween('created_at', [$startPrevMonth, $endPrevMonth])->count();

        // Top products by sold_count
        $topProducts = Product::query()
            ->orderByDesc('sold_count')
            ->limit(5)
            ->get(['id', 'name', 'sold_count', 'price'])
            ->map(fn (Product $p) => [
                'id' => $p->id,
                'name' => $p->name,
                'soldCount' => (int) $p->sold_count,
                'revenue' => (float) $p->price * (int) $p->sold_count,
            ]);

        // Recent orders
        $recentOrders = Order::query()
            ->with('user:id,first_name,last_name')
            ->latest()
            ->limit(10)
            ->get()
            ->map(fn (Order $o) => [
                'id' => $o->id,
                'orderNumber' => $o->order_number,
                'total' => (float) $o->total,
                'status' => $o->status,
                'paymentStatus' => $o->payment_status,
                'customerName' => $o->user
                    ? trim(($o->user->first_name ?? '').' '.($o->user->last_name ?? ''))
                    : null,
                'createdAt' => optional($o->created_at)->toIso8601String(),
            ]);

        return response()->json([
            'success' => true,
            'data' => [
                'revenue' => [
                    'total' => $totalRevenue,
                    'today' => $todayRevenue,
                    'thisMonth' => $thisMonthRevenue,
                    'deltaPct' => $this->deltaPct($thisMonthRevenue, $prevMonthRevenue),
                ],
                'ordersCount' => [
                    'pending' => (int) ($countsByStatus['pending'] ?? 0),
                    'processing' => (int) ($countsByStatus['processing'] ?? 0),
                    'shipped' => (int) ($countsByStatus['shipped'] ?? 0),
                    'delivered' => (int) ($countsByStatus['delivered'] ?? 0),
                    'cancelled' => (int) ($countsByStatus['cancelled'] ?? 0),
                    'total' => $totalOrders,
                    'deltaPct' => $this->deltaPct($thisMonthOrders, $prevMonthOrders),
                ],
                'customersCount' => [
                    'total' => $totalCustomers,
                    'deltaPct' => $this->deltaPct($thisMonthCustomers, $prevMonthCustomers),
                ],
                'topProducts' => $topProducts,
                'recentOrders' => $recentOrders,
            ],
        ]);
    }

    /**
     * Percent change between current and previous period, rounded to one decimal.
     * Returns 100.0 when there is no prior baseline but the current value is non-zero.
     */
    private function deltaPct(float|int $current, float|int $previous): float
    {
        if ($previous <= 0) {
            return $current > 0 ? 100.0 : 0.0;
        }

        return round((($current - $previous) / $previous) * 100, 1);
    }
}
