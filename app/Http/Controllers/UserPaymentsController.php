<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserPaymentsController extends Controller
{
    public function index($id)
    {
        $data = [
            'user' => User::findOrFail($id),
            'tab_menu' => 'payments'
        ];

        return view('users.payments.payments', $data);
    }

    public function store(PaymentRequest $request, $user_id)
    {
        $formData = $request->all();
        $formData['user_id'] = $user_id;

        if (Payment::create($formData)) {
            Session::flash('message', 'Payment Added Successfully');
        }

        return redirect()->route('user.payments', ['id' => $user_id]);
    }

    public function destroy($user_id, $payment_id)
    {
        if (Payment::destroy($payment_id)) {
            Session::flash('message', 'Payment Deleted Successfully');
        }

        return redirect()->route('user.payments', ['id' => $user_id]);
    }
}