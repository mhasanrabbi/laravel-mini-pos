<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\InvoiceRequest;
use App\Models\User;
use App\Models\Product;
use App\Models\SaleItem;
use App\Models\SaleInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserSalesController extends Controller
{
    public function index($id)
    {
        $data = [
            'user' => User::findOrFail($id),
            'tab_menu' => 'sales'
        ];

        return view('users.sales.sales', $data);
    }

    public function createInvoice(InvoiceRequest $request, $user_id)
    {
        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        $invoice = SaleInvoice::create($formData);

        return redirect()->route('user.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice->id]);
    }

    public function invoice($user_id, $invoice_id)
    {
        $data = [
            'tab_menu' => 'sales',
            'user' => User::findOrFail($user_id),
            'invoice' => SaleInvoice::findOrFail($invoice_id),
            'products' => Product::arrayForSelect(),
        ];

        return view('users.sales.invoice', $data);
    }

    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id)
    {
        $formData = $request->all();
        $formData['sale_invoice_id'] = $invoice_id;

        if (SaleItem::create($formData)) {
            Session::flash('message', 'Item Added Successfully');
        }

        return redirect()->route('user.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id]);
    }

    public function destroyItem($user_id, $invoice_id, $item_id)
    {
        if (SaleItem::destroy($item_id)) {
            Session::flash('message', 'Item Deleted Successfully');
        }
        return redirect()->route('user.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id]);
    }

    public function destroy($user_id, $invoice_id)
    {
        if (SaleInvoice::destroy($invoice_id)) {
            Session::flash('message', 'Invoice Deleted Successfully');
        }

        return redirect()->route('user.sales', ['id' => $user_id]);
    }
}