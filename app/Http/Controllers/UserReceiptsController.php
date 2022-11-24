<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserReceiptsController extends Controller
{
    public function index($id)
    {
        $data = [
            'user' => User::findOrFail($id),
            'tab_menu' => 'receipts'
        ];

        return view('users.receipts.receipts', $data);
    }
}