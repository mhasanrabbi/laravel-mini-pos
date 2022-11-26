<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->get('start_date', date('Y-m-d'));
        $end_date = $request->get('end_date', date('Y-m-d'));
        $data = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'purchases' => PurchaseItem::select('purchase_items.quantity', 'purchase_items.price', 'purchase_items.total', 'products.title',  'purchase_invoices.challan_no', 'purchase_invoices.date')
                ->join('products', 'purchase_items.product_id', '=', 'products.id')
                ->join('purchase_invoices', 'purchase_items.purchase_invoice_id', '=', 'purchase_invoices.id')->whereBetween('purchase_invoices.date', [$start_date, $end_date])->get()
        ];

        return view('reports.purchases', $data);
    }
}