<?php

namespace App\Http\Controllers\Reports;

use App\Models\Payment;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentReportController extends Controller
{
    public function index(Request $request)
    {
        $start_date     = $request->get('start_date', date('Y-m-d'));
        $end_date     = $request->get('end_date', date('Y-m-d'));

        $data =
            [
                'start_date' => $start_date,
                'end_date' => $end_date,
                'payments' => Payment::whereBetween('date', [$start_date, $end_date])->get(),
            ];

        return view('reports.payments', $data);
    }
}