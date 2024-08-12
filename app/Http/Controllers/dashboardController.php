<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Buys;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index()
    {
        // Obtener el número de ventas por producto
        $productSales = Buys::select('products.name', DB::raw('SUM(buys.total) as total_sales'))
            ->join('products', 'buys.product_id', '=', 'products.id')
            ->groupBy('products.name')
            ->get();

        // Pasar datos a la vista
        return view('admin.dashboard', compact('productSales'));
    }
}
