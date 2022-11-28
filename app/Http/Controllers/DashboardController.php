<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\PurchaseItem;
use App\Models\Receipt;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $data = [
            'totalUsers' => User::lazy()->count('id'),
            'totalProducts' => Product::lazy()->count('id'),
            'totalSales' => SaleItem::lazy()->sum('total'),
            'totalPurchases' => PurchaseItem::lazy()->sum('total'),
            'totalReceipts' => Receipt::lazy()->sum('amount'),
            'totalPayments' => Payment::lazy()->sum('amount'),
            'totalStock' => PurchaseItem::lazy()->sum('quantity') - SaleItem::lazy()->sum('quantity'),
        ];

        return view('dashboard', $data);
    }
}