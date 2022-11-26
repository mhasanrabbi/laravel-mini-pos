<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\PurchaseItem;
use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptReportController extends Controller
{
    public function index(Request $request)
    {
        $start_date     = $request->get('start_date', date('Y-m-d'));
        $end_date     = $request->get('end_date', date('Y-m-d'));

        $data =
            [
                'start_date' => $start_date,
                'end_date' => $end_date,
                'receipts' => Receipt::whereBetween('date', [$start_date, $end_date])->get(),
            ];

        // dd($data);

        return view('reports.receipts', $data);
    }
}