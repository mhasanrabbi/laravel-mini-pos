<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ProductsStockController extends Controller
{
    public function index()
    {
        $data = [
            'products' => Product::all()
        ];

        return view('products.stocks', $data);
    }
}