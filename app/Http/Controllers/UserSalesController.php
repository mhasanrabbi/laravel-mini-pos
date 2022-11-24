<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}