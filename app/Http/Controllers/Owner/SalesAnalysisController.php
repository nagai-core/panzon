<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Owner;
use App\Models\ItemOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SalesAnalysisController extends Controller
{
    //
    public function index()
    {
        $ownerId = Auth::id();


        $totalSales = ItemOrder::join('purchase_histories', 'item_orders.purchase_history_id', '=', 'purchase_histories.id')
            ->join('items', 'item_orders.item_id', '=', 'items.id')
            ->where('items.owner_id', $ownerId)
            ->select(
                DB::raw('SUM(item_orders.amount * item_orders.price) as total_sales')
            )
            ->value('total_sales');


            $dailySales = ItemOrder::leftJoin('purchase_histories', 'item_orders.purchase_history_id', '=', 'purchase_histories.id')
            ->leftJoin('items', 'item_orders.item_id', '=', 'items.id')
            ->where('items.owner_id', $ownerId)
            ->groupBy(DB::raw('DATE(purchase_histories.created_at)'))
            ->select(
                DB::raw('DATE(purchase_histories.created_at) as date'),
                DB::raw('SUM(item_orders.amount * item_orders.price) as total_sales')
            )
            ->orderBy('date', 'desc')
            ->take(30)
            ->get()
            ->reverse();



            $monthlySales = ItemOrder::leftJoin('purchase_histories', 'item_orders.purchase_history_id', '=', 'purchase_histories.id')
            ->leftJoin('items', 'item_orders.item_id', '=', 'items.id')
            ->where('items.owner_id', $ownerId)
            ->groupBy(DB::raw("DATE_FORMAT(purchase_histories.created_at, '%Y-%m')"))
            ->select(
                DB::raw("DATE_FORMAT(purchase_histories.created_at, '%Y-%m') as date"),
                DB::raw('SUM(item_orders.amount * item_orders.price) as total_sales')
            )
            ->orderBy('date', 'desc')
            ->get()
            ->reverse();

            $productSales = ItemOrder::leftJoin('items', 'item_orders.item_id', '=', 'items.id')
        ->where('items.owner_id', $ownerId)
        ->groupBy('items.item_name')
        ->select(
            'items.item_name as product_name',
            DB::raw('SUM(item_orders.amount * item_orders.price) as total_sales')
        )
        ->orderBy('total_sales', 'desc')
        ->get();


        $categorySales = ItemOrder::leftJoin('items', 'item_orders.item_id', '=', 'items.id')
        ->leftJoin('categories', 'items.category_id', '=', 'categories.id')
        ->where('items.owner_id', $ownerId)
        ->groupBy('categories.name')
        ->select(
            'categories.name as category_name',
            DB::raw('SUM(item_orders.amount * item_orders.price) as total_sales')
        )
        ->orderBy('total_sales', 'desc')
        ->get();

        $dailyLabels = $dailySales->pluck('date');
        $dailyData = $dailySales->pluck('total_sales');


        $monthlyLabels = $monthlySales->pluck('date');
        $monthlyData = $monthlySales->pluck('total_sales');

        $productLabels = $productSales->pluck('product_name');
    $productData = $productSales->pluck('total_sales');

    $categoryLabels = $categorySales->pluck('category_name');
    $categoryData = $categorySales->pluck('total_sales');

    $ownerId = Auth::id();
    $owner = Owner::find($ownerId);

    return view('owner.analysis', compact('dailyLabels', 'dailyData', 'monthlyLabels', 'monthlyData', 'productLabels', 'productData', 'categoryLabels', 'categoryData', 'owner'));
    }
}
