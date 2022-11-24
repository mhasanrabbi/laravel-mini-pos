<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}