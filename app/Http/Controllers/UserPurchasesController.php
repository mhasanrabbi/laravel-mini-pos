<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\InvoiceRequest;
use App\Models\Product;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserPurchasesController extends Controller
{
    public function index($id)
    {
        $data = [
            'user' => User::findOrFail($id),
            'tab_menu' => 'purchases'
        ];

        return view('users.purchases.purchases', $data);
    }

    public function createInvoice(InvoiceRequest $request, $user_id)
    {
        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        $invoice = PurchaseInvoice::create($formData);

        return redirect()->route('user.purchases.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice->id]);
    }

    public function invoice($user_id, $invoice_id)
    {

        $invoice = PurchaseInvoice::findOrFail($invoice_id);

        $data = [
            'tab_menu' => 'purchases',
            'user' => User::findOrFail($user_id),
            'invoice' => $invoice,
            'totalPayable' => $invoice->items()->sum('total'),
            'totalPaid' => $invoice->payments()->sum('amount'),
            'products' => Product::arrayForSelect(),
        ];

        return view('users.purchases.invoice', $data);
    }

    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id)
    {
        $formData = $request->all();
        $formData['purchase_invoice_id']     = $invoice_id;

        if (PurchaseItem::create($formData)) {
            Session::flash('message', 'Item Added Successfully');
        }

        return redirect()->route('user.purchases.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id]);
    }

    public function destroyItem($user_id, $invoice_id, $item_id)
    {
        if (PurchaseItem::destroy($item_id)) {
            Session::flash('message', 'Item Deleted Successfully');
        }

        return redirect()->route('user.purchases.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id]);
    }

    public function destroy($user_id, $invoice_id)
    {
        if (PurchaseInvoice::destroy($invoice_id)) {
            Session::flash('message', 'Invoice Deleted Successfully');
        }

        return redirect()->route('user.purchases', ['id' => $user_id]);
    }
}